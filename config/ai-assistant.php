<?php
return [
    'assistant_name' => 'JE AI Assistant',
    'welcome' => 'Hi! I can help you explore Jaipur Engineers courses, internships, batches and career-focused training. No paid AI API is used in this version.',
    'quick_actions' => [
        'Find My Course',
        'Full Stack Courses',
        'Data Science & AI',
        'Internship',
        'Placement Assistance',
        'Talk to Counsellor',
    ],
    'popular_questions' => [
        'Which course is best for me?',
        'Full Stack course details',
        'Data Science course details',
        'Python training in Jaipur',
        'Java Full Stack course',
        'Placement assistance available?',
        'Internship available?',
        'Upcoming batch timing',
        'Jaipur branch location',
        'Talk to a counsellor',
    ],
    'rules' => [
        [
            'keywords' => ['find my course', 'which course', 'best course', 'best for me', 'course is best'],
            'answer' => 'I can help narrow the options. Tell me your qualification (for example BCA, BTech, graduate), your interest (coding, data/AI, cloud, cyber security, design or marketing) and whether you prefer online or offline learning. You can also use Get Callback for a counsellor to review your goals.',
            'links' => [
                ['label' => 'All Courses', 'url' => 'courses.php'],
                ['label' => 'Career Guides', 'url' => 'career-guides.php'],
            ],
        ],
        [
            'keywords' => ['full stack', 'web development', 'mern', 'react', 'node'],
            'answer' => 'For web development, you can explore Full Stack Development, MERN Stack, Java Full Stack and Python Full Stack. Tell me your current qualification or preferred technology and I can narrow the options.',
            'links' => [
                ['label' => 'Full Stack Development', 'url' => 'full-stack-development-course-jaipur.php'],
                ['label' => 'MERN Stack', 'url' => 'mern-stack-course-jaipur.php'],
                ['label' => 'Java Full Stack', 'url' => 'java-full-stack-course-jaipur.php'],
            ],
        ],
        [
            'keywords' => ['data science', 'machine learning', 'ai', 'artificial intelligence', 'analytics', 'power bi'],
            'answer' => 'For Data & AI, Jaipur Engineers offers Data Science, Data Analytics, Machine Learning, Generative AI and Power BI learning paths. Your maths/programming background and career goal can help choose the right starting point.',
            'links' => [
                ['label' => 'Data Science', 'url' => 'data-science-course-jaipur.php'],
                ['label' => 'Data Analytics', 'url' => 'data-analytics-course-jaipur.php'],
                ['label' => 'Generative AI', 'url' => 'generative-ai-course-jaipur.php'],
            ],
        ],
        [
            'keywords' => ['python'],
            'answer' => 'Python can be a good starting point for programming, automation, data analytics and data science. You can explore Python Programming or Python Full Stack depending on your goal.',
            'links' => [
                ['label' => 'Python Programming', 'url' => 'python-programming-course-jaipur.php'],
                ['label' => 'Python Full Stack', 'url' => 'python-full-stack-course-jaipur.php'],
            ],
        ],
        [
            'keywords' => ['java', 'spring', 'hibernate'],
            'answer' => 'For Java, you can start with Core Java and move to Advanced Java, Spring, Hibernate and Java Full Stack. Share your current experience if you want a suggested sequence.',
            'links' => [
                ['label' => 'Core Java', 'url' => 'core-java-course-jaipur.php'],
                ['label' => 'Java Full Stack', 'url' => 'java-full-stack-course-jaipur.php'],
                ['label' => 'Spring Boot', 'url' => 'spring-boot-course-jaipur.php'],
            ],
        ],
        [
            'keywords' => ['internship', 'industrial training', 'project training', 'live project'],
            'answer' => 'Internship, industrial training and live-project options are available across supported programs. Availability can vary by batch and technology, so use Get Callback to confirm the current option for your course.',
            'links' => [
                ['label' => 'Internship Programs', 'url' => 'internship-programs-jaipur.php'],
                ['label' => 'Industrial Training', 'url' => 'industrial-training-jaipur.php'],
            ],
        ],
        [
            'keywords' => ['placement', 'job', 'career assistance'],
            'answer' => 'Jaipur Engineers provides placement assistance and career-support activities. Placement assistance is support, not a guaranteed job outcome. You can review the placement pages or request a counsellor callback for current details.',
            'links' => [
                ['label' => 'Placement Assistance', 'url' => 'placement-assistance.php'],
                ['label' => 'Placements', 'url' => 'placements.php'],
            ],
        ],
        [
            'keywords' => ['branch', 'location', 'address', 'mansarovar'],
            'answer' => 'Jaipur Engineers is based in Mansarovar, Jaipur. Open the Branches or Contact page for the latest location and directions.',
            'links' => [
                ['label' => 'Branches', 'url' => 'branches.php'],
                ['label' => 'Contact', 'url' => 'contact-us.php'],
            ],
        ],
        [
            'keywords' => ['batch', 'timing', 'time', 'weekend', 'weekday', 'fees', 'fee', 'price', 'cost'],
            'answer' => 'Batch timings and current fee details can change. I can capture your preferred course, mode and timing so the counselling team can share the current details.',
            'capture_lead' => true,
        ],
        [
            'keywords' => ['counsellor', 'counselor', 'call me', 'callback', 'contact', 'admission'],
            'answer' => 'Sure. Use Get Callback below and share your contact details. Your enquiry will be stored in the Jaipur Engineers lead system.',
            'capture_lead' => true,
        ],
    ],
    'fallback' => 'I can help with courses, internships, placements, batches, branches and counselling. Try one of the suggested questions, or use Get Callback if you want the team to contact you.',
];
