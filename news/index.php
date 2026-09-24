<?php
require_once __DIR__ . '/news-data.php';
$articles = je_news_articles();
$pageTitle = 'Technology News | AI, Tech & Hackathon Updates | Jaipur Engineers';
$pageDescription = 'Latest technology news, AI updates, software trends, hackathons and technology events selected for students and developers.';
$canonical = 'https://jaipurengineers.com/news/';
$articleCount = count($articles);
$categories = [];
foreach ($articles as $article) {
    if (!empty($article['category'])) {
        $categories[$article['category']] = true;
    }
}
$categories = array_keys($categories);
$featured = reset($articles);
$featuredSlug = key($articles);
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
    <link rel="stylesheet" href="assets/css/news-landing.css?v=1">
</head>
<body class="defult-home je-news-page">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main>
    <section class="je-news-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="je-news-kicker"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Jaipur Engineers Newsroom</span>
                    <h1>Technology News, <span>AI Updates</span> &amp; Hackathons</h1>
                    <p class="hero-copy">Stay updated with technology developments, artificial intelligence, software trends, developer events and hackathons selected for students, developers and early-career professionals.</p>
                </div>
                <div class="col-lg-4">
                    <div class="je-news-hero-card">
                        <div class="stat"><?php echo (int)$articleCount; ?>+</div>
                        <div class="label">Technology stories &amp; event updates</div>
                        <div class="mini-line"></div>
                        <div class="stat"><?php echo count($categories); ?></div>
                        <div class="label">Technology categories covered</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="je-news-toolbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h2>Latest Updates</h2>
                </div>
                <div class="col-lg-8">
                    <nav class="je-news-filter" aria-label="News categories">
                        <a class="active" href="news/">All News</a>
                        <?php foreach ($categories as $category): ?>
                            <a href="news/" aria-label="<?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?> news"><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="je-news-content">
        <div class="container">
            <?php if ($featured): ?>
                <div class="row mb-4">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <article class="je-news-feature">
                            <span class="feature-badge">Featured Update</span>
                            <div class="je-news-meta">
                                <span><?php echo htmlspecialchars($featured['category'], ENT_QUOTES, 'UTF-8'); ?></span><span class="dot"></span><span><?php echo htmlspecialchars($featured['date'], ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                            <h2><a href="news/<?php echo htmlspecialchars($featuredSlug, ENT_QUOTES, 'UTF-8'); ?>.php"><?php echo htmlspecialchars($featured['title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                            <p><?php echo htmlspecialchars($featured['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a class="je-news-read" href="news/<?php echo htmlspecialchars($featuredSlug, ENT_QUOTES, 'UTF-8'); ?>.php">Read full story <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </article>
                    </div>
                    <div class="col-lg-5">
                        <div class="je-news-grid">
                            <?php $shown = 0; foreach ($articles as $slug => $article): if ($slug === $featuredSlug || $shown >= 2) continue; $shown++; ?>
                                <article class="je-news-card">
                                    <span class="category"><?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <div class="je-news-meta"><span><?php echo htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                                    <h3><a href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php"><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                                    <p><?php echo htmlspecialchars($article['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    <a class="je-news-read" href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="je-news-grid">
                <?php $index = 0; foreach ($articles as $slug => $article): if ($slug === $featuredSlug || $index < 2) { if ($slug !== $featuredSlug) $index++; continue; } $index++; ?>
                    <article class="je-news-card">
                        <span class="category"><?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <div class="je-news-meta"><span><?php echo htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                        <h3><a href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php"><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                        <p><?php echo htmlspecialchars($article['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <a class="je-news-read" href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>.php">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>