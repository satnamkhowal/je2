<?php
$page = $page ?? [];
$slug = (string)($page['slug'] ?? basename($_SERVER['PHP_SELF'] ?? 'page.php'));
$title = (string)($page['title'] ?? 'Jaipur Engineers');
$kicker = (string)($page['kicker'] ?? 'Jaipur Engineers');
$lead = (string)($page['lead'] ?? 'Explore practical training, career guidance and student support at Jaipur Engineers in Jaipur.');
$items = $page['items'] ?? ['Practical guidance','Experienced training environment','Project-focused learning','Career support'];
$pageTitle = $title . ' | Jaipur Engineers';
$pageDescription = $lead;
$canonical = 'https://jaipurengineers.com/' . $slug;
?>
<!doctype html>
<html lang="en-IN">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<?php include __DIR__ . '/head.php'; ?>
<link rel="stylesheet" href="assets/css/jaipur-engineers-course-landing.css">
</head>
<body class="defult-home je-course-page">
<?php include __DIR__ . '/header.php'; ?>
<main>
<section class="je-hero"><div class="container"><div class="row align-items-center"><div class="col-lg-8">
<div class="je-breadcrumb"><a href="index.php">Home</a> / <?php echo htmlspecialchars($title); ?></div>
<span class="je-kicker"><?php echo htmlspecialchars($kicker); ?></span><h1><?php echo htmlspecialchars($title); ?></h1>
<p class="je-hero-lead"><?php echo htmlspecialchars($lead); ?></p>
<a href="#details" class="je-primary-btn">Explore Details</a> <a href="#enquiry" class="je-outline-btn">Enquire Now</a>
</div><div class="col-lg-4"><div class="je-course-media-card"><div class="inner"><span class="je-kicker">Jaipur Engineers</span><h3>Practical learning since 1996</h3><p>Training, projects, internships and career-focused guidance in Jaipur.</p><a href="#enquiry" class="je-primary-btn w-100">Request Details</a></div></div></div></div></div></section>
<section class="je-trust-bar"><div class="container"><div class="row no-gutters"><div class="col-6 col-lg-3 je-trust-item"><strong>1996</strong><span>Established in Jaipur</span></div><div class="col-6 col-lg-3 je-trust-item"><strong>Practical</strong><span>Hands-on approach</span></div><div class="col-6 col-lg-3 je-trust-item"><strong>Projects</strong><span>Applied learning</span></div><div class="col-6 col-lg-3 je-trust-item"><strong>Career</strong><span>Guidance and support</span></div></div></div></section>
<section class="je-section" id="details"><div class="container"><div class="row"><div class="col-lg-8"><div class="je-section-title"><span class="eyebrow"><?php echo htmlspecialchars($kicker); ?></span><h2><?php echo htmlspecialchars($title); ?></h2><p><?php echo htmlspecialchars($lead); ?></p></div><div class="row"><?php foreach ($items as $item): ?><div class="col-md-6 mb-4"><div class="je-feature-card"><div class="je-feature-icon"><i class="fa fa-check"></i></div><h3><?php echo htmlspecialchars($item); ?></h3><p>Get clear information, practical guidance and support from the Jaipur Engineers team.</p></div></div><?php endforeach; ?></div></div>
<div class="col-lg-4" id="enquiry"><div class="je-sidebar-card"><h3>Request Details</h3><form action="lead-submit.php" method="post"><input type="hidden" name="source" value="<?php echo htmlspecialchars($title); ?>"><input class="je-form-control" name="name" type="text" placeholder="Your Name" required><input class="je-form-control" name="phone" type="tel" placeholder="Mobile Number" required><input class="je-form-control" name="email" type="email" placeholder="Email Address"><input class="je-form-control" name="course" type="text" value="<?php echo htmlspecialchars($title); ?>" readonly><button class="je-submit-btn" type="submit">Request Callback</button></form></div></div></div></div></section>
<section class="je-section je-section-soft"><div class="container"><div class="je-bottom-cta"><div class="row align-items-center"><div class="col-md-8"><h2>Need more information?</h2><p>Talk to Jaipur Engineers for current details, guidance and next steps.</p></div><div class="col-md-4 text-md-right"><a href="#enquiry" class="je-primary-btn">Send Enquiry</a></div></div></div></div></section>
</main>
<div class="je-mobile-cta"><a href="tel:+919587779071"><i class="fa fa-phone mr-1"></i> Call</a><a href="#enquiry"><i class="fa fa-paper-plane mr-1"></i> Enquire</a></div>
<?php include __DIR__ . '/footer.php'; ?>
</body></html>
