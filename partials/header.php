<?php
/**
 * Site header: logomark + wordmark, primary nav with the Servicios mega-menu,
 * and the two actions (WhatsApp, "Pedir cotización" → /cotizar/). Every link
 * comes from content/nav.php — content phases add links by extending that file,
 * never by editing this partial.
 *
 * The bar is sticky, blurs what scrolls under it and shrinks once the page has
 * scrolled (assets/js/site.js sets .is-scrolled). The mega panel is plain
 * markup that site.js hides on load, so a visitor without JS still gets every
 * service link.
 */

declare(strict_types=1);

/* An include shares the scope of whatever required it, so every local in this
   partial is prefixed to avoid shadowing a caller's variable — $service in
   templates/service.php was a real casualty of getting this wrong. */
$navCurrentPath = $page['path'] ?? '/';

/* The pill's href is this page's own prefill, so a visitor without JS still
   reaches WhatsApp with a message that names the service they were reading
   about; assets/js/whatsapp-menu.js upgrades it to the menu. */
$navWhatsapp = whatsapp_link(whatsapp_text_for_page());
$navLeadSlug = current_lead_slug() ?? '';
$navQuote    = quote_path();
$navName     = (string) (site('name') ?: site('domain'));
$navNameBits = explode('-', $navName, 2);
$navWaIcon   = wa_icon();
?>
<header class="site-header" data-header>
  <div class="container site-header__bar">

    <a class="wordmark" href="/">
      <span class="wordmark__mark"><?= logo_mark('h') ?></span>
      <span class="wordmark__text">
        <span class="wordmark__name"><?php if (count($navNameBits) === 2): ?><?= e($navNameBits[0]) ?><span class="wordmark__dash">-</span><?= e($navNameBits[1]) ?><?php else: ?><?= e($navName) ?><?php endif; ?></span>
        <?php if (site('domain') && site('domain') !== $navName): ?>
          <span class="wordmark__domain"><?= e(site('domain')) ?></span>
        <?php endif; ?>
      </span>
    </a>

    <button class="nav-toggle" type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="site-nav"
            data-label-open="<?= e(ui('nav.menu')) ?>"
            data-label-close="<?= e(ui('nav.close')) ?>">
      <span class="nav-toggle__icon" aria-hidden="true"><span></span><span></span></span>
      <span class="nav-toggle__label" data-nav-label><?= e(ui('nav.menu')) ?></span>
    </button>

    <div class="site-header__nav" id="site-nav" data-nav>
      <ul class="site-nav">
        <?php foreach (nav('primary') as $navItem): ?>
          <?php if (!empty($navItem['mega'])): ?>
            <li class="site-nav__mega">
              <button type="button" data-mega-toggle aria-expanded="true" aria-controls="mega-servicios"
                      <?= str_starts_with($navCurrentPath, $navItem['path']) ? 'data-current' : '' ?>>
                <?= e($navItem['label']) ?>
                <span class="site-nav__caret" aria-hidden="true"></span>
              </button>

              <div class="mega" id="mega-servicios" data-mega>
                <div class="mega__intro">
                  <p class="mega__eyebrow"><?= e(ui('services_hub.eyebrow')) ?></p>
                  <p class="mega__title"><?= e(ui('services_hub.title')) ?></p>
                  <p class="mega__text"><?= e(ui('services_hub.lead')) ?></p>
                  <div class="mega__actions">
                    <a class="btn btn--primary btn--sm" href="<?= e($navQuote) ?>"><?= e(ui('cta.quote')) ?></a>
                    <a class="mega__all" href="<?= e($navItem['path']) ?>"><?= e(ui('nav.all_services')) ?> <span aria-hidden="true">→</span></a>
                  </div>
                </div>
                <div class="mega__cols">
                  <?php foreach (nav('mega') as $navCluster): ?>
                    <?php if ($navCluster['items'] === []) { continue; } ?>
                    <div class="mega__col">
                      <p class="mega__col-title"><?= e($navCluster['label']) ?></p>
                      <ul>
                        <?php foreach ($navCluster['items'] as $navService): ?>
                          <li<?= $navService['parent'] ? ' data-child' : '' ?>>
                            <a href="<?= e($navService['path']) ?>"
                               <?= is_current($navService['path'], $navCurrentPath) ? 'aria-current="page"' : '' ?>><?= e($navService['label']) ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </li>
          <?php else: ?>
            <li>
              <a href="<?= e($navItem['path']) ?>"
                 <?= is_current($navItem['path'], $navCurrentPath) ? 'aria-current="page"' : (str_starts_with($navCurrentPath, $navItem['path']) && $navItem['path'] !== '/' ? 'data-current' : '') ?>><?= e($navItem['label']) ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>

      <div class="nav-drawer-cta">
        <a class="btn btn--primary btn--block" href="<?= e($navQuote) ?>"><?= e(ui('cta.quote')) ?></a>
        <a class="btn btn--whatsapp btn--block" href="<?= e($navWhatsapp ?? '/contacto/') ?>"
           <?= $navWhatsapp ? 'rel="noopener" data-wa-trigger aria-controls="wa-menu" aria-expanded="false"' : '' ?>
           data-service="<?= e($navLeadSlug) ?>">
          <?= $navWhatsapp ? $navWaIcon : '' ?>
          <?= e($navWhatsapp ? ui('cta.whatsapp_long') : ui('cta.contact')) ?>
        </a>
        <p class="nav-drawer-cta__note"><?= e(ui('footer.reply')) ?></p>
      </div>
    </div>

    <div class="site-header__actions">
      <a class="btn btn--ghost" href="<?= e($navWhatsapp ?? '/contacto/') ?>"
         <?= $navWhatsapp ? 'rel="noopener" data-wa-trigger aria-controls="wa-menu" aria-expanded="false"' : '' ?>
         data-service="<?= e($navLeadSlug) ?>">
        <?= $navWhatsapp ? $navWaIcon : '' ?>
        <?= e($navWhatsapp ? ui('cta.whatsapp') : ui('cta.contact')) ?>
      </a>
      <a class="btn btn--primary" href="<?= e($navQuote) ?>"><?= e(ui('cta.quote')) ?></a>
    </div>

  </div>
</header>
<?php unset($navWaIcon, $navNameBits, $navName, $navQuote); ?>
