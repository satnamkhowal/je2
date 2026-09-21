<?php
function je_render_design_card(): void
{
    $card = require dirname(__DIR__) . '/config/design-card.php';
    $file = (string)($card['file'] ?? '');
    $alt = trim((string)($card['alt'] ?? ''));
    $valid = preg_match('/\A[a-zA-Z0-9_-]+\.(png|jpe?g|webp)\z/i', $file)
        && $alt !== '' && is_file(dirname(__DIR__) . '/assets/images/custom-cards/' . $file);
    if (!$valid) {
        echo '<div class="je-design-slot" data-design-slot="reserved" aria-hidden="true"></div>';
        return;
    }
    echo '<div class="je-design-slot" data-design-slot="ready"><img src="assets/images/custom-cards/'
        . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '" alt="'
        . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '" loading="lazy" decoding="async"></div>';
}
