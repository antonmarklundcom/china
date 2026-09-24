<?php
/**
 * Homepage: hero with the China → Paraguay route, the four doors (one per
 * topic cluster), the calculators band, the most-read guides, the aduana band,
 * the services, the product chips, the process and the contact form.
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

$homeWhatsapp = whatsapp_link(whatsapp_text_for_page());
$homeGuides   = content('guias');
$homeHubs     = content('ui')['hubs'];
$homeDoorImages = (array) ($meta['doorImages'] ?? []);

/* Guides per cluster, in file order: the first three go on each door. */
$homeByCluster = [];
foreach ($homeGuides as $homeSlug => $homeGuide) {
    $homeByCluster[$homeGuide['cluster'] ?? ''][$homeSlug] = $homeGuide;
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
    <div class="container hero__grid">

      <div class="hero__copy">
        <span class="pill">
          <span class="pill__dot" aria-hidden="true"></span>
          <?= e(ui('home.eyebrow')) ?>
        </span>

        <h1><?= e(ui('home.h1_lead')) ?><span class="accent"><?= e(ui('home.h1_accent')) ?></span></h1>

        <p class="lead hero__lead"><?= e(ui('home.lead')) ?></p>

        <div class="btn-row">
          <a class="btn btn--primary" href="/importar/como-importar-de-china-a-paraguay/">Cómo importar de China</a>
          <a class="btn btn--secondary" href="/herramientas/calculadora-costo-importacion/">Calcular el costo</a>
        </div>

        <ul class="hero__quick" aria-label="Accesos rápidos">
          <?php foreach (['temu-paraguay', 'shein-paraguay', 'aliexpress-paraguay', 'alibaba-paraguay'] as $homeQuick): ?>
            <?php if (isset($homeGuides[$homeQuick])): ?>
              <li><a href="<?= e($homeGuides[$homeQuick]['path']) ?>"><?= e($homeGuides[$homeQuick]['navLabel']) ?></a></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="hero__visual">
        <?= picture_html($homeImage, '(max-width: 768px) 100vw, 50vw', 'hero__img', true) ?>
        <div class="route-card" aria-label="El recorrido de una importación">
          <p class="route-card__title">El recorrido de su mercadería</p>
          <ol class="route">
            <li><span class="route__dot"></span><strong>Fábrica en China</strong><span>Proveedor verificado y muestra aprobada</span></li>
            <li><span class="route__dot"></span><strong>Inspección y embarque</strong><span>Control antes del pago final</span></li>
            <li><span class="route__dot"></span><strong>Flete marítimo o aéreo</strong><span>Contenedor, consolidado o courier</span></li>
            <li><span class="route__dot route__dot--end"></span><strong>Aduana y entrega en Paraguay</strong><span>Despachante matriculado</span></li>
          </ol>
        </div>
      </div>

    </div>
  </section>

  <!-- Four doors ---------------------------------------------------------- -->
  <section class="section" id="temas">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow"><?= e(ui('home.doors_eyebrow')) ?></p>
        <h2><?= e(ui('home.doors_title')) ?></h2>
      </div>

      <div class="doors mt-4">
        <?php foreach ($homeHubs as $homeCluster => $homeHub): ?>
          <article class="door door--<?= e($homeCluster) ?>">
            <?= picture_html($homeDoorImages[$homeCluster] ?? null, '(max-width: 768px) 100vw, 25vw', 'door__img') ?>
            <div class="door__body">
              <span class="door__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $homeIcons[$homeCluster] ?></svg>
              </span>
              <h3 class="card-title"><a href="<?= e($homeHub['path']) ?>"><?= e(content('ui')['clusters'][$homeCluster]) ?></a></h3>
              <p class="card__text"><?= e(content('ui')['cluster_leads'][$homeCluster]) ?></p>
              <ul class="door__links">
                <?php foreach (array_slice($homeByCluster[$homeCluster] ?? [], 0, 3) as $homeDoorGuide): ?>
                  <li><a href="<?= e($homeDoorGuide['path']) ?>"><?= e($homeDoorGuide['navLabel']) ?></a></li>
                <?php endforeach; ?>
              </ul>
              <a class="door__more" href="<?= e($homeHub['path']) ?>"><?= e(ui('hub.see_hub')) ?> &rarr;</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Calculators --------------------------------------------------------- -->
  <section class="section section--ink">
    <div class="container">
      <div class="section-head section-head--split">
        <div class="section-head__text">
          <p class="eyebrow"><?= e(ui('home.tools_eyebrow')) ?></p>
          <h2><?= e(ui('home.tools_title')) ?></h2>
        </div>
        <p class="section-head__aside"><?= e(ui('home.tools_lead')) ?></p>
      </div>
      <div class="grid grid--3 mt-4">
        <?php foreach (content('tools') as $homeTool): ?>
          <a class="card card--link card--glass" href="<?= e($homeTool['path']) ?>">
            <h3 class="card-title"><?= e($homeTool['title']) ?></h3>
            <p class="card__text"><?= e($homeTool['metaDescription']) ?></p>
            <span class="card__cta">Usar la calculadora &rarr;</span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Most read ----------------------------------------------------------- -->
  <?php if ($homePopular !== []): ?>
    <section class="section">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('home.popular_eyebrow')) ?></p>
          <h2><?= e(ui('home.popular_title')) ?></h2>
        </div>
        <div class="grid grid--3 mt-4">
          <?php foreach ($homePopular as $homeRead): ?>
            <a class="card card--link card--guide" href="<?= e($homeRead['path']) ?>">
              <span class="card__kicker"><?= e(content('ui')['clusters'][$homeRead['cluster']] ?? '') ?></span>
              <h3 class="card-title"><?= e($homeRead['navLabel']) ?></h3>
              <p class="card__text"><?= e($homeRead['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Aduana band ---------------------------------------------------------- -->
  <section class="section section--surface">
    <div class="container split split--top">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('home.aduana_eyebrow')) ?></p>
        <h2><?= e(ui('home.aduana_title')) ?></h2>
        <p class="lead"><?= e(ui('home.aduana_lead')) ?></p>
        <p><a class="btn btn--secondary" href="<?= e($homeHubs['aduana']['path']) ?>">Ver las guías de aduana</a></p>
      </div>
      <ul class="link-list">
        <?php foreach ($homeByCluster['aduana'] ?? [] as $homeAduana): ?>
          <li><a href="<?= e($homeAduana['path']) ?>"><?= e($homeAduana['navLabel']) ?></a></li>
        <?php endforeach; ?>
      </ul>
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

      <?php
      $gridSlugs    = array_keys(services());
      $gridNumbered = false;
      require ROOT_DIR . '/partials/service-card-grid.php';
      ?>

      <div class="unsure">
        <div class="unsure__copy">
          <h3 class="card-title"><?= e(ui('home.unsure_title')) ?></h3>
          <p><?= e(ui('home.unsure_text')) ?></p>
        </div>
        <a class="btn btn--primary" href="<?= e($homeWhatsapp ?? '/contacto/') ?>"<?= $homeWhatsapp ? ' rel="noopener"' : '' ?>>
          <?= e(ui('cta.talk')) ?>
        </a>
      </div>
    </div>
  </section>

  <!-- Products ------------------------------------------------------------ -->
  <?php if (content('segmentos') !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('industries.eyebrow')) ?></p>
          <h2><?= e(ui('industries.title')) ?></h2>
          <p class="lead"><?= e(ui('industries.lead')) ?></p>
        </div>
        <div class="chip-cloud mt-4">
          <?php foreach (content('segmentos') as $homeProduct): ?>
            <a class="chip-link" href="<?= e($homeProduct['path']) ?>"><?= e($homeProduct['navLabel']) ?></a>
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
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('home.blog_eyebrow')) ?></p>
          <h2><?= e(ui('home.blog_title')) ?></h2>
        </div>
        <div class="grid grid--3 mt-4">
          <?php foreach ($homeArticles as $homeArticle): ?>
            <a class="card card--link" href="/blog/<?= e($homeArticle['slug']) ?>/">
              <h3 class="card-title"><?= e($homeArticle['title']) ?></h3>
              <p class="card__text"><?= e($homeArticle['description']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Process ------------------------------------------------------------- -->
  <?php require ROOT_DIR . '/partials/process.php'; ?>

  <!-- Contact ------------------------------------------------------------- -->
  <section class="section section--surface" id="contacto">
    <div class="container split">

      <div class="stack">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2 class="d2"><?= e(ui('cta_band.title')) ?></h2>
        <div class="prose"><p><?= e(ui('cta_band.lead')) ?></p></div>

        <?php if ($homeWhatsapp !== null): ?>
          <div class="btn-row">
            <a class="btn btn--whatsapp" href="<?= e($homeWhatsapp) ?>" rel="noopener"><?= e(ui('cta.whatsapp_long')) ?></a>
          </div>
        <?php endif; ?>

        <ul class="checklist">
          <?php foreach (content('ui')['contact']['steps'] as $homeStep): ?>
            <li><span><?= e($homeStep) ?></span></li>
          <?php endforeach; ?>
        </ul>
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
