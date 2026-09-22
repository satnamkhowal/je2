<?php
$course = $course ?? null;
$courseAssetImages = [
    'advanced-excel-course-jaipur.php' => 'courses/advanced-excel-course-jaipur-jaipur-engineers.webp',
    'ai-tools-course-jaipur.php' => 'courses/ai-tools-course-jaipur-jaipur-engineers.webp',
    'android-course-jaipur.php' => 'courses/android-course-jaipur-jaipur-engineers.webp',
    'ccna-course-jaipur.php' => 'courses/ccna-course-jaipur-jaipur-engineers.webp',
    'ccnp-course-jaipur.php' => 'courses/ccnp-course-jaipur-jaipur-engineers.webp',
    'figma-course-jaipur.php' => 'courses/figma-course-jaipur-jaipur-engineers.webp',
    'flutter-course-jaipur.php' => 'courses/flutter-course-jaipur-jaipur-engineers.webp',
    'ios-app-development-course-jaipur.php' => 'courses/ios-app-development-course-jaipur-jaipur-engineers.webp',
];
$courseSyllabusPdfs = [
    'advanced-java-course-jaipur.php' => 'courses/jaipur-engineers-academy-advanced-java-course-syllabus.pdf',
    'c-plus-plus-course-jaipur.php' => 'courses/jaipur-engineers-academy-c-plus-plus-programming-course-syllabus.pdf',
    'c-programming-course-jaipur.php' => 'courses/jaipur-engineers-academy-c-programming-course-syllabus.pdf',
    'core-java-course-jaipur.php' => 'courses/jaipur-engineers-academy-core-java-course-syllabus.pdf',
    'data-analytics-course-jaipur.php' => 'courses/jaipur-engineers-academy-data-analytics-course-syllabus.pdf',
    'figma-course-jaipur.php' => 'courses/jaipur-engineers-academy-ux-ui-figma-course-syllabus.pdf',
    'javascript-course-jaipur.php' => 'courses/jaipur-engineers-academy-complete-javascript-course-syllabus.pdf',
    'machine-learning-course-jaipur.php' => 'courses/jaipur-engineers-academy-machine-learning-course-syllabus.pdf',
    'node-js-course-jaipur.php' => 'courses/jaipur-engineers-academy-node-js-course-syllabus.pdf',
    'node-js-development-course-jaipur.php' => 'courses/jaipur-engineers-academy-node-js-course-syllabus.pdf',
    'react-js-course-jaipur.php' => 'courses/jaipur-engineers-academy-react-js-course-syllabus.pdf',
    'react-development-course-jaipur.php' => 'courses/jaipur-engineers-academy-react-js-course-syllabus.pdf',
    'spring-boot-course-jaipur.php' => 'courses/jaipur-engineers-academy-backend-development-with-java-spring-boot-course-syllabus.pdf',
    'spring-framework-course-jaipur.php' => 'courses/jaipur-engineers-academy-java-frameworks-course-syllabus.pdf',
    'ui-ux-design-course-jaipur.php' => 'courses/jaipur-engineers-academy-ux-ui-figma-course-syllabus.pdf',
    'web-designing-course-jaipur.php' => 'courses/jaipur-engineers-academy-web-designing-course-syllabus.pdf',
];
if ($course && !empty($course['slug'])) {
    if (isset($courseAssetImages[$course['slug']])) {
        $course['image'] = $courseAssetImages[$course['slug']];
    }
    if (empty($course['syllabus']) && isset($courseSyllabusPdfs[$course['slug']])) {
        $course['syllabus'] = $courseSyllabusPdfs[$course['slug']];
    }
}
if (!$course || empty($course['slug']) || empty($course['name'])) {
    http_response_code(404);
    $pageTitle = 'Course Not Found | Jaipur Engineers';
    $pageDescription = 'The requested course page could not be found.';
    $canonical = 'https://jaipurengineers.com/courses.php';
} else {
    $pageTitle = $course['name'] . ' | Jaipur Engineers';
    $pageDescription = $course['lead'] . ' Practical project-focused training at Jaipur Engineers.';
    $canonical = 'https://jaipurengineers.com/' . $course['slug'];
}
?>
<!doctype html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<?php include __DIR__ . '/head.php'; ?>
<?php if ($course): ?>
<script type="application/ld+json"><?php echo json_encode([
'@context'=>'https://schema.org','@type'=>'Course','name'=>$course['name'],
'description'=>$pageDescription,'url'=>$canonical,
'provider'=>['@type'=>'EducationalOrganization','name'=>'Jaipur Engineers','url'=>'https://jaipurengineers.com/'],
'areaServed'=>['@type'=>'City','name'=>'Jaipur'],'inLanguage'=>'en-IN'
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
<?php endif; ?>
</head>
<body class="defult-home je-course-page">
<?php include __DIR__ . '/header.php'; ?>
<?php if (!$course): ?>
<main class="je-section"><div class="container"><h1>Course not found</h1><p>Please visit our course catalog.</p><a class="je-primary-btn" href="courses.php">View Courses</a></div></main>
<?php else: ?>
<main>
<section class="je-hero"><div class="container"><div class="row align-items-center">
<div class="col-lg-8">
<div class="je-breadcrumb"><a href="index.php">Home</a> / <a href="courses.php">Courses</a> / <?php echo htmlspecialchars($course['name']); ?></div>
<span class="je-kicker"><?php echo htmlspecialchars($course['kicker']); ?></span>
<h1><?php echo htmlspecialchars($course['name']); ?></h1>
<p class="je-hero-lead"><?php echo htmlspecialchars($course['lead']); ?></p>
<ul class="je-hero-points"><?php foreach (array_slice($course['chips'],0,4) as $chip): ?><li><i class="fa <?php echo htmlspecialchars($course['icon']); ?>"></i><?php echo htmlspecialchars($chip); ?></li><?php endforeach; ?></ul>
<a href="#enquiry" class="je-primary-btn">Request Course Details <i class="fa fa-arrow-right ml-2"></i></a>
<a href="#curriculum" class="je-outline-btn">View Curriculum</a>
<?php if (!empty($course['syllabus'])): ?><a href="<?php echo htmlspecialchars($course['syllabus'], ENT_QUOTES, 'UTF-8'); ?>" class="je-outline-btn" target="_blank" rel="noopener">Download Syllabus PDF</a><?php endif; ?>
</div>
<div class="col-lg-4"><div class="je-course-media-card">
<img src="<?php echo htmlspecialchars($course['image']); ?>" alt="<?php echo htmlspecialchars($course['name']); ?>" loading="eager" fetchpriority="high">
<div class="inner"><div class="je-chip-row"><?php foreach ($course['chips'] as $chip): ?><span><?php echo htmlspecialchars($chip); ?></span><?php endforeach; ?></div><a class="je-primary-btn w-100" href="#enquiry">Get Batch Details</a></div>
</div></div></div></div></section>

<section class="je-trust-bar"><div class="container"><div class="row no-gutters">
<div class="col-6 col-lg-3 je-trust-item"><strong>1996</strong><span>Established in Jaipur</span></div>
<div class="col-6 col-lg-3 je-trust-item"><strong>Hands-On</strong><span>Practical learning</span></div>
<div class="col-6 col-lg-3 je-trust-item"><strong>Projects</strong><span>Portfolio practice</span></div>
<div class="col-6 col-lg-3 je-trust-item"><strong>Career</strong><span>Interview guidance</span></div>
</div></div></section>

<section class="je-section" id="overview"><div class="container"><div class="row">
<div class="col-lg-8">
<div class="je-section-title"><span class="eyebrow">Course Overview</span><h2>Learn through a structured, practical development workflow.</h2><p><?php echo htmlspecialchars($course['lead']); ?> The training connects concepts, assignments and project implementation.</p></div>
<div class="row"><?php foreach (array_slice($course['chips'],0,4) as $chip): ?><div class="col-md-6 mb-4"><div class="je-feature-card"><div class="je-feature-icon"><i class="fa <?php echo htmlspecialchars($course['icon']); ?>"></i></div><h3><?php echo htmlspecialchars($chip); ?></h3><p>Learn with trainer-led examples, hands-on practice and project-oriented exercises.</p></div></div><?php endforeach; ?></div>
</div>
<div class="col-lg-4">
<?php je_render_design_card(); ?><div class="je-sidebar"><div class="je-sidebar-card" id="enquiry">
<h3>Get Course Details</h3>
<form action="lead-submit.php" method="post">
<input type="hidden" name="source" value="<?php echo htmlspecialchars($course['name']); ?>">
<input aria-label="Your name" class="je-form-control" type="text" name="name" placeholder="Your Name" autocomplete="name" required>
<input aria-label="Mobile number" class="je-form-control" type="tel" name="phone" placeholder="Mobile Number" autocomplete="tel" required>
<input aria-label="Email address (optional)" class="je-form-control" type="email" name="email" placeholder="Email Address" autocomplete="email">
<input aria-label="Course" class="je-form-control" type="text" name="course" value="<?php echo htmlspecialchars($course['name']); ?>" readonly>
<button class="je-submit-btn" type="submit">Request Callback</button>
</form></div></div></div>
</div></div></section>

<section class="je-section je-section-soft" id="curriculum"><div class="container">
<div class="je-section-title"><span class="eyebrow">Curriculum</span><h2><?php echo htmlspecialchars($course['name']); ?> syllabus</h2><p>Foundations first, followed by practical implementation and project work.</p></div>
<div class="row"><?php foreach ($course['modules'] as $i=>$module): ?><div class="col-md-6 col-lg-3 mb-4"><div class="je-content-card h-100"><h3><?php echo sprintf('%02d',$i+1); ?></h3><p><?php echo htmlspecialchars($module); ?></p></div></div><?php endforeach; ?></div>
</div></section>

<section class="je-section" id="projects"><div class="container">
<div class="je-section-title"><span class="eyebrow">Projects</span><h2>Practice with portfolio-ready development projects.</h2><p>Use the course tools to plan, build, test and explain practical work.</p></div>
<div class="row"><?php foreach ($course['projects'] as $i=>$project): ?><div class="col-md-6 col-lg-3 mb-4"><div class="je-project"><div class="num"><?php echo sprintf('%02d',$i+1); ?></div><h3><?php echo htmlspecialchars($project); ?></h3><p>Build and present this project using the course workflow.</p></div></div><?php endforeach; ?></div>
</div></section>

<section class="je-section je-section-dark"><div class="container">
<div class="je-section-title"><span class="eyebrow">Career Preparation</span><h2>Prepare for entry-level development roles.</h2><p>Role readiness depends on practice, projects, interview performance and employer requirements.</p></div>
<div class="row"><?php foreach ($course['roles'] as $role): ?><div class="col-6 col-lg-3 mb-4"><div class="je-stat-box"><strong><i class="fa fa-briefcase"></i></strong><span><?php echo htmlspecialchars($role); ?></span></div></div><?php endforeach; ?></div>
</div></section>
</main>
<div class="je-mobile-cta"><a href="tel:<?php echo je_business_text('phone'); ?>"><i class="fa fa-phone mr-1"></i> Call</a><a href="#enquiry"><i class="fa fa-paper-plane mr-1"></i> Enquire</a></div>
<?php endif; ?>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
