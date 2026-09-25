<?php
/**
 * Site footer: the brand block (logomark, blurb, the not-official note,
 * WhatsApp), then Temas · Servicios · Calculadoras · El sitio, then the legal
 * row. After it: the floating WhatsApp pill / mobile conversion bar, the
 * exit-intent offer and the closing scripts.
 *
 * Every list comes from content/nav.php and content/site.php; an empty list —
 * tools before there are any, socials until the site supplies them — renders
 * nothing at all rather than an empty heading.
 *
 * This file is shared chrome: pages parameterise it, they do not edit it.
 */

declare(strict_types=1);

/* Prefixed locals: an include shares the caller's scope (see header.php). */
$footTools    = nav('tools');
$footSocials  = nav('socials');
$footWhatsapp = whatsapp_link(whatsapp_text_for_page());
$footSlug     = current_lead_slug() ?? '';
$footName     = (string) (site('name') ?: site('domain'));
$footNameBits = explode('-', $footName, 2);
$footCols     = [
    ['title' => ui('footer.topics'),   'links' => nav('topics')],
    ['title' => ui('nav.services'),    'links' => nav('services')],
    ['title' => ui('footer.tools'),    'links' => $footTools],
    ['title' => ui('footer.company'),  'links' => nav('company')],
];
?>
<footer class="site-footer">
  <div class="container">
    <div class="site-footer__top">

      <div class="site-footer__brand">
        <a class="wordmark" href="/">
          <span class="wordmark__mark"><?= logo_mark('f') ?></span>
          <span class="wordmark__text">
            <span class="wordmark__name"><?php if (count($footNameBits) === 2): ?><?= e($footNameBits[0]) ?><span class="wordmark__dash">-</span><?= e($footNameBits[1]) ?><?php else: ?><?= e($footName) ?><?php endif; ?></span>
            <?php if (site('domain') && site('domain') !== $footName): ?>
              <span class="wordmark__domain"><?= e(site('domain')) ?></span>
            <?php endif; ?>
          </span>
        </a>
        <p class="site-footer__blurb"><?= e(ui('footer.blurb')) ?></p>

        <div class="site-footer__contact">
          <?php if ($footWhatsapp !== null): ?>
            <a class="btn btn--whatsapp btn--sm" href="<?= e($footWhatsapp) ?>" rel="noopener"
               data-service="<?= e($footSlug) ?>"><?= wa_icon() ?> <?= e(ui('cta.whatsapp_long')) ?></a>
          <?php else: ?>
            <a class="btn btn--primary btn--sm" href="/contacto/"><?= e(ui('cta.contact')) ?></a>
          <?php endif; ?>
          <ul class="site-footer__facts">
            <?php if (site('phone')): ?>
              <li><a href="tel:+<?= e(phone_digits(site('phone'))) ?>"><?= e(site('phone')) ?></a></li>
            <?php endif; ?>
            <?php if (site('email')): ?>
              <li><a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
            <?php endif; ?>
            <?php if (site('street')): ?>
              <li><?= e(site('street')) ?>, <?= e(trim(site('city') . ', ' . site('country'), ', ')) ?></li>
            <?php elseif (site('city')): ?>
              <li><?= e(trim(site('city') . ', ' . site('country'), ', ')) ?></li>
            <?php endif; ?>
            <?php if (site('hours')): ?>
              <li><?= e(site('hours')) ?></li>
            <?php endif; ?>
            <li><?= e(ui('footer.reply')) ?></li>
            <?php foreach ($footSocials as $footSocial): ?>
              <li><a href="<?= e($footSocial) ?>" rel="noopener me"><?= e(parse_url($footSocial, PHP_URL_HOST) ?: $footSocial) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="site-footer__cols">
        <?php foreach ($footCols as $footCol): ?>
          <?php if ($footCol['links'] === []) { continue; } ?>
          <div class="site-footer__col">
            <h2><?= e($footCol['title']) ?></h2>
            <ul>
              <?php foreach ($footCol['links'] as $footLink): ?>
                <li><a href="<?= e($footLink['path']) ?>"><?= e($footLink['label']) ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <p class="site-footer__official">
      <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M12 11v5M12 8h.01" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
      <span><?= e(ui('footer.not_official')) ?></span>
    </p>

    <div class="site-footer__legal">
      <span>&copy; <?= date('Y') ?> <?= e(site('name')) ?>. <?= e(ui('footer.rights')) ?></span>
      <ul>
        <?php foreach (nav('legal') as $footLegal): ?>
          <li><a href="<?= e($footLegal['path']) ?>"><?= e($footLegal['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</footer>

<?php require ROOT_DIR . '/partials/whatsapp-fab.php'; ?>
<?php require ROOT_DIR . '/partials/exit-offer.php'; ?>
<?php unset($footTools, $footSocials, $footWhatsapp, $footSlug, $footName, $footNameBits, $footCols, $footCol, $footLink, $footLegal, $footSocial); ?>

<script src="<?= e(asset('/assets/js/analytics.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/site.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/whatsapp-menu.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/lead-form.js')) ?>" defer></script>
<script src="<?= e(asset('/assets/js/exit-offer.js')) ?>" defer></script>
</body>
</html>
