<?php
/**
 * /cotizar/ — the quote wizard, the site's main conversion page.
 *
 * Every "Pedir cotización" CTA points here. Two optional query parameters
 * pre-select the first step so the visitor lands on the details:
 *
 *   ?need=<key>   a key of content/ui.php 'needs' (compras, importar, aduana, viajes)
 *   ?s=<slug>     a content/lead-values.php service or tool slug. It is posted
 *                 as `service`, so enviar.php resolves that page's tier and
 *                 thank-you server-side; its need is pre-selected too.
 *
 * An unknown value is ignored rather than trusted, exactly like enviar.php does.
 * The form itself is partials/quote-wizard.php; its copy is the 'quote' key of
 * the '/cotizar/' record in content/pages.php.
 */

require __DIR__ . '/../lib/bootstrap.php';

$meta = page_meta('/cotizar/');

$quoteNeeds   = content('ui')['needs'];
$quoteNeed    = isset($_GET['need']) && is_string($_GET['need']) && isset($quoteNeeds[$_GET['need']])
    ? $_GET['need'] : '';
$quoteService = '';

if (isset($_GET['s']) && is_string($_GET['s']) && $_GET['s'] !== '') {
    $quoteLead = lead_value(substr($_GET['s'], 0, 80));
    if ($quoteLead['slug'] !== null && isset($quoteNeeds[$quoteLead['need']])) {
        /* A service only travels with its own need: ?need=aduana&s=visa-china
           is a stale link, and the need the visitor clicked on wins. */
        if ($quoteNeed === '' || $quoteNeed === $quoteLead['need']) {
            $quoteService = (string) $quoteLead['slug'];
            $quoteNeed    = (string) $quoteLead['need'];
        }
    }
    unset($quoteLead);
}

$page = [
    'title'       => $meta['title'],
    'description' => $meta['description'],
    'path'        => '/cotizar/',
    'breadcrumbs' => [['label' => $meta['quote']['eyebrow'], 'path' => '/cotizar/']],
];
if ($quoteService !== '') {
    /* The header pill and the floating WhatsApp button then name the service
       the visitor came from instead of the neutral default. */
    $page['leadSlug'] = $quoteService;
}

require ROOT_DIR . '/partials/head.php';
require ROOT_DIR . '/partials/header.php';
?>
<main id="main">

  <section class="page-hero page-hero--quote">
    <div class="container">
      <?php require ROOT_DIR . '/partials/breadcrumbs.php'; ?>
      <div class="page-hero__inner">
        <h1><?= e($meta['h1']) ?></h1>
        <p class="lead"><?= e($meta['lead']) ?></p>
      </div>
    </div>
  </section>

  <section class="quote-section">
    <div class="container">
      <?php
        $quoteCopy = $meta['quote'];
        require ROOT_DIR . '/partials/quote-wizard.php';
      ?>
    </div>
  </section>

</main>
<script src="<?= e(asset('/assets/js/quote-wizard.js')) ?>" defer></script>
<?php require ROOT_DIR . '/partials/footer.php'; ?>
