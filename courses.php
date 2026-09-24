<?php
require_once __DIR__ . '/course-page-data.php';

$pageTitle = 'IT Courses in Jaipur | Jaipur Engineers';
$pageDescription = 'Explore practical IT courses in Jaipur at Jaipur Engineers including Full Stack, Java, Python, Data Science, AI, Cloud, Cyber Security, Networking, Mobile App Development and Digital Marketing.';

$allCourses = je_course_pages();

/*
 * Extra course/program cards uploaded by the Jaipur Engineers team.
 * Keep the image paths in /courses so the visible catalog actually uses
 * the new SEO course-card artwork instead of generic theme placeholders.
 */
$extraCourses = [
    'advanced-excel' => [
        'slug' => 'advanced-excel-course-jaipur.php',
        'h1' => 'Advanced Excel Course in Jaipur',
        'category' => 'Data & Office Skills',
        'lead' => 'Learn formulas, Pivot Tables, dashboards, data cleaning and practical Excel reporting workflows.',
        'image' => 'courses/advanced-excel-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-table',
        'chips' => ['Excel', 'Formulas', 'Pivot Tables', 'Dashboards'],
    ],
    'ai-tools' => [
        'slug' => 'ai-tools-course-jaipur.php',
        'h1' => 'AI Productivity Tools Course in Jaipur',
        'category' => 'AI Skills',
        'lead' => 'Use modern AI tools for prompting, research, content workflows and day-to-day productivity.',
        'image' => 'courses/ai-tools-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-lightbulb-o',
        'chips' => ['AI Tools', 'Prompting', 'Research', 'Productivity'],
    ],
    'android' => [
        'slug' => 'android-course-jaipur.php',
        'h1' => 'Android Development Course in Jaipur',
        'category' => 'Mobile App Development',
        'lead' => 'Learn Android app development with practical layouts, application logic, APIs and project workflows.',
        'image' => 'courses/android-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-android',
        'chips' => ['Android', 'Kotlin', 'Layouts', 'APIs'],
    ],
    'ccna' => [
        'slug' => 'ccna-course-jaipur.php',
        'h1' => 'CCNA Course in Jaipur',
        'category' => 'Networking',
        'lead' => 'Build networking fundamentals through routing, switching, IP addressing and practical network labs.',
        'image' => 'courses/ccna-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-sitemap',
        'chips' => ['CCNA', 'Routing', 'Switching', 'Network Labs'],
    ],
    'ccnp' => [
        'slug' => 'ccnp-course-jaipur.php',
        'h1' => 'CCNP Course in Jaipur',
        'category' => 'Networking',
        'lead' => 'Advance your enterprise networking skills with routing, switching and troubleshooting practice.',
        'image' => 'courses/ccnp-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-sitemap',
        'chips' => ['CCNP', 'Routing', 'Switching', 'Troubleshooting'],
    ],
    'figma' => [
        'slug' => 'figma-course-jaipur.php',
        'h1' => 'Figma Course in Jaipur',
        'category' => 'UI/UX Design',
        'lead' => 'Learn Figma, components, auto layout, prototypes and design-system workflows through practical design work.',
        'image' => 'courses/figma-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-paint-brush',
        'chips' => ['Figma', 'Components', 'Auto Layout', 'Prototyping'],
    ],
    'flutter' => [
        'slug' => 'flutter-course-jaipur.php',
        'h1' => 'Flutter Course in Jaipur',
        'category' => 'Mobile App Development',
        'lead' => 'Build cross-platform mobile apps with Flutter, Dart, widgets, state management and API integration.',
        'image' => 'courses/flutter-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-mobile',
        'chips' => ['Flutter', 'Dart', 'Widgets', 'APIs'],
    ],
    'ios-app-development' => [
        'slug' => 'ios-app-development-course-jaipur.php',
        'h1' => 'iOS App Development Course in Jaipur',
        'category' => 'Mobile App Development',
        'lead' => 'Learn iOS application development with Swift, app logic, interface concepts and API integration.',
        'image' => 'courses/ios-app-development-course-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-apple',
        'chips' => ['iOS', 'Swift', 'App Logic', 'APIs'],
    ],
    'diploma-cloud-computing' => [
        'slug' => 'diploma-cloud-computing-jaipur.php',
        'h1' => 'Diploma in Cloud Computing in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Learn cloud platforms, Linux, deployment, DevOps and container workflows through a structured career program.',
        'image' => 'courses/diploma-cloud-computing-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-cloud',
        'chips' => ['Cloud', 'Linux', 'DevOps', 'Deployment'],
    ],
    'diploma-cyber-security' => [
        'slug' => 'diploma-cyber-security-jaipur.php',
        'h1' => 'Diploma in Cyber Security in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Build networking, Linux, ethical hacking, security and SOC foundations through practical labs.',
        'image' => 'courses/diploma-cyber-security-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-shield',
        'chips' => ['Cyber Security', 'Linux', 'Ethical Hacking', 'SOC'],
    ],
    'diploma-data-analytics' => [
        'slug' => 'diploma-data-analytics-jaipur.php',
        'h1' => 'Diploma in Data Analytics in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Build Excel, SQL, Power BI, Python and reporting skills through a practical analytics program.',
        'image' => 'courses/diploma-data-analytics-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-line-chart',
        'chips' => ['Excel', 'SQL', 'Power BI', 'Analytics'],
    ],
    'diploma-data-science-ai' => [
        'slug' => 'diploma-data-science-ai-jaipur.php',
        'h1' => 'Diploma in Data Science & AI in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Learn Python, analytics, statistics, machine learning and AI through a structured project-oriented program.',
        'image' => 'courses/diploma-data-science-ai-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-line-chart',
        'chips' => ['Python', 'Statistics', 'Machine Learning', 'AI'],
    ],
    'diploma-digital-marketing' => [
        'slug' => 'diploma-digital-marketing-jaipur.php',
        'h1' => 'Diploma in Digital Marketing in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Learn SEO, paid advertising, social media, content and analytics through practical campaign workflows.',
        'image' => 'courses/diploma-digital-marketing-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-bullhorn',
        'chips' => ['SEO', 'Google Ads', 'Social Media', 'Analytics'],
    ],
    'diploma-full-stack' => [
        'slug' => 'diploma-full-stack-development-jaipur.php',
        'h1' => 'Diploma in Full Stack Development in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Build frontend, backend, database, API and deployment skills through a structured full stack program.',
        'image' => 'courses/diploma-full-stack-development-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-code',
        'chips' => ['Frontend', 'Backend', 'Databases', 'APIs'],
    ],
    'diploma-java' => [
        'slug' => 'diploma-java-programming-jaipur.php',
        'h1' => 'Diploma in Java Programming in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Build Core Java, Advanced Java, database, Spring and project skills through a structured Java program.',
        'image' => 'courses/diploma-java-programming-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-coffee',
        'chips' => ['Core Java', 'Advanced Java', 'Spring', 'Projects'],
    ],
    'diploma-python' => [
        'slug' => 'diploma-python-programming-jaipur.php',
        'h1' => 'Diploma in Python Programming in Jaipur',
        'category' => 'Diploma Program',
        'lead' => 'Develop Python programming, backend, automation and project skills through a structured learning path.',
        'image' => 'courses/diploma-python-programming-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-code',
        'chips' => ['Python', 'OOP', 'Automation', 'Projects'],
    ],
    'diploma-programs' => [
        'slug' => 'diploma-programs-jaipur.php',
        'h1' => 'Diploma Programs in Jaipur',
        'category' => 'Career Programs',
        'lead' => 'Explore structured long-term programs in software development, data, AI, cloud, cyber security and marketing.',
        'image' => 'courses/diploma-programs-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-graduation-cap',
        'chips' => ['Career Programs', 'Projects', 'Internship Focus', 'Guidance'],
    ],
    'corporate-training' => [
        'slug' => 'corporate-training-jaipur.php',
        'h1' => 'Corporate IT Training in Jaipur',
        'category' => 'Professional Training',
        'lead' => 'Customized technology upskilling, workshops and project-oriented training for teams and organizations.',
        'image' => 'courses/corporate-training-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-building',
        'chips' => ['Team Upskilling', 'Workshops', 'Custom Curriculum', 'Projects'],
    ],
    'industrial-training' => [
        'slug' => 'industrial-training-jaipur.php',
        'h1' => 'Industrial Training in Jaipur',
        'category' => 'Student Training',
        'lead' => 'Gain practical technology exposure through structured training, assignments and project workflows.',
        'image' => 'courses/industrial-training-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-cogs',
        'chips' => ['Technical Skills', 'Assignments', 'Live Projects', 'Interview Prep'],
    ],
    'internship-programs' => [
        'slug' => 'internship-programs-jaipur.php',
        'h1' => 'Internship Programs in Jaipur',
        'category' => 'Internship',
        'lead' => 'Explore practical internship programs with assignments, live projects, mentoring and career preparation.',
        'image' => 'courses/internship-programs-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-briefcase',
        'chips' => ['Internship', 'Live Projects', 'Mentoring', 'Career Guidance'],
    ],
    'final-year-projects' => [
        'slug' => 'final-year-projects-jaipur.php',
        'h1' => 'Final Year Projects in Jaipur',
        'category' => 'Project Guidance',
        'lead' => 'Get support for project selection, development, documentation and final presentation workflows.',
        'image' => 'courses/final-year-projects-jaipur-jaipur-engineers.webp',
        'icon' => 'fa-laptop',
        'chips' => ['Project Selection', 'Development', 'Documentation', 'Presentation'],
    ],
];

$allCourses = array_merge($allCourses, $extraCourses);
// Add uploaded cards missing from the catalog without duplicating existing courses.
$catalogSlugs = array_column($allCourses, 'slug');
foreach (je_course_cards() as $slug => $card) {
    if (!in_array($slug, $catalogSlugs, true)) {
        $allCourses[$slug] = $card;
    }
}
$courses = $allCourses;
$query = trim((string)($_GET['q'] ?? ''));

if ($query !== '') {
    $courses = array_filter($courses, static function (array $course) use ($query): bool {
        $haystack = strtolower($course['h1'] . ' ' . $course['category'] . ' ' . implode(' ', $course['chips']));
        return strpos($haystack, strtolower($query)) !== false;
    });
}

$catalogUrl = 'https://jaipurengineers.com/courses';
$itemList = [];
$position = 1;
foreach ($allCourses as $course) {
    $itemList[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'url' => 'https://jaipurengineers.com/' . preg_replace('/\\.php$/i', '', $course['slug']),
        'name' => $course['h1'],
    ];
}

$catalogSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'IT Courses in Jaipur',
    'description' => $pageDescription,
    'url' => $catalogUrl,
    'isPartOf' => [
        '@type' => 'WebSite',
        'name' => 'Jaipur Engineers',
        'url' => 'https://jaipurengineers.com/',
    ],
    'mainEntity' => [
        '@type' => 'ItemList',
        'itemListOrder' => 'https://schema.org/ItemListOrderAscending',
        'numberOfItems' => count($itemList),
        'itemListElement' => $itemList,
    ],
];
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($catalogUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <?php if ($query !== ''): ?>
    <meta name="robots" content="noindex,follow">
    <?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($catalogUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="Jaipur Engineers">
    <meta name="twitter:card" content="summary">
    <script type="application/ld+json"><?php echo json_encode($catalogSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php include __DIR__ . '/head.php'; ?>
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
                    <p>Choose from practical training programs in development, programming, data, AI, cloud, security, networking, mobile development and digital marketing. Newly uploaded Jaipur Engineers course cards are used directly in this catalog.</p>
                </div>
                <div class="col-lg-4">
                    <form action="courses" method="get" role="search">
                        <label class="sr-only" for="course-search">Search IT courses</label>
                        <input id="course-search" class="je-form-control" type="search" name="q" value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Search courses" autocomplete="off">
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
                            <a class="je-card-link" href="courses">View all courses <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach ($courses as $course): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <article class="je-catalog-card">
                        <a href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $course['slug']), ENT_QUOTES, 'UTF-8'); ?>">
                            <img src="<?php echo htmlspecialchars($course['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                        </a>
                        <div class="je-catalog-body">
                            <span class="je-catalog-label"><i class="fa <?php echo htmlspecialchars($course['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i><?php echo htmlspecialchars($course['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <h2 class="h3"><a href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $course['slug']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($course['h1'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                            <p><?php echo htmlspecialchars($course['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <div class="je-chip-row">
                                <?php foreach (array_slice($course['chips'], 0, 4) as $chip): ?>
                                    <span><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a class="je-card-link" href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $course['slug']), ENT_QUOTES, 'UTF-8'); ?>">View course details <i class="fa fa-angle-right"></i></a>
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
