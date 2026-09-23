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
    $schema['mainEntity'] = ['@type' => 'Person', 'name' => $profile['name'], 'sameAs' => [$profile['linkedin']]];
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
    <link rel="stylesheet" href="assets/css/industry-profiles.css">
    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
</head>
<body class="defult-home je-industry-page">
<?php include dirname(__DIR__) . '/header.php'; ?>
<main id="industry-content">
    <section class="je-hero">
        <div class="container">
            <nav class="je-breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a> / <?php if ($profile): ?><a href="industry-profiles/">Industry profiles</a> / <?php endif; ?><span aria-current="page"><?= $esc($title) ?></span></nav>
            <span class="je-kicker">Independent career reading</span>
            <?php if ($profile): ?><div class="je-profile-avatar" aria-hidden="true"><?= $esc($profile['initials']) ?></div><?php endif; ?>
            <h1><?= $esc($title) ?></h1>
            <p class="je-hero-lead"><?= $profile ? $esc($profile['role'] . ' · ' . $profile['company']) : 'Discover engineers who share what they learn. Explore career journeys, technical learning and interview preparation beyond the classroom.' ?></p>
            <?php if ($profile): ?><a class="je-primary-btn" href="<?= $esc($profile['linkedin']) ?>">View <?= $esc($profile['name']) ?> on LinkedIn</a><?php endif; ?>
        </div>
    </section>
    <section class="je-section">
        <div class="container">
            <aside class="je-profile-notice" aria-label="Independence disclaimer"><strong>About this section</strong><p><?= $esc($disclaimer) ?></p></aside>
            <p class="je-profile-date">Sources checked <time datetime="2026-09-23">23 September 2026</time>. Follower counts are approximate public search-index snapshots reviewed on that date, not live measurements. Indexing may lag; roles and counts can change.</p>
            <?php if (!$profile): ?>
            <div class="row">
                <?php foreach ($profiles as $slug => $person): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <article class="je-feature-card je-profile-card">
                        <div class="je-profile-avatar" aria-hidden="true"><?= $esc($person['initials']) ?></div>
                        <h2 class="h3"><a href="industry-profiles/<?= $esc($slug) ?>.php"><?= $esc($person['name']) ?></a></h2>
                        <p><strong><?= $esc($person['company']) ?></strong><br><?= $esc($person['role']) ?></p>
                        <p class="je-profile-count">Approx. <?= $esc($person['followers']) ?> LinkedIn followers</p>
                        <ul class="je-profile-topics" aria-label="Topics shared"><?php foreach ($person['topics'] as $topic): ?><li><?= $esc($topic) ?></li><?php endforeach; ?></ul>
                        <a class="je-card-link" href="industry-profiles/<?= $esc($slug) ?>.php">Read <?= $esc($person['name']) ?>'s profile <span aria-hidden="true">&rarr;</span></a>
                        <a class="je-profile-external" href="<?= $esc($person['linkedin']) ?>">LinkedIn profile</a>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="row">
                <article class="col-lg-8 je-profile-story">
                    <h2>Career journey</h2><p><?= $esc($profile['journey']) ?></p>
                    <h2>Topics they share</h2>
                    <ul class="je-profile-topics"><?php foreach ($profile['topics'] as $topic): ?><li><?= $esc($topic) ?></li><?php endforeach; ?></ul>
                    <h2>Why the content draws attention</h2>
                    <p><?= $esc($profile['attention']) ?></p>
                    <p class="je-profile-date">Editorial interpretation of the linked public content; this is not a measured explanation of engagement or a claim about learning outcomes.</p>
                    <h2>Public sources</h2>
                    <p>These summaries are paraphrased from the sources below. Personal accounts describe the author's own experience; they do not establish hiring guarantees or a verified recent joining date.</p>
                    <ul class="je-profile-sources">
                        <li><a href="<?= $esc($profile['linkedin']) ?>">Public LinkedIn profile: identity, company and follower snapshot</a></li>
                        <?php foreach ($profile['sources'] as $label => $url): ?><li><a href="<?= $esc($url) ?>"><?= $esc($label) ?></a></li><?php endforeach; ?>
                    </ul>
                </article>
                <aside class="col-lg-4">
                    <div class="je-sidebar-card">
                        <h2 class="h3">At a glance</h2>
                        <dl><dt>Publicly listed company</dt><dd><?= $esc($profile['company']) ?></dd><dt>Role</dt><dd><?= $esc($profile['role']) ?></dd><dt>LinkedIn followers</dt><dd>Approx. <?= $esc($profile['followers']) ?> <br><small>Snapshot reviewed 23 September 2026</small></dd></dl>
                        <a href="<?= $esc($profile['linkedin']) ?>">Check the public LinkedIn profile</a>
                    </div>
                    <div class="je-sidebar-card mt-4"><h2 class="h3">Keep exploring</h2><ul><?php foreach ($profiles as $slug => $person): if ($slug === $profileSlug) continue; ?><li><a href="industry-profiles/<?= $esc($slug) ?>.php"><?= $esc($person['name']) ?></a></li><?php endforeach; ?></ul></div>
                </aside>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="je-section je-section-soft"><div class="container">
        <h2>Build your own preparation plan</h2>
        <p>Use these independent perspectives alongside practical projects and your own preparation. Jaipur Engineers resources: <a href="career-guides.php">career guides</a>, <a href="placement-assistance.php">placement assistance</a> and <a href="java-interview-preparation-jaipur.php">Java interview preparation</a>.</p>
    </div></section>
</main>
<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
