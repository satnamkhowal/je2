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

function je_save_pending_lead(array $lead): void
{
    $line = json_encode($lead, JSON_UNESCAPED_SLASHES) . PHP_EOL;
    file_put_contents(je_storage_dir() . '/leads-pending.jsonl', $line, FILE_APPEND | LOCK_EX);
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
$notice = '';

if (!$isPost || $lead['name'] === '' || $lead['phone'] === '') {
    $notice = 'Please submit your name and mobile number.';
} else {
    $configPath = __DIR__ . '/config/database.php';
    if (is_file($configPath)) {
        try {
            $config = include $configPath;
            $charset = $config['charset'] ?? 'utf8mb4';
            $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=' . $charset;
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            $pdo->exec(file_get_contents(__DIR__ . '/database/jaipur-engineers-install.sql'));
            $stmt = $pdo->prepare('INSERT INTO je_leads (name, phone, email, course, source, message, page_url, user_agent) VALUES (:name, :phone, :email, :course, :source, :message, :page_url, :user_agent)');
            $stmt->execute([
                ':name' => $lead['name'],
                ':phone' => $lead['phone'],
                ':email' => $lead['email'],
                ':course' => $lead['course'],
                ':source' => $lead['source'],
                ':message' => $lead['message'],
                ':page_url' => $lead['page_url'],
                ':user_agent' => $lead['user_agent'],
            ]);
            $saved = true;
        } catch (Throwable $exception) {
            je_save_pending_lead($lead + ['db_error' => $exception->getMessage()]);
            $notice = 'Lead saved locally. Database connection needs verification.';
        }
    } else {
        je_save_pending_lead($lead + ['db_error' => 'Database config missing']);
        $notice = 'Lead saved locally. Run install-expert.php to connect database.';
    }
}

$pageTitle = $saved ? 'Thank You | Jaipur Engineers' : 'Lead Status | Jaipur Engineers';
$pageDescription = 'Jaipur Engineers lead submission status.';
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <?php else: ?>
                <div class="je-alert je-alert-info"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Submission received for review.</h1>
                <p>If database setup is pending, run the installer and then verify lead capture again.</p>
            <?php endif; ?>
            <a class="je-card-link" href="courses.php">Explore Courses <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>