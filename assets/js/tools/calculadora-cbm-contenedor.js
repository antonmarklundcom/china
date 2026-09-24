/**
 * Cubic metres, weights and container share. compute() is pure and exported as
 * window.CbmContenedor for tests/tools-cbm-contenedor.mjs.
 *
 * Usable capacities are practical loading figures (not the nominal internal
 * volume), approximate by design: 20' ≈ 28 m³, 40' ≈ 58 m³, 40' HC ≈ 68 m³.
 */
(function (window, document) {
  "use strict";

  var CONTAINERS = [
    { id: "20", label: "Contenedor de 20'", cbm: 28 },
    { id: "40", label: "Contenedor de 40'", cbm: 58 },
    { id: "40hc", label: "Contenedor de 40' HC", cbm: 68 }
  ];
  var AIR_DIVISOR = 6000;

  function num(v) { var n = parseFloat(String(v).replace(",", ".")); return isFinite(n) && n > 0 ? n : 0; }

  function compute(input) {
    var l = num(input.largo), a = num(input.ancho), h = num(input.alto);
    var cajas = Math.floor(num(input.cajas));
    var peso = num(input.peso);
    var cbmCaja = (l * a * h) / 1e6;
    var cbm = cbmCaja * cajas;
    var volumetrico = ((l * a * h) / AIR_DIVISOR) * cajas;
    var pesoTotal = peso * cajas;
    var uso = CONTAINERS.map(function (c) {
      return { id: c.id, label: c.label, pct: c.cbm ? (cbm / c.cbm) * 100 : 0, cajas: cbmCaja ? Math.floor(c.cbm / cbmCaja) : 0 };
    });
    var sugerencia;
    if (cbm < 15) { sugerencia = "lcl"; }
    else if (cbm <= 28) { sugerencia = "20"; }
    else if (cbm <= 58) { sugerencia = "40"; }
    else if (cbm <= 68) { sugerencia = "40hc"; }
    else { sugerencia = "multi"; }
    return { cbmCaja: cbmCaja, cbm: cbm, pesoTotal: pesoTotal, volumetrico: volumetrico, uso: uso, sugerencia: sugerencia };
  }

  window.CbmContenedor = { compute: compute, CONTAINERS: CONTAINERS };

  var form = document.getElementById("cbm-form");
  if (!form) { return; }
  var box = document.getElementById("cbm-result");
  var lines = document.getElementById("cbm-lines");
  var totalEl = document.getElementById("cbm-total");
  var hint = document.getElementById("cbm-hint");
  var f3 = new Intl.NumberFormat("es-PY", { maximumFractionDigits: 3 });
  var f1 = new Intl.NumberFormat("es-PY", { maximumFractionDigits: 1 });
  var last = "";
  var HINTS = {
    lcl: "Con este volumen suele convenir la carga consolidada (contenedor compartido): paga solo los metros cúbicos que ocupa.",
    "20": "Compare la carga consolidada con un contenedor de 20': cerca del límite, el contenedor completo puede salir más a cuenta.",
    "40": "Este volumen suele pedir un contenedor de 40'. Pida cotización de ambos tamaños.",
    "40hc": "Este volumen suele pedir un contenedor de 40' High Cube (más alto).",
    multi: "Este volumen supera un contenedor: necesitará más de uno o dividir el embarque."
  };

  function line(dt, dd) {
    var t = document.createElement("dt"); t.textContent = dt;
    var d = document.createElement("dd"); d.textContent = dd;
    lines.appendChild(t); lines.appendChild(d);
  }

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var data = {};
    ["largo", "ancho", "alto", "cajas", "peso"].forEach(function (k) { data[k] = form.elements[k].value; });
    var r = compute(data);
    if (r.cbm <= 0) { form.elements.largo.focus(); return; }

    lines.textContent = "";
    line("Volumen por caja", f3.format(r.cbmCaja) + " m³");
    if (r.pesoTotal) { line("Peso bruto total", f1.format(r.pesoTotal) + " kg"); }
    line("Peso volumétrico aéreo", f1.format(r.volumetrico) + " kg");
    r.uso.forEach(function (u) { line(u.label, f1.format(u.pct) + " % ocupado · caben ~" + u.cajas + " cajas"); });
    totalEl.textContent = f3.format(r.cbm) + " m³ (CBM)";
    hint.textContent = HINTS[r.sugerencia];
    box.hidden = false;

    last = "Mi carga: " + f3.format(r.cbm) + " m³" + (r.pesoTotal ? ", " + f1.format(r.pesoTotal) + " kg" : "") + ".";
    if (window.ToolsShared) { window.ToolsShared.trackToolUsed("cbm_contenedor", { cbm: Math.round(r.cbm * 10) / 10 }); }
  });

  document.getElementById("cbm-use-result").addEventListener("click", function () {
    var leadForm = document.querySelector("form[data-lead-form]");
    if (!window.ToolsShared || !leadForm || !last) { return; }
    window.ToolsShared.prefillLeadForm(leadForm, { message: last + " Quisiera cotizar el flete.", result: last, service: "flete-maritimo-contenedor" });
    window.ToolsShared.focusLeadForm(leadForm);
  });
})(window, document);
