<?php
function je_news_articles(): array
{
    return [
        'infocomm-india-2026-mumbai' => [
            'title' => 'InfoComm India 2026 Mumbai: AI, Smart Learning and Integrated Technology',
            'date' => 'September 15, 2026',
            'category' => 'Technology Events',
            'description' => 'InfoComm India 2026 in Mumbai brings professional audiovisual, smart learning, digital signage and integrated technology together from September 16–18, 2026.',
            'intro' => 'InfoComm India 2026 is scheduled for September 16–18 at the Jio World Convention Centre in Mumbai. The professional audiovisual and integrated-experience technology event brings technology brands, system integrators and enterprise users together around modern AV and digital infrastructure.',
            'sections' => [
                ['heading' => 'What the event covers', 'text' => 'The 2026 programme includes smart learning spaces, digital signage, broadcast and live-event technology, integrated AV systems and AI-enabled technology solutions.'],
                ['heading' => 'Why it matters to students and developers', 'text' => 'Modern engineering increasingly connects software with physical environments. AI, networking, IoT, digital signage, smart classrooms and immersive systems create opportunities for developers who understand both applications and infrastructure.'],
                ['heading' => 'Event status', 'text' => 'The show begins September 16. Visitors should confirm the current badge and entry requirements through the official organizer before attending.'],
            ],
            'source_name' => 'Official InfoComm India',
            'source_url' => 'https://www.infocomm-india.com/',
        ],
        'ai-connect-india-2026' => [
            'title' => 'AI Connect India 2026: Free Online AI Builder Session Set for September 18',
            'date' => 'September 15, 2026',
            'category' => 'AI Events',
            'description' => 'AI Connect India 2026 brings Indian AI founders, developers, students and creators together online for an AI builder session on September 18, 2026.',
            'intro' => 'AI Connect India 2026 is bringing AI founders, developers, students, creators and technology professionals together online. The September 18 session is scheduled for 7 PM IST and includes a featured builder talk followed by live Q&A and community networking.',
            'sections' => [
                ['heading' => 'Why the builder community matters', 'text' => 'India\'s AI ecosystem is expanding beyond large technology companies. Online builder communities give students and developers a practical way to learn from people shipping AI products, exchange ideas and discover new project opportunities without travel.'],
                ['heading' => 'What developers can take away', 'list' => ['Practical AI product-building lessons','Exposure to current AI startup ideas','Community networking with Indian builders','Questions and discussion around real-world AI development']],
                ['heading' => 'Event status', 'text' => 'The session is scheduled for September 18 at 7 PM IST. Readers should verify the current online registration details with the event organizer before joining.'],
            ],
            'source_name' => 'OneShopAI Community',
            'source_url' => 'https://oneshopai.com/',
        ],
        'ai-adyen-bengaluru-2026' => [
            'title' => 'AI@Adyen Bengaluru 2026: Engineers to Explore AI-Powered Development and FinTech',
            'date' => 'September 15, 2026',
            'category' => 'AI & FinTech',
            'description' => 'AI@Adyen Bengaluru on September 22, 2026 explores AI-powered software development, payment integration and the future of fintech engineering.',
            'intro' => 'AI@Adyen: Transforming the Fintech Landscape is scheduled for September 22, 2026, in Bengaluru. The technical evening explores how AI is used in fintech engineering and includes a live coding demonstration covering specification-driven development and payment integration.',
            'sections' => [
                ['heading' => 'Why this matters', 'text' => 'AI-assisted development is increasingly moving into production software teams. Combining AI workflows with payment APIs also highlights the engineering requirements around reliability, security and developer productivity in financial technology.'],
                ['heading' => 'Topics developers should watch', 'list' => ['AI-assisted software development','Specification-driven development','Payment API integration','Production fintech engineering']],
                ['heading' => 'Event status', 'text' => 'The event is scheduled for September 22 in Bengaluru. Attendance is limited, so readers should verify the latest registration and venue-access requirements on the organizer\'s event page.'],
            ],
            'source_name' => 'Official Adyen',
            'source_url' => 'https://www.adyen.com/',
        ],
        'emberground-ai-hackathon-2026' => [
            'title' => 'EmberGround AI Hackathon 2026 Bengaluru: Builders to Create Autonomous AI Systems',
            'date' => 'September 15, 2026',
            'category' => 'Hackathon Events',
            'description' => 'EmberGround AI Hackathon 2026 in Bengaluru is scheduled for September 27 and focuses on autonomous AI systems, agentic workflows and AI engineering.',
            'intro' => 'EmberGround AI Hackathon 2026 is scheduled for September 27 in Bengaluru. The builder-focused event targets full-stack and backend engineers, AI/ML engineers and technical founders interested in autonomous systems and intelligent applications.',
            'sections' => [
                ['heading' => 'What builders can expect', 'text' => 'The hackathon emphasizes practical AI product development, foundation-model integration, autonomous workflows and technical experimentation. Participants can also benefit from mentorship and developer tooling or API resources described by the organizer.'],
                ['heading' => 'Why it matters to developers', 'text' => 'Agentic AI is changing application architecture: modern systems increasingly need tool use, workflow orchestration, state management, evaluation and reliable execution. A focused hackathon provides a rapid environment to turn these concepts into working prototypes.'],
                ['heading' => 'Event status', 'text' => 'The published event capacity is limited and approval may be required. Developers should confirm current registration requirements, team rules and participation status before applying.'],
            ],
            'source_name' => 'Event organizer listing',
            'source_url' => 'https://lu.ma/',
        ],
    ];
}

function je_news_article(string $slug): ?array
{
    $articles = je_news_articles();
    return $articles[$slug] ?? null;
}
?>