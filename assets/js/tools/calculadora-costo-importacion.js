/**
 * Landed cost of an import. compute() is pure and exported as
 * window.CostoImportacion so tests/tools-costo-importacion.mjs can check it.
 *
 *   CIF      = FOB + flete + seguro
 *   arancel  = CIF × arancel%
 *   otros    = CIF × otros%
 *   IVA      = (CIF + arancel + otros) × IVA%
 *   total    = CIF + arancel + otros + IVA + gastos locales
 */
(function (window, document) {
  "use strict";

  function num(v) { var n = parseFloat(String(v).replace(",", ".")); return isFinite(n) && n > 0 ? n : 0; }

  function compute(input) {
    var fob = num(input.fob), flete = num(input.flete), seguro = num(input.seguro);
    var cif = fob + flete + seguro;
    var arancel = cif * num(input.arancel) / 100;
    var otros = cif * num(input.otros) / 100;
    var iva = (cif + arancel + otros) * num(input.iva) / 100;
    var locales = num(input.locales);
    var total = cif + arancel + otros + iva + locales;
    var unidades = Math.max(1, Math.floor(num(input.unidades)) || 1);
    var cambio = num(input.cambio);
    return {
      fob: fob, flete: flete, seguro: seguro, cif: cif, arancel: arancel, otros: otros,
      iva: iva, locales: locales, total: total, unidades: unidades,
      porUnidad: total / unidades, cambio: cambio,
      totalGs: cambio ? total * cambio : null,
      porUnidadGs: cambio ? (total / unidades) * cambio : null,
      sinArancel: String(input.arancel || "").trim() === ""
    };
  }

  var usd = new Intl.NumberFormat("es-PY", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  function fmtUsd(n) { return "US$ " + usd.format(n); }
  function fmtGs(n) { return window.Market ? window.Market.fmtMoney(Math.round(n)) : String(Math.round(n)); }

  window.CostoImportacion = { compute: compute };

  var form = document.getElementById("ci-form");
  if (!form) { return; }
  var box = document.getElementById("ci-result");
  var lines = document.getElementById("ci-lines");
  var totalEl = document.getElementById("ci-total");
  var warn = document.getElementById("ci-warning");
  var last = "";

  function line(dt, dd) {
    var t = document.createElement("dt"); t.textContent = dt;
    var d = document.createElement("dd"); d.textContent = dd;
    lines.appendChild(t); lines.appendChild(d);
  }

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var data = {};
    ["fob", "flete", "seguro", "arancel", "otros", "iva", "locales", "unidades", "cambio"].forEach(function (k) {
      data[k] = form.elements[k].value;
    });
    if (num(data.fob) <= 0) { form.elements.fob.focus(); return; }
    var r = compute(data);

    lines.textContent = "";
    line("Valor FOB", fmtUsd(r.fob));
    line("Flete", fmtUsd(r.flete));
    line("Seguro", fmtUsd(r.seguro));
    line("Valor CIF", fmtUsd(r.cif));
    line("Arancel", fmtUsd(r.arancel));
    line("Otras tasas", fmtUsd(r.otros));
    line("IVA", fmtUsd(r.iva));
    line("Despacho y gastos locales", fmtUsd(r.locales));
    line("Costo por unidad (" + r.unidades + ")", fmtUsd(r.porUnidad) + (r.porUnidadGs !== null ? " · " + fmtGs(r.porUnidadGs) : ""));
    totalEl.textContent = fmtUsd(r.total) + (r.totalGs !== null ? " · " + fmtGs(r.totalGs) : "");
    warn.hidden = !r.sinArancel;
    box.hidden = false;

    last = "Costo estimado de importación: FOB " + fmtUsd(r.fob) + ", CIF " + fmtUsd(r.cif) +
      ", total " + fmtUsd(r.total) + " (" + r.unidades + " u., " + fmtUsd(r.porUnidad) + " c/u).";
    if (window.ToolsShared) { window.ToolsShared.trackToolUsed("costo_importacion", { cif: Math.round(r.cif) }); }
  });

  document.getElementById("ci-use-result").addEventListener("click", function () {
    var leadForm = document.querySelector("form[data-lead-form]");
    if (!window.ToolsShared || !leadForm || !last) { return; }
    window.ToolsShared.prefillLeadForm(leadForm, { message: last, result: last });
    window.ToolsShared.focusLeadForm(leadForm);
  });
})(window, document);
