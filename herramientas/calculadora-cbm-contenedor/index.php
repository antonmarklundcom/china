<?php
/**
 * CBM and container calculator: carton dimensions × cartons → cubic metres,
 * gross weight, air volumetric weight and the share of a 20', 40' and 40' HC
 * container. Arithmetic in assets/js/tools/calculadora-cbm-contenedor.js
 * (window.CbmContenedor).
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'calculadora-cbm-contenedor';
$tool = content('tools')[$slug];

ob_start();
?>
<div class="tool card" data-tool="<?= e($slug) ?>">
  <form class="tool-form" id="cbm-form" novalidate>
    <p class="note">Medidas de una caja, tal como figuran en la lista de empaque (packing list).</p>
    <div class="tool-form__row">
      <label class="field"><span>Largo (cm)</span>
        <input type="number" inputmode="decimal" min="0" step="0.1" name="largo" id="cbm-largo" required></label>
      <label class="field"><span>Ancho (cm)</span>
        <input type="number" inputmode="decimal" min="0" step="0.1" name="ancho" id="cbm-ancho" required></label>
      <label class="field"><span>Alto (cm)</span>
        <input type="number" inputmode="decimal" min="0" step="0.1" name="alto" id="cbm-alto" required></label>
    </div>
    <div class="tool-form__row">
      <label class="field"><span>Cantidad de cajas</span>
        <input type="number" inputmode="numeric" min="1" step="1" name="cajas" id="cbm-cajas" required></label>
      <label class="field"><span>Peso por caja (kg)</span>
        <input type="number" inputmode="decimal" min="0" step="0.1" name="peso" id="cbm-peso" placeholder="Opcional"></label>
    </div>
    <div class="btn-row">
      <button class="btn btn--primary" type="submit"><?= e(ui('tools.calculate')) ?></button>
    </div>
  </form>

  <div class="tool-result" id="cbm-result" hidden aria-live="polite">
    <h2 class="card-title"><?= e(ui('tools.result_title')) ?></h2>
    <p class="tool-result__value" id="cbm-total"></p>
    <dl class="tool-result__lines" id="cbm-lines"></dl>
    <p class="note" id="cbm-hint"></p>
    <p class="note">CBM = largo × ancho × alto (en metros) × cajas. Peso volumétrico aéreo = largo × ancho × alto (cm) ÷ 6.000 por caja. La capacidad útil de cada contenedor es aproximada: depende de la forma de las cajas y de cómo se estiba.</p>
    <div class="btn-row mt-3">
      <button class="btn btn--secondary" type="button" id="cbm-use-result"><?= e(ui('tools.use_result')) ?></button>
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
