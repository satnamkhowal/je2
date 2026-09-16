<?php
$quickCourse = $quickCourse ?? [];
$slug = (string)($quickCourse['slug'] ?? basename($_SERVER['PHP_SELF'] ?? 'course.php'));
$name = (string)($quickCourse['name'] ?? 'IT Course in Jaipur');
$chips = $quickCourse['chips'] ?? ['Practical Skills', 'Projects', 'Career Preparation'];
$category = (string)($quickCourse['category'] ?? 'IT Training');
$icon = (string)($quickCourse['icon'] ?? 'fa-code');
$image = (string)($quickCourse['image'] ?? 'assets/images/courses/home14/1.jpg');
$kicker = (string)($quickCourse['kicker'] ?? ($category . ' in Jaipur'));
$lead = (string)($quickCourse['lead'] ?? ('Learn ' . preg_replace('/ Course in Jaipur$/', '', $name) . ' through practical, trainer-guided learning, assignments and project-oriented training at Jaipur Engineers.'));
$modules = $quickCourse['modules'] ?? [];
if (!$modules) {
    $modules[] = 'Foundations, setup and core concepts';
    foreach (array_slice($chips, 0, 5) as $chip) {
        $modules[] = $chip . ' concepts and guided practice';
    }
    $modules[] = 'Practical integration and assignments';
    $modules[] = 'Project work and interview preparation';
}
$projects = $quickCourse['projects'] ?? [
    'Topic-wise practical assignments',
    'Guided mini project',
    'Real-world workflow exercise',
    'Final portfolio project',
];
$roles = $quickCourse['roles'] ?? [
    $category . ' Trainee',
    'Junior Developer / Associate',
    'Project Trainee',
    'Entry-Level IT Professional',
];
$course = compact('slug','name','kicker','icon','image','lead','chips','modules','projects','roles');
include __DIR__ . '/course-page-extra-template.php';
?>
