<?php
/**
 * The in-body "¿Quiere que un agente se encargue?" card on the reading pages.
 * Two weights: 'soft' sits between steps as a quiet aside the reader can skip;
 * 'strong' closes the steps on an ink card with the service's own "tenga a
 * mano" lines. Both point at /cotizar/?s=<slug>, so the quote form arrives
 * preset to the service the page is about.
 *
 *   $inlineCtaSlug     ?string  service slug, or null for the neutral default
 *   $inlineCtaVariant  string   'soft' (default) | 'strong'
 */

declare(strict_types=1);

$inlineCtaSlug    = $inlineCtaSlug ?? null;
$inlineCtaVariant = ($inlineCtaVariant ?? 'soft') === 'strong' ? 'strong' : 'soft';
$inlineCtaLead    = lead_value($inlineCtaSlug);
$inlineCtaHref    = '/cotizar/' . ($inlineCtaLead['slug'] !== null ? '?s=' . rawurlencode($inlineCtaLead['slug']) : '');
$inlineCtaWa      = whatsapp_link($inlineCtaLead['whatsappText']);
$inlineCtaSteps   = array_slice($inlineCtaLead['nextStep'], 1);
?>
<aside class="inline-cta inline-cta--<?= e($inlineCtaVariant) ?><?= $inlineCtaVariant === 'strong' ? ' on-ink' : '' ?>" data-service="<?= e($inlineCtaLead['slug'] ?? '') ?>"
       aria-label="<?= e(ui('reading.cta_aria', 'Pedir una cotización')) ?>">
  <div class="inline-cta__body">
    <p class="inline-cta__chip"><span aria-hidden="true" class="inline-cta__dot"></span><?= e($inlineCtaLead['menuLabel']) ?></p>
    <?php if ($inlineCtaVariant === 'strong'): ?>
      <p class="inline-cta__title"><?= e(ui('reading.cta_strong_title', '¿Prefiere que un agente coordine todo esto por usted?')) ?></p>
      <p class="inline-cta__text"><?= e(ui('reading.cta_text', 'Pida una cotización sin compromiso.')) ?> <?= e($inlineCtaLead['nextStep'][0] ?? '') ?></p>
      <?php if ($inlineCtaSteps !== []): ?>
        <ul class="inline-cta__list">
          <?php foreach ($inlineCtaSteps as $inlineCtaStep): ?>
            <li><?= e($inlineCtaStep) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    <?php else: ?>
      <p class="inline-cta__title"><?= e(ui('reading.cta_soft_title', '¿Quiere que un agente se encargue de esto?')) ?></p>
      <p class="inline-cta__text"><?= e(ui('reading.cta_text', 'Pida una cotización sin compromiso.')) ?> <?= e($inlineCtaLead['nextStep'][0] ?? '') ?></p>
    <?php endif; ?>
  </div>
  <div class="inline-cta__actions">
    <a class="btn btn--primary" href="<?= e($inlineCtaHref) ?>"><?= e(ui('cta.quote')) ?>
      <svg viewBox="0 0 20 20" aria-hidden="true" focusable="false"><path d="M4 10h11m-4-4 4 4-4 4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
    <?php if ($inlineCtaVariant === 'strong' && $inlineCtaWa !== null): ?>
      <a class="btn btn--secondary" href="<?= e($inlineCtaWa) ?>" rel="noopener"><?= e(ui('cta.whatsapp_long')) ?></a>
    <?php endif; ?>
  </div>
</aside>
<?php unset($inlineCtaSlug, $inlineCtaVariant, $inlineCtaLead, $inlineCtaHref, $inlineCtaWa, $inlineCtaSteps, $inlineCtaStep); ?>
