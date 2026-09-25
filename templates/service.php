<?php
/**
 * Renders one service from content/services.php. Every /<slug>/index.php is
 * three lines: require bootstrap, set $slug, require this file.
 *
 * A content phase fills the empty keys in content/services.php and adds CSS
 * below the tokens block; the section order and the markup structure here stay
 * as they are. Each block renders only when its data exists, so the page is
 * coherent from the first seeded record onwards.
 */

declare(strict_types=1);

/** @var string $slug */
$service = services($slug ?? '');

if ($service === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$clusterLabel = clusters()[$service['cluster']] ?? '';

/* Inicio › Servicios › [Auditoría ›] Title — the audit children sit under their
   sub-hub. */
$breadcrumbs = [['label' => ui('nav.services'), 'path' => services_hub_path()]];
if (!empty($service['parent']) && ($parent = services($service['parent'])) !== null) {
    $breadcrumbs[] = ['label' => $parent['navLabel'], 'path' => $parent['path']];
}
$breadcrumbs[] = ['label' => $service['title'], 'path' => $service['path']];

$page = [
    'title'       => $service['seoTitle'] !== '' ? $service['seoTitle'] : $service['title'],
    'description' => $service['metaDescription'],
    'path'        => $service['path'],
    'breadcrumbs' => $breadcrumbs,
    'faq'         => $service['faq'],
    /* Names this page in the lead value model: the WhatsApp menu,
       the CTA band, the lead form and the thank-you all resolve from it. */
    'leadSlug'    => $slug,
];

$svcImage    = $service['image'] ?? null;
$page['ogImage'] = image_og($svcImage);
$hero        = $service['hero'];
$ctaWhatsapp = whatsapp_text_for_page($page);
$svcQuote    = quote_path($slug);
$svcWa       = whatsapp_link($ctaWhatsapp);

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero page-hero--service<?= image_ready($svcImage) ? ' page-hero--has-media' : '' ?>">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__split">
        <div class="page-hero__inner">
          <p class="eyebrow"><?= e($clusterLabel !== '' ? $clusterLabel : $hero['eyebrow']) ?></p>
          <h1><?= e($hero['h1'] !== '' ? $hero['h1'] : $service['title']) ?></h1>
          <?php if ($hero['h2'] !== ''): ?>
            <p class="page-hero__sub"><?= e($hero['h2']) ?></p>
          <?php endif; ?>
          <?php if ($hero['lead'] !== ''): ?>
            <p class="lead"><?= e($hero['lead']) ?></p>
          <?php elseif ($hero['h2'] === ''): ?>
            <p class="lead"><?= e($service['metaDescription']) ?></p>
          <?php endif; ?>
          <div class="btn-row">
            <a class="btn btn--primary btn--lg" href="<?= e($svcQuote) ?>"><?= e(ui('cta.quote')) ?> <span aria-hidden="true">→</span></a>
            <?php if ($svcWa !== null): ?>
              <a class="btn btn--on-ink btn--lg" href="<?= e($svcWa) ?>" rel="noopener" data-service="<?= e($slug) ?>"><?= wa_icon() ?> <?= e(ui('cta.whatsapp')) ?></a>
            <?php endif; ?>
          </div>
          <ul class="hero-assure">
            <li><?= e(ui('cta.quote_note')) ?></li>
            <li><?= e(ui('service.aside_reply')) ?></li>
          </ul>
        </div>
        <?php if (image_ready($svcImage)): ?>
          <figure class="page-hero__figure"><?= picture_html($svcImage, '(max-width: 1024px) 100vw, 560px', '', true) ?></figure>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php
    $svcExcludes = $service['excludes'] ?? [];
    $svcWeNeed   = $service['weNeed'] ?? [];
    $svcToolLinks = $service['toolLinks'] ?? [];
  ?>
  <section class="section svc-body">
    <div class="container svc-layout">
      <div class="svc-main">

        <?php if (!empty($service['disclaimer']) || !empty($service['affiliates'])): ?>
          <div class="svc-block stack">
            <?php if (!empty($service['disclaimer'])): ?>
              <?php if (is_array($service['disclaimer'])) { $discLink = $service['disclaimer']; } ?>
              <?php require ROOT_DIR . '/partials/disclaimer-oficial.php'; ?>
            <?php endif; ?>
            <?php $affIds = $service['affiliates'] ?? []; require ROOT_DIR . '/partials/affiliate-box.php'; ?>
          </div>
        <?php endif; ?>

        <?php if ($service['includes'] !== [] || $svcExcludes !== [] || $svcWeNeed !== []): ?>
          <div class="svc-block" id="incluye">
            <?php if ($service['includes'] !== []): ?>
              <div class="svc-includes">
                <h2 class="svc-h2"><?= e(ui('service.includes')) ?></h2>
                <ul class="checklist checklist--cols">
                  <?php foreach ($service['includes'] as $item): ?>
                    <li><span><?= e($item) ?></span></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if ($svcExcludes !== [] || $svcWeNeed !== []): ?>
              <div class="checklist-grid">
                <?php if ($svcExcludes !== []): ?>
                  <div class="svc-panel">
                    <h2 class="svc-h3"><?= e(ui('service.excludes')) ?></h2>
                    <ul class="checklist checklist--no">
                      <?php foreach ($svcExcludes as $item): ?>
                        <li><span><?= e($item) ?></span></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
                <?php if ($svcWeNeed !== []): ?>
                  <div class="svc-panel">
                    <h2 class="svc-h3"><?= e(ui('service.we_need')) ?></h2>
                    <ul class="checklist checklist--need">
                      <?php foreach ($svcWeNeed as $item): ?>
                        <li><span><?= e($item) ?></span></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php foreach ($service['sections'] as $block): ?>
          <div class="svc-block prose">
            <h2 class="svc-h2"><?= e($block['h2'] ?? '') ?></h2>
            <?php foreach ($block['body'] ?? [] as $paragraph): ?>
              <p><?= rich($paragraph) ?></p>
            <?php endforeach; ?>
            <?php if (!empty($block['items'])): ?>
              <div class="grid grid--2 mt-4">
                <?php foreach ($block['items'] as $item): ?>
                  <div class="card card--flat">
                    <h3 class="card-title"><?= e($item['title'] ?? '') ?></h3>
                    <p class="card__text"><?= rich($item['text'] ?? '') ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>

        <?php if ($service['benefits'] !== []): ?>
          <div class="svc-block">
            <h2 class="svc-h2"><?= e(ui('service.benefits')) ?></h2>
            <div class="benefits mt-4">
              <?php $svcBenefitN = 0; foreach ($service['benefits'] as $benefit): ?>
                <div class="benefit">
                  <span class="benefit__num" aria-hidden="true"><?= e(str_pad((string) ++$svcBenefitN, 2, '0', STR_PAD_LEFT)) ?></span>
                  <h3 class="card-title"><?= e($benefit['title'] ?? '') ?></h3>
                  <p class="card__text"><?= rich($benefit['text'] ?? '') ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($svcToolLinks !== []): ?>
          <div class="svc-block">
            <div class="grid<?= count($svcToolLinks) > 1 ? ' grid--2' : '' ?>">
              <?php foreach ($svcToolLinks as $svcToolLink): ?>
                <a class="card card--link card--tool-link" href="<?= e($svcToolLink['path']) ?>">
                  <span class="card__kicker"><?= e(ui('nav.tools')) ?></span>
                  <h2 class="card-title"><?= e($svcToolLink['label'] ?? '') ?></h2>
                  <p class="card__text"><?= e($svcToolLink['text'] ?? '') ?></p>
                  <span class="card__arrow" aria-hidden="true">→</span>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($service['faq'] !== []): ?>
          <div class="svc-block">
            <?php $faqItems = $service['faq']; ?>
            <?php require ROOT_DIR . '/partials/faq.php'; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- The sticky summary: price stance, what is included, the two ways to
           act. On phones it drops below the content; the mobile bar covers
           the actions there. -->
      <aside class="svc-aside" aria-label="<?= e(ui('service.aside_eyebrow')) ?>">
        <div class="summary">
          <p class="summary__eyebrow"><?= e(ui('service.aside_eyebrow')) ?></p>
          <p class="summary__title"><?= e($service['navLabel']) ?></p>
          <div class="summary__price">
            <span class="summary__label"><?= e(ui('service.price_label')) ?></span>
            <span class="summary__value"><?= e(ui('service.price_value')) ?></span>
            <span class="summary__note"><?= e(ui('service.price_note')) ?></span>
          </div>
          <?php if ($service['includes'] !== []): ?>
            <p class="summary__label"><?= e(ui('service.includes')) ?></p>
            <ul class="summary__list">
              <?php foreach (array_slice($service['includes'], 0, 4) as $item): ?>
                <li><?= e($item) ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if (count($service['includes']) > 4): ?>
              <a class="summary__more" href="#incluye"><?= e(ui('service.aside_more')) ?></a>
            <?php endif; ?>
          <?php endif; ?>
          <div class="summary__actions">
            <a class="btn btn--primary btn--block" href="<?= e($svcQuote) ?>"><?= e(ui('cta.quote')) ?> <span aria-hidden="true">→</span></a>
            <?php if ($svcWa !== null): ?>
              <a class="btn btn--whatsapp btn--block" href="<?= e($svcWa) ?>" rel="noopener" data-service="<?= e($slug) ?>"><?= wa_icon() ?> <?= e(ui('cta.whatsapp_long')) ?></a>
            <?php endif; ?>
          </div>
          <p class="summary__foot"><?= e(ui('cta.quote_note')) ?> · <?= e(ui('service.aside_reply')) ?></p>
        </div>
      </aside>
    </div>
  </section>

  <?php if ($service['related'] !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('nav.services')) ?></p>
          <h2><?= e(ui('service.related')) ?></h2>
        </div>
        <?php $gridSlugs = $service['related']; ?>
        <?php require ROOT_DIR . '/partials/service-card-grid.php'; ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Guía / artículo relacionado: curated reading for this service, in one
       band — guides from content/guias.php, articles from content/blog.php
       (independent of the article's own `service` field). -->
  <?php
    $svcReads = [];
    foreach ($service['guides'] ?? [] as $svcGuideSlug) {
        $svcGuide = content('guias')[$svcGuideSlug] ?? null;
        if ($svcGuide !== null) {
            $svcReads[] = ['kicker' => ui('nav.guides'), 'title' => $svcGuide['navLabel'], 'text' => $svcGuide['metaDescription'], 'path' => $svcGuide['path']];
        }
    }
    foreach ($service['articles'] ?? [] as $svcArticleSlug) {
        foreach (content('blog') as $svcArticleEntry) {
            if ($svcArticleEntry['slug'] === $svcArticleSlug) {
                $svcReads[] = ['kicker' => ui('nav.blog'), 'title' => $svcArticleEntry['title'], 'text' => $svcArticleEntry['description'], 'path' => '/blog/' . $svcArticleEntry['slug'] . '/'];
                break;
            }
        }
    }
  ?>
  <?php if ($svcReads !== []): ?>
    <section class="section">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('nav.guides')) ?></p>
          <h2><?= e(($service['guides'] ?? []) !== [] ? ui('service.guides') : ui('service.articles')) ?></h2>
        </div>
        <div class="grid grid--3">
          <?php foreach ($svcReads as $svcRead): ?>
            <a class="card card--link card--guide" href="<?= e($svcRead['path']) ?>">
              <span class="card__kicker"><?= e($svcRead['kicker']) ?></span>
              <h3 class="card-title"><?= e($svcRead['title']) ?></h3>
              <p class="card__text"><?= e($svcRead['text']) ?></p>
              <span class="card__arrow" aria-hidden="true">→</span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Solicitar: the service's own lead form. Every service page
       needs one, because a lead is only worth routing if it arrives carrying
       the service it came from — the CTA band above sends people to WhatsApp,
       this sends the ones who would rather write. -->
  <section class="section section--warm" id="solicitar">
    <div class="container split split--top">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('service.form_eyebrow')) ?></p>
        <h2><?= e($service['cta']['label'] !== '' ? $service['cta']['label'] : ui('form.legend')) ?></h2>
        <p class="lead"><?= e(ui('service.form_lead')) ?></p>
        <ul class="checklist">
          <?php foreach (content('ui')['contact']['steps'] as $svcStep): ?>
            <li><span><?= e($svcStep) ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <?php
        $formId      = $slug;
        $formService = $slug;
        $formNeed    = lead_value($slug)['need'];
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
