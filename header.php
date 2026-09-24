<?php
require_once __DIR__ . '/includes/business.php';
// Jaipur Engineers Header Navigation
$currentPage = basename($_SERVER['PHP_SELF']);

$menuActive = static function (array $pages) use ($currentPage): string {
    return in_array($currentPage, $pages, true) ? ' current-menu-item' : '';
};

$coursePages = [
    'courses.php',
    'programming-language-courses-jaipur.php',
    'python-programming-course-jaipur.php',
    'java-programming-course-jaipur.php',
    'c-programming-course-jaipur.php',
    'c-plus-plus-course-jaipur.php',
    'javascript-course-jaipur.php',
    'php-course-jaipur.php',
    'c-sharp-course-jaipur.php',
    'full-stack-development-course-jaipur.php',
    'mern-stack-course-jaipur.php',
    'mean-stack-course-jaipur.php',
    'java-full-stack-course-jaipur.php',
    'python-full-stack-course-jaipur.php',
    'dotnet-full-stack-course-jaipur.php',
    'react-js-course-jaipur.php',
    'angular-course-jaipur.php',
    'node-js-course-jaipur.php',
    'next-js-course-jaipur.php',
    'java-courses-jaipur.php',
    'core-java-course-jaipur.php',
    'advanced-java-course-jaipur.php',
    'jdbc-course-jaipur.php',
    'servlets-jsp-course-jaipur.php',
    'spring-framework-course-jaipur.php',
    'spring-boot-course-jaipur.php',
    'spring-mvc-course-jaipur.php',
    'hibernate-course-jaipur.php',
    'jpa-course-jaipur.php',
    'java-microservices-course-jaipur.php',
    'java-rest-api-course-jaipur.php',
    'java-design-patterns-course-jaipur.php',
    'java-multithreading-course-jaipur.php',
    'java-testing-course-jaipur.php',
    'helidon-course-jaipur.php',
    'big-data-java-course-jaipur.php',
    'hadoop-course-jaipur.php',
    'kafka-java-course-jaipur.php',
    'java-interview-preparation-jaipur.php',
    'data-science-course-jaipur.php',
    'data-analytics-course-jaipur.php',
    'business-analytics-course-jaipur.php',
    'machine-learning-course-jaipur.php',
    'artificial-intelligence-course-jaipur.php',
    'generative-ai-course-jaipur.php',
    'power-bi-course-jaipur.php',
    'cloud-computing-course-jaipur.php',
    'aws-course-jaipur.php',
    'azure-course-jaipur.php',
    'google-cloud-course-jaipur.php',
    'devops-course-jaipur.php',
    'docker-course-jaipur.php',
    'kubernetes-course-jaipur.php',
    'cyber-security-course-jaipur.php',
    'ethical-hacking-course-jaipur.php',
    'ceh-course-jaipur.php',
    'soc-analyst-course-jaipur.php',
    'penetration-testing-course-jaipur.php',
    'network-security-course-jaipur.php',
    'software-testing-course-jaipur.php',
    'manual-testing-course-jaipur.php',
    'automation-testing-course-jaipur.php',
    'selenium-course-jaipur.php',
    'api-testing-course-jaipur.php',
    'playwright-course-jaipur.php',
    'digital-marketing-course-jaipur.php',
    'seo-course-jaipur.php',
    'google-ads-course-jaipur.php',
    'social-media-marketing-course-jaipur.php',
    'content-marketing-course-jaipur.php',
    'email-marketing-course-jaipur.php',
    'ui-ux-design-course-jaipur.php',
    'figma-course-jaipur.php',
    'graphic-design-course-jaipur.php',
    'mobile-app-development-course-jaipur.php',
    'android-course-jaipur.php',
    'kotlin-course-jaipur.php',
    'flutter-course-jaipur.php',
    'react-native-course-jaipur.php',
    'ios-app-development-course-jaipur.php',
    'networking-course-jaipur.php',
    'ccna-course-jaipur.php',
    'ccnp-course-jaipur.php',
    'linux-course-jaipur.php',
    'windows-server-course-jaipur.php',
    'other-it-courses-jaipur.php',
    'advanced-excel-course-jaipur.php',
    'sql-course-jaipur.php',
    'personality-development-course-jaipur.php',
    'ai-tools-course-jaipur.php'
];

$aboutPages = [
    'about-us.php',
    'about-institute.php',
    'mission-vision.php',
    'why-choose-forsk.php',
    'our-trainers.php',
    'success-stories.php',
    'testimonials.php',
    'placement-partners.php',
    'gallery.php',
    'faqs.php'
];

$diplomaPages = [
    'diploma-programs-jaipur.php',
    'diploma-full-stack-development-jaipur.php',
    'diploma-data-science-ai-jaipur.php',
    'diploma-python-programming-jaipur.php',
    'diploma-java-programming-jaipur.php',
    'diploma-digital-marketing-jaipur.php',
    'diploma-cyber-security-jaipur.php',
    'diploma-cloud-computing-jaipur.php',
    'diploma-data-analytics-jaipur.php'
];

$internshipPages = [
    'internship-programs-jaipur.php',
    'summer-internship-jaipur.php',
    'winter-internship-jaipur.php',
    'industrial-training-jaipur.php',
    'live-project-training-jaipur.php',
    'final-year-projects-jaipur.php'
];

$placementPages = [
    'placements.php',
    'placement-assistance.php',
    'hiring-partners.php',
    'student-placements.php',
    'placement-process.php'
];

$resourcePages = [
    'resources.php',
    'corporate-training-jaipur.php',
    'blog.php',
    'interview-questions.php',
    'career-guides.php',
    'free-tutorials.php',
    'events.php'
];

$contactPages = [
    'college-admission-guidance-jaipur.php',
    'contact-us.php',
    'branches.php',
    'enquiry.php',
    'support.php'
];
?>

<!-- Preloader area start -->
<div id="loader" class="loader orange-color">
    <div class="loader-container">
        <div class="loader-icon">
            <img src="assets/images/pre-logo1.png" alt="Jaipur Engineers">
        </div>
    </div>
</div>
<!-- Preloader area end -->

<!-- Full width header start -->
<div class="full-width-header header-style1 home1-modifiy home14-style">
    <header id="rs-header" class="rs-header">

        <!-- Topbar Area Start -->
        <div class="topbar-area home11-topbar modify1">
            <div class="container-fluid p-2 w-100">
                <div class="row y-middle">
                    <div class="col-md-5">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:<?php echo je_business_text('email'); ?>" aria-label="Email Jaipur Engineers">
                                    <?php echo je_business_text('email'); ?>
                                </a>
                            </li>
                            <li>
                                <i class="fa flaticon-call"></i>
                                <a href="tel:<?php echo je_business_text('phone'); ?>" aria-label="Call Jaipur Engineers">
                                    <?php echo je_business_text('phone_display'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 text-right">
                        <ul class="toolbar-sl-share">
                            <li class="opening">
                                <i class="flaticon-location"></i>
                                <a href="<?php echo je_business_text('maps'); ?>"><?php echo je_business_text('address'); ?></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/JaipurEngineersTrainings/" target="_blank"
                                    rel="noopener noreferrer" aria-label="Jaipur Engineers on Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/Jaipur_Engineer" target="_blank" rel="noopener noreferrer"
                                    aria-label="Jaipur Engineers on X">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/jaipurengineers" target="_blank"
                                    rel="noopener noreferrer" aria-label="Jaipur Engineers on LinkedIn">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/jaipurengineerstrainings/" target="_blank"
                                    rel="noopener noreferrer" aria-label="Jaipur Engineers on Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@JaipurEngineers" target="_blank"
                                    rel="noopener noreferrer" aria-label="Jaipur Engineers on YouTube">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container-fluid p-3 w-100">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo-cat-wrap">
                            <div class="logo-part">
                                <a href="index" aria-label="Jaipur Engineers Home">
                                    <img src="assets/images/dark-logo.png"
                                        alt="Jaipur Engineers - IT Training Institute in Jaipur">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle" role="button" tabindex="0" aria-controls="main-navigation" aria-expanded="false" aria-label="Open navigation menu">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>

                                <nav id="main-navigation" class="rs-menu" aria-label="Main Navigation">
                                    <ul class="nav-menu">

                                        <!-- Home -->
                                        <!--  <li class="<?= $menuActive(['index.php']) ?>">
                                            <a href="index">Home</a>
                                        </li>
-->
                                        <!-- About -->
                                        <li class="menu-item-has-children<?= $menuActive($aboutPages) ?>">
                                            <a href="about-us">About Us</a>
                                            <ul class="sub-menu">
                                                <li><a href="about-institute">About Institute</a></li>
                                                <li><a href="mission-vision">Mission &amp; Vision</a></li>
                                                <li><a href="why-choose-forsk">Why Choose Jaipur Engineers</a></li>
                                                <li><a href="our-trainers">Our Trainers</a></li>
                                                <li><a href="success-stories">Success Stories</a></li>
                                                <li><a href="testimonials">Testimonials</a></li>
                                                <li><a href="placement-partners">Placement Partners</a></li>
                                                <li><a href="gallery">Gallery</a></li>
                                                <li><a href="faqs">FAQs</a></li>
                                            </ul>
                                        </li>

                                        <!-- Courses -->
                                        <li class="menu-item-has-children<?= $menuActive($coursePages) ?>">
                                            <a href="courses">Courses</a>
                                            <ul class="sub-menu">

                                                <!-- Programming Languages -->
                                                <li class="menu-item-has-children">
                                                    <a href="programming-language-courses-jaipur">Programming
                                                        Languages</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="python-programming-course-jaipur">Python
                                                                Programming</a></li>
                                                        <li><a href="java-programming-course-jaipur">Java
                                                                Programming</a></li>
                                                        <li><a href="c-programming-course-jaipur">C Programming</a>
                                                        </li>
                                                        <li><a href="c-plus-plus-course-jaipur">C++ Programming</a>
                                                        </li>
                                                        <li><a href="javascript-course-jaipur">JavaScript</a></li>
                                                        <li><a href="php-course-jaipur">PHP</a></li>
                                                        <li><a href="c-sharp-course-jaipur">C#</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Full Stack Development -->
                                                <li class="menu-item-has-children">
                                                    <a href="full-stack-development-course-jaipur">Full Stack
                                                        Development</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="mern-stack-course-jaipur">MERN Stack</a></li>
                                                        <li><a href="mean-stack-course-jaipur">MEAN Stack</a></li>
                                                        <li><a href="java-full-stack-course-jaipur">Java Full
                                                                Stack</a></li>
                                                        <li><a href="python-full-stack-course-jaipur">Python Full
                                                                Stack</a></li>
                                                        <li><a href="dotnet-full-stack-course-jaipur">ASP.NET Full
                                                                Stack</a></li>
                                                        <li><a href="react-js-course-jaipur">React.js</a></li>
                                                        <li><a href="angular-course-jaipur">Angular</a></li>
                                                        <li><a href="node-js-course-jaipur">Node.js</a></li>
                                                        <li><a href="next-js-course-jaipur">Next.js</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Java Courses -->
                                                <li class="menu-item-has-children">
                                                    <a href="java-courses-jaipur">Java Courses</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="core-java-course-jaipur">Core Java (J2SE)</a>
                                                        </li>
                                                        <li><a href="advanced-java-course-jaipur">Advanced Java</a>
                                                        </li>
                                                        <li><a href="jdbc-course-jaipur">JDBC</a></li>
                                                        <li><a href="servlets-jsp-course-jaipur">Servlets &amp;
                                                                JSP</a></li>
                                                        <li><a href="spring-framework-course-jaipur">Spring
                                                                Framework</a></li>
                                                        <li><a href="spring-boot-course-jaipur">Spring Boot</a></li>
                                                        <li><a href="spring-mvc-course-jaipur">Spring MVC</a></li>
                                                        <li><a href="hibernate-course-jaipur">Hibernate</a></li>
                                                        <li><a href="jpa-course-jaipur">JPA</a></li>
                                                        <li><a href="java-microservices-course-jaipur">Java
                                                                Microservices</a></li>
                                                        <li><a href="java-rest-api-course-jaipur">Java REST API</a>
                                                        </li>
                                                        <li><a href="java-full-stack-course-jaipur">Java Full
                                                                Stack</a></li>
                                                        <li><a href="java-design-patterns-course-jaipur">Java Design
                                                                Patterns</a></li>
                                                        <li><a href="java-multithreading-course-jaipur">Java
                                                                Multithreading</a></li>
                                                        <li><a href="java-testing-course-jaipur">Java Testing</a>
                                                        </li>
                                                        <li><a href="helidon-course-jaipur">Helidon</a></li>
                                                        <li><a href="big-data-java-course-jaipur">Big Data with
                                                                Java</a></li>
                                                        <li><a href="hadoop-course-jaipur">Hadoop</a></li>
                                                        <li><a href="kafka-java-course-jaipur">Kafka with Java</a>
                                                        </li>
                                                        <li><a href="java-interview-preparation-jaipur">Java
                                                                Interview Preparation</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Data Science & AI -->
                                                <li class="menu-item-has-children">
                                                    <a href="data-science-course-jaipur">Data Science &amp; AI</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="data-analytics-course-jaipur">Data
                                                                Analytics</a></li>
                                                        <li><a href="business-analytics-course-jaipur">Business
                                                                Analytics</a></li>
                                                        <li><a href="data-science-course-jaipur">Data Science</a>
                                                        </li>
                                                        <li><a href="machine-learning-course-jaipur">Machine
                                                                Learning</a></li>
                                                        <li><a href="artificial-intelligence-course-jaipur">Artificial
                                                                Intelligence</a></li>
                                                        <li><a href="generative-ai-course-jaipur">Generative AI</a>
                                                        </li>
                                                        <li><a href="power-bi-course-jaipur">Power BI</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Cloud Computing -->
                                                <li class="menu-item-has-children">
                                                    <a href="cloud-computing-course-jaipur">Cloud Computing</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="aws-course-jaipur">AWS</a></li>
                                                        <li><a href="azure-course-jaipur">Microsoft Azure</a></li>
                                                        <li><a href="google-cloud-course-jaipur">Google Cloud</a>
                                                        </li>
                                                        <li><a href="devops-course-jaipur">DevOps</a></li>
                                                        <li><a href="docker-course-jaipur">Docker</a></li>
                                                        <li><a href="kubernetes-course-jaipur">Kubernetes</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Cyber Security -->
                                                <li class="menu-item-has-children">
                                                    <a href="cyber-security-course-jaipur">Cyber Security</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="ethical-hacking-course-jaipur">Ethical
                                                                Hacking</a></li>
                                                        <li><a href="ceh-course-jaipur">CEH</a></li>
                                                        <li><a href="soc-analyst-course-jaipur">SOC Analyst</a></li>
                                                        <li><a href="penetration-testing-course-jaipur">Penetration
                                                                Testing</a></li>
                                                        <li><a href="network-security-course-jaipur">Network
                                                                Security</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Software Testing -->
                                                <li class="menu-item-has-children">
                                                    <a href="software-testing-course-jaipur">Software Testing</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="manual-testing-course-jaipur">Manual
                                                                Testing</a></li>
                                                        <li><a href="automation-testing-course-jaipur">Automation
                                                                Testing</a></li>
                                                        <li><a href="selenium-course-jaipur">Selenium</a></li>
                                                        <li><a href="api-testing-course-jaipur">API Testing</a></li>
                                                        <li><a href="playwright-course-jaipur">Playwright</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Digital Marketing -->
                                                <li class="menu-item-has-children">
                                                    <a href="digital-marketing-course-jaipur">Digital Marketing</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="seo-course-jaipur">SEO</a></li>
                                                        <li><a href="google-ads-course-jaipur">Google Ads</a></li>
                                                        <li><a href="social-media-marketing-course-jaipur">Social
                                                                Media Marketing</a></li>
                                                        <li><a href="content-marketing-course-jaipur">Content
                                                                Marketing</a></li>
                                                        <li><a href="email-marketing-course-jaipur">Email
                                                                Marketing</a></li>
                                                    </ul>
                                                </li>

                                                <!-- UI / UX Designing -->
                                                <li class="menu-item-has-children">
                                                    <a href="ui-ux-design-course-jaipur">UI / UX Designing</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="ui-ux-design-course-jaipur">UI/UX Design</a>
                                                        </li>
                                                        <li><a href="figma-course-jaipur">Figma</a></li>
                                                        <li><a href="graphic-design-course-jaipur">Graphic
                                                                Design</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Mobile App Development -->
                                                <li class="menu-item-has-children">
                                                    <a href="mobile-app-development-course-jaipur">Mobile App
                                                        Development</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="android-course-jaipur">Android</a></li>
                                                        <li><a href="kotlin-course-jaipur">Kotlin</a></li>
                                                        <li><a href="flutter-course-jaipur">Flutter</a></li>
                                                        <li><a href="react-native-course-jaipur">React Native</a>
                                                        </li>
                                                        <li><a href="ios-app-development-course-jaipur">iOS</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Networking -->
                                                <li class="menu-item-has-children">
                                                    <a href="networking-course-jaipur">Networking</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="ccna-course-jaipur">CCNA</a></li>
                                                        <li><a href="ccnp-course-jaipur">CCNP</a></li>
                                                        <li><a href="linux-course-jaipur">Linux</a></li>
                                                        <li><a href="windows-server-course-jaipur">Windows
                                                                Server</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Others -->
                                                <li class="menu-item-has-children">
                                                    <a href="other-it-courses-jaipur">Other IT Courses</a>
                                                    <ul class="sub-menu right">
                                                        <li><a href="advanced-excel-course-jaipur">Advanced
                                                                Excel</a></li>
                                                        <li><a href="sql-course-jaipur">SQL</a></li>
                                                        <li><a href="personality-development-course-jaipur">Personality
                                                                Development</a></li>
                                                        <li><a href="ai-tools-course-jaipur">AI Productivity
                                                                Tools</a></li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>

                                        <!-- Diploma Programs -->
                                        <li class="menu-item-has-children<?= $menuActive($diplomaPages) ?>">
                                            <a href="diploma-programs-jaipur">Diploma</a>
                                            <ul class="sub-menu">
                                                <li><a href="diploma-full-stack-development-jaipur">Diploma in Full
                                                        Stack Development</a></li>
                                                <li><a href="diploma-data-science-ai-jaipur">Diploma in Data Science
                                                        &amp; AI</a></li>
                                                <li><a href="diploma-python-programming-jaipur">Diploma in Python
                                                        Programming</a></li>
                                                <li><a href="diploma-java-programming-jaipur">Diploma in Java
                                                        Programming</a></li>
                                                <li><a href="diploma-digital-marketing-jaipur">Diploma in Digital
                                                        Marketing</a></li>
                                                <li><a href="diploma-cyber-security-jaipur">Diploma in Cyber
                                                        Security</a></li>
                                                <li><a href="diploma-cloud-computing-jaipur">Diploma in Cloud
                                                        Computing</a></li>
                                                <li><a href="diploma-data-analytics-jaipur">Diploma in Data
                                                        Analytics</a></li>
                                            </ul>
                                        </li>

                                        <!-- Internship Programs -->
                                        <li class="menu-item-has-children<?= $menuActive($internshipPages) ?>">
                                            <a href="internship-programs-jaipur">Internships</a>
                                            <ul class="sub-menu">
                                                <li><a href="summer-internship-jaipur">Summer Internship</a></li>
                                                <li><a href="winter-internship-jaipur">Winter Internship</a></li>
                                                <li><a href="industrial-training-jaipur">Industrial Training</a>
                                                </li>
                                                <li><a href="live-project-training-jaipur">Live Projects</a></li>
                                                <li><a href="final-year-projects-jaipur">Final Year Projects</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Placements -->
                                        <li class="menu-item-has-children<?= $menuActive($placementPages) ?>">
                                            <a href="placements">Placements</a>
                                            <ul class="sub-menu">
                                                <li><a href="placement-assistance">Placement Assistance</a></li>
                                                <li><a href="hiring-partners">Hiring Partners</a></li>
                                                <li><a href="student-placements">Student Placements</a></li>
                                                <li><a href="placement-process">Placement Process</a></li>
                                            </ul>
                                        </li>

                                        <!-- Resources -->
                                        <li class="menu-item-has-children<?= $menuActive($resourcePages) ?>">
                                            <a href="resources">Resources</a>
                                            <ul class="sub-menu">
                                                <li><a href="corporate-training-jaipur">Corporate Training</a></li>
                                                <li><a href="blog">Blog</a></li>
                                                <li><a href="interview-questions">Interview Questions</a></li>
                                                <li><a href="career-guides">Career Guides</a></li>
                                                <li><a href="free-tutorials">Free Tutorials</a></li>
                                                <li><a href="events">Events &amp; Webinars</a></li>
                                            </ul>
                                        </li>

                                        <!-- Contact -->
                                        <li class="menu-item-has-children<?= $menuActive($contactPages) ?>">
                                            <a href="contact-us">Contact</a>
                                            <ul class="sub-menu">
                                                <li><a href="branches">All Branches</a></li>
                                                <li><a href="enquiry">Enquiry</a></li>
                                                <li><a href="college-admission-guidance-jaipur">College Admission Guidance</a></li>
                                                <li><a href="support">Support</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Header actions -->

                    <!--
                    <div class="col-lg-2 text-right">
                        <div class="expand-btn-inner">
                            <ul>
                                <li>
                                    <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal"
                                        href="#" aria-label="Search Jaipur Engineers">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="readon2 cta-btn" href="enquiry">Enquire Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
-->

                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md" aria-label="Quick Navigation">
            <div class="close-btn">
                <div id="nav-close">
                    <div class="line">
                        <span class="line1"></span><span class="line2"></span>
                    </div>
                </div>
            </div>

            <div class="canvas-logo">
                <a href="index">
                    <img src="assets/images/logo-dark.png" alt="Jaipur Engineers">
                </a>
            </div>

            <div class="offcanvas-text">
                <p>
                    Jaipur Engineers is an IT training, internship and career-focused skill development institute in
                    Jaipur,
                    helping students build practical technology skills through industry-oriented learning.
                </p>
            </div>

            <div class="canvas-contact">
                <ul>
                    <li><a href="about-us">About Jaipur Engineers</a></li>
                    <li><a href="courses">Explore IT Courses</a></li>
                    <li><a href="internship-programs-jaipur">Internship Programs</a></li>
                    <li><a href="placements">Placement Assistance</a></li>
                    <li><a href="contact-us">Contact Us</a></li><li><a href="college-admission-guidance-jaipur">College Admission Guidance</a></li>
                </ul>

                <ul class="social">
                    <li>
                        <a href="https://www.facebook.com/JaipurEngineersTrainings/" target="_blank"
                            rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/Jaipur_Engineer" target="_blank" rel="noopener noreferrer"
                            aria-label="X">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/jaipurengineerstrainings/" target="_blank"
                            rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/jaipurengineers" target="_blank"
                            rel="noopener noreferrer" aria-label="LinkedIn">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@JaipurEngineers" target="_blank" rel="noopener noreferrer"
                            aria-label="YouTube">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Canvas Menu end -->

    </header>
</div>
<!-- Full width header end -->
