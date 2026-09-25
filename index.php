<?php
/**
 * Homepage: hero (value proposition, two CTAs, the China → Paraguay route),
 * the trust strip, the four doors (one per topic cluster), the calculators
 * band, the most-read guides, the aduana band, the services board, the product
 * chips, the blog, the process and the contact form.
 *
 * Adjacent sections never share a treatment: image cards, a dark split band,
 * an editorial numbered list, a framed panel, a grouped board, chips, cards,
 * a timeline, a form.
 *
 * Every list is derived from the content arrays, so a guide, service, tool or
 * product page added there appears here without an edit to this file. The
 * "most read" list is the one hand-picked set, in content/pages.php '/'.
 */

require __DIR__ . '/lib/bootstrap.php';

$meta = page_meta('/');
$homeImage = $meta['image'] ?? null;
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/',
    'ogImage'     => image_og($homeImage),
];

$homeWhatsapp   = whatsapp_link(whatsapp_text_for_page());
$homeGuides     = content('guias');
$homeHubs       = content('ui')['hubs'];
$homeClusters   = clusters();
$homeDoorImages = (array) ($meta['doorImages'] ?? []);
$homeTools      = content('tools');
$homeCalc       = $homeTools['calculadora-costo-importacion']['path'] ?? '/herramientas/';

/* Guides per cluster, in file order: the first three go on each door. */
$homeByCluster = [];
foreach ($homeGuides as $homeSlug => $homeGuide) {
    $homeByCluster[$homeGuide['cluster'] ?? ''][$homeSlug] = $homeGuide;
}

/* Services per cluster, for the grouped board. */
$homeServicesBy = [];
foreach (services() as $homeSvcSlug => $homeSvc) {
    $homeServicesBy[$homeSvc['cluster']][$homeSvcSlug] = $homeSvc;
}

$homePopular = [];
foreach ((array) ($meta['popular'] ?? []) as $homePopularSlug) {
    if (isset($homeGuides[$homePopularSlug])) {
        $homePopular[] = $homeGuides[$homePopularSlug];
    }
}

/* One inline icon per door. Plain strokes, currentColor, decorative. */
$homeIcons = [
    'compras'  => '<path d="M5 7h14l-1.5 11h-11z"/><path d="M9 7a3 3 0 0 1 6 0"/>',
    'importar' => '<rect x="3" y="8" width="18" height="10" rx="1"/><path d="M7 8v10M11 8v10M15 8v10M3 13h18"/>',
    'aduana'   => '<path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7z"/><path d="M9 12l2 2 4-4"/>',
    'viajes'   => '<path d="M2 16l20-8-6 12-3-5z"/><path d="M13 15l-5 3"/>',
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <!-- Hero ------------------------------------------------------------- -->
  <section class="hero hero--home">
    <div class="hero__mesh" aria-hidden="true"></div>
    <div class="container hero__grid">

      <div class="hero__copy">
        <span class="pill">
          <span class="pill__dot" aria-hidden="true"></span>
          <?= e(ui('home.eyebrow')) ?>
        </span>

        <h1><?= e(ui('home.h1_lead')) ?><span class="accent"><?= e(ui('home.h1_accent')) ?></span></h1>

        <p class="lead hero__lead"><?= e(ui('home.lead')) ?></p>

        <div class="btn-row">
          <a class="btn btn--primary btn--lg" href="<?= e(quote_path(null)) ?>"><?= e(ui('home.cta_quote')) ?> <span aria-hidden="true">→</span></a>
          <a class="btn btn--on-ink btn--lg" href="<?= e($homeCalc) ?>"><?= e(ui('home.cta_calc')) ?></a>
        </div>

        <div class="hero__quick">
          <span class="hero__quick-label"><?= e(ui('home.quick_label')) ?></span>
          <ul>
            <?php foreach (['temu-paraguay', 'shein-paraguay', 'aliexpress-paraguay', 'alibaba-paraguay'] as $homeQuick): ?>
              <?php if (isset($homeGuides[$homeQuick])): ?>
                <li><a href="<?= e($homeGuides[$homeQuick]['path']) ?>"><?= e($homeGuides[$homeQuick]['navLabel']) ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="hero__visual">
        <?= picture_html($homeImage, '(max-width: 900px) 100vw, 50vw', 'hero__img', true) ?>
        <div class="route-card" role="group" aria-label="<?= e(ui('home.route_label')) ?>">
          <p class="route-card__title"><?= e(ui('home.route_title')) ?></p>
          <ol class="route">
            <?php $homeRoute = content('ui')['home']['route']; $homeRouteLast = count($homeRoute) - 1; ?>
            <?php foreach ($homeRoute as $homeRouteI => $homeStop): ?>
              <li><span class="route__dot<?= $homeRouteI === $homeRouteLast ? ' route__dot--end' : '' ?>"></span><strong><?= e($homeStop['title']) ?></strong><span><?= e($homeStop['text']) ?></span></li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>

    </div>
  </section>

  <?php require ROOT_DIR . '/partials/trust-strip.php'; ?>

  <!-- Four doors ---------------------------------------------------------- -->
  <section class="section section--doors" id="temas">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow"><?= e(ui('home.doors_eyebrow')) ?></p>
        <h2><?= e(ui('home.doors_title')) ?></h2>
      </div>

      <div class="doors">
        <?php foreach ($homeHubs as $homeCluster => $homeHub): ?>
          <article class="door door--<?= e($homeCluster) ?>">
            <div class="door__media">
              <?= picture_html($homeDoorImages[$homeCluster] ?? null, '(max-width: 768px) 100vw, 25vw', 'door__img') ?>
              <span class="door__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $homeIcons[$homeCluster] ?></svg>
              </span>
            </div>
            <div class="door__body">
              <h3 class="card-title"><a href="<?= e($homeHub['path']) ?>"><?= e($homeClusters[$homeCluster]) ?></a></h3>
              <p class="card__text"><?= e(content('ui')['cluster_leads'][$homeCluster]) ?></p>
              <ul class="door__links">
                <?php foreach (array_slice($homeByCluster[$homeCluster] ?? [], 0, 3) as $homeDoorGuide): ?>
                  <li><a href="<?= e($homeDoorGuide['path']) ?>"><?= e($homeDoorGuide['navLabel']) ?></a></li>
                <?php endforeach; ?>
              </ul>
              <a class="door__more" href="<?= e($homeHub['path']) ?>"><?= e(ui('hub.see_hub')) ?> <span aria-hidden="true">→</span></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Calculators --------------------------------------------------------- -->
  <section class="section section--ink section--mesh">
    <div class="container calc-band">
      <div class="calc-band__intro">
        <p class="eyebrow"><?= e(ui('home.tools_eyebrow')) ?></p>
        <h2><?= e(ui('home.tools_title')) ?></h2>
        <p class="lead"><?= e(ui('home.tools_lead')) ?></p>

        <div class="formula" aria-hidden="true">
          <span class="formula__term">FOB</span><span class="formula__op">+</span>
          <span class="formula__term">Flete</span><span class="formula__op">+</span>
          <span class="formula__term">Seguro</span><span class="formula__op">=</span>
          <span class="formula__term formula__term--key">CIF</span>
          <span class="formula__op">+</span><span class="formula__term">Tributos</span>
          <span class="formula__op">→</span><span class="formula__term formula__term--accent">Costo en Paraguay</span>
        </div>
      </div>

      <ol class="tool-rows">
        <?php $homeToolN = 0; foreach ($homeTools as $homeTool): ?>
          <li>
            <a class="tool-row" href="<?= e($homeTool['path']) ?>">
              <span class="tool-row__num" aria-hidden="true"><?= e(str_pad((string) ++$homeToolN, 2, '0', STR_PAD_LEFT)) ?></span>
              <span class="tool-row__body">
                <span class="tool-row__title"><?= e($homeTool['title']) ?></span>
                <span class="tool-row__text"><?= e($homeTool['metaDescription']) ?></span>
              </span>
              <span class="tool-row__go"><?= e(ui('home.tools_cta')) ?> <span aria-hidden="true">→</span></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- Most read ----------------------------------------------------------- -->
  <?php if ($homePopular !== []): ?>
    <section class="section">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="section-head__text">
            <p class="eyebrow"><?= e(ui('home.popular_eyebrow')) ?></p>
            <h2><?= e(ui('home.popular_title')) ?></h2>
          </div>
          <a class="link-arrow" href="/guias/"><?= e(ui('home.popular_all')) ?> <span aria-hidden="true">→</span></a>
        </div>
        <ol class="reads">
          <?php $homeReadN = 0; foreach ($homePopular as $homeRead): ?>
            <li>
              <a class="read" href="<?= e($homeRead['path']) ?>">
                <span class="read__num" aria-hidden="true"><?= e(str_pad((string) ++$homeReadN, 2, '0', STR_PAD_LEFT)) ?></span>
                <span class="read__body">
                  <span class="card__kicker"><?= e($homeClusters[$homeRead['cluster']] ?? '') ?></span>
                  <span class="read__title"><?= e($homeRead['navLabel']) ?></span>
                  <span class="read__text"><?= e($homeRead['metaDescription']) ?></span>
                </span>
              </a>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </section>
  <?php endif; ?>

  <!-- Aduana band ---------------------------------------------------------- -->
  <section class="section section--warm">
    <div class="container">
      <div class="framed split split--top">
        <div class="stack">
          <p class="eyebrow"><?= e(ui('home.aduana_eyebrow')) ?></p>
          <h2><?= e(ui('home.aduana_title')) ?></h2>
          <p class="lead"><?= e(ui('home.aduana_lead')) ?></p>
          <div class="btn-row">
            <a class="btn btn--secondary" href="<?= e($homeHubs['aduana']['path']) ?>"><?= e(ui('home.aduana_cta')) ?></a>
            <?php if (services('despacho-aduanero') !== null): ?>
              <a class="btn btn--primary" href="<?= e(quote_path('despacho-aduanero')) ?>"><?= e(ui('cta.quote')) ?></a>
            <?php endif; ?>
          </div>
        </div>
        <ul class="link-list">
          <?php foreach ($homeByCluster['aduana'] ?? [] as $homeAduana): ?>
            <li><a href="<?= e($homeAduana['path']) ?>"><?= e($homeAduana['navLabel']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- Services ------------------------------------------------------------ -->
  <section class="section" id="servicios">
    <div class="container">
      <div class="section-head section-head--split">
        <div class="section-head__text">
          <p class="eyebrow"><?= e(ui('home.services_eyebrow')) ?></p>
          <h2><?= e(ui('home.services_title')) ?></h2>
        </div>
        <p class="section-head__aside"><?= e(ui('home.services_lead')) ?></p>
      </div>

      <div class="board">
        <?php foreach ($homeClusters as $homeCluster => $homeClusterLabel): ?>
          <?php if (empty($homeServicesBy[$homeCluster])) { continue; } ?>
          <div class="board__col board__col--<?= e($homeCluster) ?>">
            <p class="board__title">
              <span class="board__icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $homeIcons[$homeCluster] ?? '' ?></svg></span>
              <?= e($homeClusterLabel) ?>
            </p>
            <ul>
              <?php foreach ($homeServicesBy[$homeCluster] as $homeSvcSlug => $homeSvc): ?>
                <li>
                  <a class="board__item" href="<?= e($homeSvc['path']) ?>">
                    <span class="board__name"><?= e($homeSvc['navLabel']) ?></span>
                    <span class="board__text"><?= e($homeSvc['metaDescription']) ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="unsure">
        <div class="unsure__copy">
          <h3 class="card-title"><?= e(ui('home.unsure_title')) ?></h3>
          <p><?= e(ui('home.unsure_text')) ?></p>
        </div>
        <div class="btn-row">
          <a class="btn btn--primary" href="<?= e(quote_path(null)) ?>"><?= e(ui('home.unsure_cta')) ?> <span aria-hidden="true">→</span></a>
          <?php if ($homeWhatsapp !== null): ?>
            <a class="btn btn--on-ink" href="<?= e($homeWhatsapp) ?>" rel="noopener" data-service=""><?= wa_icon() ?> <?= e(ui('cta.whatsapp')) ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Products ------------------------------------------------------------ -->
  <?php if (content('segmentos') !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="section-head__text">
            <p class="eyebrow"><?= e(ui('industries.eyebrow')) ?></p>
            <h2><?= e(ui('industries.title')) ?></h2>
          </div>
          <p class="section-head__aside"><?= e(ui('industries.lead')) ?></p>
        </div>
        <div class="chip-cloud">
          <?php foreach (content('segmentos') as $homeProduct): ?>
            <a class="chip-link" href="<?= e($homeProduct['path']) ?>"><?= e($homeProduct['navLabel']) ?> <span aria-hidden="true">→</span></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Blog ---------------------------------------------------------------- -->
  <?php $homeArticles = array_slice(content('blog'), 0, 3); ?>
  <?php if ($homeArticles !== []): ?>
    <section class="section">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="section-head__text">
            <p class="eyebrow"><?= e(ui('home.blog_eyebrow')) ?></p>
            <h2><?= e(ui('home.blog_title')) ?></h2>
          </div>
          <a class="link-arrow" href="/blog/"><?= e(ui('nav.blog')) ?> <span aria-hidden="true">→</span></a>
        </div>
        <div class="grid grid--3">
          <?php foreach ($homeArticles as $homeArticle): ?>
            <a class="card card--link card--article" href="/blog/<?= e($homeArticle['slug']) ?>/">
              <span class="card__kicker"><?= e(ui('home.blog_eyebrow')) ?></span>
              <h3 class="card-title"><?= e($homeArticle['title']) ?></h3>
              <p class="card__text"><?= e($homeArticle['description']) ?></p>
              <span class="card__arrow" aria-hidden="true">→</span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Process ------------------------------------------------------------- -->
  <?php require ROOT_DIR . '/partials/process.php'; ?>

  <!-- Casos: renders nothing until content/site.php has real testimonials. -->
  <?php $testimonialsSurface = false; require ROOT_DIR . '/partials/testimonials.php'; ?>

  <!-- Contact ------------------------------------------------------------- -->
  <section class="section section--warm" id="contacto">
    <div class="container split split--top">

      <div class="stack">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2 class="d2"><?= e(ui('cta_band.title')) ?></h2>
        <p class="lead"><?= e(ui('cta_band.lead')) ?></p>

        <ul class="checklist">
          <?php foreach (content('ui')['contact']['steps'] as $homeStep): ?>
            <li><span><?= e($homeStep) ?></span></li>
          <?php endforeach; ?>
        </ul>

        <div class="btn-row">
          <a class="btn btn--secondary" href="<?= e(quote_path(null)) ?>"><?= e(ui('home.contact_alt')) ?> <span aria-hidden="true">→</span></a>
          <?php if ($homeWhatsapp !== null): ?>
            <a class="btn btn--whatsapp" href="<?= e($homeWhatsapp) ?>" rel="noopener" data-service=""><?= wa_icon() ?> <?= e(ui('cta.whatsapp_long')) ?></a>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <?php
        $formId      = 'home';
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>

    </div>
  </section>

</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
