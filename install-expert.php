<?php
// Legacy entry point retained for old bookmarks. All DB + mail setup now lives in /install/.
header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet', true);
header('Location: /install/', true, 302);
exit;
