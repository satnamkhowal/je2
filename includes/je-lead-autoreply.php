<?php
/**
 * Customer acknowledgement email for Jaipur Engineers enquiries.
 * Uses the hosting-side mail.php runtime config; no credentials belong here.
 */

require_once __DIR__ . '/je-ai-system.php';

function je_ai_safe_course_url($url)
{
    $fallback = 'https://jaipurengineers.com/';
    $url = trim((string)$url);
    if ($url === '' || !filter_var($url, FILTER_VALIDATE_URL)) {
        return $fallback;
    }

    $parts = parse_url($url);
    $host = isset($parts['host']) ? strtolower((string)$parts['host']) : '';
    if ($host !== 'jaipurengineers.com' && $host !== 'www.jaipurengineers.com') {
        return $fallback;
    }

    $scheme = isset($parts['scheme']) ? strtolower((string)$parts['scheme']) : '';
    if (!in_array($scheme, ['http', 'https'], true)) {
        return $fallback;
    }

    return $url;
}

function je_ai_send_customer_reply(array $lead, &$error = '')
{
    $error = '';
    $mail = je_ai_runtime_config('mail');
    if (empty($mail['enabled'])) {
        return false;
    }
    if (array_key_exists('auto_reply_enabled', $mail) && empty($mail['auto_reply_enabled'])) {
        return false;
    }

    $to = isset($lead['email']) ? trim((string)$lead['email']) : '';
    if ($to === '' || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $name = isset($lead['name']) && trim((string)$lead['name']) !== '' ? trim((string)$lead['name']) : 'Student';
    $course = isset($lead['course']) && trim((string)$lead['course']) !== '' ? trim((string)$lead['course']) : 'your selected course';
    $courseUrl = je_ai_safe_course_url(isset($lead['page_url']) ? $lead['page_url'] : '');
    $studentMessage = isset($lead['message']) ? trim((string)$lead['message']) : '';

    $subjectTemplate = !empty($mail['auto_reply_subject'])
        ? (string)$mail['auto_reply_subject']
        : 'Thanks for contacting Jaipur Engineers - {course}';
    $subject = str_replace(['{course}', '{name}'], [$course, $name], $subjectTemplate);

    $body = "Hi {$name},\n\n"
        . "Thank you for contacting Jaipur Engineers about {$course}. We have received your enquiry and our team can follow up with you about the course structure, upcoming batch timing and admission details.\n\n";

    if ($studentMessage !== '') {
        $body .= "Your message:\n{$studentMessage}\n\n";
    }

    $body .= "Course / enquiry page:\n{$courseUrl}\n\n"
        . "Jaipur Engineers focuses on practical, project-oriented learning. You can also ask our counsellor about current internship, placement-assistance and learning-mode options for your course.\n\n"
        . "Explore courses: https://jaipurengineers.com/courses.php\n"
        . "Website: https://jaipurengineers.com/\n\n"
        . "Regards,\nJaipur Engineers\n";

    $sent = je_ai_send_mail($mail, $to, $subject, $body, $error);
    if (!$sent && $error !== '') {
        error_log('JE customer auto-reply error: ' . $error);
    }
    return $sent;
}
