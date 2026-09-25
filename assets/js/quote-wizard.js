/**
 * The quote wizard on /cotizar/ (partials/quote-wizard.php).
 *
 * Without this file the page is one ordinary form that posts to enviar.php and
 * lands on /contacto/?enviado=1&s=<slug>. This script:
 *
 *   - splits it into three steps with a progress bar, Back/Next, per-step
 *     validation, focus management and aria-live announcements;
 *   - swaps the single no-JS `message` box for the per-need questions and, on
 *     submit, composes those answers into a labelled multi-line `message`;
 *   - keeps service / value_tier / the WhatsApp prefill in step with the need
 *     the visitor picks (enviar.php still re-derives the tier server-side);
 *   - saves progress in sessionStorage so a reload keeps the answers;
 *   - posts with fetch exactly like assets/js/lead-form.js and renders the
 *     thank-you from the handler's JSON, firing the same lead_submit event.
 *
 * Any failure before the form is enhanced leaves the plain form working.
 */
(function (window, document) {
  "use strict";

  var form = document.querySelector("[data-quote-wizard]");
  if (!form || !window.FormData || !window.fetch || !("hidden" in form)) {
    return;
  }

  var STORE_KEY = "cotizar-wizard-v1";
  var total = parseInt(form.dataset.total, 10) || 3;
  var steps = Array.prototype.slice.call(form.querySelectorAll("[data-qz-step]"));
  var progress = form.querySelector("[data-qz-progress]");
  var live = form.querySelector("[data-qz-live]");
  var backBtn = form.querySelector("[data-qz-back]");
  var nextBtn = form.querySelector("[data-qz-next]");
  var submitBtn = form.querySelector("[data-qz-submit]");
  var nav = form.querySelector("[data-qz-nav]");
  var ok = form.querySelector("[data-qz-ok]");
  var fail = form.querySelector("[data-qz-fail]");
  var message = form.querySelector("[data-qz-message]");
  var serviceInput = form.querySelector("[data-qz-service]");
  var tierInput = form.querySelector("[data-qz-tier]");
  var waLink = document.querySelector("[data-qz-wa]");
  var reduced = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var current = 1;
  var sending = false;
  var lastPointer = 0;
  var errorSeq = 0;

  function $all(selector, root) {
    return Array.prototype.slice.call((root || form).querySelectorAll(selector));
  }

  function track(event, params) {
    if (window.siteAnalytics && typeof window.siteAnalytics.track === "function") {
      window.siteAnalytics.track(event, params);
    }
  }

  function stepTitle(n) {
    var h = form.querySelector("#qz-h-" + n);
    return h ? h.textContent.trim() : "";
  }

  function progressText(n) {
    return (form.dataset.progress || "Paso %1$d de %2$d")
      .replace("%1$d", n)
      .replace("%2$d", total);
  }

  /* ---------------------------------------------------------------- need -- */

  function needInput() {
    return form.querySelector("input[name=need]:checked");
  }

  function needValue() {
    var input = needInput();
    return input ? input.value : "";
  }

  function needLabel() {
    var input = needInput();
    var title = input && input.closest(".qz-option").querySelector(".qz-option__title");
    return title ? title.textContent.trim() : "";
  }

  function detailsGroup() {
    return form.querySelector('[data-qz-details="' + needValue() + '"]');
  }

  function showDetails() {
    var need = needValue();
    $all("[data-qz-details]").forEach(function (group) {
      group.hidden = group.dataset.qzDetails !== need;
    });

    var picked = form.querySelector("[data-qz-picked]");
    if (picked) {
      picked.hidden = need === "";
      picked.querySelector("[data-qz-picked-label]").textContent = needLabel();
    }
  }

  /**
   * service + value_tier + the WhatsApp prefill follow the answers: the chosen
   * need first, then a detail option that names a more precise service (the
   * Feria de Cantón answer maps to the Cantón tour, for example).
   */
  function syncRouting() {
    var input = needInput();
    if (!input) {
      return;
    }
    var service = input.dataset.service || "";
    var tier = input.dataset.tier || tierInput.value;
    var wa = input.dataset.wa || "";

    var group = detailsGroup();
    var precise = group && group.querySelector("input[type=radio][data-service]:checked");
    if (precise) {
      service = precise.dataset.service;
      tier = precise.dataset.tier || tier;
      wa = precise.dataset.wa || wa;
    }

    serviceInput.value = service;
    tierInput.value = tier;

    if (waLink && wa) {
      waLink.href = wa;
      waLink.dataset.service = service;
      if (waLink.parentNode && waLink.parentNode.dataset) {
        waLink.parentNode.dataset.service = service;
      }
    }
  }

  /* ---------------------------------------------------------- validation -- */

  function errorNode(field) {
    return field.querySelector("[data-qz-error]") ||
      (field.matches("[data-qz-error-for]") ? field : null);
  }

  function setError(field, text) {
    var node = errorNode(field);
    if (!node) {
      return;
    }
    if (!node.id) {
      errorSeq += 1;
      node.id = "qz-err-" + errorSeq;
    }
    node.textContent = text;
    node.hidden = false;
    field.classList.add("is-invalid");
    $all("input, textarea", field).forEach(function (input) {
      input.setAttribute("aria-invalid", "true");
      input.setAttribute("aria-describedby", node.id);
    });
  }

  function clearError(field) {
    var node = errorNode(field);
    if (node) {
      node.hidden = true;
      node.textContent = "";
    }
    field.classList.remove("is-invalid");
    $all("input, textarea", field).forEach(function (input) {
      input.removeAttribute("aria-invalid");
      input.removeAttribute("aria-describedby");
    });
  }

  function fieldValue(field) {
    var checked = field.querySelector("input[type=radio]:checked");
    if (checked) {
      return checked.value.trim();
    }
    var text = field.querySelector("input:not([type=radio]), textarea");
    return text ? text.value.trim() : "";
  }

  /**
   * Validates one step and returns the first field that failed (or null), so
   * the caller can move focus to it.
   */
  function validateStep(n) {
    var first = null;
    var copy = form.dataset;

    function flag(field, focusTarget, text) {
      setError(field, text);
      if (!first) {
        first = focusTarget;
      }
    }

    if (n === 1) {
      var needError = form.querySelector("[data-qz-error-for=need]");
      if (!needValue()) {
        needError.textContent = copy.msgChoice;
        needError.hidden = false;
        first = form.querySelector("input[name=need]");
      } else {
        needError.hidden = true;
      }
      return first;
    }

    if (n === 2) {
      var group = detailsGroup();
      if (!group) {
        return null;
      }
      $all("[data-qz-field]", group).forEach(function (field) {
        clearError(field);
        if (field.hasAttribute("data-qz-required") && fieldValue(field) === "") {
          var isChoice = field.classList.contains("qz-choice");
          flag(field, field.querySelector("input"), isChoice ? copy.msgChoice : copy.msgRequired);
        }
      });
      return first;
    }

    var step = steps[n - 1];
    $all("[data-qz-field]", step).forEach(function (field) {
      var input = field.querySelector("input");
      var value = input.value.trim();
      var kind = field.dataset.qzKind || "";
      clearError(field);

      if (kind === "phone") {
        var digits = value.replace(/\D+/g, "");
        if (value === "") {
          flag(field, input, copy.msgRequired);
        } else if (digits.length < 7 || digits.length > 15) {
          flag(field, input, copy.msgPhone);
        }
      } else if (kind === "email") {
        var wantsEmail = !!form.querySelector("[data-qz-email-channel]:checked");
        if (value === "" && wantsEmail) {
          flag(field, input, copy.msgEmailNeeded);
        } else if (value !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value)) {
          flag(field, input, copy.msgEmail);
        }
      } else if (input.required && value === "") {
        flag(field, input, copy.msgRequired);
      }
    });
    return first;
  }

  /* ------------------------------------------------------------- storage -- */

  function save() {
    var data = { step: current, values: {} };
    $all("input, textarea").forEach(function (input) {
      if (!input.name || input.type === "hidden" || input.name === "website") {
        return;
      }
      if (input.type === "radio") {
        if (input.checked) {
          data.values[input.name] = input.value;
        }
      } else if (input.value !== "") {
        data.values[input.name] = input.value;
      }
    });
    try {
      window.sessionStorage.setItem(STORE_KEY, JSON.stringify(data));
    } catch (e) {
      /* private mode, storage full or blocked: progress just is not kept */
    }
  }

  function load() {
    try {
      var raw = window.sessionStorage.getItem(STORE_KEY);
      return raw ? JSON.parse(raw) : null;
    } catch (e) {
      return null;
    }
  }

  function forget() {
    try {
      window.sessionStorage.removeItem(STORE_KEY);
    } catch (e) {
      /* nothing to do */
    }
  }

  function restore(data) {
    if (!data || !data.values) {
      return;
    }
    Object.keys(data.values).forEach(function (name) {
      var value = String(data.values[name]);
      $all('[name="' + name.replace(/"/g, "") + '"]').forEach(function (input) {
        if (input.type === "hidden" || input.name === "website") {
          return;
        }
        if (input.type === "radio") {
          input.checked = input.value === value;
        } else {
          input.value = value;
        }
      });
    });
  }

  /* ---------------------------------------------------------- navigation -- */

  function renderProgress() {
    form.querySelector("[data-qz-count]").textContent = progressText(current);
    form.querySelector("[data-qz-count-title]").textContent = stepTitle(current);
    $all("[data-qz-dot]").forEach(function (dot) {
      var n = parseInt(dot.dataset.qzDot, 10);
      dot.dataset.state = n < current ? "done" : n === current ? "current" : "todo";
      if (n === current) {
        dot.setAttribute("aria-current", "step");
      } else {
        dot.removeAttribute("aria-current");
      }
    });
    var bar = form.querySelector("[data-qz-bar]");
    bar.style.width = ((current - 1) / (total - 1)) * 100 + "%";

    backBtn.hidden = current === 1;
    nextBtn.hidden = current === total;
    submitBtn.hidden = current !== total;
    nav.classList.toggle("qz-nav--first", current === 1);
  }

  function scrollToCard() {
    var card = form.closest(".qz-card") || form;
    var header = document.querySelector("[data-header]");
    var offset = (header ? header.offsetHeight : 0) + 12;
    var top = card.getBoundingClientRect().top;
    if (top < offset || top > window.innerHeight * 0.5) {
      window.scrollTo({
        top: window.pageYOffset + top - offset,
        behavior: reduced ? "auto" : "smooth"
      });
    }
  }

  function goTo(n, options) {
    options = options || {};
    n = Math.max(1, Math.min(total, n));

    /* Forward moves validate every step they leave; back moves never do. */
    if (!options.skipValidation && n > current) {
      for (var s = current; s < n; s += 1) {
        var bad = validateStep(s);
        if (bad) {
          if (s !== current) {
            goTo(s, { skipValidation: true });
          }
          bad.focus();
          live.textContent = form.dataset.msgRequired;
          return false;
        }
      }
    }

    var direction = n >= current ? "forward" : "back";
    current = n;

    steps.forEach(function (step) {
      var active = parseInt(step.dataset.qzStep, 10) === n;
      step.hidden = !active;
      step.classList.remove("qz-step--in");
      if (active && !options.initial) {
        step.dataset.dir = direction;
        void step.offsetWidth;   /* restart the enter animation */
        step.classList.add("qz-step--in");
      }
    });

    if (n === 2) {
      showDetails();
    }
    renderProgress();

    if (!options.initial) {
      live.textContent = progressText(n) + ": " + stepTitle(n);
      scrollToCard();
      var heading = form.querySelector("#qz-h-" + n);
      if (heading) {
        heading.focus({ preventScroll: true });
      }
    }

    track("quote_step", {
      step: n,
      step_name: stepTitle(n),
      need: needValue(),
      form_id: "cotizar-wizard"
    });
    save();
    return true;
  }

  /* ------------------------------------------------------------- compose -- */

  function compose() {
    var lines = [(form.dataset.messageTitle || "Solicitud de cotización") + ": " + needLabel()];
    var group = detailsGroup();
    if (group) {
      $all("[data-qz-field]", group).forEach(function (field) {
        var value = fieldValue(field);
        if (value !== "") {
          lines.push(field.dataset.qzLabel + ": " + value);
        }
      });
    }
    var channel = form.querySelector("input[name=q_canal]:checked");
    if (channel) {
      lines.push((form.dataset.channelLabel || "Canal preferido") + ": " + channel.value);
    }
    return lines.join("\n").slice(0, 4900);
  }

  /** Same as lead-form.js: rewrite the pre-rendered thank-you with the server's copy. */
  function renderThanks(node, thanks) {
    if (!node || !thanks) {
      return;
    }
    var list = node.querySelector(".thanks__steps");
    if (list && Array.isArray(thanks.steps) && thanks.steps.length) {
      list.innerHTML = "";
      thanks.steps.forEach(function (step) {
        var li = document.createElement("li");
        li.textContent = step;
        list.appendChild(li);
      });
    }
    var wa = node.querySelector(".btn--whatsapp");
    if (wa && thanks.whatsapp) {
      wa.href = thanks.whatsapp;
    }
    var next = node.querySelector(".btn--secondary");
    if (next && thanks.link && thanks.link.path) {
      next.href = thanks.link.path;
      next.textContent = thanks.link.label || next.textContent;
      next.hidden = false;
    } else if (next && !thanks.link) {
      next.hidden = true;
    }
  }

  function finish(data) {
    forget();
    form.classList.add("is-done");
    steps.forEach(function (step) {
      step.hidden = true;
    });
    nav.hidden = true;
    var privacy = form.querySelector(".qz-privacy");
    if (privacy) {
      privacy.hidden = true;
    }
    current = total + 1;
    $all("[data-qz-dot]").forEach(function (dot) {
      dot.dataset.state = "done";
      dot.removeAttribute("aria-current");
    });
    form.querySelector("[data-qz-bar]").style.width = "100%";
    form.querySelector("[data-qz-count]").textContent = form.dataset.doneTitle || "";
    form.querySelector("[data-qz-count-title]").textContent = "";

    renderThanks(ok, data.thanks);
    ok.hidden = false;
    scrollToCard();
    ok.focus({ preventScroll: true });

    track("lead_submit", {
      form_id: "cotizar-wizard",
      service: data.service || "",
      value_tier: data.value_tier || "",
      value: data.value || 0,
      currency: data.currency || "PYG",
      degraded: !!data.degraded
    });
  }

  function send() {
    for (var s = 1; s <= total; s += 1) {
      var bad = validateStep(s);
      if (bad) {
        if (s !== current) {
          goTo(s, { skipValidation: true });
        }
        bad.focus();
        return;
      }
    }

    syncRouting();
    message.value = compose();

    var body = new FormData(form);
    /* The detail answers already travel inside `message`. */
    Array.from(body.keys()).forEach(function (key) {
      if (key.indexOf("q_") === 0) {
        body.delete(key);
      }
    });

    sending = true;
    fail.hidden = true;
    var label = submitBtn.innerHTML;
    submitBtn.disabled = true;
    backBtn.disabled = true;
    submitBtn.textContent = submitBtn.dataset.sending || "…";
    form.setAttribute("aria-busy", "true");

    fetch(form.action, {
      method: "POST",
      headers: { Accept: "application/json" },
      body: body
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        if (!data || !data.ok) {
          throw new Error(data && data.error ? data.error : "failed");
        }
        finish(data);
      })
      .catch(function (err) {
        fail.hidden = false;
        if (err && err.message === "phone") {
          var phone = form.querySelector("[data-qz-kind=phone]");
          setError(phone, form.dataset.msgPhone);
          phone.querySelector("input").focus();
        }
      })
      .finally(function () {
        sending = false;
        submitBtn.disabled = false;
        backBtn.disabled = false;
        submitBtn.innerHTML = label;
        form.removeAttribute("aria-busy");
      });
  }

  /* ------------------------------------------------------------- enhance -- */

  form.noValidate = true;
  form.setAttribute("data-enhanced", "");
  $all("[data-qz-static]").forEach(function (node) {
    node.hidden = true;
  });
  $all("[data-qz-enhanced]").forEach(function (node) {
    node.hidden = false;
  });
  progress.hidden = false;
  form.dataset.doneTitle = form.dataset.doneTitle || "";

  /* Sticky progress sits under the sticky site header. */
  function measureHeader() {
    var header = document.querySelector("[data-header]");
    document.documentElement.style.setProperty(
      "--qz-top", (header ? header.offsetHeight : 0) + "px"
    );
  }
  measureHeader();
  window.addEventListener("resize", measureHeader);

  var stored = load();
  var linkNeed = form.dataset.fromLink === "1" ? form.dataset.startNeed : "";
  restore(stored);
  if (linkNeed) {
    /* The CTA the visitor just clicked wins over an older saved answer. */
    var linked = form.querySelector('input[name=need][value="' + linkNeed + '"]');
    if (linked) {
      linked.checked = true;
    }
  }

  var startStep = 1;
  var storedNeed = stored && stored.values ? stored.values.need : "";
  if (stored && stored.step && (!linkNeed || storedNeed === linkNeed)) {
    startStep = Math.min(parseInt(stored.step, 10) || 1, total);
  } else if (linkNeed) {
    startStep = 2;
  }
  if (!needValue()) {
    startStep = 1;
  }

  showDetails();
  syncRouting();
  goTo(startStep, { initial: true, skipValidation: true });

  /* ------------------------------------------------------------- events -- */

  var options = form.querySelector(".qz-options");
  options.addEventListener("pointerdown", function () {
    lastPointer = Date.now();
  });

  form.addEventListener("change", function (e) {
    var target = e.target;
    if (target.name === "need") {
      form.querySelector("[data-qz-error-for=need]").hidden = true;
      showDetails();
      syncRouting();
      save();
      /* A tap on a card moves on by itself; arrow keys only change the
         selection, so keyboard users are never pulled forward. */
      if (Date.now() - lastPointer < 1500 && current === 1) {
        window.setTimeout(function () {
          if (current === 1) {
            goTo(2);
          }
        }, reduced ? 0 : 260);
      }
      return;
    }
    if (target.type === "radio") {
      var field = target.closest("[data-qz-field]");
      if (field) {
        clearError(field);
      }
      syncRouting();
    }
    save();
  });

  form.addEventListener("input", function (e) {
    var field = e.target.closest("[data-qz-field]");
    if (field && field.classList.contains("is-invalid")) {
      clearError(field);
    }
    save();
  });

  nextBtn.addEventListener("click", function () {
    goTo(current + 1);
  });

  backBtn.addEventListener("click", function () {
    goTo(current - 1);
  });

  $all("[data-qz-goto]").forEach(function (button) {
    button.addEventListener("click", function () {
      goTo(parseInt(button.dataset.qzGoto, 10));
    });
  });

  /* Enter in a text field moves forward instead of submitting early. */
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (sending) {
      return;
    }
    if (current < total) {
      goTo(current + 1);
      return;
    }
    send();
  });
})(window, document);
