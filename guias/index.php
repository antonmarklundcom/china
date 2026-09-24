<?php
/**
 * The guides hub: every record in content/guias.php, in file order.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/guias/');
$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/guias/',
    'breadcrumbs' => [['label' => ui('nav.guides'), 'path' => '/guias/']],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(ui('nav.guides')) ?></p>
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php foreach (content('ui')['hubs'] as $listCluster => $listHub): ?>
        <?php $listGuides = array_filter(content('guias'), static fn (array $g): bool => ($g['cluster'] ?? '') === $listCluster); ?>
        <?php if ($listGuides === []) { continue; } ?>
        <div class="section-head mt-5">
          <h2><a href="<?= e($listHub['path']) ?>"><?= e(content('ui')['clusters'][$listCluster]) ?></a></h2>
          <p class="lead"><?= e(content('ui')['cluster_leads'][$listCluster]) ?></p>
        </div>
        <div class="grid grid--3 mt-4">
          <?php foreach ($listGuides as $listGuide): ?>
            <a class="card card--link card--guide" href="<?= e($listGuide['path']) ?>">
              <h3 class="card-title"><?= e($listGuide['navLabel']) ?></h3>
              <p class="card__text"><?= e($listGuide['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
