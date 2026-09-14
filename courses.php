<?php
require_once __DIR__ . '/course-page-data.php';
$pageTitle = 'IT Courses in Jaipur | Jaipur Engineers';
$pageDescription = 'Explore practical IT courses in Jaipur at Jaipur Engineers including Full Stack, Java, Python, Data Science, AI, Cloud, Cyber Security and Digital Marketing.';
$courses = je_course_pages();
$query = trim((string)($_GET['q'] ?? ''));

if ($query !== '') {
    $courses = array_filter($courses, static function (array $course) use ($query): bool {
        $haystack = strtolower($course['h1'] . ' ' . $course['category'] . ' ' . implode(' ', $course['chips']));
        return strpos($haystack, strtolower($query)) !== false;
    });
}
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="https://jaipurengineers.com/courses.php">
    <?php include __DIR__ . '/head.php'; ?>
    <link rel="stylesheet" href="assets/css/je-growth-system.css">
</head>
<body class="defult-home">
<?php include __DIR__ . '/header.php'; ?>

<main>
    <section class="je-catalog-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="je-catalog-label"><i class="fa fa-graduation-cap"></i> Career-Focused Training</span>
                    <h1>IT Courses in Jaipur</h1>
                    <p>Choose from practical training programs in development, programming, data, AI, cloud, security and digital marketing. Each course page includes curriculum, projects, enquiry form and internal learning links.</p>
                </div>
                <div class="col-lg-4">
                    <form action="courses.php" method="get">
                        <input class="je-form-control" type="search" name="q" value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Search courses">
                        <button class="je-submit-btn" type="submit">Search Courses</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="je-section">
        <div class="container">
            <div class="row">
                <?php if (!$courses): ?>
                    <div class="col-12">
                        <div class="je-install-card">
                            <h2>No courses found</h2>
                            <p>Try another keyword or view all available programs.</p>
                            <a class="je-card-link" href="courses.php">View all courses <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php foreach ($courses as $course): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <article class="je-catalog-card">
                        <a href="<?php echo htmlspecialchars($course['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                            <img src="<?php echo htmlspecialchars($course['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                        <div class="je-catalog-body">
                            <span class="je-catalog-label"><i class="fa <?php echo htmlspecialchars($course['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i><?php echo htmlspecialchars($course['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <h3><a href="<?php echo htmlspecialchars($course['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                            <p><?php echo htmlspecialchars($course['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <div class="je-chip-row">
                                <?php foreach (array_slice($course['chips'], 0, 4) as $chip): ?>
                                    <span><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a class="je-card-link" href="<?php echo htmlspecialchars($course['slug'], ENT_QUOTES, 'UTF-8'); ?>">View course details <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>