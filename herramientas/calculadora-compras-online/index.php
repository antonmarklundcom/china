<?php
/**
 * Online-order calculator: product + store shipping + courier per billable kg
 * (the greater of real and volumetric weight) + the charges rate the visitor
 * enters. Arithmetic in assets/js/tools/calculadora-compras-online.js
 * (window.ComprasOnline).
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'calculadora-compras-online';
$tool = content('tools')[$slug];

ob_start();
?>
<div class="tool card" data-tool="<?= e($slug) ?>">
  <form class="tool-form" id="co-form" novalidate>
    <p class="note">Montos en dólares (USD). La tarifa por kilo y los cargos al recibir se los informa su courier o casilla.</p>
    <div class="tool-form__row">
      <label class="field"><span>Precio de los productos (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="precio" id="co-precio" required></label>
      <label class="field"><span>Envío de la tienda (USD)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="envio" id="co-envio" placeholder="0"></label>
      <label class="field"><span>Peso real del paquete (kg)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="peso" id="co-peso" required></label>
    </div>
    <div class="tool-form__row">
      <label class="field"><span>Largo × ancho × alto del paquete (cm)</span>
        <input type="text" inputmode="decimal" name="medidas" id="co-medidas" placeholder="Ej.: 30 x 20 x 10 (opcional)"></label>
      <label class="field"><span>Divisor volumétrico</span>
        <select name="divisor" id="co-divisor">
          <option value="6000">6.000</option>
          <option value="5000">5.000</option>
        </select></label>
      <label class="field"><span>Tarifa del courier (USD por kg)</span>
        <input type="number" inputmode="decimal" min="0" step="0.01" name="tarifa" id="co-tarifa" required></label>
    </div>
    <div class="tool-form__row">
      <label class="field"><span>Cargos e impuestos al recibir (%)</span>
        <input type="number" inputmode="decimal" min="0" max="100" step="0.1" name="cargos" id="co-cargos" placeholder="Consulte a su courier"></label>
      <label class="field"><span>Tipo de cambio (₲ por USD)</span>
        <input type="number" inputmode="decimal" min="0" step="1" name="cambio" id="co-cambio" placeholder="Opcional"></label>
    </div>
    <fieldset class="field">
      <legend>¿Su courier redondea el peso?</legend>
      <div class="chip-row">
        <input class="chip-radio" type="radio" name="redondeo" id="co-r0" value="0.1" checked>
        <label class="chip" for="co-r0">Al 0,1 kg</label>
        <input class="chip-radio" type="radio" name="redondeo" id="co-r1" value="0.5">
        <label class="chip" for="co-r1">Al medio kilo</label>
        <input class="chip-radio" type="radio" name="redondeo" id="co-r2" value="1">
        <label class="chip" for="co-r2">Al kilo</label>
      </div>
    </fieldset>
    <div class="btn-row">
      <button class="btn btn--primary" type="submit"><?= e(ui('tools.calculate')) ?></button>
    </div>
  </form>

  <div class="tool-result" id="co-result" hidden aria-live="polite">
    <h2 class="card-title"><?= e(ui('tools.result_title')) ?></h2>
    <p class="tool-result__value" id="co-total"></p>
    <dl class="tool-result__lines" id="co-lines"></dl>
    <p class="note">Peso facturable = el mayor entre el peso real y el volumétrico (largo × ancho × alto ÷ divisor), redondeado hacia arriba. Los cargos al recibir se calculan sobre precio + envío + courier.</p>
    <div class="btn-row mt-3">
      <button class="btn btn--secondary" type="button" id="co-use-result"><?= e(ui('tools.use_result')) ?></button>
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
