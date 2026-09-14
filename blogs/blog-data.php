<?php
function je_blog_seed_courses(): array
{
    return [
        ['name' => 'Full Stack Development', 'slug' => 'full-stack-development', 'category' => 'Development', 'link' => 'full-stack-development-course-jaipur.php', 'image' => 'assets/images/blog/1.jpg'],
        ['name' => 'Java Full Stack', 'slug' => 'java-full-stack', 'category' => 'Development', 'link' => 'java-full-stack-course-jaipur.php', 'image' => 'assets/images/blog/2.jpg'],
        ['name' => 'Python Programming', 'slug' => 'python-programming', 'category' => 'Programming', 'link' => 'python-programming-course-jaipur.php', 'image' => 'assets/images/blog/3.jpg'],
        ['name' => 'Python Full Stack', 'slug' => 'python-full-stack', 'category' => 'Development', 'link' => 'python-full-stack-course-jaipur.php', 'image' => 'assets/images/blog/4.jpg'],
        ['name' => 'Data Science', 'slug' => 'data-science', 'category' => 'Data and AI', 'link' => 'data-science-course-jaipur.php', 'image' => 'assets/images/blog/5.jpg'],
        ['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'category' => 'Data and AI', 'link' => 'artificial-intelligence-course-jaipur.php', 'image' => 'assets/images/blog/6.jpg'],
        ['name' => 'Cloud Computing', 'slug' => 'cloud-computing', 'category' => 'Cloud', 'link' => 'cloud-computing-course-jaipur.php', 'image' => 'assets/images/blog/inner/1.jpg'],
        ['name' => 'Cyber Security', 'slug' => 'cyber-security', 'category' => 'Security', 'link' => 'cyber-security-course-jaipur.php', 'image' => 'assets/images/blog/inner/2.jpg'],
        ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'category' => 'Marketing', 'link' => 'digital-marketing-course-jaipur.php', 'image' => 'assets/images/blog/inner/3.jpg'],
        ['name' => 'Software Testing', 'slug' => 'software-testing', 'category' => 'Testing', 'link' => 'courses.php?q=software+testing', 'image' => 'assets/images/blog/inner/4.jpg'],
    ];
}

function je_blog_seed_angles(): array
{
    return [
        ['slug' => 'roadmap-for-beginners', 'intent' => 'Career Guides', 'title' => 'Roadmap for Beginners', 'focus' => 'what to learn first, how to practice and how to move from basics to projects'],
        ['slug' => 'skills-required-for-jobs', 'intent' => 'Career Guides', 'title' => 'Skills Required for Jobs', 'focus' => 'core skills, practical tools and project confidence needed before applying'],
        ['slug' => 'course-selection-guide', 'intent' => 'Course Guidance', 'title' => 'Course Selection Guide', 'focus' => 'how students should choose a course based on background and career goal'],
        ['slug' => 'project-ideas-for-students', 'intent' => 'Projects', 'title' => 'Project Ideas for Students', 'focus' => 'project ideas that help learners show real implementation skills'],
        ['slug' => 'interview-preparation-plan', 'intent' => 'Interview Questions', 'title' => 'Interview Preparation Plan', 'focus' => 'concept revision, project explanation and interview practice topics'],
        ['slug' => 'common-mistakes-to-avoid', 'intent' => 'Learning Tips', 'title' => 'Common Mistakes to Avoid', 'focus' => 'mistakes students make while learning and how to avoid them'],
        ['slug' => 'practical-training-benefits', 'intent' => 'Course Guidance', 'title' => 'Practical Training Benefits', 'focus' => 'why hands-on training, assignments and doubt support matter'],
        ['slug' => 'portfolio-building-guide', 'intent' => 'Projects', 'title' => 'Portfolio Building Guide', 'focus' => 'how learners can document projects, GitHub work and resume points'],
        ['slug' => 'career-scope-in-jaipur', 'intent' => 'Career Guides', 'title' => 'Career Scope in Jaipur', 'focus' => 'local career opportunities, internship paths and entry-level preparation'],
        ['slug' => 'weekly-study-plan', 'intent' => 'Learning Tips', 'title' => 'Weekly Study Plan', 'focus' => 'a simple weekly plan for practice, revision, assignments and projects'],
    ];
}

function je_blog_posts(): array
{
    $posts = [];
    $date = new DateTimeImmutable('2026-09-14');
    foreach (je_blog_seed_courses() as $courseIndex => $course) {
        foreach (je_blog_seed_angles() as $angleIndex => $angle) {
            $postDate = $date->sub(new DateInterval('P' . (($courseIndex * 10) + $angleIndex) . 'D'));
            $slug = $course['slug'] . '-' . $angle['slug'] . '-jaipur';
            $posts[$slug] = [
                'slug' => $slug,
                'title' => $course['name'] . ' ' . $angle['title'] . ' in Jaipur',
                'meta' => $course['name'] . ' guide for Jaipur students covering ' . $angle['focus'] . '.',
                'course' => $course['name'],
                'course_slug' => $course['slug'],
                'course_link' => $course['link'],
                'category' => $course['category'],
                'intent' => $angle['intent'],
                'focus' => $angle['focus'],
                'image' => $course['image'],
                'date' => $postDate->format('M d, Y'),
                'read_time' => '5 min read',
            ];
        }
    }
    return $posts;
}

function je_blog_post(?string $slug): ?array
{
    $posts = je_blog_posts();
    return $slug && isset($posts[$slug]) ? $posts[$slug] : null;
}

function je_blog_related(string $slug, int $limit = 6): array
{
    $posts = je_blog_posts();
    $current = $posts[$slug] ?? null;
    if (!$current) {
        return array_slice($posts, 0, $limit, true);
    }
    $related = array_filter($posts, static function (array $post) use ($current, $slug): bool {
        return $post['slug'] !== $slug && ($post['course'] === $current['course'] || $post['intent'] === $current['intent']);
    });
    return array_slice($related, 0, $limit, true);
}
?>