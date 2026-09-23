<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, private');
header('X-Content-Type-Options: nosniff');

require_once dirname(__DIR__) . '/includes/je-ai-system.php';

$knowledgeFile = dirname(__DIR__) . '/config/ai-assistant.php';
$knowledge = is_file($knowledgeFile) ? require $knowledgeFile : [];
if (!is_array($knowledge)) {
    $knowledge = [];
}

function je_ai_json($payload, $status = 200)
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function je_ai_request_data()
{
    $raw = file_get_contents('php://input');
    if ($raw === false || strlen($raw) > 100000) {
        return [];
    }
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

function je_ai_token()
{
    if (empty($_SESSION['je_ai_csrf'])) {
        $_SESSION['je_ai_csrf'] = bin2hex(random_bytes(24));
    }
    return $_SESSION['je_ai_csrf'];
}

function je_ai_verify_token(array $data)
{
    $token = isset($data['csrf']) ? (string)$data['csrf'] : '';
    return $token !== '' && hash_equals(je_ai_token(), $token);
}

function je_ai_lower($text)
{
    $text = (string)$text;
    return function_exists('mb_strtolower') ? mb_strtolower($text, 'UTF-8') : strtolower($text);
}

function je_ai_answer($message, array $knowledge)
{
    $message = je_ai_lower(trim((string)$message));
    $best = null;
    $bestScore = 0;

    foreach (isset($knowledge['rules']) && is_array($knowledge['rules']) ? $knowledge['rules'] : [] as $rule) {
        if (!is_array($rule) || empty($rule['keywords']) || empty($rule['answer'])) {
            continue;
        }
        $score = 0;
        foreach ($rule['keywords'] as $keyword) {
            $keyword = je_ai_lower(trim((string)$keyword));
            if ($keyword !== '' && strpos($message, $keyword) !== false) {
                // Longer phrases are more specific than one-word matches.
                $score += max(2, strlen($keyword));
            }
        }
        if ($score > $bestScore) {
            $bestScore = $score;
            $best = $rule;
        }
    }

    if (!$best) {
        return [
            'answer' => isset($knowledge['fallback']) ? (string)$knowledge['fallback'] : 'Please choose a suggested question or request a counsellor callback.',
            'links' => [],
            'capture_lead' => false,
        ];
    }

    return [
        'answer' => (string)$best['answer'],
        'links' => isset($best['links']) && is_array($best['links']) ? $best['links'] : [],
        'capture_lead' => !empty($best['capture_lead']),
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    je_ai_json([
        'ok' => true,
        'assistant_name' => isset($knowledge['assistant_name']) ? $knowledge['assistant_name'] : 'JE AI Assistant',
        'welcome' => isset($knowledge['welcome']) ? $knowledge['welcome'] : 'Hi! How can I help you today?',
        'quick_actions' => isset($knowledge['quick_actions']) && is_array($knowledge['quick_actions']) ? $knowledge['quick_actions'] : [],
        'popular_questions' => isset($knowledge['popular_questions']) && is_array($knowledge['popular_questions']) ? $knowledge['popular_questions'] : [],
        'csrf' => je_ai_token(),
        'session_id' => session_id(),
        'mode' => 'local-rules',
    ]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    je_ai_json(['ok' => false, 'message' => 'Method not allowed.'], 405);
}

$data = je_ai_request_data();
if (!je_ai_verify_token($data)) {
    je_ai_json(['ok' => false, 'message' => 'Your chat session expired. Please refresh the page and try again.'], 419);
}

$action = isset($data['action']) ? (string)$data['action'] : 'message';

if ($action === 'message') {
    $message = je_ai_clean(isset($data['message']) ? $data['message'] : '', 1200);
    if ($message === '') {
        je_ai_json(['ok' => false, 'message' => 'Please type a question.'], 422);
    }
    je_ai_json(array_merge(['ok' => true], je_ai_answer($message, $knowledge)));
}

if ($action === 'lead') {
    // Honeypot must stay empty. Bots commonly fill every visible/hidden field.
    if (!empty($data['website'])) {
        je_ai_json(['ok' => true, 'message' => 'Thank you.']);
    }

    $ip = isset($_SERVER['REMOTE_ADDR']) ? (string)$_SERVER['REMOTE_ADDR'] : 'unknown';
    $rateKey = 'lead|' . $ip . '|' . session_id();
    if (je_ai_rate_limited($rateKey, 5, 600)) {
        je_ai_json(['ok' => false, 'message' => 'Too many requests. Please wait a few minutes and try again.'], 429);
    }

    $data['session_id'] = session_id();
    $data['source'] = 'AI_CHAT';
    if (empty($data['device']) && !empty($_SERVER['HTTP_USER_AGENT'])) {
        $data['device'] = $_SERVER['HTTP_USER_AGENT'];
    }

    try {
        $result = je_ai_store_lead($data);
        je_ai_json([
            'ok' => true,
            'message' => 'Thanks! Your enquiry has been saved. The Jaipur Engineers team can now follow up with you.',
            'lead_id' => $result['lead_id'],
            'database_saved' => $result['database_saved'],
            'fallback_saved' => $result['fallback_saved'],
        ]);
    } catch (InvalidArgumentException $e) {
        je_ai_json(['ok' => false, 'message' => $e->getMessage()], 422);
    } catch (Throwable $e) {
        error_log('JE AI lead error: ' . $e->getMessage());
        je_ai_json(['ok' => false, 'message' => 'We could not save the enquiry right now. Please use the Contact page or call Jaipur Engineers.'], 500);
    }
}

je_ai_json(['ok' => false, 'message' => 'Unknown action.'], 400);
