<?php
require_once __DIR__ . '/blog-data.php';
$jeRootBlogProxy = $jeRootBlogProxy ?? false;
$assetBase = $jeRootBlogProxy ? '' : '../';
$pageTitle = 'IT Training Blog in Jaipur | Jaipur Engineers';
$pageDescription = 'Read Jaipur Engineers blogs on IT courses, career guidance, interview preparation, projects and practical learning paths.';
$posts = je_blog_posts();
$intentFilter = trim((string)($jeBlogIntentFilter ?? ($_GET['intent'] ?? '')));
$categoryFilter = trim((string)($_GET['category'] ?? ''));
$query = trim((string)($_GET['q'] ?? ''));

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
    <link rel="canonical" href="https://jaipurengineers.com/blogs/">
    <?php include dirname(__DIR__) . '/head.php'; ?>
    <link rel="stylesheet" href="assets/css/je-growth-system.css">
</head>
<body class="defult-home">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main>
    <section class="je-blog-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="je-catalog-label"><i class="fa fa-book"></i> Jaipur Engineers Blog</span>
                    <h1>IT Course, Career and Interview Blogs</h1>
                    <p>Explore 100 practical blog guides for students planning IT training, projects, interviews and career paths in Jaipur.</p>
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
                                    <img src="<?php echo htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>">
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