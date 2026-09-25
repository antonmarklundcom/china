<?php
/**
 * The closing conversion band. Reused at the foot of every service page, tool,
 * article and hub: a dark, textured panel with the ask on the left and the two
 * ways to act on the right — the quote wizard (primary) and WhatsApp.
 *
 *   $ctaTitle       string  defaults to ui('cta_band.title')
 *   $ctaLead        string  defaults to ui('cta_band.lead')
 *   $ctaWhatsapp    string  wa.me prefill text; defaults to this page's own text
 *                           from content/lead-values.php, so the message names
 *                           the service the visitor was reading about and never
 *                           the button's label
 *   $ctaContactPath string  the primary button's href. Defaults to /cotizar/
 *                           with this page's lead slug (quote_path()); a
 *                           second-language section passes its own path
 *   $ctaPrimary     string  the primary button's label, defaults to "Pedir cotización"
 */

declare(strict_types=1);

$ctaTitle       = $ctaTitle ?? ui('cta_band.title');
$ctaLead        = $ctaLead ?? ui('cta_band.lead');
$ctaWhatsapp    = $ctaWhatsapp ?? whatsapp_text_for_page();
$ctaSlug        = current_lead_slug();
$ctaLink        = whatsapp_link($ctaWhatsapp);
$ctaContactPath = $ctaContactPath ?? quote_path();
$ctaPrimary     = $ctaPrimary ?? ui('cta.quote');
?>
<section class="section cta-band">
  <div class="container">
    <div class="cta-band__panel">
      <div class="cta-band__copy">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2 class="cta-band__title"><?= e($ctaTitle) ?></h2>
        <p class="lead"><?= e($ctaLead) ?></p>
      </div>
      <div class="cta-band__actions">
        <a class="btn btn--primary btn--lg" href="<?= e($ctaContactPath) ?>"><?= e($ctaPrimary) ?> <span aria-hidden="true">→</span></a>
        <?php if ($ctaLink !== null): ?>
          <a class="btn btn--on-ink btn--lg" href="<?= e($ctaLink) ?>" rel="noopener"
             data-service="<?= e($ctaSlug ?? '') ?>"><?= wa_icon() ?> <?= e(ui('cta.whatsapp_long')) ?></a>
        <?php endif; ?>
        <p class="cta-band__note"><?= e(ui('cta.quote_note')) ?> · <?= e(ui('footer.reply')) ?></p>
      </div>
    </div>
  </div>
</section>
<?php
/* An include shares the caller's scope: leave nothing behind for a second band
   or a later partial on the same page (house convention). */
unset($ctaTitle, $ctaLead, $ctaWhatsapp, $ctaSlug, $ctaLink, $ctaContactPath, $ctaPrimary);
