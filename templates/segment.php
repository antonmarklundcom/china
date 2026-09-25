<?php
/**
 * Renders one segment page from content/segmentos.php: a landing page per rubro
 * (sector) or per situation — "servicios para importadores", "byta
 * leverantör". Every route file is three lines: require bootstrap, set $slug,
 * require this file — the same pattern templates/service.php and
 * templates/tool.php use.
 *
 * A segment page has no tier or WhatsApp message of its own: it presets the
 * visitor into $record['leadSlug'], an existing service slug in
 * content/lead-values.php['services'], so the whole lead value model
 * resolves the tier, the CRM tag and the WhatsApp prefill with no new
 * entries needed there.
 *
 * New file, additive — not one of the hard-limited templates.
 */

declare(strict_types=1);

/** @var string $slug */
$record = content('segmentos')[$slug ?? ''] ?? null;

if ($record === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

$page = [
    'title'       => $record['seoTitle'],
    'description' => $record['metaDescription'],
    'path'        => $record['path'],
    'breadcrumbs' => [
        ['label' => ui('hubs.importar.label'), 'path' => ui('hubs.importar.path')],
        ['label' => $record['navLabel'], 'path' => $record['path']],
    ],
    'faq'      => $record['faq'],
    /* Every WhatsApp link and the CTA band on this page resolve through the
       bundle's tier-A service, not a segmento entry of its own. */
    'leadSlug' => $record['leadSlug'],
];

$segImage    = $record['image'] ?? null;
$page['ogImage'] = image_og($segImage);
$hero        = $record['hero'];
$ctaWhatsapp = whatsapp_text_for_page($page);

/* ---- reading layout: anchors + TOC from the same arrays as the body ----- */
$readingIds    = ['main' => true, 'solicitar' => true, 'contenido' => true];
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

$tocAll = [];
$trapsId = $needId = $faqId = null;
if ($record['traps'] !== []) {
    $trapsId  = $readingAnchor(ui('segment.traps_title'));
    $tocAll[] = ['id' => $trapsId, 'label' => ui('segment.traps_title'), 'num' => null];
}
$sectionIds = [];
foreach ($record['sections'] as $i => $block) {
    $sectionIds[$i] = $readingAnchor($block['h2'] ?? '');
    $tocAll[]       = ['id' => $sectionIds[$i], 'label' => $block['h2'] ?? '', 'num' => null];
}
if ($record['weNeed'] !== []) {
    $needId   = $readingAnchor(ui('service.we_need'));
    $tocAll[] = ['id' => $needId, 'label' => ui('service.we_need'), 'num' => null];
}
if ($record['faq'] !== []) {
    $faqId    = $readingAnchor('preguntas-frecuentes');
    $tocAll[] = ['id' => $faqId, 'label' => ui('service.faq'), 'num' => null];
}

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e($hero['eyebrow']) ?></p>
        <h1><?= e($hero['h1']) ?></h1>
        <p class="lead"><?= e($hero['lead']) ?></p>
        <div class="btn-row">
          <a class="btn btn--primary" href="#solicitar"><?= e(ui('cta.consult')) ?></a>
          <?php if (($wa = whatsapp_link($ctaWhatsapp)) !== null): ?>
            <a class="btn btn--secondary" href="<?= e($wa) ?>" rel="noopener"><?= e(ui('cta.whatsapp')) ?></a>
          <?php endif; ?>
        </div>
      </div>
      <?php if (image_ready($segImage)): ?>
        <figure class="page-hero__figure"><?= picture_html($segImage, '(max-width: 1280px) 100vw, 1200px', '', true) ?></figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="reading" id="contenido">
    <div class="container reading__layout">

      <?php $tocItems = $tocAll; $tocVariant = 'mobile'; $tocTitle = ui('reading.toc_page', 'En esta página'); require ROOT_DIR . '/partials/guide-toc.php'; ?>

      <article class="reading__main" data-reading data-top-label="<?= e(ui('reading.top', 'Volver arriba')) ?>">

        <?php if ($record['traps'] !== []): ?>
          <div class="reading__block" id="<?= e($trapsId) ?>">
            <h2 class="reading__h2"><?= e(ui('segment.traps_title')) ?></h2>
            <div class="reading__traps">
              <?php foreach ($record['traps'] as $trapIndex => $trap): ?>
                <div class="reading__trap">
                  <span class="reading__trap-num" aria-hidden="true"><?= $trapIndex + 1 ?></span>
                  <h3><?= e($trap['title'] ?? '') ?></h3>
                  <p><?= rich($trap['text'] ?? '') ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php $inlineCtaSlug = $record['leadSlug']; $inlineCtaVariant = 'soft'; require ROOT_DIR . '/partials/inline-cta.php'; ?>
        <?php endif; ?>

        <?php foreach ($record['sections'] as $i => $block): ?>
          <div class="prose reading__section" id="<?= e($sectionIds[$i]) ?>">
            <h2><?= e($block['h2'] ?? '') ?></h2>
            <?php foreach ($block['body'] ?? [] as $paragraph): ?>
              <p><?= rich($paragraph) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>

        <?php if ($record['weNeed'] !== []): ?>
          <div class="reading__section" id="<?= e($needId) ?>">
            <h2 class="reading__h2"><?= e(ui('service.we_need')) ?></h2>
            <ul class="checklist checklist--need">
              <?php foreach ($record['weNeed'] as $item): ?>
                <li><span><?= e($item) ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php $inlineCtaSlug = $record['leadSlug']; $inlineCtaVariant = 'strong'; require ROOT_DIR . '/partials/inline-cta.php'; ?>

        <?php if ($record['faq'] !== []): ?>
          <div class="reading__faq" id="<?= e($faqId) ?>">
            <?php $faqItems = $record['faq']; ?>
            <?php require ROOT_DIR . '/partials/faq.php'; ?>
          </div>
        <?php endif; ?>
      </article>

      <aside class="reading__aside">
        <div class="reading__sticky">
          <?php $tocItems = $tocAll; $tocVariant = 'aside'; $tocTitle = ui('reading.toc_page', 'En esta página'); require ROOT_DIR . '/partials/guide-toc.php'; ?>
          <?php $sideLeadSlug = $record['leadSlug']; require ROOT_DIR . '/partials/sidebar-lead.php'; ?>
        </div>
      </aside>

    </div>
  </section>

  <?php $segBand = 1; /* alternates surface/white across whichever of the
                          bands below actually render, after the white reading band */ ?>

  <?php if ($record['bundle'] !== []): ?>
    <section class="section<?= $segBand++ % 2 ? ' section--surface' : '' ?>">
      <div class="container">
        <h2><?= e(ui('segment.bundle_title')) ?></h2>
        <div class="mt-4">
          <?php $gridSlugs = $record['bundle']; ?>
          <?php require ROOT_DIR . '/partials/service-card-grid.php'; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Solicitar: preset to the bundle's tier-A service. -->
  <section class="section<?= $segBand++ % 2 ? ' section--surface' : '' ?>" id="solicitar">
    <div class="container split split--top">
      <div class="stack">
        <p class="eyebrow"><?= e(ui('segment.form_eyebrow')) ?></p>
        <h2><?= e(ui('form.legend')) ?></h2>
        <p class="lead"><?= e(ui('segment.form_lead')) ?></p>
      </div>

      <div>
        <?php
        $formId      = 'segmento-' . $slug;
        $formService = $record['leadSlug'];
        $formHeading = '';
        require ROOT_DIR . '/partials/lead-form.php';
        ?>
      </div>
    </div>
  </section>

  <?php $segOthers = array_filter(content('segmentos'), static fn (array $o): bool => $o['path'] !== $record['path']); ?>
  <?php if ($segOthers !== []): ?>
    <section class="section<?= $segBand++ % 2 ? ' section--surface' : '' ?>">
      <div class="container">
        <h2><?= e(ui('segment.others')) ?></h2>
        <div class="chip-cloud mt-4">
          <?php foreach ($segOthers as $segOther): ?>
            <a class="chip-link" href="<?= e($segOther['path']) ?>"><?= e($segOther['navLabel']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<script src="<?= e(asset('/assets/js/reading.js')) ?>" defer></script>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
