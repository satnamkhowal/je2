<?php
// Physical PHP routes work without introducing rewrite rules to the existing site.
if (!isset($profileSlug)) { http_response_code(404); exit('Profile not found'); }
$profiles = json_decode(file_get_contents(__DIR__ . '/profiles.json'), true, 512, JSON_THROW_ON_ERROR);
if ($profileSlug !== '' && !isset($profiles[$profileSlug])) { http_response_code(404); exit('Profile not found'); }
$profile = $profileSlug === '' ? null : $profiles[$profileSlug];
$esc = static fn($value) => htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
$title = $profile ? $profile['name'] : 'Industry Professionals & Tech Educators';
$pageTitle = $profile ? $title . ' | Career & Learning Profile | Jaipur Engineers' : $title . ' | Jaipur Engineers';
$pageDescription = $profile ? 'Explore ' . $title . "'s public career journey, learning topics and LinkedIn presence. An independent, sourced editorial profile." : 'Explore eight industry professionals sharing technology, interview and career guidance, with sourced biographies and dated LinkedIn follower snapshots.';
$route = 'industry-profiles/' . ($profile ? $profileSlug . '.php' : '');
$canonical = 'https://jaipurengineers.com/' . $route;
$disclaimer = 'Independent editorial profiles: the people featured here are not affiliated with, employed by, or endorsing Jaipur Engineers. No such relationship has been verified. They are not presented as our faculty or mentors.';
$schema = ['@context' => 'https://schema.org', '@type' => 'WebPage', 'name' => $pageTitle, 'url' => $canonical, 'description' => $pageDescription];
if ($profile) {
    $schema['mainEntity'] = ['@type' => 'Person', 'name' => $profile['name'], 'sameAs' => [$profile['linkedin']], 'image' => 'https://jaipurengineers.com/' . $profile['photo']];
} else {
    $schema['mainEntity'] = ['@type' => 'ItemList', 'itemListElement' => []];
    foreach ($profiles as $slug => $person) {
        $schema['mainEntity']['itemListElement'][] = ['@type' => 'ListItem', 'position' => count($schema['mainEntity']['itemListElement']) + 1, 'name' => $person['name'], 'url' => 'https://jaipurengineers.com/industry-profiles/' . $slug . '.php'];
    }
}
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="../">
    <title><?= $esc($pageTitle) ?></title>
    <meta name="description" content="<?= $esc($pageDescription) ?>">
    <link rel="canonical" href="<?= $esc($canonical) ?>">
    <?php include dirname(__DIR__) . '/head.php'; ?>
    <?php if ($profile): ?>
    <meta property="og:image" content="<?= $esc('https://jaipurengineers.com/' . $profile['photo']) ?>">
    <meta property="og:image:alt" content="<?= $esc($profile['name']) ?>">
    <meta name="twitter:image" content="<?= $esc('https://jaipurengineers.com/' . $profile['photo']) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="assets/css/industry-profiles.css">
    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
</head>
<body class="defult-home je-industry-page">
<?php include dirname(__DIR__) . '/header.php'; ?>
<main id="industry-content" class="ip-main">
    <div class="container">
        <nav class="ip-breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a><span aria-hidden="true">/</span><?php if ($profile): ?><a href="industry-profiles/">Industry profiles</a><span aria-hidden="true">/</span><?php endif; ?><span aria-current="page"><?= $esc($profile ? $title : 'Industry profiles') ?></span></nav>
        <?php if (!$profile): ?>
        <section class="ip-directory-hero">
            <div class="ip-hero-copy"><span class="ip-eyebrow">THE INDUSTRY EDIT</span><h1>People to learn from.<br><span>Journeys to explore.</span></h1><p>Inside the careers of engineers sharing their knowledge. Discover the experience, ideas and learning paths behind the profiles.</p><div class="ip-hero-tags"><span>8 industry voices</span><span>5 technology companies</span><span>Independent profiles</span></div></div>
            <div class="ip-portrait-wall" aria-hidden="true"><?php foreach ($profiles as $person): ?><img src="<?= $esc($person['photo']) ?>" alt="" width="96" height="96"><?php endforeach; ?></div>
        </section>
        <div class="ip-directory-heading"><div><span class="ip-eyebrow">FEATURED PROFESSIONALS</span><h2>Explore the people behind the posts</h2></div><p>Engineering · Learning · Career growth</p></div>
        <div class="ip-card-grid">
            <?php foreach ($profiles as $slug => $person): ?>
            <article class="ip-card">
                <div class="ip-cover ip-cover-small" aria-hidden="true"><span><?= $esc($person['company']) ?></span></div>
                <div class="ip-card-body">
                    <img class="ip-avatar" src="<?= $esc($person['photo']) ?>" alt="<?= $esc($person['name']) ?>" width="100" height="100" loading="lazy">
                    <h3><a href="industry-profiles/<?= $esc($slug) ?>.php"><?= $esc($person['name']) ?></a></h3>
                    <p class="ip-role"><?= $esc($person['role']) ?></p><p class="ip-company"><?= $esc($person['company']) ?> <span>· Industry professional</span></p>
                    <p class="ip-followers"><strong><?= $esc($person['followers']) ?></strong> approximate LinkedIn followers</p>
                    <ul class="ip-topics" aria-label="Topics shared"><?php foreach (array_slice($person['topics'],0,3) as $topic): ?><li><?= $esc($topic) ?></li><?php endforeach; ?></ul>
                    <div class="ip-card-actions"><a class="ip-button ip-button-outline" href="industry-profiles/<?= $esc($slug) ?>.php">Explore profile <span aria-hidden="true">↗</span></a><a class="ip-text-link" href="<?= $esc($person['linkedin']) ?>" aria-label="<?= $esc($person['name']) ?> on LinkedIn">LinkedIn</a></div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="ip-layout">
            <div class="ip-primary">
                <section class="ip-panel ip-intro">
                    <div class="ip-cover"><span class="ip-cover-label">INDUSTRY VOICES<br><b>Ideas. Experience. Perspective.</b></span><span class="ip-cover-company"><?= $esc($profile['company']) ?></span></div>
                    <div class="ip-intro-body">
                        <img class="ip-avatar ip-avatar-large" src="<?= $esc($profile['photo']) ?>" alt="<?= $esc($profile['name']) ?>" width="144" height="144" fetchpriority="high">
                        <span class="ip-editorial-label">Independent editorial profile</span>
                        <h1><?= $esc($profile['name']) ?></h1>
                        <p class="ip-headline"><?= $esc($profile['role']) ?> <span>at</span> <?= $esc($profile['company']) ?></p>
                        <p class="ip-specialties"><?= $esc(implode(' · ', $profile['topics'])) ?></p>
                        <p class="ip-followers"><strong><?= $esc($profile['followers']) ?></strong> approximate LinkedIn followers <span>· Snapshot reviewed September 2026</span></p>
                        <div class="ip-intro-actions"><a class="ip-button" href="<?= $esc($profile['linkedin']) ?>">View on LinkedIn <span aria-hidden="true">↗</span></a><a class="ip-button ip-button-outline" href="<?= $esc($route) ?>#experience">Explore career timeline</a></div>
                    </div>
                    <nav class="ip-section-nav" aria-label="Profile sections"><a href="<?= $esc($route) ?>#about">About</a><a href="<?= $esc($route) ?>#experience">Experience</a><a href="<?= $esc($route) ?>#education">Education</a><a href="<?= $esc($route) ?>#topics">Topics</a><a href="<?= $esc($route) ?>#sources">Sources</a></nav>
                </section>
                <section class="ip-panel ip-section" id="about"><span class="ip-eyebrow">THE PERSON BEHIND THE PROFILE</span><h2>About <?= $esc(explode(' ', $profile['name'])[0]) ?></h2><p><?= $esc($profile['journey']) ?></p></section>
                <section class="ip-panel ip-section" id="experience">
                    <div class="ip-section-heading"><h2>Experience</h2><span class="ip-section-count"><?= count($profile['experience']) ?> entries</span></div>
                    <p class="ip-muted">Publicly documented career history. Unconfirmed dates and ordering are marked; this is not a complete LinkedIn export.</p>
                    <?php $entries = $profile['experience']; include __DIR__ . '/timeline.php'; ?>
                </section>
                <section class="ip-panel ip-section" id="education"><h2>Education</h2><?php $entries = $profile['education']; include __DIR__ . '/timeline.php'; ?></section>
                <?php if ($profile['milestones']): ?><section class="ip-panel ip-section" id="milestones"><h2>Milestones & community</h2><?php $entries = $profile['milestones']; include __DIR__ . '/timeline.php'; ?></section><?php endif; ?>
                <section class="ip-panel ip-section" id="topics"><h2>What they share</h2><ul class="ip-topics"><?php foreach ($profile['topics'] as $topic): ?><li><?= $esc($topic) ?></li><?php endforeach; ?></ul><h3 class="ip-subheading">Why people pay attention</h3><p><?= $esc($profile['attention']) ?></p><p class="ip-muted">Our editorial reading of their public content, not a measured engagement claim.</p></section>
                <section class="ip-panel ip-section" id="sources"><h2>Sources & photo credit</h2><p class="ip-muted">Paraphrased from public profiles and announcements. Sources reviewed 23 September 2026. Search indexing may lag; roles and counts can change.</p><ul class="ip-sources"><li><a href="<?= $esc($profile['linkedin']) ?>">LinkedIn profile and approximate follower snapshot</a></li><?php foreach ($profile['sources'] as $label => $url): ?><li><a href="<?= $esc($url) ?>"><?= $esc($label) ?></a></li><?php endforeach; ?><li><a href="<?= $esc($profile['photoSource']) ?>">Portrait source: public creator profile</a></li></ul></section>
            </div>
            <aside class="ip-sidebar">
                <section class="ip-panel ip-section"><span class="ip-eyebrow">PROFILE NOTES</span><h2 class="ip-sidebar-title">A career worth exploring</h2><dl class="ip-facts"><dt>Publicly listed company</dt><dd><?= $esc($profile['company']) ?></dd><dt>Learning focus</dt><dd><?= $esc($profile['topics'][0]) ?></dd><dt>Profile reviewed</dt><dd>23 September 2026</dd></dl><p class="ip-muted">Use individual experiences as perspective when planning your own learning journey.</p></section>
                <section class="ip-panel ip-section"><h2 class="ip-sidebar-title">More industry voices</h2><div class="ip-related"><?php foreach ($profiles as $slug => $person): if ($slug === $profileSlug) continue; ?><a href="industry-profiles/<?= $esc($slug) ?>.php"><img src="<?= $esc($person['photo']) ?>" alt="" width="48" height="48" loading="lazy"><span><strong><?= $esc($person['name']) ?></strong><small><?= $esc($person['company']) ?> · <?= $esc($person['topics'][0]) ?></small></span><span aria-hidden="true">›</span></a><?php endforeach; ?></div></section>
                <section class="ip-panel ip-section ip-learning"><span class="ip-eyebrow">YOUR NEXT CHAPTER</span><h2 class="ip-sidebar-title">Turn inspiration into practice.</h2><p>Build projects, strengthen fundamentals and prepare for interviews.</p><a class="ip-text-link" href="career-guides.php">Explore career guides →</a></section>
            </aside>
        </div>
        <?php endif; ?>
        <aside class="ip-disclaimer" aria-label="Independence disclaimer"><strong>Independent profiles, clearly sourced.</strong><p><?= $esc($disclaimer) ?> This section is not affiliated with LinkedIn.</p><p class="ip-muted">Approximate follower counts are public search-index snapshots reviewed on <time datetime="2026-09-23">23 September 2026</time>, not live measurements.</p></aside>
        <section class="ip-bottom"><div><span class="ip-eyebrow">BUILD YOUR OWN PATH</span><h2>Your learning journey starts with practice.</h2><p>Explore Jaipur Engineers resources for your next step.</p></div><div class="ip-bottom-links"><a href="career-guides.php">Career guides ↗</a><a href="placement-assistance.php">Placement assistance ↗</a><a href="java-interview-preparation-jaipur.php">Java interview preparation ↗</a></div></section>
    </div>
</main>
<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
