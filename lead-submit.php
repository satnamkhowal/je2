<?php
function je_clean_input(string $value, int $limit = 255): string
{
    $value = trim(strip_tags($value));
    $value = preg_replace('/\s+/', ' ', $value) ?? '';
    return substr($value, 0, $limit);
}

function je_storage_dir(): string
{
    $dir = __DIR__ . '/storage';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return $dir;
}

function je_save_pending_lead(array $lead): bool
{
    $line = json_encode($lead, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL;
    return file_put_contents(je_storage_dir() . '/leads-pending.jsonl', $line, FILE_APPEND | LOCK_EX) !== false;
}

function je_valid_phone(string $phone): bool
{
    $digits = preg_replace('/\D+/', '', $phone) ?? '';
    return strlen($digits) >= 7 && strlen($digits) <= 15;
}

$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$lead = [
    'name' => $isPost ? je_clean_input((string)($_POST['name'] ?? ''), 150) : '',
    'phone' => $isPost ? je_clean_input((string)($_POST['phone'] ?? ''), 40) : '',
    'email' => $isPost ? je_clean_input((string)($_POST['email'] ?? ''), 180) : '',
    'course' => $isPost ? je_clean_input((string)($_POST['course'] ?? ''), 180) : '',
    'source' => $isPost ? je_clean_input((string)($_POST['source'] ?? ''), 180) : '',
    'message' => $isPost ? je_clean_input((string)($_POST['message'] ?? ''), 1000) : '',
    'page_url' => je_clean_input((string)($_SERVER['HTTP_REFERER'] ?? ''), 255),
    'user_agent' => je_clean_input((string)($_SERVER['HTTP_USER_AGENT'] ?? ''), 255),
    'created_at' => date('c'),
];

$saved = false;
$queued = false;
$notice = '';

header('X-Robots-Tag: noindex, nofollow, noarchive', true);
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0', true);
header('Pragma: no-cache', true);

if (!$isPost) {
    $notice = 'Please submit an enquiry from a Jaipur Engineers course page.';
} elseif ($lead['name'] === '' || $lead['phone'] === '') {
    $notice = 'Please submit your name and mobile number.';
} elseif (!je_valid_phone($lead['phone'])) {
    $notice = 'Please enter a valid mobile number.';
} elseif ($lead['email'] !== '' && filter_var($lead['email'], FILTER_VALIDATE_EMAIL) === false) {
    $notice = 'Please enter a valid email address or leave the email field blank.';
} else {
    $configPath = __DIR__ . '/config/database.php';
    if (is_file($configPath)) {
        try {
            $config = include $configPath;
            if (!is_array($config)) {
                throw new RuntimeException('Invalid database configuration.');
            }

            foreach (['host', 'database', 'username', 'password'] as $requiredKey) {
                if (!array_key_exists($requiredKey, $config)) {
                    throw new RuntimeException('Incomplete database configuration.');
                }
            }

            $charset = $config['charset'] ?? 'utf8mb4';
            $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=' . $charset;
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

            // Database/table creation belongs to install-expert.php. Do not run install SQL on every lead.
            $stmt = $pdo->prepare('INSERT INTO je_leads (name, phone, email, course, source, message, page_url, user_agent) VALUES (:name, :phone, :email, :course, :source, :message, :page_url, :user_agent)');
            $stmt->execute([
                ':name' => $lead['name'],
                ':phone' => $lead['phone'],
                ':email' => $lead['email'] !== '' ? $lead['email'] : null,
                ':course' => $lead['course'] !== '' ? $lead['course'] : null,
                ':source' => $lead['source'] !== '' ? $lead['source'] : null,
                ':message' => $lead['message'] !== '' ? $lead['message'] : null,
                ':page_url' => $lead['page_url'] !== '' ? $lead['page_url'] : null,
                ':user_agent' => $lead['user_agent'] !== '' ? $lead['user_agent'] : null,
            ]);
            $saved = true;
        } catch (Throwable $exception) {
            $queued = je_save_pending_lead($lead + ['db_error' => 'Database write unavailable']);
            $notice = $queued
                ? 'Your enquiry has been received and queued safely for database review.'
                : 'We could not save this enquiry. Please return to the course page and try again.';
        }
    } else {
        $queued = je_save_pending_lead($lead + ['db_error' => 'Database config missing']);
        $notice = $queued
            ? 'Your enquiry has been received and queued safely while database setup is completed.'
            : 'We could not save this enquiry. Please return to the course page and try again.';
    }
}

$pageTitle = $saved ? 'Thank You | Jaipur Engineers' : 'Enquiry Status | Jaipur Engineers';
$pageDescription = 'Jaipur Engineers enquiry submission status.';
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <?php include __DIR__ . '/head.php'; ?>
    <link rel="stylesheet" href="assets/css/je-growth-system.css">
</head>
<body class="defult-home">
<?php include __DIR__ . '/header.php'; ?>
<main class="je-section">
    <div class="container">
        <div class="je-install-card">
            <?php if ($saved): ?>
                <div class="je-alert je-alert-success">Thank you. Your enquiry has been received.</div>
                <h1>Our team will contact you soon.</h1>
                <p>You can continue exploring Jaipur Engineers courses and career guides.</p>
            <?php elseif ($queued): ?>
                <div class="je-alert je-alert-success"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Your enquiry is safely queued.</h1>
                <p>You can continue exploring Jaipur Engineers courses while the database connection is reviewed.</p>
            <?php else: ?>
                <div class="je-alert je-alert-info"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Enquiry not submitted.</h1>
                <p>Please check the details and submit the enquiry again from the relevant course page.</p>
            <?php endif; ?>
            <a class="je-card-link" href="courses.php">Explore Courses <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>