<?php
require_once __DIR__ . '/news-data.php';
$newsKey = $newsKey ?? '';
$article = je_news_article($newsKey);
if (!$article) {
    http_response_code(404);
    $article = [
        'title' => 'News Article Not Found',
        'date' => '',
        'category' => 'Technology News',
        'description' => 'The requested news article could not be found.',
        'intro' => 'Please return to the technology news page to view available updates.',
        'sections' => [],
        'source_name' => '',
        'source_url' => '',
    ];
}
$pageTitle = $article['title'] . ' | Jaipur Engineers';
$pageDescription = $article['description'];
$canonical = 'https://jaipurengineers.com/news/' . ($newsKey !== '' ? $newsKey . '.php' : '');
$allNews = je_news_articles();
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="../">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
    <?php include dirname(__DIR__) . '/head.php'; ?>
    <link rel="stylesheet" href="assets/css/je-growth-system.css">
</head>
<body class="defult-home">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main>
    <section class="je-blog-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <span class="je-catalog-label"><i class="fa fa-newspaper-o"></i> <?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <h1><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p><?php echo htmlspecialchars($article['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="je-blog-layout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="je-blog-article">
                        <div class="je-blog-meta">
                            <a href="news/">Technology News</a> &nbsp;|&nbsp;
                            <?php echo htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8'); ?> &nbsp;|&nbsp;
                            <?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?>
                        </div>

                        <p><?php echo htmlspecialchars($article['intro'], ENT_QUOTES, 'UTF-8'); ?></p>

                        <?php foreach ($article['sections'] as $section): ?>
                            <h2><?php echo htmlspecialchars($section['heading'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <?php if (!empty($section['text'])): ?>
                                <p><?php echo htmlspecialchars($section['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($section['list'])): ?>
                                <ul>
                                    <?php foreach ($section['list'] as $item): ?>
                                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($article['source_url'] !== ''): ?>
                            <h2>Source</h2>
                            <p><a href="<?php echo htmlspecialchars($article['source_url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="nofollow noopener"><?php echo htmlspecialchars($article['source_name'], ENT_QUOTES, 'UTF-8'); ?></a></p>
                        <?php endif; ?>

                        <p><a class="je-card-link" href="news/"><i class="fa fa-arrow-left"></i> Back to latest technology news</a></p>
                    </article>
                </div>

                <div class="col-lg-4">
                    <aside class="je-blog-sidebar">
                        <div class="je-side-box">
                            <h3>Latest Technology News</h3>
                            <ul class="je-side-links">
                                <?php foreach ($allNews as $slug => $item): ?>
                                    <?php if ($slug === $newsKey) continue; ?>
                                    <li><a href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php"><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="je-side-box">
                            <h3>Explore IT Training</h3>
                            <p>Browse practical courses, projects and career-focused learning paths at Jaipur Engineers.</p>
                            <a class="je-submit-btn" href="courses.php">View Courses</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>