<?php
/**
 * Four short, always-true statements about how the site works — rendered under
 * the home hero. Copy lives in content/ui.php 'trust'.
 *
 * RULE: nothing here may be a number, a statistic, a client, a testimonial or a
 * partner logo. If a statement stops being true, delete it from ui.php; this
 * partial renders whatever is left and nothing when the list is empty.
 *
 *   $trustOverlap  bool  lift the strip over the bottom of the hero (default)
 */

declare(strict_types=1);

$trustItems   = content('ui')['trust']['items'] ?? [];
$trustOverlap = $trustOverlap ?? true;

/* Plain strokes, currentColor, decorative. */
$trustIcons = [
    'chat'   => '<path d="M4 5h16v11H9l-5 4z"/><path d="M8 9.5h8M8 12.5h5"/>',
    'clock'  => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
    'badge'  => '<path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M9 12l2 2 4-4"/>',
    'source' => '<path d="M6 3h9l4 4v14H6z"/><path d="M14 3v5h5M9 13h7M9 17h5"/>',
];

if ($trustItems !== []) :
?>
<section class="trust<?= $trustOverlap ? ' trust--overlap' : '' ?>" aria-label="<?= e(ui('trust.label')) ?>">
  <div class="container">
    <ul class="trust__list">
      <?php foreach ($trustItems as $trustItem): ?>
        <li class="trust__item">
          <span class="trust__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><?= $trustIcons[$trustItem['icon'] ?? ''] ?? $trustIcons['badge'] ?></svg>
          </span>
          <span class="trust__copy">
            <strong><?= e($trustItem['title']) ?></strong>
            <span><?= e($trustItem['text']) ?></span>
          </span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php endif; ?>
<?php unset($trustItems, $trustOverlap, $trustIcons, $trustItem); ?>
