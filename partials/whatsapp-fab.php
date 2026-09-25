<?php
/**
 * The persistent conversion actions. Two elements, one per breakpoint — the
 * CSS shows exactly one of them, so a page never shows both:
 *
 *   .wa-fab  (> 768px)   a floating WhatsApp pill, bottom-right
 *   .mbar    (<= 768px)  a two-button sticky bar: "Cotizar" (→ /cotizar/, with
 *                        this page's lead slug when it has one) + "WhatsApp"
 *
 * assets/js/site.js slides the bar away while an on-page lead form is in view,
 * so it never covers the form's own submit button.
 *
 * Without a WhatsApp number in content/site.php the WhatsApp half keeps its
 * shape and colour but points at /contacto/ and says "Contactar": degrade,
 * never invent a number.
 *
 * Both WhatsApp triggers open the WhatsApp menu instead of going straight to
 * one chat — but only once assets/js/whatsapp-menu.js has run. Their href is
 * this page's own prefill from content/lead-values.php, so a visitor without JS
 * still gets a message that names the service they were reading about.
 *
 * This file is shared chrome: pages parameterise it, they do not edit it.
 */

declare(strict_types=1);

$link      = whatsapp_link(whatsapp_text_for_page());
$label     = $link ? ui('cta.whatsapp_long') : ui('cta.contact');
$leadSlug  = current_lead_slug() ?? '';
$fabAttrs  = $link ? 'rel="noopener" data-wa-trigger aria-controls="wa-menu" aria-expanded="false"' : '';
$fabPath   = (string) ($page['path'] ?? '/');
$fabOnQuote = str_starts_with($fabPath, '/cotizar/');
?>
<a class="wa-fab" href="<?= e($link ?? '/contacto/') ?>" <?= $fabAttrs ?>
   data-service="<?= e($leadSlug) ?>">
  <span class="wa-fab__icon"><?= wa_icon() ?></span>
  <span><?= e($label) ?></span>
</a>

<div class="mbar<?= $fabOnQuote ? ' mbar--single' : '' ?>" data-mbar role="group" aria-label="<?= e(ui('mbar.label')) ?>">
  <?php if (!$fabOnQuote): ?>
    <a class="mbar__btn mbar__btn--quote" href="<?= e(quote_path()) ?>" data-mbar-quote>
      <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 3h7l5 5v13H7z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M14 3v5h5M10 13h6M10 17h4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
      <span><?= e(ui('cta.quote_short')) ?></span>
    </a>
  <?php endif; ?>
  <a class="mbar__btn mbar__btn--wa" href="<?= e($link ?? '/contacto/') ?>" <?= $fabAttrs ?>
     data-service="<?= e($leadSlug) ?>">
    <?= $link ? wa_icon() : '' ?>
    <span><?= e($link ? ui('cta.whatsapp') : ui('cta.contact')) ?></span>
  </a>
</div>
<?php require ROOT_DIR . '/partials/whatsapp-menu.php'; ?>
<?php unset($link, $label, $leadSlug, $fabAttrs, $fabPath, $fabOnQuote); ?>
