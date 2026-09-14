<?php
$articles = [
    [
        'title' => 'AI Leaders Call for a Safer Pace as Frontier AI Risks Grow',
        'slug' => 'ai-leaders-call-for-safer-pace-frontier-ai-risks',
        'date' => 'September 14, 2026',
        'category' => 'Artificial Intelligence',
        'excerpt' => 'Anthropic, OpenAI and other AI leaders are calling for stronger safeguards and a more measured pace of frontier AI development.',
    ],
    [
        'title' => 'AI-Linked Stocks Slide After Calls to Slow Frontier AI Development',
        'slug' => 'ai-linked-stocks-slide-after-frontier-ai-slowdown-calls',
        'date' => 'September 14, 2026',
        'category' => 'Technology Business',
        'excerpt' => 'Fresh warnings from leading AI executives are putting safety, investment expectations and AI infrastructure spending back in focus.',
    ],
    [
        'title' => 'India’s Telecom Sector Looks to AI for More Autonomous Networks',
        'slug' => 'india-telecom-sector-ai-autonomous-networks',
        'date' => 'September 14, 2026',
        'category' => 'AI in India',
        'excerpt' => 'India’s telecom sector is exploring greater AI-driven network autonomy while regulators emphasize accountability and human oversight.',
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Technology News | Latest AI & Tech News | Jaipur Engineers</title>
<meta name="description" content="Read the latest technology news, AI updates, cybersecurity developments, software trends and tech industry stories from India and around the world.">
<meta name="keywords" content="technology news, latest tech news, AI news, artificial intelligence news, India technology news, software news, cybersecurity news">
<link rel="canonical" href="https://www.jaipurengineers.com/news/">
</head>
<body>
<main>
<header>
<h1>Latest Technology News</h1>
<p>Technology, artificial intelligence, software and digital industry updates.</p>
</header>
<section aria-label="Technology news articles">
<?php foreach ($articles as $article): ?>
<article>
<p><strong><?= htmlspecialchars($article['category']) ?></strong> · <?= htmlspecialchars($article['date']) ?></p>
<h2><a href="<?= htmlspecialchars($article['slug']) ?>.php"><?= htmlspecialchars($article['title']) ?></a></h2>
<p><?= htmlspecialchars($article['excerpt']) ?></p>
<a href="<?= htmlspecialchars($article['slug']) ?>.php">Read full story</a>
</article>
<?php endforeach; ?>
</section>
</main>
</body>
</html>
