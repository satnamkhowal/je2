<?php require_once __DIR__ . "/includes/design-card.php"; ?>
<?php
// Add consistent social-preview metadata when a page supplies its normal SEO variables.
// Reuse existing title/description/canonical values so social metadata cannot drift from page SEO.
if (isset($pageTitle, $pageDescription)) {
    $socialUrl = isset($canonical) && is_string($canonical) && $canonical !== ''
        ? $canonical
        : 'https://jaipurengineers.com/';
    ?>
<meta property="og:site_name" content="Jaipur Engineers">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars((string)$pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars((string)$pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($socialUrl, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo htmlspecialchars((string)$pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars((string)$pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
<?php
}
// Keep error pages out of search indexes while allowing crawlers to follow useful recovery links.
// This shared guard applies automatically to templates that set a 404 status before including head.php.
if (http_response_code() === 404): ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>
<?php
// Add a minimal, factual WebSite entity on shared pages so search engines can consistently
// associate the site name with the canonical Jaipur Engineers domain without inventing claims.
$websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => 'https://jaipurengineers.com/#website',
    'url' => 'https://jaipurengineers.com/',
    'name' => 'Jaipur Engineers',
    'inLanguage' => 'en-IN',
];
$websiteSchemaJson = json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
if ($websiteSchemaJson !== false): ?>
<script type="application/ld+json"><?php echo $websiteSchemaJson; ?></script>
<?php endif; ?>
<?php
// Course templates define $course and $canonical before loading this shared head.
// Generate breadcrumb JSON-LD with json_encode so course names cannot break structured-data syntax.
if (isset($course) && is_array($course) && !empty($course['h1']) && !empty($canonical)) {
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => 'https://jaipurengineers.com/',
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Courses',
                'item' => 'https://jaipurengineers.com/courses.php',
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $course['h1'],
                'item' => $canonical,
            ],
        ],
    ];
    $breadcrumbJson = json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($breadcrumbJson !== false): ?>
<script type="application/ld+json"><?php echo $breadcrumbJson; ?></script>
<?php endif;
}
?>
<link rel="apple-touch-icon" href="assets/images/fav-orange.png">
<link rel="icon" type="image/png" href="assets/images/fav-orange.png">
<link rel="shortcut icon" type="image/png" href="assets/images/fav-orange.png">
<!-- Bootstrap v4.4.1 css -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- font-awesome css -->
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<!-- animate css -->
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<!-- owl.carousel css -->
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<!-- off canvas css -->
<link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
<!-- linea-font css -->
<link rel="stylesheet" type="text/css" href="assets/fonts/linea-fonts.css">
<!-- flaticon css  -->
<link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
<!-- magnific popup css -->
<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
<!-- Main Menu css -->
<link rel="stylesheet" href="assets/css/rsmenu-main.css">
<!-- spacing css -->
<link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="style.css"> <!-- This stylesheet dynamically changed from style.less -->
<!-- responsive css -->
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<!-- Jaipur Engineers device-specific fixes -->
<link rel="stylesheet" type="text/css" href="assets/css/site-responsive-overrides.css">
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<!-- Shared page components inherit the homepage theme in one ordered stack. -->
<link rel="stylesheet" href="assets/css/jaipur-engineers-course-landing.css">
<link rel="stylesheet" href="assets/css/je-growth-system.css">
<link rel="stylesheet" href="assets/css/site-footer.css">
<link rel="stylesheet" href="assets/css/java-full-stack-course-card.css">
<link rel="stylesheet" href="assets/css/site-theme.css">
