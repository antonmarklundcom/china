<?php
/**
 * "En esta guía" — the reading pages' table of contents (templates/guide.php,
 * templates/segment.php, templates/article.php). Built server-side from the
 * same arrays that render the body, so every entry points at an id that
 * exists on the page. assets/js/reading.js adds the scroll-spy highlight; with
 * no JS it is an ordinary list of in-page links.
 *
 * Rendered twice per page: once as a collapsible <details> under the hero
 * (< 1024px) and once in the sticky sidebar (>= 1024px). CSS shows one.
 *
 *   $tocItems    array   [['id' => ..., 'label' => ..., 'num' => ?string], ...]
 *   $tocVariant  string  'aside' | 'mobile'
 *   $tocTitle    string  defaults to ui('reading.toc')
 */

declare(strict_types=1);

$tocItems   = $tocItems ?? [];
$tocVariant = $tocVariant ?? 'aside';
$tocTitle   = $tocTitle ?? ui('reading.toc', 'En esta guía');

if ($tocItems === []) {
    return;
}
?>
<?php if ($tocVariant === 'mobile'): ?>
  <details class="toc toc--mobile" data-toc>
    <summary class="toc__summary">
      <span class="toc__title"><?= e($tocTitle) ?></span>
      <span class="toc__count"><?= count($tocItems) ?> <?= e(ui('reading.toc_count', 'secciones')) ?></span>
    </summary>
<?php else: ?>
  <nav class="toc toc--aside" aria-label="<?= e($tocTitle) ?>" data-toc>
    <p class="toc__title" aria-hidden="true"><?= e($tocTitle) ?></p>
<?php endif; ?>
    <ol class="toc__list">
      <?php foreach ($tocItems as $tocItem): ?>
        <li>
          <a class="toc__link<?= empty($tocItem['num']) ? ' toc__link--plain' : '' ?>" href="#<?= e($tocItem['id']) ?>">
            <?php if (!empty($tocItem['num'])): ?><span class="toc__num" aria-hidden="true"><?= e($tocItem['num']) ?></span><?php endif; ?>
            <span class="toc__label"><?= e($tocItem['label']) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
<?php if ($tocVariant === 'mobile'): ?>
  </details>
<?php else: ?>
  </nav>
<?php endif; ?>
<?php unset($tocVariant, $tocTitle, $tocItem); ?>
