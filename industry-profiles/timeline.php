<?php if (!isset($entries, $esc)) { http_response_code(404); exit('Not found'); } ?>
<ol class="ip-timeline">
<?php foreach ($entries as $entry): ?>
    <li>
        <div class="ip-timeline-mark" aria-hidden="true"><?= $esc(substr($entry['organization'], 0, 1)) ?></div>
        <div class="ip-timeline-content">
            <h3><?= $esc($entry['title']) ?></h3>
            <p class="ip-timeline-org"><?= $esc($entry['organization']) ?></p>
            <p class="ip-timeline-date"><?= $esc($entry['date']) ?></p>
            <p><?= $esc($entry['detail']) ?></p>
            <a class="ip-text-link" href="<?= $esc($entry['source']) ?>">Source <span aria-hidden="true">↗</span></a>
        </div>
    </li>
<?php endforeach; ?>
</ol>
