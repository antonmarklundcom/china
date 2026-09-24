<?php
/**
 * Renders one guide from content/guias.php. Every /guias/<slug>/index.php is
 * three lines: require bootstrap, set $slug, require this file — the same
 * discipline templates/service.php and templates/tool.php use.
 *
 * A guide has no calculator, so unlike templates/tool.php there is nothing to
 * output-buffer per page: the shared chrome here (breadcrumbs, hero, numbered
 * steps, delegate box, FAQ, related guides, CTA) is the whole page, built
 * straight from content/guias.php the way templates/service.php builds a
 * service page straight from content/services.php.
 *
 *   $slug  string  required — looked up in content('guias')
 */

declare(strict_types=1);

/** @var string $slug */
$guide = content('guias')[$slug ?? ''] ?? null;

if ($guide === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

/* The "Cuándo conviene delegarlo" box and every WhatsApp/CTA on this page
   resolve through the guide's relatedService slug — the one place the model
   is named, so the box, the form and the page's own lead_value() all agree. */
$delegateSlug = $guide['relatedService'] ?? null;
$delegateLead = lead_value($delegateSlug);

/* HowTo JSON-LD from the same $guide['steps'] array that renders the visible
   numbered list — one source, by design */
$howToSteps = [];
foreach ($guide['steps'] as $i => $guideStep) {
    $howToSteps[] = [
        '@type'    => 'HowToStep',
        'position' => $i + 1,
        'name'     => $guideStep['title'],
        'text'     => implode(' ', $guideStep['body']),
    ];
}
$howTo = [
    '@context'    => 'https://schema.org',
    '@type'       => 'HowTo',
    'name'        => $guide['hero']['h1'],
    'description' => $guide['metaDescription'],
    'step'        => $howToSteps,
];

/* Breadcrumb parent: the guide's cluster hub (/comprar/, /importar/, …), or
   /guias/ for a guide without one. */
$guideHubRecord = content('ui')['hubs'][$guide['cluster'] ?? ''] ?? null;
$guideHub = $guideHubRecord !== null
    ? ['label' => $guideHubRecord['label'], 'path' => $guideHubRecord['path']]
    : ['label' => ui('nav.guides'), 'path' => '/guias/'];
$guideImage = $guide['image'] ?? null;

$page = [
    'ogImage'     => $guideImage['src'] ?? null,
    'title'       => $guide['seoTitle'] !== '' ? $guide['seoTitle'] : $guide['title'],
    'description' => $guide['metaDescription'],
    'path'        => $guide['path'],
    'breadcrumbs' => [
        $guideHub,
        ['label' => $guide['navLabel'], 'path' => $guide['path']],
    ],
    'faq'      => $guide['faq'],
    'leadSlug' => $delegateSlug,
    'jsonld'   => [$howTo],
];

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e($guide['hero']['eyebrow']) ?></p>
        <h1><?= e($guide['hero']['h1']) ?></h1>
        <p class="lead"><?= e($guide['hero']['lead']) ?></p>
      </div>
      <?php if (!empty($guideImage['src'])): ?>
        <figure class="page-hero__figure">
          <img src="<?= e(asset($guideImage['src'])) ?>" alt="<?= e($guideImage['alt'] ?? '') ?>"
               width="<?= e((string) ($guideImage['width'] ?? 1600)) ?>" height="<?= e((string) ($guideImage['height'] ?? 900)) ?>"
               fetchpriority="high" decoding="async">
        </figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="section">
    <div class="container stack">
      <p class="note guide-reviewed">
        <?= e(ui('guide.reviewed_prefix')) ?>
        <?= e(fmt_date_long($guide['lastReviewed'])) ?>. <?= e(ui('guide.orientativo')) ?>
      </p>

      <?php if (!empty($guide['disclaimer'])): ?>
        <?php if (is_array($guide['disclaimer'])) { $discLink = $guide['disclaimer']; } ?>
        <?php require ROOT_DIR . '/partials/disclaimer-oficial.php'; ?>
      <?php endif; ?>

      <?php if ($guide['intro'] !== []): ?>
        <div class="prose">
          <?php foreach ($guide['intro'] as $guideParagraph): ?>
            <p><?= e($guideParagraph) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($guide['steps'] !== []): ?>
        <ol class="steps mt-4">
          <?php foreach ($guide['steps'] as $guideStep): ?>
            <li class="steps__item">
              <h2><?= e($guideStep['title']) ?></h2>
              <?php foreach ($guideStep['body'] as $guideStepParagraph): ?>
                <p><?= e($guideStepParagraph) ?></p>
              <?php endforeach; ?>
            </li>
          <?php endforeach; ?>
        </ol>
      <?php endif; ?>

      <?php if (!empty($guide['table']['rows'])): ?>
        <?php $guideTable = $guide['table']; ?>
        <div class="table-wrap mt-4">
          <table class="data-table">
            <?php if (!empty($guideTable['caption'])): ?>
              <caption><?= e($guideTable['caption']) ?></caption>
            <?php endif; ?>
            <thead><tr>
              <?php foreach ($guideTable['head'] as $guideTh): ?><th scope="col"><?= e($guideTh) ?></th><?php endforeach; ?>
            </tr></thead>
            <tbody>
              <?php foreach ($guideTable['rows'] as $guideRow): ?>
                <tr><?php foreach ($guideRow as $guideCellIndex => $guideCell): ?><?= $guideCellIndex === 0 ? '<th scope="row">' . e($guideCell) . '</th>' : '<td>' . e($guideCell) . '</td>' ?><?php endforeach; ?></tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php if (!empty($guideTable['note'])): ?>
          <p class="note"><?= e($guideTable['note']) ?></p>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (!empty($guide['sections'])): ?>
        <?php foreach ($guide['sections'] as $guideSection): ?>
          <div class="prose mt-4">
            <h2><?= e($guideSection['h2']) ?></h2>
            <?php foreach ($guideSection['body'] as $guideSectionParagraph): ?>
              <p><?= e($guideSectionParagraph) ?></p>
            <?php endforeach; ?>
            <?php if (!empty($guideSection['items'])): ?>
              <ul class="checklist">
                <?php foreach ($guideSection['items'] as $guideSectionItem): ?>
                  <li><span><strong><?= e($guideSectionItem['title']) ?>.</strong> <?= e($guideSectionItem['text']) ?></span></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php $affIds = $guide['affiliates'] ?? []; require ROOT_DIR . '/partials/affiliate-box.php'; ?>
    </div>
  </section>

  <?php if ($guide['toolLink'] !== null): ?>
    <section class="section section--surface">
      <div class="container">
        <a class="card card--link" href="<?= e($guide['toolLink']['path']) ?>">
          <h2 class="card-title"><?= e($guide['toolLink']['label']) ?></h2>
          <p class="card__text"><?= e($guide['toolLink']['text']) ?></p>
        </a>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($guide['faq'] !== []): ?>
    <section class="section">
      <div class="container">
        <?php $faqItems = $guide['faq']; ?>
        <?php require ROOT_DIR . '/partials/faq.php'; ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Cuándo conviene delegarlo: the guide's own lead form, set
       to the matching service via content/lead-values.php — never a bare
       link, per prompts/sonnet-5-guias.md. -->
  <?php if ($delegateSlug !== null): ?>
    <section class="section section--surface" id="delegar">
      <div class="container split split--top">
        <div class="stack">
          <p class="eyebrow"><?= e(ui('guide.delegate_eyebrow')) ?></p>
          <h2><?= e(ui('guide.delegate_title')) ?></h2>
          <p class="lead"><?= e(ui('guide.delegate_lead')) ?></p>
          <ul class="checklist">
            <?php foreach ($delegateLead['nextStep'] as $guideNextStep): ?>
              <li><span><?= e($guideNextStep) ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div>
          <?php
          $formId      = 'guia-' . $slug;
          $formService = $delegateSlug;
          $formNeed    = $delegateLead['need'];
          $formHeading = ui('guide.delegate_form_heading');
          require ROOT_DIR . '/partials/lead-form.php';
          ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
    $guideRelated = [];
    foreach ($guide['related'] as $guideRelatedSlug) {
        if (isset(content('guias')[$guideRelatedSlug])) {
            $guideRelated[] = content('guias')[$guideRelatedSlug];
        }
    }
  ?>
  <?php if ($guideRelated !== []): ?>
    <section class="section">
      <div class="container">
        <h2><?= e(ui('guide.related')) ?></h2>
        <div class="grid grid--3 mt-4">
          <?php foreach ($guideRelated as $oneGuide): ?>
            <a class="card card--link" href="<?= e($oneGuide['path']) ?>">
              <h3 class="card-title"><?= e($oneGuide['navLabel']) ?></h3>
              <p class="card__text"><?= e($oneGuide['metaDescription']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
