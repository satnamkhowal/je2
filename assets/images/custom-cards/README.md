# Supplied card design

Reserved card spaces appear beside course/general content and in blog/news sidebars.
No demo artwork or placeholder message is shown to visitors.

Place the final PNG, JPEG or WebP here. A 4:3 design around 1200 x 900 works well.
Set its filename and meaningful alt text in `config/design-card.php`. Images use
`object-fit: contain` so the whole supplied design remains visible. Keep text legible
at a sidebar width of about 350px. Missing artwork keeps the empty reserved space.

If you supply HTML/CSS instead, integrate it into `includes/design-card.php` after
review; this folder never automatically includes or executes uploaded code.
