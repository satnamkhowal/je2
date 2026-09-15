<?php
require_once __DIR__ . '/course-page-data.php';

$courseKey = $courseKey ?? '';
$course = je_get_course_page($courseKey);

if (!$course) {
    http_response_code(404);
    $pageTitle = 'Course Not Found | Jaipur Engineers';
    $pageDescription = 'The requested course page could not be found.';
} else {
    $pageTitle = $course['title'];
    $pageDescription = $course['meta'];
}

$canonical = $course ? 'https://jaipurengineers.com/' . $course['slug'] : 'https://jaipurengineers.com/courses.php';
$allCourses = je_course_pages();
$courseSchemaJson = false;
if ($course) {
    $courseSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Course',
        'name' => $course['h1'],
        'description' => $course['meta'],
        'url' => $canonical,
        'provider' => [
            '@type' => 'EducationalOrganization',
            'name' => 'Jaipur Engineers',
            'url' => 'https://jaipurengineers.com/',
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Jaipur',
        ],
        'inLanguage' => 'en-IN',
    ];
    $courseSchemaJson = json_encode($courseSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
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
    <link rel="stylesheet" href="assets/css/jaipur-engineers-course-landing.css">
    <link rel="stylesheet" href="assets/css/je-growth-system.css">
    <?php if ($courseSchemaJson !== false): ?>
    <script type="application/ld+json"><?php echo $courseSchemaJson; ?></script>
    <?php endif; ?>
</head>
<body class="je-course-page">
<?php include __DIR__ . '/header.php'; ?>

<?php if (!$course): ?>
<main class="je-section">
    <div class="container">
        <h1>Course not found</h1>
        <p>Please visit the course catalog to choose an available program.</p>
        <a class="je-primary-btn" href="courses.php">View Courses</a>
    </div>
</main>
<?php else: ?>
<main>
    <section class="je-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="je-breadcrumb">
                        <a href="index.php">Home</a> / <a href="courses.php">Courses</a> / <?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <span class="je-kicker"><?php echo htmlspecialchars($course['kicker'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <h1><?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p class="je-hero-lead"><?php echo htmlspecialchars($course['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <ul class="je-hero-points">
                        <?php foreach (array_slice($course['chips'], 0, 4) as $chip): ?>
                            <li><i class="fa <?php echo htmlspecialchars($course['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="#enquiry" class="je-primary-btn">Request Course Details <i class="fa fa-arrow-right ml-2"></i></a>
                    <a href="#curriculum" class="je-outline-btn">View Curriculum</a>
                </div>
                <div class="col-lg-4">
                    <div class="je-course-media-card">
                        <img src="<?php echo htmlspecialchars($course['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="inner">
                            <div class="d-flex align-items-center mb-3">
                                <span class="je-tool-icon"><i class="fa <?php echo htmlspecialchars($course['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i></span>
                                <div>
                                    <strong><?php echo htmlspecialchars($course['category'], ENT_QUOTES, 'UTF-8'); ?></strong><br>
                                    <small>Practical training in Jaipur</small>
                                </div>
                            </div>
                            <div class="je-chip-row">
                                <?php foreach ($course['chips'] as $chip): ?>
                                    <span><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a class="je-primary-btn w-100" href="#enquiry">Get Batch Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="je-trust-bar">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-6 col-lg-3 je-trust-item"><strong>1996</strong><span>Established in Jaipur</span></div>
                <div class="col-6 col-lg-3 je-trust-item"><strong>Hands-On</strong><span>Practical course flow</span></div>
                <div class="col-6 col-lg-3 je-trust-item"><strong>Projects</strong><span>Portfolio practice</span></div>
                <div class="col-6 col-lg-3 je-trust-item"><strong>Career</strong><span>Interview guidance</span></div>
            </div>
        </div>
    </section>

    <section class="je-section" id="overview">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="je-section-title">
                        <span class="eyebrow">Course Overview</span>
                        <h2>Build job-ready skills through a structured practical learning path.</h2>
                        <p><?php echo htmlspecialchars($course['lead'], ENT_QUOTES, 'UTF-8'); ?> Jaipur Engineers keeps the learning focused on concepts, practice, projects and career discussion.</p>
                    </div>
                    <div class="row">
                        <?php foreach (array_slice($course['chips'], 0, 4) as $chip): ?>
                        <div class="col-md-6 mb-4">
                            <div class="je-feature-card">
                                <div class="je-feature-icon"><i class="fa <?php echo htmlspecialchars($course['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i></div>
                                <h3><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p>Learn this topic with examples, guided practice and assignments connected to real project workflow.</p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-4" id="enquiry">
                    <div class="je-sidebar">
                        <div class="je-sidebar-card">
                            <h3>Get Course Details</h3>
                            <form action="lead-submit.php" method="post">
                                <input type="hidden" name="source" value="<?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>">
                                <input class="je-form-control" type="text" name="name" placeholder="Your Name" required>
                                <input class="je-form-control" type="tel" name="phone" placeholder="Mobile Number" required>
                                <input class="je-form-control" type="email" name="email" placeholder="Email Address">
                                <input class="je-form-control" type="text" name="course" value="<?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>">
                                <button class="je-submit-btn" type="submit">Request Callback</button>
                            </form>
                        </div>
                        <div class="je-sidebar-card">
                            <h3>Popular Courses</h3>
                            <ul class="je-course-links">
                                <?php foreach (array_slice($allCourses, 0, 7) as $item): ?>
                                    <li><a href="<?php echo htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['h1'], ENT_QUOTES, 'UTF-8'); ?> <i class="fa fa-angle-right"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="je-section je-section-soft" id="curriculum">
        <div class="container">
            <div class="je-section-title">
                <span class="eyebrow">Curriculum</span>
                <h2><?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?> syllabus</h2>
                <p>The modules move from foundations to practical implementation, projects and interview preparation.</p>
            </div>
            <div class="row">
                <?php foreach ($course['modules'] as $index => $module): ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="je-content-card h-100">
                        <h3><?php echo sprintf('%02d', $index + 1); ?></h3>
                        <p><?php echo htmlspecialchars($module, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="je-section" id="projects">
        <div class="container">
            <div class="je-section-title">
                <span class="eyebrow">Projects</span>
                <h2>Practice with portfolio-ready project workflows.</h2>
                <p>Projects help learners connect concepts and explain practical implementation during interviews.</p>
            </div>
            <div class="row">
                <?php foreach ($course['projects'] as $index => $project): ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="je-project">
                        <div class="num"><?php echo sprintf('%02d', $index + 1); ?></div>
                        <h3><?php echo htmlspecialchars($project, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p>Plan, build, test and present this project using the course tools and practical workflow.</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="je-section je-section-dark">
        <div class="container">
            <div class="je-section-title">
                <span class="eyebrow">Career Outcomes</span>
                <h2>Roles students can prepare for after practical training.</h2>
                <p>Career outcomes depend on skill level, practice, interview performance and market requirements.</p>
            </div>
            <div class="row">
                <?php foreach ($course['roles'] as $role): ?>
                <div class="col-6 col-lg-3 mb-4">
                    <div class="je-stat-box"><strong><i class="fa fa-briefcase"></i></strong><span><?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?></span></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>