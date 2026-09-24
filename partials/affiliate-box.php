<?php
/**
 * The affiliate box. Renders the ids in $affIds (from a record's 'affiliates'
 * key) whose url is set in content/affiliates.php, and nothing at all when none
 * is — an empty recommendation box is worse than none.
 *
 *   $affIds  string[]  affiliate ids
 */

declare(strict_types=1);

$affItems = [];
foreach ((array) ($affIds ?? []) as $affId) {
    $affRecord = content('affiliates')[$affId] ?? null;
    if (is_array($affRecord) && !empty($affRecord['url'])) {
        $affItems[] = $affRecord;
    }
}
?>
<?php if ($affItems !== []): ?>
  <aside class="affiliate-box" aria-label="<?= e(ui('affiliate.title')) ?>">
    <p class="eyebrow"><?= e(ui('affiliate.title')) ?></p>
    <ul class="affiliate-box__list">
      <?php foreach ($affItems as $affItem): ?>
        <li>
          <a href="<?= e($affItem['url']) ?>" rel="sponsored nofollow noopener" target="_blank"><?= e($affItem['label']) ?></a>
          <span><?= e($affItem['text']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="note"><?= e(ui('affiliate.disclosure')) ?> <a href="/afiliados/"><?= e(ui('affiliate.more')) ?></a></p>
  </aside>
<?php endif; ?>
<?php unset($affItems, $affIds, $affId, $affRecord, $affItem); ?>
