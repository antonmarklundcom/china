<?php
/**
 * Renders one tool from content/tools.php. Every /herramientas/<slug>/index.php
 * builds its own calculator markup into $toolCalcHtml (via output buffering,
 * the same pattern templates/article.php uses for $sections) and then requires
 * this file — the shared chrome (breadcrumbs, hero, SEO copy, FAQ, related
 * services, CTA) is common to all six tools; the calculator itself is not,
 * because the six field sets have nothing in common.
 *
 *   $slug         string  required — looked up in content('tools')
 *   $toolCalcHtml string  required — pre-rendered calculator/quiz markup,
 *                         already escaped by the page that built it
 */

declare(strict_types=1);

/** @var string $slug */
/** @var string $toolCalcHtml */
$tool = content('tools')[$slug ?? ''] ?? null;

if ($tool === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

/* The reference tables and their review date come from the market module
   (lib/market/<market>.php), so a calculator page reads the same numbers the
   JS calculator does and neither hardcodes a country's rules. */
$lastReviewed = market_last_reviewed();

$page = [
    'title'       => $tool['seoTitle'] !== '' ? $tool['seoTitle'] : $tool['title'],
    'description' => $tool['metaDescription'],
    'path'        => $tool['path'],
    'breadcrumbs' => [
        ['label' => ui('nav.tools'), 'path' => '/herramientas/'],
        ['label' => $tool['title'], 'path' => $tool['path']],
    ],
    'faq'      => $tool['faq'],
    'leadSlug' => $slug,
];

/* The quote this tool hands off to: the page's own lead slug plus its need
   (quote_path() adds the need for a non-service slug). */
$toolQuote = quote_path($slug);
$toolWa    = whatsapp_link(whatsapp_text_for_page($page));

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero page-hero--tool">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e($tool['hero']['eyebrow']) ?></p>
        <h1><?= e($tool['hero']['h1']) ?></h1>
        <p class="lead"><?= e($tool['hero']['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="section tool-body">
    <div class="container svc-layout">
      <div class="svc-main stack">
        <p class="note tool-reviewed">
          <?= e(ui('tools.reviewed_prefix')) ?>
          <?= e(fmt_date_long($lastReviewed)) ?>. <?= e(ui('tools.orientativo')) ?>
        </p>

        <?= $toolCalcHtml ?>

        <!-- The result → quote handoff. assets/js/site.js moves it into the
             tool's result panel the moment a result is shown; until then (and
             without JS, when the calculator cannot run) it stays hidden. -->
        <div class="tool-handoff" data-tool-handoff="<?= e($slug) ?>" hidden>
          <div class="tool-handoff__copy">
            <p class="tool-handoff__title"><?= e(ui('tools.handoff_title')) ?></p>
            <p class="tool-handoff__text"><?= e(ui('tools.handoff_text')) ?></p>
          </div>
          <a class="btn btn--primary btn--lg" href="<?= e($toolQuote) ?>"><?= e(ui('tools.handoff_cta')) ?> <span aria-hidden="true">→</span></a>
        </div>
      </div>

      <aside class="svc-aside" aria-label="<?= e(ui('tools.aside_eyebrow')) ?>">
        <div class="summary">
          <p class="summary__eyebrow"><?= e(ui('tools.aside_eyebrow')) ?></p>
          <p class="summary__title"><?= e(ui('tools.aside_title')) ?></p>
          <ul class="summary__list">
            <?php foreach ((array) (content('ui')['tools']['aside_points'] ?? []) as $toolPoint): ?>
              <li><?= e($toolPoint) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="summary__actions">
            <a class="btn btn--primary btn--block" href="<?= e($toolQuote) ?>"><?= e(ui('cta.quote')) ?> <span aria-hidden="true">→</span></a>
            <?php if ($toolWa !== null): ?>
              <a class="btn btn--whatsapp btn--block" href="<?= e($toolWa) ?>" rel="noopener" data-service="<?= e($slug) ?>"><?= wa_icon() ?> <?= e(ui('cta.whatsapp_long')) ?></a>
            <?php endif; ?>
          </div>
          <p class="summary__foot"><?= e(ui('cta.quote_note')) ?> · <?= e(ui('service.aside_reply')) ?></p>
        </div>
      </aside>
    </div>
  </section>

  <?php if ($tool['intro'] !== []): ?>
    <section class="section section--warm">
      <div class="container prose prose--wide">
        <?php foreach ($tool['intro'] as $paragraph): ?>
          <p><?= rich($paragraph) ?></p>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($tool['faq'] !== []): ?>
    <section class="section">
      <div class="container">
        <?php $faqItems = $tool['faq']; ?>
        <?php require ROOT_DIR . '/partials/faq.php'; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($tool['related'] !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <h2><?= e(ui('service.related')) ?></h2>
        <div class="mt-4">
          <?php $gridSlugs = $tool['related']; ?>
          <?php require ROOT_DIR . '/partials/service-card-grid.php'; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>

  <script src="<?= e(asset('/assets/js/market/' . market_id() . '.js')) ?>" defer></script>
  <script src="<?= e(asset('/assets/js/tools/tools-shared.js')) ?>" defer></script>
  <script src="<?= e(asset('/assets/js/tools/' . $slug . '.js')) ?>" defer></script>
</main>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
