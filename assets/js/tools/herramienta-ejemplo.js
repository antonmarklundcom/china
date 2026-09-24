/**
 * The example calculator: VAT included/excluded, using the rates and the money
 * formatting of whichever market module the page loaded. Nothing here knows
 * which country it is in — that is the point of window.Market.
 */
(function (window, document) {
  "use strict";

  var form = document.getElementById("ejemplo-form");
  if (!form || !window.Market) {
    return;
  }

  var montoInput = document.getElementById("ejemplo-monto");
  var tasaSelect = document.getElementById("ejemplo-tasa");
  var resultBox  = document.getElementById("ejemplo-result");
  var baseLine   = document.getElementById("ejemplo-base");
  var taxLine    = document.getElementById("ejemplo-impuesto");
  var totalLine  = document.getElementById("ejemplo-total");
  var useResult  = document.getElementById("ejemplo-use-result");
  var lastResult = null;

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var monto = parseFloat(montoInput.value) || 0;
    var tasa  = parseFloat(tasaSelect.value) || 0;
    var incluido = (form.querySelector('input[name="sentido"]:checked') || {}).value !== "excluido";

    if (monto <= 0) {
      montoInput.focus();
      return;
    }

    var tax = incluido ? (monto * tasa) / (100 + tasa) : (monto * tasa) / 100;
    var base = incluido ? monto - tax : monto;
    var total = base + tax;

    baseLine.textContent  = window.Market.fmtMoney(base);
    taxLine.textContent   = window.Market.fmtMoney(tax);
    totalLine.textContent = window.Market.fmtMoney(total);
    resultBox.hidden = false;

    lastResult = "Base " + window.Market.fmtMoney(base) +
                 " · impuesto " + window.Market.fmtMoney(tax) +
                 " · total " + window.Market.fmtMoney(total);

    if (window.ToolsShared) {
      window.ToolsShared.trackToolUsed("herramienta_ejemplo", { rate: tasa });
    }
  });

  if (useResult) {
    useResult.addEventListener("click", function () {
      var leadForm = document.querySelector("form[data-lead-form]");
      if (!window.ToolsShared || !leadForm || !lastResult) {
        return;
      }
      window.ToolsShared.prefillLeadForm(leadForm, {
        message: lastResult,
        result: lastResult
      });
      window.ToolsShared.focusLeadForm(leadForm);
    });
  }
})(window, document);
