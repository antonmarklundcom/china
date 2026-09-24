<?php
/**
 * A topic hub: /comprar/, /importar/, /aduana/, /viajar-a-china/. Everything on
 * the page is derived from the content arrays by cluster key, so a guide,
 * service, product page or tool joins its hub by existing — no hub edits.
 *
 *   $cluster  string  required — a key of ui('clusters') and ui('hubs')
 */

declare(strict_types=1);

/** @var string $cluster */
$hubRecord = content('ui')['hubs'][$cluster ?? ''] ?? null;
if ($hubRecord === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$meta = page_meta($hubRecord['path']);
$hubImage = $meta['image'] ?? null;

$hubGuides = array_filter(content('guias'), static fn (array $g): bool => ($g['cluster'] ?? '') === $cluster);
$hubServices = array_filter(services(), static fn (array $s): bool => $s['cluster'] === $cluster);
$hubTools = array_filter(content('tools'), static fn (array $t): bool => ($t['formNeed'] ?? '') === $cluster);
$hubProducts = $cluster === 'importar' ? content('segmentos') : [];

/* The hub's lead source: its first service, so the WhatsApp prefill and the
   form's tier match the topic the visitor is reading about. */
$hubLeadSlug = array_key_first($hubServices);

$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => $hubRecord['path'],
    'ogImage'     => image_og($hubImage),
    'leadSlug'    => $hubLeadSlug,
    'breadcrumbs' => [['label' => $hubRecord['label'], 'path' => $hubRecord['path']]],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero page-hero--hub hub-<?= e($cluster) ?>">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(content('ui')['clusters'][$cluster]) ?></p>
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
      <?php if (image_ready($hubImage)): ?>
        <figure class="page-hero__figure"><?= picture_html($hubImage, '(max-width: 1280px) 100vw, 1200px', '', true) ?></figure>
      <?php endif; ?>
    </div>
  </section>

  <?php if ($cluster === 'aduana'): ?>
    <section class="section section--tight">
      <div class="container"><?php require ROOT_DIR . '/partials/disclaimer-oficial.php'; ?></div>
    </section>
  <?php endif; ?>

  <?php if ($hubGuides !== []): ?>
    <section class="section">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('hub.guides')) ?></p>
          <h2><?= e(content('ui')['cluster_leads'][$cluster]) ?></h2>
        </div>
        <div class="grid grid--3 mt-4">
          <?php foreach ($hubGuides as $hubGuide): ?>
            <a class="card card--link card--guide" href="<?= e($hubGuide['path']) ?>">
              <h3 class="card-title"><?= e($hubGuide['navLabel']) ?></h3>
              <p class="card__text"><?= e($hubGuide['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($hubProducts !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('hub.products')) ?></p>
          <h2><?= e(ui('industries.title')) ?></h2>
          <p class="lead"><?= e(ui('industries.lead')) ?></p>
        </div>
        <div class="chip-cloud mt-4">
          <?php foreach ($hubProducts as $hubProduct): ?>
            <a class="chip-link" href="<?= e($hubProduct['path']) ?>"><?= e($hubProduct['navLabel']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($hubTools !== []): ?>
    <section class="section">
      <div class="container">
        <p class="eyebrow"><?= e(ui('hub.tools')) ?></p>
        <div class="grid grid--3 mt-4">
          <?php foreach ($hubTools as $hubTool): ?>
            <a class="card card--link card--tool" href="<?= e($hubTool['path']) ?>">
              <h3 class="card-title"><?= e($hubTool['title']) ?></h3>
              <p class="card__text"><?= e($hubTool['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($hubServices !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <div class="section-head">
          <p class="eyebrow"><?= e(ui('hub.services')) ?></p>
          <h2><?= e(ui('home.services_title')) ?></h2>
        </div>
        <?php
        $gridSlugs    = array_keys($hubServices);
        $gridNumbered = false;
        require ROOT_DIR . '/partials/service-card-grid.php';
        ?>
      </div>
    </section>
  <?php endif; ?>

  <section class="section" id="consulta">
    <div class="container split split--top">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('cta_band.eyebrow')) ?></p>
        <h2><?= e(ui('cta_band.title')) ?></h2>
        <p class="lead"><?= e(ui('cta_band.lead')) ?></p>
        <ul class="checklist">
          <?php foreach (content('ui')['contact']['steps'] as $hubStep): ?>
            <li><span><?= e($hubStep) ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div>
        <?php
        $formId      = 'hub-' . $cluster;
        $formNeed    = $cluster;
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
