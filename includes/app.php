<?php
declare(strict_types=1);

function je_clean_input($value, int $limit = 255): string
{
    $value = trim(strip_tags((string)$value));
    $value = preg_replace('/\s+/', ' ', $value) ?? '';
    return function_exists('mb_substr') ? mb_substr($value, 0, $limit) : substr($value, 0, $limit);
}

function je_root_path(string $path = ''): string
{
    $root = dirname(__DIR__);
    return $path === '' ? $root : $root . '/' . ltrim($path, '/');
}

function je_storage_dir(): string
{
    $dir = je_root_path('storage');
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    return $dir;
}

function je_database_config(): ?array
{
    $path = je_root_path('config/database.php');
    if (!is_file($path)) {
        return null;
    }
    $config = include $path;
    return is_array($config) ? $config : null;
}

function je_pdo(): ?PDO
{
    $config = je_database_config();
    if (!$config) {
        return null;
    }
    foreach (['host', 'database', 'username', 'password'] as $key) {
        if (!array_key_exists($key, $config)) {
            return null;
        }
    }
    $charset = $config['charset'] ?? 'utf8mb4';
    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=' . $charset;
    return new PDO($dsn, (string)$config['username'], (string)$config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}

function je_valid_phone(string $phone): bool
{
    $digits = preg_replace('/\D+/', '', $phone) ?? '';
    return strlen($digits) >= 7 && strlen($digits) <= 15;
}

function je_request_ip(): string
{
    return je_clean_input((string)($_SERVER['REMOTE_ADDR'] ?? 'unknown'), 80);
}

function je_device_label(string $ua): string
{
    if (preg_match('/tablet|ipad/i', $ua)) return 'Tablet';
    if (preg_match('/mobile|android|iphone/i', $ua)) return 'Mobile';
    return 'Desktop';
}

function je_append_jsonl(string $filename, array $payload): bool
{
    $dir = je_storage_dir();
    if (!is_dir($dir) || !is_writable($dir)) {
        return false;
    }
    $line = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL;
    return file_put_contents($dir . '/' . $filename, $line, FILE_APPEND | LOCK_EX) !== false;
}

function je_rate_limit(string $bucket, int $max = 12, int $windowSeconds = 3600): bool
{
    $dir = je_storage_dir() . '/rate-limit';
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    if (!is_dir($dir) || !is_writable($dir)) {
        return true;
    }

    $key = hash('sha256', je_request_ip() . '|' . $bucket);
    $path = $dir . '/' . $key . '.json';
    $now = time();
    $data = ['start' => $now, 'count' => 0];

    $fp = @fopen($path, 'c+');
    if (!$fp) return true;
    try {
        if (!flock($fp, LOCK_EX)) return true;
        $raw = stream_get_contents($fp);
        if ($raw) {
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) $data = array_merge($data, $decoded);
        }
        if (($now - (int)$data['start']) >= $windowSeconds) {
            $data = ['start' => $now, 'count' => 0];
        }
        if ((int)$data['count'] >= $max) {
            flock($fp, LOCK_UN);
            return false;
        }
        $data['count'] = (int)$data['count'] + 1;
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($data));
        fflush($fp);
        flock($fp, LOCK_UN);
        return true;
    } finally {
        fclose($fp);
    }
}

function je_json_response(array $data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store, max-age=0');
    header('X-Robots-Tag: noindex, nofollow, noarchive', true);
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}
