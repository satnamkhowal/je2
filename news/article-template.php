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
        'sources' => [],
    ];
}

$pageTitle = $article['title'] . ' | Jaipur Engineers';
$pageDescription = $article['description'];
$canonical = 'https://jaipurengineers.com/news/' . ($newsKey !== '' ? $newsKey : '');
$allNews = je_news_articles();

$readingText = $article['title'] . ' ' . $article['description'] . ' ' . $article['intro'];
foreach ($article['sections'] as $section) {
    $readingText .= ' ' . ($section['heading'] ?? '') . ' ' . ($section['text'] ?? '');
    if (!empty($section['list'])) {
        $readingText .= ' ' . implode(' ', $section['list']);
    }
}
$readingMinutes = max(2, (int) ceil(str_word_count(strip_tags($readingText)) / 200));

$articleSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'NewsArticle',
    'headline' => $article['title'],
    'description' => $article['description'],
    'datePublished' => $article['date'],
    'mainEntityOfPage' => $canonical,
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Jaipur Engineers',
        'url' => 'https://jaipurengineers.com/',
    ],
];
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
    <script type="application/ld+json"><?php echo json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php include dirname(__DIR__) . '/head.php'; ?>
    <link rel="stylesheet" href="assets/css/news-article.css?v=1">
</head>
<body class="defult-home je-news-article-page">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main>
    <section class="je-article-hero">
        <div class="container">
            <nav class="je-article-breadcrumb" aria-label="Breadcrumb">
                <a href="">Home</a><span class="sep">/</span>
                <a href="news/">Technology News</a><span class="sep">/</span>
                <span><?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?></span>
            </nav>
            <span class="je-article-category"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php echo htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8'); ?></span>
            <h1><?php echo htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="je-article-deck"><?php echo htmlspecialchars($article['description'], ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="je-article-meta">
                <?php if ($article['date'] !== ''): ?><span><i class="fa fa-calendar"></i><?php echo htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                <span><i class="fa fa-clock-o"></i><?php echo (int) $readingMinutes; ?> min read</span>
                <span><i class="fa fa-map-marker"></i>Jaipur Engineers Newsroom</span>
            </div>
        </div>
    </section>

    <section class="je-article-layout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="je-article-card">
                        <?php if ($article['intro'] !== ''): ?>
                            <p class="je-article-lead"><?php echo htmlspecialchars($article['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($article['sections'])): ?>
                            <nav class="je-article-toc" aria-label="In this story">
                                <h3>In this story</h3>
                                <ol>
                                    <?php foreach ($article['sections'] as $i => $section): ?>
                                        <?php $sectionId = 'section-' . ($i + 1); ?>
                                        <li><a href="#<?php echo $sectionId; ?>"><?php echo htmlspecialchars($section['heading'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </nav>
                        <?php endif; ?>

                        <?php foreach ($article['sections'] as $i => $section): ?>
                            <?php $sectionId = 'section-' . ($i + 1); ?>
                            <h2 id="<?php echo $sectionId; ?>"><?php echo htmlspecialchars($section['heading'], ENT_QUOTES, 'UTF-8'); ?></h2>
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

                        <?php
                        $sources = $article['sources'] ?? [];
                        if (empty($sources) && !empty($article['source_url'])) {
                            $sources[] = ['name' => $article['source_name'], 'url' => $article['source_url']];
                        }
                        ?>
                        <?php if (!empty($sources)): ?>
                            <div class="je-source-box">
                                <h2>Sources</h2>
                                <ul>
                                    <?php foreach ($sources as $source): ?>
                                        <li><a href="<?php echo htmlspecialchars($source['url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="nofollow noopener"><?php echo htmlspecialchars($source['name'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="je-article-footer-nav">
                            <a class="je-back-news" href="news/"><i class="fa fa-arrow-left"></i> Back to Technology News</a>
                            <a class="je-course-cta-link" href="courses">Explore IT Courses <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <aside class="je-news-sidebar">
                        <?php je_render_design_card(); ?>

                        <div class="je-news-sidebox">
                            <h3>Latest Technology News</h3>
                            <ul class="je-news-latest">
                                <?php $latestCount = 0; foreach ($allNews as $slug => $item): ?>
                                    <?php if ($slug === $newsKey || $latestCount >= 5) continue; $latestCount++; ?>
                                    <li>
                                        <a href="news/<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></a>
                                        <small><?php echo htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8'); ?> · <?php echo htmlspecialchars($item['date'], ENT_QUOTES, 'UTF-8'); ?></small>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="je-news-sidebox je-news-course-box">
                            <span class="mini-kicker">Learn by building</span>
                            <h3>Turn technology news into practical skills</h3>
                            <p>Explore project-based programming, AI, data, cloud and full-stack training at Jaipur Engineers.</p>
                            <a href="courses">View Courses <i class="fa fa-long-arrow-right"></i></a>
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