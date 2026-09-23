<?php
require_once __DIR__ . '/includes/je-ai-system.php';

function je_form_student_confirmation(array $lead)
{
    $mail = je_ai_runtime_config('mail');
    if (empty($mail['enabled'])) {
        return false;
    }

    $email = je_ai_clean(isset($lead['email']) ? $lead['email'] : '', 180);
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $name = je_ai_clean(isset($lead['name']) ? $lead['name'] : '', 150);
    $course = je_ai_clean(isset($lead['course']) ? $lead['course'] : '', 180);
    $message = je_ai_clean(isset($lead['message']) ? $lead['message'] : '', 1200);
    $pageUrl = je_ai_clean(isset($lead['page_url']) ? $lead['page_url'] : '', 500);

    $courseLabel = $course !== '' ? $course : 'Course Enquiry';
    $courseUrl = $pageUrl !== '' ? $pageUrl : 'https://jaipurengineers.com/courses.php';
    $subject = 'Thanks for contacting Jaipur Engineers - ' . $courseLabel;
    $body = "Hi " . ($name !== '' ? $name : 'there') . ",\n\n"
        . "Thank you for contacting Jaipur Engineers about {$courseLabel}. We have received your enquiry.\n\n"
        . ($message !== '' ? "Your message: {$message}\n" : '')
        . "Course / page details: {$courseUrl}\n\n"
        . "Explore practical training, hands-on projects, mentor guidance, and internship or placement-assistance options available for applicable courses and batches. Our admissions team will contact you with current batch timing, course structure and admission details.\n\n"
        . "Website: https://jaipurengineers.com/\n"
        . "Courses: https://jaipurengineers.com/courses.php\n\n"
        . "Regards,\nJaipur Engineers Admissions Team";

    $mailError = '';
    $sent = je_ai_send_mail($mail, $email, $subject, $body, $mailError);
    if (!$sent && $mailError !== '') {
        error_log('JE website form student mail error: ' . $mailError);
    }
    return $sent;
}

$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$lead = [
    'name' => $isPost ? je_ai_clean($_POST['name'] ?? '', 150) : '',
    'phone' => $isPost ? je_ai_clean($_POST['phone'] ?? '', 40) : '',
    'email' => $isPost ? je_ai_clean($_POST['email'] ?? '', 180) : '',
    'course' => $isPost ? je_ai_clean($_POST['course'] ?? '', 180) : '',
    'source' => $isPost ? (je_ai_clean($_POST['source'] ?? '', 180) ?: 'WEBSITE_FORM') : 'WEBSITE_FORM',
    'message' => $isPost ? je_ai_clean($_POST['message'] ?? '', 1000) : '',
    'page_url' => je_ai_clean($_SERVER['HTTP_REFERER'] ?? '', 500),
    'user_agent' => je_ai_clean($_SERVER['HTTP_USER_AGENT'] ?? '', 500),
];

$saved = false;
$queued = false;
$notice = '';

header('X-Robots-Tag: noindex, nofollow, noarchive', true);
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0', true);
header('Pragma: no-cache', true);

if (!$isPost) {
    $notice = 'Please submit an enquiry from a Jaipur Engineers course page.';
} else {
    try {
        $result = je_ai_store_lead($lead);
        $saved = !empty($result['database_saved']);
        $queued = !$saved && !empty($result['fallback_saved']);
        je_form_student_confirmation($lead);

        if ($saved) {
            $notice = 'Thank you. Your enquiry has been received.';
        } elseif ($queued) {
            $notice = 'Your enquiry has been received and queued safely for database review.';
        } else {
            $notice = 'We could not save this enquiry. Please return to the course page and try again.';
        }
    } catch (InvalidArgumentException $exception) {
        $notice = $exception->getMessage();
    } catch (Throwable $exception) {
        error_log('JE website lead error: ' . $exception->getMessage());
        $notice = 'We could not save this enquiry. Please return to the course page and try again.';
    }
}

$pageTitle = $saved ? 'Thank You | Jaipur Engineers' : 'Enquiry Status | Jaipur Engineers';
$pageDescription = 'Jaipur Engineers enquiry submission status.';
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <?php include __DIR__ . '/head.php'; ?>
</head>
<body class="defult-home">
<?php include __DIR__ . '/header.php'; ?>
<main class="je-section">
    <div class="container">
        <div class="je-install-card">
            <?php if ($saved): ?>
                <div class="je-alert je-alert-success"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Our team will contact you soon.</h1>
                <p>If you provided an email address, you will also receive a confirmation with your course/page link.</p>
            <?php elseif ($queued): ?>
                <div class="je-alert je-alert-success"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Your enquiry is safely queued.</h1>
                <p>You can continue exploring Jaipur Engineers courses while the database connection is reviewed.</p>
            <?php else: ?>
                <div class="je-alert je-alert-info"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                <h1>Enquiry not submitted.</h1>
                <p>Please check the details and submit the enquiry again from the relevant course page.</p>
            <?php endif; ?>
            <a class="je-card-link" href="courses.php">Explore Courses <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
