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
        'text'     => plain(implode(' ', $guideStep['body'])),
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
    'ogImage'     => image_og($guideImage),
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

/* ---- reading layout: anchors, TOC, reading time ------------------------
   One pass over the same arrays that render the body, so every TOC entry
   points at an id that exists. Ids are slugs of the visible headings; the
   page's own fixed ids are reserved first so a heading can never shadow them. */
$readingIds    = ['main' => true, 'delegar' => true, 'contenido' => true];
$readingAnchor = static function (string $text) use (&$readingIds): string {
    $slugText = strtr(mb_strtolower(plain($text)), ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ü' => 'u', 'ñ' => 'n']);
    $slugText = trim((string) preg_replace('~[^a-z0-9]+~', '-', $slugText), '-');
    $slugText = implode('-', array_slice(explode('-', $slugText), 0, 6));
    $base     = $slugText !== '' ? $slugText : 'seccion';
    $anchorId = $base;
    for ($n = 2; isset($readingIds[$anchorId]); $n++) {
        $anchorId = $base . '-' . $n;
    }
    $readingIds[$anchorId] = true;
    return $anchorId;
};

$tocAll    = [];
$stepIds   = [];
$wordCount = 0;
foreach ($guide['intro'] as $guideParagraph) {
    $wordCount += count(preg_split('~\s+~u', trim(plain($guideParagraph))) ?: []);
}
foreach ($guide['steps'] as $i => $guideStep) {
    $stepIds[$i] = $readingAnchor($guideStep['title']);
    $tocAll[]    = ['id' => $stepIds[$i], 'label' => $guideStep['title'], 'num' => (string) ($i + 1)];
    foreach ($guideStep['body'] as $guideStepParagraph) {
        $wordCount += count(preg_split('~\s+~u', trim(plain($guideStepParagraph))) ?: []);
    }
}
$sectionIds = [];
foreach ($guide['sections'] ?? [] as $i => $guideSection) {
    $sectionIds[$i] = $readingAnchor($guideSection['h2']);
    $tocAll[]       = ['id' => $sectionIds[$i], 'label' => $guideSection['h2'], 'num' => null];
    foreach ($guideSection['body'] as $guideSectionParagraph) {
        $wordCount += count(preg_split('~\s+~u', trim(plain($guideSectionParagraph))) ?: []);
    }
}
$faqId = null;
if ($guide['faq'] !== []) {
    $faqId    = $readingAnchor('preguntas-frecuentes');
    $tocAll[] = ['id' => $faqId, 'label' => ui('service.faq'), 'num' => null];
}
$readingMinutes = max(1, (int) ceil($wordCount / 200));
$stepCount      = count($guide['steps']);
/* Soft CTA after step 3 only when there is enough guide left to come back to. */
$softCtaAfter   = $stepCount >= 5 ? 2 : null;

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
        <p class="reading-meta">
          <?php if ($stepCount > 0): ?>
            <span><?= $stepCount ?> <?= e(ui('reading.steps', 'pasos')) ?></span>
            <span aria-hidden="true">·</span>
          <?php endif; ?>
          <span><?= $readingMinutes ?> <?= e(ui('article.reading_time')) ?></span>
          <span aria-hidden="true">·</span>
          <span><?= e(ui('guide.reviewed_prefix')) ?> <time datetime="<?= e($guide['lastReviewed']) ?>"><?= e(fmt_date_long($guide['lastReviewed'])) ?></time></span>
        </p>
      </div>
      <?php if (image_ready($guideImage)): ?>
        <figure class="page-hero__figure"><?= picture_html($guideImage, '(max-width: 1280px) 100vw, 1200px', '', true) ?></figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="reading" id="contenido">
    <div class="container reading__layout">

      <?php $tocItems = $tocAll; $tocVariant = 'mobile'; require ROOT_DIR . '/partials/guide-toc.php'; ?>

      <article class="reading__main" data-reading data-top-label="<?= e(ui('reading.top', 'Volver arriba')) ?>">
        <p class="note guide-reviewed">
          <?= e(ui('guide.reviewed_prefix')) ?>
          <?= e(fmt_date_long($guide['lastReviewed'])) ?>. <?= e(ui('guide.orientativo')) ?>
        </p>

        <?php if (!empty($guide['disclaimer'])): ?>
          <?php if (is_array($guide['disclaimer'])) { $discLink = $guide['disclaimer']; } ?>
          <?php require ROOT_DIR . '/partials/disclaimer-oficial.php'; ?>
        <?php endif; ?>

        <?php if ($guide['intro'] !== []): ?>
          <div class="prose reading__intro">
            <?php foreach ($guide['intro'] as $guideParagraph): ?>
              <p><?= rich($guideParagraph) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ($guide['steps'] !== []): ?>
          <ol class="steps">
            <?php foreach ($guide['steps'] as $i => $guideStep): ?>
              <li class="steps__item" id="<?= e($stepIds[$i]) ?>">
                <span class="steps__num" aria-hidden="true"><?= $i + 1 ?></span>
                <h2><?= e($guideStep['title']) ?></h2>
                <?php foreach ($guideStep['body'] as $guideStepParagraph): ?>
                  <p><?= rich($guideStepParagraph) ?></p>
                <?php endforeach; ?>
              </li>
              <?php if ($softCtaAfter === $i && $i < $stepCount - 1): ?>
          </ol>
          <?php $inlineCtaSlug = $delegateSlug; $inlineCtaVariant = 'soft'; require ROOT_DIR . '/partials/inline-cta.php'; ?>
          <ol class="steps" start="<?= $i + 2 ?>">
              <?php endif; ?>
            <?php endforeach; ?>
          </ol>
          <?php $inlineCtaSlug = $delegateSlug; $inlineCtaVariant = 'strong'; require ROOT_DIR . '/partials/inline-cta.php'; ?>
        <?php endif; ?>

        <?php if (!empty($guide['table']['rows'])): ?>
          <?php $guideTable = $guide['table']; ?>
          <div class="table-wrap" role="region" tabindex="0" aria-label="<?= e($guideTable['caption'] ?? $guide['navLabel']) ?>">
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
            <p class="note reading__table-note"><?= e($guideTable['note']) ?></p>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (!empty($guide['sections'])): ?>
          <?php foreach ($guide['sections'] as $i => $guideSection): ?>
            <div class="prose reading__section" id="<?= e($sectionIds[$i]) ?>">
              <h2><?= e($guideSection['h2']) ?></h2>
              <?php foreach ($guideSection['body'] as $guideSectionParagraph): ?>
                <p><?= rich($guideSectionParagraph) ?></p>
              <?php endforeach; ?>
              <?php if (!empty($guideSection['items'])): ?>
                <ul class="checklist">
                  <?php foreach ($guideSection['items'] as $guideSectionItem): ?>
                    <li><span><strong><?= e($guideSectionItem['title']) ?>.</strong> <?= rich($guideSectionItem['text']) ?></span></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

        <?php $affIds = $guide['affiliates'] ?? []; require ROOT_DIR . '/partials/affiliate-box.php'; ?>

        <?php if ($guide['toolLink'] !== null): ?>
          <a class="card card--link tool-callout reading__tool" href="<?= e($guide['toolLink']['path']) ?>">
            <span class="tool-callout__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="3" width="14" height="18" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8.5 7.5h7M8.5 12h.01M12 12h.01M15.5 12h.01M8.5 15.5h.01M12 15.5h.01M15.5 15.5h.01" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg></span>
            <span class="tool-callout__body">
              <span class="card-title"><?= e($guide['toolLink']['label']) ?></span>
              <span class="card__text"><?= e($guide['toolLink']['text']) ?></span>
            </span>
          </a>
        <?php endif; ?>

        <?php if ($guide['faq'] !== []): ?>
          <div class="reading__faq" id="<?= e($faqId) ?>">
            <?php $faqItems = $guide['faq']; ?>
            <?php require ROOT_DIR . '/partials/faq.php'; ?>
          </div>
        <?php endif; ?>
      </article>

      <aside class="reading__aside">
        <div class="reading__sticky">
          <?php $tocItems = $tocAll; $tocVariant = 'aside'; require ROOT_DIR . '/partials/guide-toc.php'; ?>
          <?php $sideLeadSlug = $delegateSlug; require ROOT_DIR . '/partials/sidebar-lead.php'; ?>
          <?php if ($guide['toolLink'] !== null): ?>
            <a class="side-tool" href="<?= e($guide['toolLink']['path']) ?>">
              <span class="side-tool__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="3" width="14" height="18" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8.5 7.5h7M8.5 12h.01M12 12h.01M15.5 12h.01M8.5 15.5h.01M12 15.5h.01M15.5 15.5h.01" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg></span>
              <span class="side-tool__label"><?= e($guide['toolLink']['label']) ?></span>
              <span class="side-tool__arrow" aria-hidden="true">→</span>
            </a>
          <?php endif; ?>
        </div>
      </aside>

    </div>
  </section>

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
<script src="<?= e(asset('/assets/js/reading.js')) ?>" defer></script>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
