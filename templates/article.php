<?php
/**
 * Renders one blog article. Every /blog/<slug>/index.php sets $slug and
 * $sections (and optionally $faq) before requiring this file — the body
 * content lives in each article's own file, not in content/blog.php, because
 * no other page reuses it.
 *
 *   $slug      string  required — looked up in content/blog.php
 *   $sections  array   [['h2' => ..., 'body' => string[], 'items'? => [...]]]
 *   $faq       array   optional [['q' => ..., 'a' => ...], ...]
 *   $toolLink  array   optional calculator callout(s) rendered right after the
 *                       article body: either one ['path' => '/herramientas/<slug>/',
 *                       'label' => ..., 'text' => ...] or a list of those
 *
 */

declare(strict_types=1);

/** @var string $slug */
/** @var array $sections */
$sections = $sections ?? [];
$faq      = $faq ?? [];
$toolLink = $toolLink ?? [];

$article = null;
foreach (content('blog') as $entry) {
    if ($entry['slug'] === ($slug ?? '')) {
        $article = $entry;
        break;
    }
}

if ($article === null) {
    http_response_code(404);
    require ROOT_DIR . '/404.php';
    return;
}

/* Reading time from the article's own words, not a manually maintained field
   that could drift from the actual body. */
$wordCount = 0;
foreach ($sections as $articleSection) {
    foreach ($articleSection['body'] ?? [] as $paragraph) {
        $wordCount += str_word_count($paragraph);
    }
    foreach ($articleSection['items'] ?? [] as $sectionItem) {
        $wordCount += str_word_count(($sectionItem['title'] ?? '') . ' ' . ($sectionItem['text'] ?? ''));
    }
}
$readingMinutes = max(1, (int) ceil($wordCount / 200));

$relatedSlugs = [];
if (!empty($article['service'])) {
    $relatedSlugs[] = $article['service'];
    $primaryService  = services($article['service']);
    foreach ($primaryService['related'] ?? [] as $relatedSlug) {
        if (count($relatedSlugs) >= 3) {
            break;
        }
        if (!in_array($relatedSlug, $relatedSlugs, true)) {
            $relatedSlugs[] = $relatedSlug;
        }
    }
}

$page = [
    'title'       => $article['seoTitle'] ?? '',
    'description' => $article['description'],
    'path'        => '/blog/' . $article['slug'] . '/',
    'ogType'      => 'article',
    'breadcrumbs' => [
        ['label' => ui('nav.blog'), 'path' => '/blog/'],
        ['label' => $article['title'], 'path' => '/blog/' . $article['slug'] . '/'],
    ],
    'faq'         => $faq,
    /* An article has no service of its own, so it borrows the one it is about. Articles with no
       `service` fall through to the model's neutral default. */
    'leadSlug'    => $article['service'] ?? null,
    'article'     => [
        'headline'      => $article['title'],
        'datePublished' => $article['date'],
        'dateModified'  => $article['updated'] ?? $article['date'],
        'description'   => $article['description'],
    ],
];
if ($page['title'] === '') {
    $page['title'] = $article['title'];
}

/* ---- reading layout: anchors + TOC from the sections' own h2s ---------- */
$readingIds    = ['main' => true, 'contenido' => true];
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

$tocAll     = [];
$sectionIds = [];
foreach ($sections as $i => $articleSection) {
    if (!empty($articleSection['h2'])) {
        $sectionIds[$i] = $readingAnchor($articleSection['h2']);
        /* "3. Elegir el Incoterm…" lists its number in the TOC's number column */
        $tocAll[] = preg_match('~^(\d+)\.\s+(.+)$~u', $articleSection['h2'], $h2Parts)
            ? ['id' => $sectionIds[$i], 'label' => $h2Parts[2], 'num' => $h2Parts[1]]
            : ['id' => $sectionIds[$i], 'label' => $articleSection['h2'], 'num' => null];
    }
}
$faqId = null;
if ($faq !== []) {
    $faqId    = $readingAnchor('preguntas-frecuentes');
    $tocAll[] = ['id' => $faqId, 'label' => ui('service.faq'), 'num' => null];
}
/* A soft CTA halfway through a long article, a strong one after its last section. */
$sectionCount  = count($sections);
$softCtaAfter  = $sectionCount >= 4 ? intdiv($sectionCount, 2) - 1 : null;
$articleLead   = $article['service'] ?? null;
$toolLinkList  = array_key_exists('path', $toolLink) ? [$toolLink] : $toolLink;

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <p class="eyebrow"><?= e(ui('nav.blog')) ?></p>
        <h1><?= e($article['title']) ?></h1>
        <p class="lead"><?= e($article['description']) ?></p>
        <p class="article-meta">
          <span><?= e(fmt_date_long($article['date'])) ?></span>
          <span aria-hidden="true">·</span>
          <span><?= (int) $readingMinutes ?> <?= e(ui('article.reading_time')) ?></span>
          <?php if (!empty($article['updated']) && $article['updated'] !== $article['date']): ?>
            <span aria-hidden="true">·</span>
            <span><?= e(ui('article.updated')) ?> <?= e(fmt_date_long($article['updated'])) ?></span>
          <?php endif; ?>
        </p>
        <?php if (!empty($article['tags'])): ?>
          <ul class="article-tags">
            <?php foreach ($article['tags'] as $tag): ?>
              <li class="pill"><?= e($tag) ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="reading" id="contenido">
    <div class="container reading__layout">

      <?php $tocItems = $tocAll; $tocVariant = 'mobile'; $tocTitle = ui('reading.toc_article', 'En este artículo'); require ROOT_DIR . '/partials/guide-toc.php'; ?>

      <article class="reading__main" data-reading data-top-label="<?= e(ui('reading.top', 'Volver arriba')) ?>">
        <?php foreach ($sections as $i => $articleSection): ?>
          <div class="prose reading__section<?= $i === 0 ? ' reading__intro' : '' ?>"<?= isset($sectionIds[$i]) ? ' id="' . e($sectionIds[$i]) . '"' : '' ?>>
            <?php if (!empty($articleSection['h2'])): ?>
              <h2><?= e($articleSection['h2']) ?></h2>
            <?php endif; ?>
            <?php foreach ($articleSection['body'] ?? [] as $paragraph): ?>
              <p><?= rich($paragraph) ?></p>
            <?php endforeach; ?>
            <?php if (!empty($articleSection['items'])): ?>
              <ul class="checklist">
                <?php foreach ($articleSection['items'] as $sectionItem): ?>
                  <li><span><?php if (!empty($sectionItem['title'])): ?><strong><?= e($sectionItem['title']) ?>:</strong> <?php endif; ?><?= rich($sectionItem['text'] ?? '') ?></span></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
          <?php if ($softCtaAfter === $i): ?>
            <?php $inlineCtaSlug = $articleLead; $inlineCtaVariant = 'soft'; require ROOT_DIR . '/partials/inline-cta.php'; ?>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($sections !== []): ?>
          <?php $inlineCtaSlug = $articleLead; $inlineCtaVariant = 'strong'; require ROOT_DIR . '/partials/inline-cta.php'; ?>
        <?php endif; ?>

        <?php foreach ($toolLinkList as $oneToolLink): ?>
          <a class="card card--link tool-callout" href="<?= e($oneToolLink['path']) ?>">
            <span class="tool-callout__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="3" width="14" height="18" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8.5 7.5h7M8.5 12h.01M12 12h.01M15.5 12h.01M8.5 15.5h.01M12 15.5h.01M15.5 15.5h.01" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/></svg></span>
            <span class="tool-callout__body">
              <span class="card-title"><?= e($oneToolLink['label'] ?? '') ?></span>
              <span class="card__text"><?= e($oneToolLink['text'] ?? '') ?></span>
            </span>
          </a>
        <?php endforeach; ?>

        <?php if ($faq !== []): ?>
          <div class="reading__faq" id="<?= e($faqId) ?>">
            <?php $faqItems = $faq; ?>
            <?php require ROOT_DIR . '/partials/faq.php'; ?>
          </div>
        <?php endif; ?>
      </article>

      <aside class="reading__aside">
        <div class="reading__sticky">
          <?php $tocItems = $tocAll; $tocVariant = 'aside'; $tocTitle = ui('reading.toc_article', 'En este artículo'); require ROOT_DIR . '/partials/guide-toc.php'; ?>
          <?php $sideLeadSlug = $articleLead; require ROOT_DIR . '/partials/sidebar-lead.php'; ?>
        </div>
      </aside>

    </div>
  </section>

  <?php if ($relatedSlugs !== []): ?>
    <section class="section section--surface">
      <div class="container">
        <h2><?= e(ui('service.related')) ?></h2>
        <div class="mt-4">
          <?php $gridSlugs = $relatedSlugs; ?>
          <?php require ROOT_DIR . '/partials/service-card-grid.php'; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php require ROOT_DIR . '/partials/cta-band.php'; ?>
</main>
<script src="<?= e(asset('/assets/js/reading.js')) ?>" defer></script>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
