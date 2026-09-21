<?php
$page = $page ?? [];
$slug = (string)($page['slug'] ?? basename($_SERVER['PHP_SELF'] ?? 'page.php'));
$title = (string)($page['title'] ?? 'Jaipur Engineers');
$kicker = (string)($page['kicker'] ?? 'Jaipur Engineers');
$lead = (string)($page['lead'] ?? 'Explore practical training and student support at Jaipur Engineers.');
$items = $page['items'] ?? [];
$pageTitle = $title . ' | Jaipur Engineers';
$pageDescription = $lead;
$canonical = 'https://jaipurengineers.com/' . $slug;
$isAdmissions = $slug === 'college-admission-guidance-jaipur.php';
$isContact = $slug === 'contact-us.php';
$esc = static fn($text) => htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $esc($pageTitle) ?></title>
    <meta name="description" content="<?= $esc($pageDescription) ?>">
    <link rel="canonical" href="<?= $esc($canonical) ?>">
    <?php include __DIR__ . '/head.php'; ?>
    <?php if ($isAdmissions): ?>
    <script type="application/ld+json"><?= json_encode([
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => $title,
        'serviceType' => 'College Admission Guidance / Education Counselling',
        'url' => $canonical, 'description' => $lead,
        'provider' => ['@id' => 'https://jaipurengineers.com/#organization'],
        'areaServed' => [['@type' => 'City', 'name' => 'Jaipur'], ['@type' => 'State', 'name' => 'Rajasthan']],
    ], JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
    <?php endif; ?>
</head>
<body class="defult-home je-course-page">
<?php include __DIR__ . '/header.php'; ?>
<main>
    <section class="je-hero">
        <div class="container"><div class="row align-items-center">
            <div class="col-lg-8">
                <div class="je-breadcrumb"><a href="index.php">Home</a> / <?= $esc($title) ?></div>
                <span class="je-kicker"><?= $esc($kicker) ?></span>
                <h1><?= $esc($title) ?></h1>
                <p class="je-hero-lead"><?= $esc($lead) ?></p>
                <a href="#details" class="je-primary-btn">Explore Details</a>
                <a href="#enquiry" class="je-outline-btn">Enquire Now</a>
            </div>
            <div class="col-lg-4">
                <div class="je-course-media-card"><div class="inner">
                    <span class="je-kicker">Jaipur Engineers</span>
                    <h2 class="h3"><?= $esc($page['card_title'] ?? 'Practical learning since 1996') ?></h2>
                    <p><?= $esc($page['card_text'] ?? 'Training, projects, internships and career-focused guidance in Jaipur.') ?></p>
                    <a href="#enquiry" class="je-primary-btn w-100">Request Details</a>
                </div></div>
            </div>
        </div></div>
    </section>
    <?php if (!$isAdmissions): ?>
    <section class="je-trust-bar"><div class="container"><div class="row no-gutters">
        <div class="col-6 col-lg-3 je-trust-item"><strong>1996</strong><span>Established in Jaipur</span></div>
        <div class="col-6 col-lg-3 je-trust-item"><strong>Practical</strong><span>Hands-on approach</span></div>
        <div class="col-6 col-lg-3 je-trust-item"><strong>Projects</strong><span>Applied learning</span></div>
        <div class="col-6 col-lg-3 je-trust-item"><strong>Career</strong><span>Guidance and support</span></div>
    </div></div></section>
    <?php endif; ?>
    <section class="je-section" id="details"><div class="container"><div class="row">
        <div class="col-lg-8">
            <div class="je-section-title"><span class="eyebrow"><?= $esc($kicker) ?></span><h2><?= $esc($title) ?></h2><p><?= $esc($lead) ?></p></div>
            <?php if ($isContact): ?>
            <address class="je-contact-details je-content-card">
                <h3>Visit Jaipur Engineers</h3>
                <p><?= je_business_text('address') ?></p>
                <p><a href="tel:<?= je_business_text('phone') ?>"><?= je_business_text('phone_display') ?></a><br>
                <a href="mailto:<?= je_business_text('email') ?>"><?= je_business_text('email') ?></a></p>
                <a class="je-card-link" href="<?= je_business_text('maps') ?>">Open Jaipur Engineers in Google Maps</a>
            </address>
            <?php endif; ?>
            <div class="row">
                <?php foreach ($items as $item): ?>
                <div class="col-md-6 mb-4"><div class="je-feature-card">
                    <div class="je-feature-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                    <h3><?= $esc(is_array($item) ? $item['title'] : $item) ?></h3>
                    <p><?= $esc(is_array($item) ? $item['text'] : 'Get clear information, practical guidance and support from the Jaipur Engineers team.') ?></p>
                </div></div>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($page['note'])): ?><p><?= $esc($page['note']) ?></p><?php endif; ?>
            <?php if ($isAdmissions): ?><p>Looking for skills training? Explore our <a href="courses.php">IT training courses</a> or <a href="internship-programs-jaipur.php">internship programs</a>.</p><?php endif; ?>
        </div>
        <div class="col-lg-4">
            <?php je_render_design_card(); ?>
            <div class="je-sidebar-card" id="enquiry">
                <h2 class="h3">Request Details</h2>
                <form action="lead-submit.php" method="post">
                    <input type="hidden" name="source" value="<?= $esc($title) ?>">
                    <label for="enquiry-name">Your name</label><input id="enquiry-name" class="je-form-control" name="name" type="text" autocomplete="name" required>
                    <label for="enquiry-phone">Mobile number</label><input id="enquiry-phone" class="je-form-control" name="phone" type="tel" autocomplete="tel" required>
                    <label for="enquiry-email">Email address (optional)</label><input id="enquiry-email" class="je-form-control" name="email" type="email" autocomplete="email">
                    <label for="enquiry-course">Enquiry about</label><input id="enquiry-course" class="je-form-control" name="course" type="text" value="<?= $esc($title) ?>" readonly>
                    <button class="je-submit-btn" type="submit">Request Callback</button>
                </form>
            </div>
        </div>
    </div></div></section>
    <section class="je-section je-section-soft"><div class="container"><div class="je-bottom-cta"><div class="row align-items-center">
        <div class="col-md-8"><h2>Need more information?</h2><p>Talk to Jaipur Engineers for current details, guidance and next steps.</p></div>
        <div class="col-md-4 text-md-right"><a href="#enquiry" class="je-primary-btn">Send Enquiry</a></div>
    </div></div></div></section>
</main>
<div class="je-mobile-cta"><a href="tel:<?= je_business_text('phone') ?>"><i class="fa fa-phone mr-1" aria-hidden="true"></i> Call</a><a href="#enquiry"><i class="fa fa-paper-plane mr-1" aria-hidden="true"></i> Enquire</a></div>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
