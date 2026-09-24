<?php

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'calculadora-compras-online';
$tool = content('tools')[$slug];

ob_start();
?>
<div class="tool card" data-tool="<?= e($slug) ?>">
  <p class="lead"><?= e(ui('placeholder.notice')) ?></p>
</div>
<?php
$toolCalcHtml = (string) ob_get_clean();
require ROOT_DIR . '/templates/tool.php';
