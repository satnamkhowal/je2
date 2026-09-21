<?php
header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet', true);
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$pageTitle = 'Install Expert | Jaipur Engineers';
$pageDescription = 'Configure database details and create required lead tables for Jaipur Engineers.';
$configDir = __DIR__ . '/config';
$configPath = $configDir . '/database.php';
$lockPath = $configDir . '/install.lock';
$messages = [];
$errors = [];
$installed = is_file($lockPath) && is_file($configPath);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && $installed) {
    http_response_code(423);
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

    if (!preg_match('/^[A-Za-z0-9_\-\.]+$/', $host)) {
        $errors[] = 'Database host contains unsupported characters.';
    }

    if (!preg_match('/^[A-Za-z0-9_\-]+$/', $database)) {
        $errors[] = 'Database name contains unsupported characters.';
    }

    if (!preg_match('/^[A-Za-z0-9_\-]+$/', $charset)) {
        $errors[] = 'Charset contains unsupported characters.';
    }

    if (!$errors) {
        try {
            if (!is_dir($configDir) && !mkdir($configDir, 0755, true) && !is_dir($configDir)) {
                throw new RuntimeException('Unable to create the config directory.');
            }

            $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset;
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

            $schemaPath = __DIR__ . '/database/jaipur-engineers-install.sql';
            $schema = is_file($schemaPath) ? file_get_contents($schemaPath) : false;
            if ($schema === false || trim($schema) === '') {
                throw new RuntimeException('Database schema file is missing or empty.');
            }
            $pdo->exec($schema);

            $config = "<?php\nreturn " . var_export([
                'host' => $host,
                'database' => $database,
                'username' => $username,
                'password' => $password,
                'charset' => $charset,
            ], true) . ";\n";

            if (file_put_contents($configPath, $config, LOCK_EX) === false) {
                throw new RuntimeException('Unable to save database configuration.');
            }
            @chmod($configPath, 0600);

            if (file_put_contents($lockPath, 'Installed at ' . date('c') . PHP_EOL, LOCK_EX) === false) {
                throw new RuntimeException('Unable to create installer lock file.');
            }
            @chmod($lockPath, 0600);

            $installed = true;
            $messages[] = 'Database connected, config saved and lead table verified. The installer is now locked.';
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
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet">
    <meta name="googlebot" content="noindex,nofollow,noarchive,nosnippet">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <?php include __DIR__ . '/head.php'; ?>
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

                        <?php if ($installed): ?>
                            <div class="je-alert je-alert-info">Installer is locked because the database configuration already exists. Remove <strong>config/install.lock</strong> manually only when an authorized reinstall is required.</div>
                            <p>No database credentials are accepted while the installer is locked.</p>
                        <?php else: ?>
                            <form action="install-expert.php" method="post" autocomplete="off">
                                <label for="je-db-host">Database Host</label>
                                <input id="je-db-host" class="je-form-control" type="text" name="host" value="localhost" required autocomplete="off">
                                <label for="je-db-name">Database Name</label>
                                <input id="je-db-name" class="je-form-control" type="text" name="database" placeholder="database_name" required autocomplete="off">
                                <label for="je-db-user">Database Username</label>
                                <input id="je-db-user" class="je-form-control" type="text" name="username" placeholder="database_user" required autocomplete="off">
                                <label for="je-db-password">Database Password</label>
                                <input id="je-db-password" class="je-form-control" type="password" name="password" placeholder="database_password" autocomplete="new-password">
                                <label for="je-db-charset">Charset</label>
                                <input id="je-db-charset" class="je-form-control" type="text" name="charset" value="utf8mb4" required autocomplete="off">
                                <button class="je-submit-btn" type="submit">Verify and Install</button>
                            </form>
                        <?php endif; ?>
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
                        <p>This setup utility is intentionally excluded from search indexing. Keep access private and leave the installer locked after setup.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
