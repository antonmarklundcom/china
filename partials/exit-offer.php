<?php
/**
 * The exit-intent offer: one small, accessible dialog that asks a leaving
 * desktop visitor whether they want a quote. assets/js/exit-offer.js decides
 * whether it ever opens (desktop pointer, width >= 1024, mouse leaving through
 * the top after >= 20 s or >= 40 % scroll, at most once per 7 days, never after
 * a lead was sent). It ships `hidden`, so without JS nothing ever shows.
 *
 * Never rendered on /cotizar/ or /contacto/ — the visitor is already there.
 * Included once, from partials/footer.php.
 */

declare(strict_types=1);

$exitPath = (string) ($page['path'] ?? '/');
if (str_starts_with($exitPath, '/cotizar/') || str_starts_with($exitPath, '/contacto/')) {
    unset($exitPath);
    return;
}
$exitWa   = whatsapp_link(whatsapp_text_for_page());
$exitSlug = current_lead_slug() ?? '';
?>
<div class="exit-offer" data-exit-offer hidden>
  <div class="exit-offer__backdrop" data-exit-close></div>
  <div class="exit-offer__dialog" role="dialog" aria-modal="true"
       aria-labelledby="exit-offer-title" aria-describedby="exit-offer-text" tabindex="-1">
    <button class="exit-offer__close" type="button" data-exit-close aria-label="<?= e(ui('exit.close')) ?>">
      <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 6l12 12M18 6L6 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>

    <div class="exit-offer__art" aria-hidden="true">
      <svg viewBox="0 0 320 120" preserveAspectRatio="xMidYMid slice" focusable="false">
        <path d="M34 92C80 20 220 8 286 34" fill="none" stroke="rgba(255,255,255,.22)" stroke-width="1.5" stroke-dasharray="3 6"/>
        <path d="M34 92C80 20 220 8 286 34" fill="none" stroke="#f2994a" stroke-width="3" stroke-linecap="round" pathLength="100" stroke-dasharray="62 100"/>
        <circle cx="34" cy="92" r="7" fill="#0b3a44" stroke="#fff" stroke-width="3"/>
        <circle cx="286" cy="34" r="13" fill="#f2994a" fill-opacity=".22"/>
        <circle cx="286" cy="34" r="7" fill="#f2994a"/>
      </svg>
    </div>

    <div class="exit-offer__body">
      <p class="eyebrow"><?= e(ui('exit.eyebrow')) ?></p>
      <h2 class="exit-offer__title" id="exit-offer-title"><?= e(ui('exit.title')) ?></h2>
      <p class="exit-offer__text" id="exit-offer-text"><?= e(ui('exit.text')) ?></p>
      <div class="btn-row">
        <a class="btn btn--primary" href="<?= e(quote_path()) ?>" data-exit-cta="quote"><?= e(ui('exit.cta')) ?> <span aria-hidden="true">→</span></a>
        <?php if ($exitWa !== null): ?>
          <a class="btn btn--quiet" href="<?= e($exitWa) ?>" rel="noopener"
             data-service="<?= e($exitSlug) ?>" data-exit-cta="whatsapp"><?= wa_icon() ?> <?= e(ui('exit.wa')) ?></a>
        <?php endif; ?>
      </div>
      <p class="exit-offer__note"><?= e(ui('exit.note')) ?></p>
    </div>
  </div>
</div>
<?php unset($exitPath, $exitWa, $exitSlug); ?>
