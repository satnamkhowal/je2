<?php
require_once __DIR__ . '/blog-data.php';
$jeRootBlogProxy = $jeRootBlogProxy ?? false;
$assetBase = $jeRootBlogProxy ? '' : '../';
$posts = je_blog_posts();
$intentFilter = trim((string)($jeBlogIntentFilter ?? ($_GET['intent'] ?? '')));
$categoryFilter = trim((string)($_GET['category'] ?? ''));
$query = trim((string)($_GET['q'] ?? ''));

$pageTitle = 'IT Training Blog in Jaipur | Jaipur Engineers';
$pageDescription = 'Read Jaipur Engineers blogs on IT courses, career guidance, interview preparation, projects and practical learning paths.';
$canonical = 'https://jaipurengineers.com/blogs/';
$heroLabel = 'Jaipur Engineers Blog';
$heroTitle = 'IT Course, Career and Interview Blogs';
$heroDescription = 'Explore 100 practical blog guides for students planning IT training, projects, interviews and career paths in Jaipur.';

// Root-level editorial hubs are real landing pages, not aliases of /blogs/.
// Give each one a self-canonical and intent-specific metadata while keeping the shared blog template.
$rootIntentPages = [
    'Career Guides' => [
        'title' => 'IT Career Guides for Students in Jaipur | Jaipur Engineers',
        'description' => 'Explore practical IT career guides from Jaipur Engineers covering learning paths, skills, projects and career planning for students in Jaipur.',
        'canonical' => 'https://jaipurengineers.com/career-guides.php',
        'label' => 'Career Guides',
        'h1' => 'IT Career Guides for Students',
        'intro' => 'Explore practical career-planning guides for choosing IT skills, learning paths and project directions based on your goals.',
    ],
    'Learning Tips' => [
        'title' => 'Free IT Tutorials & Learning Tips | Jaipur Engineers',
        'description' => 'Read free Jaipur Engineers tutorials and learning tips for programming, development, data, cloud and other practical IT skills.',
        'canonical' => 'https://jaipurengineers.com/free-tutorials.php',
        'label' => 'Free Tutorials',
        'h1' => 'Free IT Tutorials and Learning Tips',
        'intro' => 'Build practical IT skills with focused tutorials, study tips and learning guides from the Jaipur Engineers resource library.',
    ],
    'Interview Questions' => [
        'title' => 'IT Interview Questions & Preparation Guides | Jaipur Engineers',
        'description' => 'Prepare for technical interviews with Jaipur Engineers guides covering programming, development, data and practical interview topics.',
        'canonical' => 'https://jaipurengineers.com/interview-questions.php',
        'label' => 'Interview Preparation',
        'h1' => 'IT Interview Questions and Preparation Guides',
        'intro' => 'Review practical interview topics and preparation guides designed to help students strengthen technical concepts and project discussions.',
    ],
];

if ($jeRootBlogProxy && isset($rootIntentPages[$intentFilter])) {
    $page = $rootIntentPages[$intentFilter];
    $pageTitle = $page['title'];
    $pageDescription = $page['description'];
    $canonical = $page['canonical'];
    $heroLabel = $page['label'];
    $heroTitle = $page['h1'];
    $heroDescription = $page['intro'];
}

if ($intentFilter !== '') {
    $posts = array_filter($posts, static fn(array $post): bool => strtolower($post['intent']) === strtolower($intentFilter));
}
if ($categoryFilter !== '') {
    $posts = array_filter($posts, static fn(array $post): bool => strtolower($post['category']) === strtolower($categoryFilter));
}
if ($query !== '') {
    $posts = array_filter($posts, static function (array $post) use ($query): bool {
        $haystack = strtolower($post['title'] . ' ' . $post['course'] . ' ' . $post['intent'] . ' ' . $post['focus']);
        return strpos($haystack, strtolower($query)) !== false;
    });
}

// Parameter-driven search/filter combinations can create effectively unlimited URL variants.
// Keep them useful to visitors but out of the search index; root editorial hubs remain indexable.
$noindexFilteredView = !$jeRootBlogProxy && ($intentFilter !== '' || $categoryFilter !== '' || $query !== '');
$sidebarPosts = array_slice(je_blog_posts(), 0, 8, true);
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (!$jeRootBlogProxy): ?><base href="../"><?php endif; ?>
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
    <?php if ($noindexFilteredView): ?><meta name="robots" content="noindex,follow"><?php endif; ?>
    <?php include dirname(__DIR__) . '/head.php'; ?>
</head>
<body class="defult-home">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main>
    <section class="je-blog-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="je-catalog-label"><i class="fa fa-book"></i> <?php echo htmlspecialchars($heroLabel, ENT_QUOTES, 'UTF-8'); ?></span>
                    <h1><?php echo htmlspecialchars($heroTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p><?php echo htmlspecialchars($heroDescription, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="col-lg-4">
                    <form action="blogs/" method="get">
                        <input class="je-form-control" type="search" name="q" value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Search blogs">
                        <button class="je-submit-btn" type="submit">Search Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="je-blog-layout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                        <div class="col-md-6 mb-4">
                            <article class="je-blog-card">
                                <a href="blogs/post.php?slug=<?php echo htmlspecialchars($post['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <img src="<?php echo htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                                </a>
                                <div class="je-blog-card-body">
                                    <div class="je-blog-meta"><?php echo htmlspecialchars($post['intent'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <h2><a href="blogs/post.php?slug=<?php echo htmlspecialchars($post['slug'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                                    <p><?php echo htmlspecialchars($post['meta'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    <a class="je-card-link" href="blogs/post.php?slug=<?php echo htmlspecialchars($post['slug'], ENT_QUOTES, 'UTF-8'); ?>">Read guide <i class="fa fa-angle-right"></i></a>
                                </div>
                            </article>
                        </div>
                        <?php endforeach; ?>
                        <?php if (!$posts): ?>
                            <div class="col-12"><div class="je-side-box"><h2>No blogs found</h2><p>Try a different search or category.</p></div></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php include __DIR__ . '/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>