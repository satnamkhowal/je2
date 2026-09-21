<?php
// Read-only checks for the shared navigation, resources and enquiry entry points.
$base = $argv[1] ?? 'http://127.0.0.1:8765';
$root = dirname(__DIR__);
$routes = ['/', '/courses.php', '/java-full-stack-course-jaipur.php', '/full-stack-development-course-jaipur.php',
    '/full-stack-development-course-jaipur-integrated.php', '/php-course-jaipur.php', '/blog.php', '/blogs/', '/news/', '/contact-us.php'];
$errors = [];
foreach ($routes as $route) {
    $html = file_get_contents($base . $route);
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $xpath = new DOMXPath($doc);
    foreach (['a' => 'href', 'img' => 'src', 'script' => 'src', 'link' => 'href'] as $tag => $attr) {
        foreach ($doc->getElementsByTagName($tag) as $element) {
            $url = html_entity_decode($element->getAttribute($attr));
            if (!$url || preg_match('~^(https?:|tel:|mailto:|#|data:|javascript:)~i', $url)) continue;
            // These nested pages declare a root-relative base href="../".
            $file = urldecode(explode('?', explode('#', $url)[0])[0]);
            if ($file && !file_exists($root . '/' . ltrim($file, '/'))) $errors[] = "$route: missing $url";
        }
    }
    $toggle = $xpath->query('//*[@aria-controls="main-navigation"]')->item(0);
    if (!$toggle || $toggle->getAttribute('tabindex') !== '0' || $toggle->getAttribute('role') !== 'button') $errors[] = "$route: keyboard toggle missing";
    foreach ($xpath->query('//form//input[not(@type="hidden")] | //form//select | //form//textarea') as $field) {
        $id = $field->getAttribute('id');
        $hasLabel = $id !== '' && $xpath->query('//label[@for="' . $id . '"]')->length > 0;
        if (!$hasLabel && !$field->getAttribute('aria-label')) $errors[] = "$route: unlabelled field " . $field->getAttribute('name');
    }
    $enquiry = $doc->getElementById('enquiry');
    if ($enquiry && strpos($enquiry->getAttribute('class'), 'je-sidebar-card') === false) $errors[] = "$route: enquiry anchor targets reserved artwork";
}
if ($errors) { echo implode("\n", $errors) . "\n"; exit(1); }
echo count($routes) . " representative pages PASS: local links/assets, navigation semantics, labels and enquiry anchors.\n";
