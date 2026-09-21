<?php
// Read-only route checks. Never submit leads or run the database installer.
$base = $argv[1] ?? 'http://127.0.0.1:8765';
$root = dirname(__DIR__);
$routes = ['/', '/courses.php', '/java-full-stack-course-jaipur.php', '/full-stack-development-course-jaipur-integrated.php', '/blog.php', '/blogs/', '/news/'];
foreach (glob($root . '/*.php') as $file) {
    $source = file_get_contents($file);
    if (preg_match('~include.*[\'/](course-page-template|course-page-quick|general-page-quick|blogs/index)\.php~', $source)) {
        $routes[] = '/' . basename($file);
    }
}
require $root . '/blogs/blog-data.php';
foreach (array_slice(je_blog_posts(), 0, 3) as $post) $routes[] = '/blogs/post.php?slug=' . rawurlencode($post['slug']);
require $root . '/news/news-data.php';
foreach (je_news_articles() as $key => $article) $routes[] = '/news/' . $key . '.php';
$routes = array_unique($routes);
$errors = [];
foreach ($routes as $route) {
    $html = @file_get_contents($base . $route);
    if ($html === false) { $errors[] = "$route: request failed"; continue; }
    if (preg_match('/(?:Fatal error|Warning|Parse error):/', $html)) $errors[] = "$route: PHP error";
    if (substr_count($html, '<h1') !== 1) $errors[] = "$route: expected one h1";
    if (substr_count($html, 'href="assets/css/site-theme.css"') !== 1) $errors[] = "$route: shared theme missing/duplicated";
    foreach (['listings@jaipurengineers.com', '+917014692039', 'Sector 12, Mansarovar', 'FTE2bXHWzgWgzq2c8'] as $value) {
        if (strpos($html, $value) === false) $errors[] = "$route: missing $value";
    }
    if (preg_match('/9587779071|95877 79071|jaipurenginers|satnamsinghkhowal@gmail/', $html)) $errors[] = "$route: old public identity";
    preg_match_all('~<script type="application/ld\+json">(.*?)</script>~s', $html, $matches);
    $organizations = 0;
    foreach ($matches[1] as $json) {
        $schema = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) $errors[] = "$route: invalid JSON-LD";
        if (($schema['@id'] ?? '') === 'https://jaipurengineers.com/#organization') $organizations++;
    }
    if ($organizations !== 1) $errors[] = "$route: expected one canonical organization";
}
foreach (['/blogs/post.php?slug=not-a-real-post', '/course-page-template.php'] as $route) {
    $context = stream_context_create(['http' => ['ignore_errors' => true]]);
    $html = file_get_contents($base . $route, false, $context);
    if (strpos($http_response_header[0] ?? '', '404') === false || strpos($html, 'noindex,follow') === false) $errors[] = "$route: invalid 404 behavior";
}
echo count($routes) . " public routes checked, plus 2 missing-page checks.\n";
if ($errors) { echo implode("\n", $errors) . "\n"; exit(1); }
echo "PASS: rendering, public identity, shared theme, JSON-LD and 404 behavior.\n";
