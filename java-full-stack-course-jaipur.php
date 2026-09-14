<?php
/* Java Full Stack landing page: reuses existing head.php, header.php, footer.php and course landing CSS. */
$pageTitle = "Java Full Stack Course in Jaipur | Jaipur Engineers";
$pageDescription = "Join the Java Full Stack Course in Jaipur at Jaipur Engineers. Learn Core Java, Advanced Java, Spring Boot, REST APIs, Hibernate, MySQL, frontend development and practical projects.";
$canonical = "https://jaipurengineers.com/java-full-stack-course-jaipur.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">

    <?php include("head.php"); ?>
    <link rel="stylesheet" href="assets/css/jaipur-engineers-course-landing.css">
    <link rel="stylesheet" href="assets/css/java-full-stack-course-card.css">

    <meta property="og:title" content="Java Full Stack Course in Jaipur | Jaipur Engineers">
    <meta property="og:description" content="Practical Java full stack training in Jaipur with Core Java, Spring Boot, REST APIs, Hibernate, MySQL, frontend skills and real projects.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "name": "Java Full Stack Course in Jaipur",
      "description": "Career-focused Java full stack development training covering Core Java, Advanced Java, Spring Boot, REST APIs, Hibernate, MySQL, frontend development and practical projects.",
      "provider": {
        "@type": "Organization",
        "name": "Jaipur Engineers",
        "url": "https://jaipurengineers.com/"
      },
      "inLanguage": "en",
      "availableLanguage": ["English", "Hindi"],
      "areaServed": {
        "@type": "City",
        "name": "Jaipur"
      }
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Who can join the Java Full Stack Course in Jaipur?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Students, graduates, beginners and working professionals who want to learn Java-based web application development can join. The course starts with Java foundations and moves toward Spring Boot, databases, APIs and projects."
          }
        },
        {
          "@type": "Question",
          "name": "Does this Java Full Stack course include Spring Boot?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. The course includes Spring Boot fundamentals, REST API development, validation, layered architecture, database integration and project workflows."
          }
        },
        {
          "@type": "Question",
          "name": "Are practical projects included?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Learners work on practical assignments and Java full stack projects that combine frontend, backend, database and API concepts."
          }
        },
        {
          "@type": "Question",
          "name": "Is placement assistance available?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Jaipur Engineers provides career-focused training, interview preparation and placement assistance. Hiring depends on learner skills, interview performance, employer needs and market conditions."
          }
        }
      ]
    }
    </script>
</head>

<body class="je-course-page je-java-full-stack-page">

<?php include("./header.php"); ?>

<main>

<section class="je-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="wow fadeInUp" data-wow-delay=".1s">
                    <div class="je-breadcrumb">
                        <a href="index.php">Home</a> / <a href="courses.php">Courses</a> / Java Full Stack
                    </div>
                    <span class="je-kicker">Job-Oriented Java Training in Jaipur</span>
                    <h1>Java Full Stack <span>Course in Jaipur</span></h1>
                    <p class="je-hero-lead">
                        Build complete Java web applications with Core Java, Advanced Java, Spring Boot, REST APIs,
                        Hibernate, MySQL and frontend development. This course is designed for learners who want
                        practical project experience and interview-ready full stack skills.
                    </p>

                    <ul class="je-hero-points">
                        <li><i class="fa fa-code"></i>Core Java to Spring Boot</li>
                        <li><i class="fa fa-server"></i>REST API Development</li>
                        <li><i class="fa fa-database"></i>Hibernate + MySQL</li>
                        <li><i class="fa fa-briefcase"></i>Projects + Interview Prep</li>
                    </ul>

                    <a href="#enquiry" class="je-primary-btn">Book Free Counselling <i class="fa fa-arrow-right ml-2"></i></a>
                    <a href="#curriculum" class="je-outline-btn">View Curriculum</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="je-course-summary-card js-tilt wow fadeInRight" data-wow-delay=".15s">
                    <span class="je-summary-label">Course Snapshot</span>
                    <h3>Java Full Stack Development</h3>
                    <div class="je-summary-row"><strong>Learning Mode</strong><span>Classroom / Guided Training</span></div>
                    <div class="je-summary-row"><strong>Level</strong><span>Beginner to Job-Oriented</span></div>
                    <div class="je-summary-row"><strong>Backend</strong><span>Java, Spring Boot, REST APIs</span></div>
                    <div class="je-summary-row"><strong>Database</strong><span>MySQL, Hibernate, JPA</span></div>
                    <div class="je-summary-row"><strong>Location</strong><span>Mansarovar, Jaipur</span></div>
                    <a href="#enquiry" class="je-primary-btn je-summary-cta">Request Batch Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="je-trust-bar">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-6 col-lg-3 je-trust-item">
                <strong class="rs-count">1996</strong><span>Established in Jaipur</span>
            </div>
            <div class="col-6 col-lg-3 je-trust-item">
                <strong>Java</strong><span>Core to Advanced Path</span>
            </div>
            <div class="col-6 col-lg-3 je-trust-item">
                <strong>Spring</strong><span>Backend Project Skills</span>
            </div>
            <div class="col-6 col-lg-3 je-trust-item">
                <strong>Career</strong><span>Interview Preparation</span>
            </div>
        </div>
    </div>
</section>

<section id="overview" class="je-section">
    <div class="container">
        <div class="je-section-title wow fadeInUp">
            <span class="eyebrow">Course Overview</span>
            <h2>Learn Java full stack development through one connected project workflow.</h2>
            <p>
                This Java Full Stack Course in Jaipur focuses on how enterprise-style web applications are planned,
                coded, connected with databases, exposed through APIs and prepared for interviews.
            </p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-feature-card wow fadeInUp" data-wow-delay=".05s">
                    <div class="je-feature-icon"><i class="fa fa-code"></i></div>
                    <h3>Core Java Foundation</h3>
                    <p>Learn OOP, collections, exception handling, file handling, JDBC basics and Java coding practices.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-feature-card wow fadeInUp" data-wow-delay=".10s">
                    <div class="je-feature-icon"><i class="fa fa-server"></i></div>
                    <h3>Spring Boot Backend</h3>
                    <p>Build structured backend applications using Spring Boot, controllers, services, validation and APIs.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-feature-card wow fadeInUp" data-wow-delay=".15s">
                    <div class="je-feature-icon"><i class="fa fa-database"></i></div>
                    <h3>Database Integration</h3>
                    <p>Work with MySQL, JDBC, Hibernate, JPA, entity mapping, CRUD operations and query logic.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-feature-card wow fadeInUp" data-wow-delay=".20s">
                    <div class="je-feature-icon"><i class="fa fa-laptop"></i></div>
                    <h3>Frontend + Projects</h3>
                    <p>Use HTML, CSS, JavaScript and frontend concepts to connect user interfaces with Java APIs.</p>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="je-tech-list">
                <span class="je-tech-chip"><i class="fa fa-code"></i>Core Java</span>
                <span class="je-tech-chip"><i class="fa fa-cogs"></i>OOP</span>
                <span class="je-tech-chip"><i class="fa fa-database"></i>JDBC</span>
                <span class="je-tech-chip"><i class="fa fa-leaf"></i>Spring Boot</span>
                <span class="je-tech-chip"><i class="fa fa-exchange"></i>REST APIs</span>
                <span class="je-tech-chip"><i class="fa fa-database"></i>Hibernate / JPA</span>
                <span class="je-tech-chip"><i class="fa fa-table"></i>MySQL</span>
                <span class="je-tech-chip"><i class="fa fa-html5"></i>HTML / CSS / JS</span>
                <span class="je-tech-chip"><i class="fa fa-git"></i>Git</span>
            </div>
        </div>
    </div>
</section>

<section class="je-section je-section-soft">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="je-section-title">
                    <span class="eyebrow">Why Java Full Stack?</span>
                    <h2>A practical path for backend-heavy development careers.</h2>
                </div>

                <div class="je-content-card">
                    <h3>What you will be able to build</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="je-check-list">
                                <li>Responsive web pages and form-based interfaces</li>
                                <li>Java programs using OOP and collections</li>
                                <li>Spring Boot backend modules and controllers</li>
                                <li>REST APIs with request validation and responses</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="je-check-list">
                                <li>Database-driven CRUD applications</li>
                                <li>Login, role-based flow and session concepts</li>
                                <li>Hibernate/JPA entity relationships</li>
                                <li>Portfolio-ready Java full stack projects</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="je-content-card">
                    <h3>Who should join?</h3>
                    <p>
                        This course is suitable for BCA, MCA, B.Tech, B.Sc IT, graduates, beginners and working
                        professionals who want to learn Java application development with practical backend and
                        database skills. Learners with basic programming knowledge can move faster, but beginners
                        can start from Java fundamentals.
                    </p>
                </div>

                <div class="je-content-card">
                    <h3>Learning flow</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="je-check-list">
                                <li>Concept clarity</li>
                                <li>Trainer-led examples</li>
                                <li>Daily coding practice</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="je-check-list">
                                <li>Assignments</li>
                                <li>Debugging support</li>
                                <li>Database practice</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="je-check-list">
                                <li>Mini projects</li>
                                <li>Final project</li>
                                <li>Interview revision</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" id="enquiry">
                <div class="je-sidebar">
                    <div class="je-sidebar-card">
                        <h3>Get Java Course Details</h3>
                        <form id="course-enquiry-form" action="enquiry.php" method="get">
                            <input class="je-form-control" type="text" name="name" placeholder="Your Name" required>
                            <input class="je-form-control" type="tel" name="phone" placeholder="Mobile Number" required>
                            <input class="je-form-control" type="email" name="email" placeholder="Email Address">
                            <select class="je-form-control" name="course">
                                <option value="Java Full Stack">Java Full Stack</option>
                                <option value="Core Java">Core Java</option>
                                <option value="Advanced Java">Advanced Java</option>
                                <option value="Spring Boot">Spring Boot</option>
                                <option value="Full Stack Development">Full Stack Development</option>
                            </select>
                            <button type="submit" class="je-primary-btn w-100 border-0">Request Callback</button>
                        </form>
                        <p class="je-sidebar-note">For batch timing, fees, syllabus and counselling. No fake placement guarantees.</p>
                    </div>

                    <div class="je-sidebar-card">
                        <h3>Related Java Courses</h3>
                        <ul class="je-course-links">
                            <li><a href="core-java-course-jaipur.php">Core Java <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="advanced-java-course-jaipur.php">Advanced Java <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="spring-boot-course-jaipur.php">Spring Boot <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="hibernate-course-jaipur.php">Hibernate <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="java-rest-api-course-jaipur.php">Java REST API <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>

                    <div class="je-sidebar-card">
                        <h3>Career Roles</h3>
                        <ul class="je-check-list">
                            <li>Java Developer</li>
                            <li>Backend Developer</li>
                            <li>Full Stack Developer</li>
                            <li>Spring Boot Developer</li>
                            <li>Web Application Developer</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="curriculum" class="je-section">
    <div class="container">
        <div class="je-section-title">
            <span class="eyebrow">Curriculum</span>
            <h2>Java Full Stack course syllabus</h2>
            <p>The syllabus is organized from Java fundamentals to Spring Boot project development, database integration and interview preparation.</p>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div id="courseCurriculum" class="je-curriculum">
                    <div class="card">
                        <div class="card-header">
                            <button data-toggle="collapse" data-target="#module1" aria-expanded="true">
                                <span>Module 01 - Java Programming Foundations</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module1" class="collapse show" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Java setup, JVM/JDK/JRE, data types, operators, control flow, methods, arrays, strings, coding standards and problem-solving practice.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module2">
                                <span>Module 02 - OOP, Collections and Exception Handling</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module2" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Classes, objects, constructors, inheritance, polymorphism, abstraction, interfaces, packages, collections, generics and exception handling.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module3">
                                <span>Module 03 - Database, JDBC and SQL</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module3" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                SQL basics, MySQL tables, CRUD queries, joins, JDBC connection, prepared statements, DAO pattern and database-driven Java programs.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module4">
                                <span>Module 04 - Advanced Java and Web Concepts</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module4" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Servlet lifecycle, JSP basics, MVC structure, request/response handling, sessions, form processing and web application flow.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module5">
                                <span>Module 05 - Spring Framework and Spring Boot</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module5" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Dependency injection, Spring MVC, Spring Boot setup, controllers, services, repositories, validation, configuration and layered architecture.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module6">
                                <span>Module 06 - Hibernate, JPA and REST APIs</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module6" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Entity mapping, relationships, repositories, CRUD APIs, JSON, status codes, exception handling, API testing and backend integration.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module7">
                                <span>Module 07 - Frontend Integration</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module7" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                HTML, CSS, Bootstrap, JavaScript, forms, fetch/API calls, responsive UI basics and connecting frontend screens with Java APIs.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="collapsed" data-toggle="collapse" data-target="#module8">
                                <span>Module 08 - Git, Deployment Basics and Interview Prep</span><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div id="module8" class="collapse" data-parent="#courseCurriculum">
                            <div class="card-body">
                                Git/GitHub workflow, debugging, project documentation, deployment concepts, resume preparation, Java interview questions and final project presentation.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="je-content-card">
                    <h3>Training Approach</h3>
                    <ul class="je-check-list">
                        <li>Concept to demo to hands-on practice</li>
                        <li>Topic-wise assignments and code review</li>
                        <li>Debugging support during project work</li>
                        <li>Mini projects before final application</li>
                        <li>Interview-focused Java revision</li>
                    </ul>
                </div>

                <div class="je-content-card">
                    <h3>Tools Covered</h3>
                    <ul class="je-check-list">
                        <li>JDK, IDE and build basics</li>
                        <li>MySQL and database tools</li>
                        <li>Spring Boot project setup</li>
                        <li>Postman or API testing workflow</li>
                        <li>Git and GitHub basics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="je-section je-section-soft">
    <div class="container">
        <div class="je-section-title">
            <span class="eyebrow">Hands-On Projects</span>
            <h2>Build Java projects that show backend, database and frontend confidence.</h2>
            <p>Project work is designed to help learners explain real application flow during interviews.</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-project">
                    <div class="num">01</div>
                    <h3>Student Management System</h3>
                    <p>Spring Boot CRUD, student records, validation, search, dashboard logic and MySQL integration.</p>
                    <div class="je-project-tags"><span>Spring Boot</span><span>CRUD</span><span>MySQL</span></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-project">
                    <div class="num">02</div>
                    <h3>E-Commerce Backend</h3>
                    <p>Products, categories, cart logic, orders, users, admin operations and REST API flow.</p>
                    <div class="je-project-tags"><span>API</span><span>Orders</span><span>Auth</span></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-project">
                    <div class="num">03</div>
                    <h3>Job Portal Application</h3>
                    <p>Candidate, recruiter and admin workflows with listings, filters and application tracking.</p>
                    <div class="je-project-tags"><span>Roles</span><span>Forms</span><span>JPA</span></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="je-project">
                    <div class="num">04</div>
                    <h3>Final Java Full Stack Project</h3>
                    <p>Plan, code, connect and present a complete Java application using the full learning stack.</p>
                    <div class="je-project-tags"><span>Portfolio</span><span>Git</span><span>Full Stack</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="career" class="je-section je-section-dark">
    <div class="container">
        <div class="je-section-title">
            <span class="eyebrow">Career Preparation</span>
            <h2>Prepare to discuss Java concepts, API logic and project architecture with confidence.</h2>
            <p>Jaipur Engineers focuses on practical understanding, project explanation, interview practice and career guidance.</p>
        </div>

        <div class="row">
            <div class="col-6 col-lg-3 mb-4">
                <div class="je-stat-box"><strong>01</strong><span>Core Java Interview Revision</span></div>
            </div>
            <div class="col-6 col-lg-3 mb-4">
                <div class="je-stat-box"><strong>02</strong><span>Spring Boot API Discussion</span></div>
            </div>
            <div class="col-6 col-lg-3 mb-4">
                <div class="je-stat-box"><strong>03</strong><span>Resume and GitHub Guidance</span></div>
            </div>
            <div class="col-6 col-lg-3 mb-4">
                <div class="je-stat-box"><strong>04</strong><span>Placement Assistance</span></div>
            </div>
        </div>
    </div>
</section>

<section class="je-section">
    <div class="container">
        <div class="je-section-title">
            <span class="eyebrow">Learning Outcomes</span>
            <h2>After completing the Java Full Stack Course</h2>
            <p>Learners should be able to build, test and explain Java-based web applications from frontend to database.</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="je-feature-card">
                    <div class="je-feature-icon"><i class="fa fa-check"></i></div>
                    <h3>Java Logic Building</h3>
                    <p>Understand Java syntax, OOP, collections and exception handling with practical coding exercises.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="je-feature-card">
                    <div class="je-feature-icon"><i class="fa fa-check"></i></div>
                    <h3>Backend Development</h3>
                    <p>Create Spring Boot modules, REST APIs, service layers and database-connected backend features.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="je-feature-card">
                    <div class="je-feature-icon"><i class="fa fa-check"></i></div>
                    <h3>Project Confidence</h3>
                    <p>Build portfolio-ready projects and explain architecture, API flow, database design and debugging decisions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="je-section je-section-soft">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="je-section-title">
                    <span class="eyebrow">FAQs</span>
                    <h2>Questions about the Java Full Stack Course in Jaipur</h2>
                    <p>For exact batch timing, fees and current project options, request counselling.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="accordion je-faq" id="faqAccordion">
                    <div class="card">
                        <div class="card-header"><button data-toggle="collapse" data-target="#faq1">Can a beginner join this Java Full Stack course?</button></div>
                        <div id="faq1" class="collapse show" data-parent="#faqAccordion"><div class="card-body">Yes. The course starts from Java fundamentals and gradually moves toward Advanced Java, Spring Boot, database work and projects.</div></div>
                    </div>
                    <div class="card">
                        <div class="card-header"><button class="collapsed" data-toggle="collapse" data-target="#faq2">Will I learn Spring Boot and REST APIs?</button></div>
                        <div id="faq2" class="collapse" data-parent="#faqAccordion"><div class="card-body">Yes. Spring Boot, REST APIs, validation, controllers, services, repositories and database integration are included in the course flow.</div></div>
                    </div>
                    <div class="card">
                        <div class="card-header"><button class="collapsed" data-toggle="collapse" data-target="#faq3">Does this course include frontend development?</button></div>
                        <div id="faq3" class="collapse" data-parent="#faqAccordion"><div class="card-body">Yes. The course includes HTML, CSS, JavaScript, responsive UI basics and frontend-to-backend API integration concepts.</div></div>
                    </div>
                    <div class="card">
                        <div class="card-header"><button class="collapsed" data-toggle="collapse" data-target="#faq4">Is job placement guaranteed?</button></div>
                        <div id="faq4" class="collapse" data-parent="#faqAccordion"><div class="card-body">No responsible training institute can guarantee a job. Jaipur Engineers supports learners with practical training, interview preparation and placement assistance; actual hiring depends on skills, performance and employer requirements.</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="je-section">
    <div class="container">
        <div class="je-bottom-cta">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2>Ready to start your Java Full Stack learning path?</h2>
                    <p>Speak with Jaipur Engineers for syllabus, batch details and career guidance.</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="#enquiry" class="je-primary-btn">Request Counselling</a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<div class="je-mobile-cta">
    <a href="tel:+919587779071"><i class="fa fa-phone mr-1"></i> Call</a>
    <a href="#enquiry"><i class="fa fa-paper-plane mr-1"></i> Enquire</a>
</div>

<?php include("footer.php"); ?>
</body>
</html>
