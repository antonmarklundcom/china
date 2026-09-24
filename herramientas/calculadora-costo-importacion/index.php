<?php
/**
 * Landed-cost calculator: FOB + flete + seguro = CIF, then the tribute rates
 * the visitor enters, then local costs, per unit and in guaraníes. Every rate
 * is an input: the arancel depends on the NCM position and nobody should read a
 * default as the answer. The arithmetic lives in
 * assets/js/tools/calculadora-costo-importacion.js (window.CostoImportacion).
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'calculadora-costo-importacion';
$tool = content('tools')[$slug];
$vat  = market_vat_rates();

ob_start();
?>
<div class="tool card" data-tool="<?= e($slug) ?>">
  <form class="tool-form" id="ci-form" novalidate>
    <p class="note">Montos en dólares (USD), como figuran en la factura y la cotización de flete.</p>
    <div class="tool-form__row">
      <label class="field"><span>Valor FOB de la mercadería (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="fob" id="ci-fob" required></label>
      <label class="field"><span>Flete internacional (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="flete" id="ci-flete"></label>
      <label class="field"><span>Seguro (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="seguro" id="ci-seguro" placeholder="0"></label>
    </div>
    <div class="tool-form__row">
      <label class="field"><span>Arancel según NCM (%)</span>
        <input type="number" inputmode="decimal" min="0" max="100" step="0.1" name="arancel" id="ci-arancel" placeholder="Consulte al despachante"></label>
      <label class="field"><span>Otras tasas y tributos (%)</span>
        <input type="number" inputmode="decimal" min="0" max="100" step="0.1" name="otros" id="ci-otros" placeholder="0"></label>
      <label class="field"><span>IVA (%)</span>
        <input type="number" inputmode="decimal" min="0" max="100" step="0.1" name="iva" id="ci-iva" value="<?= e((string) $vat['standard']) ?>"></label>
    </div>
    <div class="tool-form__row">
      <label class="field"><span>Despacho y gastos locales (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="locales" id="ci-locales" placeholder="0"></label>
      <label class="field"><span>Unidades</span>
        <input type="number" inputmode="numeric" min="1" step="1" name="unidades" id="ci-unidades" placeholder="1"></label>
      <label class="field"><span>Tipo de cambio (₲ por USD)</span>
        <input type="number" inputmode="decimal" min="0" step="1" name="cambio" id="ci-cambio" placeholder="Opcional"></label>
    </div>
    <div class="btn-row">
      <button class="btn btn--primary" type="submit"><?= e(ui('tools.calculate')) ?></button>
    </div>
  </form>

  <div class="tool-result" id="ci-result" hidden aria-live="polite">
    <h2 class="card-title"><?= e(ui('tools.result_title')) ?></h2>
    <p class="tool-result__value" id="ci-total"></p>
    <dl class="tool-result__lines" id="ci-lines"></dl>
    <p class="note" id="ci-warning" hidden>No cargó el arancel: el total no incluye ese tributo. Pida la posición arancelaria (NCM) a su despachante.</p>
    <p class="note">Fórmula: CIF = FOB + flete + seguro. Arancel y otras tasas se calculan sobre el CIF; el IVA, sobre el CIF más esos tributos. Es una estimación: la liquidación oficial la hace la aduana.</p>
    <div class="btn-row mt-3">
      <button class="btn btn--secondary" type="button" id="ci-use-result"><?= e(ui('tools.use_result')) ?></button>
    </div>
  </div>

  <noscript><p class="note"><?= e(ui('tools.need_js')) ?></p></noscript>
</div>

<?php
$formId         = $slug;
$formService    = $slug;
$formNeed       = $tool['formNeed'];
$formHeading    = ui('form.legend');
$formSourcePage = $tool['path'];
require ROOT_DIR . '/partials/lead-form.php';
$toolCalcHtml = (string) ob_get_clean();

require ROOT_DIR . '/templates/tool.php';
