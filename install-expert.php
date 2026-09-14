<?php
$pageTitle = 'Install Expert | Jaipur Engineers';
$pageDescription = 'Configure database details and create required lead tables for Jaipur Engineers.';
$configDir = __DIR__ . '/config';
$configPath = $configDir . '/database.php';
$lockPath = $configDir . '/install.lock';
$messages = [];
$errors = [];
$installed = is_file($lockPath) && is_file($configPath);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && $installed) {
    $errors[] = 'Installer is locked. Remove config/install.lock before reinstalling.';
} elseif (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $host = trim((string)($_POST['host'] ?? 'localhost'));
    $database = trim((string)($_POST['database'] ?? ''));
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $charset = trim((string)($_POST['charset'] ?? 'utf8mb4'));

    if ($database === '' || $username === '') {
        $errors[] = 'Database name and username are required.';
    }

    if (!$errors) {
        try {
            if (!is_dir($configDir)) {
                mkdir($configDir, 0755, true);
            }
            $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset;
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            $pdo->exec(file_get_contents(__DIR__ . '/database/jaipur-engineers-install.sql'));

            $config = "<?php\nreturn " . var_export([
                'host' => $host,
                'database' => $database,
                'username' => $username,
                'password' => $password,
                'charset' => $charset,
            ], true) . ";\n?>\n";

            file_put_contents($configPath, $config, LOCK_EX);
            file_put_contents($lockPath, 'Installed at ' . date('c') . PHP_EOL, LOCK_EX);
            $installed = true;
            $messages[] = 'Database connected, config saved and lead table verified.';
        } catch (Throwable $exception) {
            $errors[] = 'Install failed: ' . $exception->getMessage();
        }
    }
}
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

<main>
    <section class="je-install-hero">
        <div class="container">
            <span class="je-catalog-label"><i class="fa fa-database"></i> Setup Utility</span>
            <h1>Install Expert</h1>
            <p>Fill database details once. This creates the lead table and saves local database configuration on your hosting server.</p>
        </div>
    </section>

    <section class="je-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="je-install-card">
                        <?php foreach ($messages as $message): ?>
                            <div class="je-alert je-alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                        <?php foreach ($errors as $error): ?>
                            <div class="je-alert je-alert-error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                        <?php if ($installed && !$errors): ?>
                            <div class="je-alert je-alert-info">Installer lock exists. To reinstall, remove <strong>config/install.lock</strong> from hosting file manager.</div>
                        <?php endif; ?>
                        <form action="install-expert.php" method="post">
                            <label>Database Host</label>
                            <input class="je-form-control" type="text" name="host" value="localhost" required>
                            <label>Database Name</label>
                            <input class="je-form-control" type="text" name="database" placeholder="database_name" required>
                            <label>Database Username</label>
                            <input class="je-form-control" type="text" name="username" placeholder="database_user" required>
                            <label>Database Password</label>
                            <input class="je-form-control" type="password" name="password" placeholder="database_password">
                            <label>Charset</label>
                            <input class="je-form-control" type="text" name="charset" value="utf8mb4" required>
                            <button class="je-submit-btn" type="submit">Verify and Install</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="je-install-card">
                        <h2>What this installer does</h2>
                        <ul>
                            <li>Connects to your MySQL database.</li>
                            <li>Creates the <strong>je_leads</strong> table.</li>
                            <li>Saves credentials in <strong>config/database.php</strong>.</li>
                            <li>Creates <strong>config/install.lock</strong> after setup.</li>
                        </ul>
                        <p>Keep this page private. After setup, forms can submit leads through <strong>lead-submit.php</strong>.</p>
                        <a class="je-card-link" href="database/jaipur-engineers-install.sql">View SQL schema <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>