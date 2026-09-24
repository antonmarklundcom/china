<?php
/**
 * "Sitio privado de información" notice for aduana and visa pages. A record
 * sets 'disclaimer' => true; the official link defaults to the customs agency
 * and can be overridden with $discLink = ['label' => ..., 'url' => ...].
 */

declare(strict_types=1);

$discLink = $discLink ?? ['label' => 'aduana.gov.py', 'url' => 'https://www.aduana.gov.py/'];
?>
<aside class="disclaimer" role="note">
  <p class="disclaimer__title"><?= e(ui('disclaimer.title')) ?></p>
  <p><?= e(ui('disclaimer.text')) ?>
    <?= e(ui('disclaimer.link')) ?>: <a href="<?= e($discLink['url']) ?>" rel="noopener" target="_blank"><?= e($discLink['label']) ?></a>.</p>
</aside>
<?php unset($discLink); ?>
