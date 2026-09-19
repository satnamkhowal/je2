<?php
require_once __DIR__ . '/news-data.php';
$articles = je_news_articles();
$pageTitle = 'Technology News | AI, Tech & Hackathon Updates | Jaipur Engineers';
$pageDescription = 'Latest technology news, AI updates, software trends, hackathons and technology events selected for students and developers.';
$canonical = 'https://jaipurengineers.com/news/';
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
                    <span class="je-catalog-label"><i class="fa fa-newspaper-o"></i> Jaipur Engineers News</span>
                    <h1>Latest Technology & Hackathon News</h1>
                    <p>Technology, artificial intelligence, software, hackathons and digital-industry updates relevant to students, developers and early-career professionals.</p>
                </div>
                <div class="col-lg-4">
                    <div class="je-install-card">
                        <strong>Learning + Industry Context</strong>
                        <p class="mb-0 mt-2">Use current technology updates alongside practical course and project learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="je-blog-layout">
        <div class="container">
            <div class="row">
                <?php foreach ($articles as $slug => $article): ?>
                    <div class="col-md-6 mb-4">
                        <article class="je-blog-card">
                            <div class="je-blog-card-body">
                                <div class="je-blog-meta"><?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                <h2><a href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php"><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                                <p><?php echo htmlspecialchars($article['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                                <a class="je-card-link" href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php">Read full story <i class="fa fa-angle-right"></i></a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>