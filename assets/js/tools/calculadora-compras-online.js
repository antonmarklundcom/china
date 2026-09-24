/**
 * Total of an online order delivered through a courier. compute() is pure and
 * exported as window.ComprasOnline for tests/tools-compras-online.mjs.
 *
 *   volumétrico  = L × A × H (cm) ÷ divisor
 *   facturable   = max(real, volumétrico), rounded UP to the courier's step
 *   courier      = facturable × tarifa
 *   cargos       = (precio + envío + courier) × cargos%
 *   total        = precio + envío + courier + cargos
 */
(function (window, document) {
  "use strict";

  function num(v) { var n = parseFloat(String(v).replace(",", ".")); return isFinite(n) && n > 0 ? n : 0; }

  function parseDims(text) {
    var parts = String(text || "").toLowerCase().split(/[x×*]/).map(function (p) { return num(p.trim()); });
    return parts.length === 3 && parts[0] && parts[1] && parts[2] ? parts : null;
  }

  function roundUp(value, step) {
    if (!step) { return value; }
    // Work in hundredths so 1.2 / 0.1 does not become 12.000000001 and round up to 1.3.
    var units = Math.round(step * 100);
    return Math.ceil(Math.round(value * 100) / units) * units / 100;
  }

  function compute(input) {
    var precio = num(input.precio), envio = num(input.envio), real = num(input.peso);
    var dims = parseDims(input.medidas);
    var divisor = num(input.divisor) || 6000;
    var volumetrico = dims ? (dims[0] * dims[1] * dims[2]) / divisor : 0;
    var facturable = roundUp(Math.max(real, volumetrico), num(input.redondeo));
    var courier = facturable * num(input.tarifa);
    var cargos = (precio + envio + courier) * num(input.cargos) / 100;
    var total = precio + envio + courier + cargos;
    var cambio = num(input.cambio);
    return {
      precio: precio, envio: envio, real: real, volumetrico: volumetrico, facturable: facturable,
      courier: courier, cargos: cargos, total: total, totalGs: cambio ? total * cambio : null,
      sinCargos: String(input.cargos || "").trim() === ""
    };
  }

  window.ComprasOnline = { compute: compute, roundUp: roundUp, parseDims: parseDims };

  var form = document.getElementById("co-form");
  if (!form) { return; }
  var box = document.getElementById("co-result");
  var lines = document.getElementById("co-lines");
  var totalEl = document.getElementById("co-total");
  var usd = new Intl.NumberFormat("es-PY", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  var kg = new Intl.NumberFormat("es-PY", { maximumFractionDigits: 2 });
  function fmtUsd(n) { return "US$ " + usd.format(n); }
  var last = "";

  function line(dt, dd) {
    var t = document.createElement("dt"); t.textContent = dt;
    var d = document.createElement("dd"); d.textContent = dd;
    lines.appendChild(t); lines.appendChild(d);
  }

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var data = {};
    ["precio", "envio", "peso", "medidas", "divisor", "tarifa", "cargos", "cambio"].forEach(function (k) { data[k] = form.elements[k].value; });
    data.redondeo = (form.querySelector('input[name="redondeo"]:checked') || {}).value;
    if (num(data.precio) <= 0) { form.elements.precio.focus(); return; }
    var r = compute(data);

    lines.textContent = "";
    line("Productos", fmtUsd(r.precio));
    line("Envío de la tienda", fmtUsd(r.envio));
    line("Peso real / volumétrico", kg.format(r.real) + " kg / " + kg.format(r.volumetrico) + " kg");
    line("Peso facturable", kg.format(r.facturable) + " kg");
    line("Courier", fmtUsd(r.courier));
    line("Cargos e impuestos", r.sinCargos ? "No cargados" : fmtUsd(r.cargos));
    totalEl.textContent = fmtUsd(r.total) + (r.totalGs !== null && window.Market ? " · " + window.Market.fmtMoney(Math.round(r.totalGs)) : "");
    box.hidden = false;

    last = "Compra online: productos " + fmtUsd(r.precio) + ", " + kg.format(r.facturable) + " kg facturables, total estimado " + fmtUsd(r.total) + ".";
    if (window.ToolsShared) { window.ToolsShared.trackToolUsed("compras_online", { kg: r.facturable }); }
  });

  document.getElementById("co-use-result").addEventListener("click", function () {
    var leadForm = document.querySelector("form[data-lead-form]");
    if (!window.ToolsShared || !leadForm || !last) { return; }
    window.ToolsShared.prefillLeadForm(leadForm, { message: last, result: last });
    window.ToolsShared.focusLeadForm(leadForm);
  });
})(window, document);
