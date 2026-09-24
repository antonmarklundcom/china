<?php
/**
 * The example calculator. EXAMPLE ROUTE — delete this directory together with
 * the 'example' => true records.
 *
 * The pattern every tool follows: build the calculator markup into
 * $toolCalcHtml with output buffering, then require templates/tool.php, which
 * supplies the shared chrome (breadcrumbs, hero, SEO copy, FAQ, related
 * services, CTA). The arithmetic lives in assets/js/tools/<slug>.js and reads
 * its rates from window.Market, so the same calculator works in every market.
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'herramienta-ejemplo';
$tool = content('tools')[$slug];
$vat  = market_vat_rates();

ob_start();
?>
<div class="tool card" data-tool="<?= e($slug) ?>">
  <form class="tool-form" id="ejemplo-form" novalidate>
    <div class="tool-form__row">
      <label class="field">
        <span>Monto</span>
        <input type="number" inputmode="numeric" min="0" step="1" name="monto" id="ejemplo-monto" required>
      </label>
      <label class="field">
        <span>Tasa</span>
        <select name="tasa" id="ejemplo-tasa">
          <?php foreach (array_merge([$vat['standard']], $vat['reduced']) as $rate): ?>
            <option value="<?= e((string) $rate) ?>"><?= e((string) $rate) ?> %</option>
          <?php endforeach; ?>
          <option value="0">0 %</option>
        </select>
      </label>
    </div>

    <fieldset class="field">
      <legend>¿El monto ya incluye el impuesto?</legend>
      <div class="chip-row">
        <input class="chip-radio" type="radio" name="sentido" id="ejemplo-incluido" value="incluido" checked>
        <label class="chip" for="ejemplo-incluido">Sí, incluido</label>
        <input class="chip-radio" type="radio" name="sentido" id="ejemplo-excluido" value="excluido">
        <label class="chip" for="ejemplo-excluido">No, es la base</label>
      </div>
    </fieldset>

    <div class="btn-row">
      <button class="btn btn--primary" type="submit"><?= e(ui('tools.calculate')) ?></button>
    </div>
  </form>

  <div class="tool-result" id="ejemplo-result" hidden aria-live="polite">
    <h2 class="card-title"><?= e(ui('tools.result_title')) ?></h2>
    <dl class="tool-result__lines">
      <dt>Base</dt>
      <dd id="ejemplo-base"></dd>
      <dt>Impuesto</dt>
      <dd id="ejemplo-impuesto"></dd>
      <dt>Total</dt>
      <dd id="ejemplo-total"></dd>
    </dl>
    <div class="btn-row mt-3">
      <button class="btn btn--secondary" type="button" id="ejemplo-use-result"><?= e(ui('tools.use_result')) ?></button>
    </div>
  </div>

  <noscript><p class="note"><?= e(ui('tools.need_js')) ?></p></noscript>
</div>

<?php
$formId      = $slug;
$formService = $slug;
$formNeed    = $tool['formNeed'];
$formHeading = ui('form.legend');
/* The form is buffered into $toolCalcHtml BEFORE templates/tool.php sets $page,
   so it cannot read the path from there. */
$formSourcePage = $tool['path'];
require ROOT_DIR . '/partials/lead-form.php';
?>
<?php
$toolCalcHtml = ob_get_clean();

require ROOT_DIR . '/templates/tool.php';
