<?php
require_once __DIR__ . '/blog-data.php';
$slug = trim((string)($_GET['slug'] ?? ''));
$post = je_blog_post($slug);
if (!$post) {
    http_response_code(404);
    $post = [
        'slug' => '',
        'title' => 'Blog Not Found',
        'meta' => 'The requested blog could not be found.',
        'course' => 'IT Courses',
        'course_link' => 'courses.php',
        'category' => 'Blog',
        'intent' => 'Guide',
        'focus' => 'course guidance and practical learning',
        'image' => 'assets/images/blog/1.jpg',
        'date' => date('M d, Y'),
        'read_time' => '2 min read',
    ];
}

$articleContent = null;
if (!empty($post['content_file']) && is_file($post['content_file'])) {
    $articleContent = require $post['content_file'];
}

$pageTitle = $post['meta_title'] ?? ($post['title'] . ' | Jaipur Engineers Blog');
$pageDescription = $post['meta'];
$canonical = 'https://jaipurengineers.com/blogs/post.php?slug=' . rawurlencode($post['slug']);
$related = $slug ? je_blog_related($slug, 8) : array_slice(je_blog_posts(), 0, 8, true);
$sidebarPosts = $related;
$h1 = $post['h1'] ?? $post['title'];
$imageAlt = $post['image_alt'] ?? $post['title'];

$blogSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $h1,
    'description' => $pageDescription,
    'mainEntityOfPage' => $canonical,
    'datePublished' => !empty($post['date']) ? date('Y-m-d', strtotime($post['date'])) : date('Y-m-d'),
    'author' => ['@type' => 'Organization', 'name' => 'Jaipur Engineers'],
    'publisher' => ['@type' => 'Organization', 'name' => 'Jaipur Engineers'],
];

if (!empty($post['image'])) {
    $blogSchema['image'] = 'https://jaipurengineers.com/' . ltrim($post['image'], '/');
}

$faqSchema = null;
if (!empty($articleContent['faq']) && is_array($articleContent['faq'])) {
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(static function (array $faq): array {
            return [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ];
        }, $articleContent['faq']),
    ];
}
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
    <script type="application/ld+json"><?php echo json_encode($blogSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php if ($faqSchema): ?>
    <script type="application/ld+json"><?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php endif; ?>
    <?php include dirname(__DIR__) . '/head.php'; ?>
    <style>
        .je-blog-article .je-code-example{margin:18px 0 24px}
        .je-blog-article .je-code-example pre{margin:0;padding:18px 20px;overflow:auto;background:#f6f7f9;border:1px solid #e5e7eb;border-radius:12px;color:#20252b;line-height:1.65}
        .je-blog-article .je-code-example code{font-family:Consolas,Monaco,monospace;font-size:.94rem}
        .je-blog-article h2{margin-top:34px}
        .je-blog-article h3{margin-top:24px}
        .je-blog-article li{margin-bottom:8px}
        .je-faq-list{margin-top:18px}
        .je-faq-item{padding:20px 0;border-bottom:1px solid #ececec}
        .je-faq-item h3{margin:0 0 8px;font-size:1.1rem}
        .je-blog-cta{margin-top:34px;padding:24px;border:1px solid #ececec;border-radius:14px;background:#fafafa}
    </style>
</head>
<body class="defult-home">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main class="je-blog-layout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="je-blog-article">
                    <div class="je-blog-meta"><?php echo htmlspecialchars($post['intent'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($post['read_time'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <h1><?php echo htmlspecialchars($h1, ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p><?php echo htmlspecialchars($post['meta'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <img class="je-post-image" src="<?php echo htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($imageAlt, ENT_QUOTES, 'UTF-8'); ?>">

                    <?php if ($articleContent): ?>
                        <?php if (!empty($articleContent['intro'])): ?>
                            <p><?php echo htmlspecialchars($articleContent['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>

                        <?php echo $articleContent['body_html'] ?? ''; ?>

                        <?php if (!empty($articleContent['faq'])): ?>
                            <h2>Frequently Asked Questions</h2>
                            <div class="je-faq-list">
                                <?php foreach ($articleContent['faq'] as $faq): ?>
                                    <section class="je-faq-item">
                                        <h3><?php echo htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                        <p><?php echo htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    </section>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="je-blog-cta">
                            <h2>Want a structured Java learning path?</h2>
                            <p>Explore Jaipur Engineers course options to connect Java fundamentals, debugging, backend development and project practice in a guided learning plan.</p>
                            <p><a class="je-card-link" href="<?php echo htmlspecialchars($post['course_link'], ENT_QUOTES, 'UTF-8'); ?>">Explore the Java program <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    <?php else: ?>
                        <h2>Why this topic matters</h2>
                        <p><?php echo htmlspecialchars($post['course'], ENT_QUOTES, 'UTF-8'); ?> is easier to learn when students follow a clear path instead of jumping between random topics. This guide focuses on <?php echo htmlspecialchars($post['focus'], ENT_QUOTES, 'UTF-8'); ?>, so learners can understand what to study, how to practice and how to connect learning with career goals.</p>

                        <h2>Suggested learning path</h2>
                        <ul>
                            <li>Start with the fundamentals and revise the core terminology.</li>
                            <li>Practice small tasks before moving to larger assignments.</li>
                            <li>Build at least one project that can be explained during interviews.</li>
                            <li>Maintain notes for tools, errors, commands and important concepts.</li>
                            <li>Connect the topic with a practical course plan and trainer feedback.</li>
                        </ul>

                        <h2>How Jaipur Engineers approaches it</h2>
                        <p>Jaipur Engineers focuses on practical learning, project discussion, doubt support and career-oriented revision. Students can use this topic as a checkpoint while choosing a course, planning weekly practice or preparing for interviews.</p>

                        <h2>Internal course link</h2>
                        <p>For structured training, visit <a href="<?php echo htmlspecialchars($post['course_link'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($post['course'], ENT_QUOTES, 'UTF-8'); ?> course details</a> or explore the complete <a href="courses.php">IT courses catalog</a>.</p>

                        <h2>Quick action checklist</h2>
                        <ul>
                            <li>Choose one clear target role or learning outcome.</li>
                            <li>Complete topic-wise practice instead of only watching videos.</li>
                            <li>Create a small project and document what it does.</li>
                            <li>Prepare short answers for interview-style questions.</li>
                            <li>Ask for course guidance if you are confused between two technologies.</li>
                        </ul>
                    <?php endif; ?>
                </article>
            </div>
            <div class="col-lg-4">
                <?php include __DIR__ . '/sidebar.php'; ?>
            </div>
        </div>
    </div>
</main>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
