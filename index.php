<?php
require_once __DIR__ . '/course-page-data.php';
$homeCourseGroups = [
    'full-stack-development' => 'filter1',
    'java-full-stack' => 'filter1 filter2',
    'python-programming' => 'filter2',
    'data-science' => 'filter3',
    'cloud-computing' => 'filter4',
    'cyber-security' => 'filter4',
];
$homeCourses = je_course_pages();
$homeCourseItems = [];
foreach ($homeCourseGroups as $key => $groups) {
    $item = $homeCourses[$key];
    $homeCourseItems[] = [
        '@type' => 'ListItem',
        'position' => count($homeCourseItems) + 1,
        'name' => $item['h1'],
        'url' => 'https://jaipurengineers.com/' . preg_replace('/\\.php$/i', '', $item['slug']),
    ];
}
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary SEO -->
    <title>Software & IT Training Institute in Jaipur | Jaipur Engineers</title>
    <meta name="description" content="Explore Java, Python, Full Stack, Data Science and IT courses in Mansarovar, Jaipur. Learn through practical projects, internships and career guidance.">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <link rel="canonical" href="https://jaipurengineers.com/">

    <!-- Open Graph / Social -->
    <meta property="og:locale" content="en_IN">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Jaipur Engineers">
    <meta property="og:title" content="Software & IT Training Institute in Jaipur | Jaipur Engineers">
    <meta property="og:description" content="Explore Java, Python, Full Stack, Data Science and IT courses in Mansarovar, Jaipur. Learn through practical projects, internships and career guidance.">
    <meta property="og:url" content="https://jaipurengineers.com/">
    <!-- Reuse the existing homepage hero image for social previews. -->
    <meta property="og:image" content="https://jaipurengineers.com/assets/images/banner/home14/img.png">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="560">
    <meta property="og:image:alt" content="Jaipur Engineers IT training institute in Jaipur offering practical technology courses">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Software & IT Training Institute in Jaipur | Jaipur Engineers">
    <meta name="twitter:description" content="Explore Java, Python, Full Stack, Data Science and IT courses in Mansarovar, Jaipur with practical projects, internships and career guidance.">
    <meta name="twitter:image" content="https://jaipurengineers.com/assets/images/banner/home14/img.png">

    <?php include("head.php"); ?>
    <link rel="stylesheet" href="assets/css/home-course-cards.css?v=3">
    <script defer src="assets/js/home-course-cards.js?v=2"></script>
    <script type="application/ld+json"><?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        '@id' => 'https://jaipurengineers.com/#popular-courses',
        'name' => 'Popular IT Courses in Jaipur',
        'numberOfItems' => count($homeCourseItems),
        'itemListElement' => $homeCourseItems,
    ], JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>

    <!-- Organization + Local Business + Website structured data -->
    <script type="application/ld+json">{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://jaipurengineers.com/#webpage",
      "url": "https://jaipurengineers.com/",
      "name": "Software & IT Training Institute in Jaipur | Jaipur Engineers",
      "isPartOf": {
        "@id": "https://jaipurengineers.com/#website"
      },
      "about": {
        "@id": "https://jaipurengineers.com/#organization"
      },
      "description": "Industry-focused IT training in Jaipur since 1996 with practical courses, internships, projects and placement assistance.",
      "inLanguage": "en-IN"
    }
  ]
}</script>
</head>

<body class="defult-home je-home">

<?php include("./header.php"); ?>

<main class="main-content">

    <!-- Hero Section -->
    <div id="rs-banner" class="rs-banner style12">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-50">
                    <div class="banner-content">
                        <span class="sub-text">IT Training Institute in Jaipur • Established 1996</span>
                        <h1 class="title">Build Job-Ready Skills with <span>Practical IT Training</span> in Jaipur</h1>
                        <p class="desc">
                            Learn Full Stack Development, Java, Python, Data Science &amp; AI, Cloud, DevOps, Cyber Security, Software Testing and more through industry-focused training, projects and career guidance at Jaipur Engineers.
                        </p>
                        <div class="btn-part mt-30">
                            <a class="readon2 cta-btn mr-15" href="courses">Explore IT Courses</a>
                            <a class="readon2 cta-btn" href="enquiry">Enquire Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-100 md-pl-15">
                    <div class="banner-img">
                        <img class="js-tilt" src="assets/images/banner/home14/img.png" width="640" height="560" loading="eager" fetchpriority="high" alt="Students learning practical software development at Jaipur Engineers IT training institute in Jaipur">
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Features -->
        <div id="rs-features" class="rs-features style4 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="assets/images/features/icon/3.png" width="64" height="64" loading="lazy" alt="Jaipur Engineers legacy since 1996">
                            </div>
                            <div class="content-part">
                                <h2 class="title h4"><span class="watermark">IT Training Since 1996</span></h2>
                                <p class="dese">A long-standing Jaipur legacy focused on practical technical education.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="assets/images/features/icon/2.png" width="64" height="64" loading="lazy" alt="Practical industry focused IT training">
                            </div>
                            <div class="content-part">
                                <h2 class="title h4"><span class="watermark">Practical, Industry-Focused Learning</span></h2>
                                <p class="dese">Build skills through coding practice, real-world concepts and project-based learning.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="assets/images/features/icon/1.png" width="64" height="64" loading="lazy" alt="Internship and placement assistance at Jaipur Engineers">
                            </div>
                            <div class="content-part">
                                <h2 class="title h4"><span class="watermark">Internship &amp; Career Support</span></h2>
                                <p class="dese">Prepare for real opportunities with internships, projects and placement assistance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Popular Courses -->
    <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color modify1 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title6 text-center mb-40">
                <div class="img-part mb-10"><img src="assets/images/line.png" width="80" height="10" loading="lazy" alt=""></div>
                <span class="sub-text">Career-Focused Technology Training</span>
                <h2 class="title">Popular IT Courses in Jaipur</h2>
                <p>Explore project-based software and IT training in Mansarovar, Jaipur. Compare course topics and choose a learning path that fits your experience and career goals.</p>
            </div>

            <div class="gridFilter style2 text-center mb-30" role="group" aria-label="Filter popular courses">
                <button type="button" class="active" data-filter="*" aria-pressed="true" aria-controls="home-course-grid">All</button>
                <button type="button" data-filter=".filter1" aria-pressed="false" aria-controls="home-course-grid">Full Stack</button>
                <button type="button" data-filter=".filter2" aria-pressed="false" aria-controls="home-course-grid">Java &amp; Python</button>
                <button type="button" data-filter=".filter3" aria-pressed="false" aria-controls="home-course-grid">Data &amp; AI</button>
                <button type="button" data-filter=".filter4" aria-pressed="false" aria-controls="home-course-grid">Cloud &amp; Security</button>
            </div>

            <div id="home-course-grid" class="je-course-grid">
                <?php foreach ($homeCourseGroups as $key => $groups):
                    $homeCourse = $homeCourses[$key];
                    $imageSize = getimagesize(__DIR__ . '/' . $homeCourse['image']);
                ?>
                <article class="je-home-course" data-groups="<?php echo htmlspecialchars($groups, ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="courses-item">
                        <div class="img-part">
                            <a href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $homeCourse['slug']), ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars($homeCourse['image'], ENT_QUOTES, 'UTF-8'); ?>" width="<?php echo $imageSize[0]; ?>" height="<?php echo $imageSize[1]; ?>" loading="lazy" decoding="async" alt="<?php echo htmlspecialchars($homeCourse['h1'] . ' at Jaipur Engineers', ENT_QUOTES, 'UTF-8'); ?>"></a>
                        </div>
                        <div class="content-part">
                            <p class="je-home-course-category"><?php echo htmlspecialchars($homeCourse['category'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <h3 class="title"><a href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $homeCourse['slug']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($homeCourse['h1'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                            <p class="je-home-course-desc"><?php echo htmlspecialchars($homeCourse['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a class="je-home-course-link" href="<?php echo htmlspecialchars(preg_replace('/\\.php$/i', '', $homeCourse['slug']), ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars('Explore ' . $homeCourse['h1'], ENT_QUOTES, 'UTF-8'); ?>">Explore course <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <p class="sr-only" id="home-course-status" role="status" aria-live="polite"></p>

            <div class="sec-title5 text-center mt-40">
                <div class="description title-color">
                    Explore programming, development, data, cloud, security, testing, marketing and design programs.
                    <span><a href="courses">View All IT Courses <i class="flaticon-right-arrow"></i></a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Courses End -->

    <!-- Admissions CTA -->
    <div class="rs-cta home-style14">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12 md-mb-30">
                    <div class="content-part">
                        <span class="sub-text">Start Your IT Career Journey</span>
                        <h2 class="title">Admissions Open for IT Training &amp; Internship Programs in Jaipur</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="btn-part text-right">
                        <a class="readon2 cta-btn" href="enquiry">Talk to Our Training Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div id="rs-categories" class="rs-categories home-style14 pt-100 pb-90 md-pt-70 md-pb-60">
        <div class="container">
            <div class="sec-title6 text-center mb-40">
                <div class="img-part mb-10"><img src="assets/images/line.png" width="80" height="10" loading="lazy" alt=""></div>
                <span class="sub-text">Explore by Technology</span>
                <h2 class="title title2">Top IT Training Categories in Jaipur</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images"><a href="programming-language-courses-jaipur"><img src="assets/images/categories/main-home/1.jpg" width="600" height="400" loading="lazy" alt="Programming language courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/1.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="programming-language-courses-jaipur">Programming Languages</a></h3>
                                <span class="course-qnty">Python, Java, C, C++, JavaScript &amp; more</span>
                                <div class="btn2"><a href="programming-language-courses-jaipur">Explore Programming Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images"><a href="full-stack-development-course-jaipur"><img src="assets/images/categories/main-home/2.jpg" width="600" height="400" loading="lazy" alt="Full Stack Development courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/2.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="full-stack-development-course-jaipur">Full Stack Development</a></h3>
                                <span class="course-qnty">MERN, MEAN, Java, Python, React &amp; Node.js</span>
                                <div class="btn2"><a href="full-stack-development-course-jaipur">Explore Full Stack Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images"><a href="data-science-course-jaipur"><img src="assets/images/data-science-course-jaipur-jaipur-engineers.webp" width="1200" height="675" loading="lazy" alt="Data Science and Artificial Intelligence courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/3.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="data-science-course-jaipur">Data Science &amp; AI</a></h3>
                                <span class="course-qnty">Analytics, ML, AI, Generative AI &amp; Power BI</span>
                                <div class="btn2"><a href="data-science-course-jaipur">Explore Data &amp; AI Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 md-mb-30">
                    <div class="categories-items">
                        <div class="cate-images"><a href="cloud-computing-course-jaipur"><img src="assets/images/cloud-computing-course-jaipur-jaipur-engineers.webp" width="1200" height="675" loading="lazy" alt="Cloud Computing and DevOps courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/4.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="cloud-computing-course-jaipur">Cloud Computing &amp; DevOps</a></h3>
                                <span class="course-qnty">AWS, Azure, Google Cloud, Docker &amp; Kubernetes</span>
                                <div class="btn2"><a href="cloud-computing-course-jaipur">Explore Cloud Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 sm-mb-30">
                    <div class="categories-items">
                        <div class="cate-images"><a href="cyber-security-course-jaipur"><img src="assets/images/cyber-security-course-jaipur-jaipur-engineers.webp" width="1200" height="675" loading="lazy" alt="Cyber Security and Ethical Hacking courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/5.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="cyber-security-course-jaipur">Cyber Security</a></h3>
                                <span class="course-qnty">Ethical Hacking, SOC, Pen Testing &amp; Network Security</span>
                                <div class="btn2"><a href="cyber-security-course-jaipur">Explore Cyber Security Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="categories-items">
                        <div class="cate-images"><a href="software-testing-course-jaipur"><img src="assets/images/software-testing-course-jaipur-jaipur-engineers.webp" width="1200" height="675" loading="lazy" alt="Software Testing courses in Jaipur"></a></div>
                        <div class="contents">
                            <div class="img-part"><img src="assets/images/categories/main-home/icon/6.png" width="64" height="64" loading="lazy" alt=""></div>
                            <div class="content-wrap">
                                <h3 class="title"><a href="software-testing-course-jaipur">Software Testing</a></h3>
                                <span class="course-qnty">Manual, Automation, Selenium, API &amp; Playwright</span>
                                <div class="btn2"><a href="software-testing-course-jaipur">Explore Testing Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- SEO / About Jaipur Engineers -->
    <section class="rs-about pt-100 pb-100 md-pt-70 md-pb-70" aria-labelledby="about-jaipur-engineers">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-40">
                    <div class="sec-title6">
                        <span class="sub-text">Jaipur Engineers • Since 1996</span>
                        <h2 id="about-jaipur-engineers" class="title">Practical IT Training Institute in Jaipur for Career-Focused Learning</h2>
                        <p>
                            Jaipur Engineers was founded in Jaipur with a clear goal: bridge the gap between academic learning and real industry requirements. Our training approach focuses on skills, logic, hands-on practice and real-world problem solving so learners can build stronger foundations for software and technology careers.
                        </p>
                        <p>
                            Students can explore <a href="full-stack-development-course-jaipur">Full Stack Development training in Jaipur</a>, <a href="java-courses-jaipur">Java courses in Jaipur</a>, <a href="data-science-course-jaipur">Data Science &amp; AI training</a>, <a href="cloud-computing-course-jaipur">Cloud Computing programs</a>, <a href="cyber-security-course-jaipur">Cyber Security courses</a> and many other practical technology tracks.
                        </p>
                        <p>
                            Learn more about our <a href="about-institute">institute</a>, <a href="mission-vision">mission and vision</a>, <a href="our-trainers">trainers</a>, <a href="success-stories">student success stories</a> and <a href="faqs">frequently asked questions</a>.
                        </p>
                        <div class="btn-part mt-30"><a class="readon2 cta-btn" href="about-us">About Jaipur Engineers</a></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img">
                        <img src="assets/images/about/tab1.jpg" width="700" height="520" loading="lazy" alt="Students working together on a laptop">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Internship + Placement CTA -->
    <div class="rs-cta effects-layer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="effects-bg apply-bg">
                        <div class="content-part">
                            <h2 class="title">IT Internship Programs in Jaipur</h2>
                            <div class="description mb-27">Gain practical exposure through summer internships, winter internships, industrial training, live projects and final-year project guidance.</div>
                            <div class="btn-part"><a class="readon2 cta-btn" href="internship-programs-jaipur">Explore Internship Programs</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="effects-bg enroll-bg">
                        <div class="content-part">
                            <h2 class="title">Placement Assistance &amp; Career Preparation</h2>
                            <div class="description mb-27">Strengthen interview readiness, practical skills and career preparation with placement-focused guidance and training support.</div>
                            <div class="btn-part"><a class="readon2 cta-btn" href="placement-assistance">Explore Placement Assistance</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <section class="rs-testimonial home14-style pt-100 pb-100 md-pt-70 md-pb-70" aria-labelledby="why-jaipur-engineers">
        <div class="container">
            <div class="sec-title6 text-center mb-40">
                <div class="img-part mb-10"><img src="assets/images/line.png" width="80" height="10" loading="lazy" alt=""></div>
                <span class="sub-text">Skills Before Certificates</span>
                <h2 id="why-jaipur-engineers" class="title title2">Why Choose Jaipur Engineers for IT Training?</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="testi-item">
                        <div class="item-content">
                            <h3>Practical Learning</h3>
                            <p>Focus on coding practice, tools, concepts and project-based learning instead of theory-only training.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="testi-item">
                        <div class="item-content">
                            <h3>Industry-Oriented Curriculum</h3>
                            <p>Technology tracks are structured around real development workflows, modern tools and career-relevant skills.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="testi-item">
                        <div class="item-content">
                            <h3>Career-Focused Guidance</h3>
                            <p>Internships, live projects, interview preparation and placement assistance help learners prepare beyond the classroom.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-20">
                <a class="readon2 cta-btn" href="why-choose-forsk">Why Choose Jaipur Engineers</a>
            </div>
        </div>
    </section>

    <!-- Resources / Internal Link Hub -->
    <section class="rs-partner pb-100 md-pb-70" aria-labelledby="career-resources">
        <div class="container">
            <div class="sec-title6 text-center mb-40">
                <h2 id="career-resources" class="title title2">Career &amp; Learning Resources</h2>
                <p>Continue your learning journey with practical resources from Jaipur Engineers.</p>
            </div>

            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-30"><a href="interview-questions"><strong>Interview Questions</strong></a></div>
                <div class="col-lg-3 col-md-6 mb-30"><a href="career-guides"><strong>Career Guides</strong></a></div>
                <div class="col-lg-3 col-md-6 mb-30"><a href="free-tutorials"><strong>Free Tutorials</strong></a></div>
                <div class="col-lg-3 col-md-6 mb-30"><a href="blog"><strong>IT Training &amp; Career Blog</strong></a></div>
            </div>

            <div class="text-center mt-20">
                <a href="resources">Explore All Jaipur Engineers Resources</a> &nbsp; | &nbsp;
                <a href="events">Events &amp; Webinars</a> &nbsp; | &nbsp;
                <a href="corporate-training-jaipur">Corporate IT Training in Jaipur</a>
            </div>
        </div>
    </section>

</main>

<?php include("./footer.php"); ?>

</body>
</html>
