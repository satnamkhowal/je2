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
$pageTitle = $post['title'] . ' | Jaipur Engineers Blog';
$pageDescription = $post['meta'];
$related = $slug ? je_blog_related($slug, 8) : array_slice(je_blog_posts(), 0, 8, true);
$sidebarPosts = $related;
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="../">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="https://jaipurengineers.com/blogs/post.php?slug=<?php echo htmlspecialchars($post['slug'], ENT_QUOTES, 'UTF-8'); ?>">
    <?php include dirname(__DIR__) . '/head.php'; ?>
</head>
<body class="defult-home">
<?php include dirname(__DIR__) . '/header.php'; ?>

<main class="je-blog-layout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="je-blog-article">
                    <div class="je-blog-meta"><?php echo htmlspecialchars($post['intent'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($post['read_time'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <h1><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p><?php echo htmlspecialchars($post['meta'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <img class="je-post-image" src="<?php echo htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>">

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