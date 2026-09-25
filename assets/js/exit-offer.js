/**
 * The exit-intent offer (partials/exit-offer.php).
 *
 * Opens at most once per 7 days, on desktop only (fine pointer, width >= 1024),
 * when the mouse leaves the viewport through the top edge — and only once the
 * visitor has shown interest: >= 20 s on the page or >= 40 % scrolled. Never on
 * /cotizar/ or /contacto/ (the partial is not even rendered there) and never
 * after the visitor submitted a lead form.
 *
 * Accessible dialog: focus moves in, Tab is trapped, Esc / the close button /
 * the backdrop close it and focus returns where it was. Every storage access
 * is wrapped: a browser that blocks storage simply never sees the offer twice
 * in one page view, and nothing throws.
 *
 * Tracks exit_offer_shown / exit_offer_click through window.siteAnalytics when
 * present (a no-op without a GA id). No analytics of its own.
 */
(function (window, document) {
  "use strict";

  var SEEN_KEY = "cp_exit_offer_seen";
  var LEAD_KEY = "cp_lead_sent";
  var WEEK_MS = 7 * 24 * 60 * 60 * 1000;
  var MIN_TIME_MS = 20000;
  var MIN_SCROLL = 0.4;

  function store(method, key, value) {
    try {
      return method === "get" ? window.localStorage.getItem(key) : window.localStorage.setItem(key, value);
    } catch (e) {
      return null;
    }
  }

  function track(event, params) {
    if (window.siteAnalytics && typeof window.siteAnalytics.track === "function") {
      window.siteAnalytics.track(event, Object.assign({ page_path: window.location.pathname }, params || {}));
    }
  }

  /* A lead sent from any form on the site switches the offer off for good:
     the visitor has already asked. Recorded on submit, before lead-form.js
     knows the outcome — someone who tried to send is not a leaving visitor. */
  document.addEventListener(
    "submit",
    function (e) {
      if (e.target && e.target.matches && e.target.matches("[data-lead-form], [data-quote-form], form[action='/enviar.php']")) {
        store("set", LEAD_KEY, String(Date.now()));
      }
    },
    true
  );

  var root = document.querySelector("[data-exit-offer]");
  if (!root) {
    return;
  }

  var path = window.location.pathname;
  if (path.indexOf("/cotizar/") === 0 || path.indexOf("/contacto/") === 0) {
    return;
  }

  var desktop = window.matchMedia("(pointer: fine) and (min-width: 1024px)");
  var dialog = root.querySelector('[role="dialog"]');
  var start = Date.now();
  var maxScroll = 0;
  var shownThisView = false;
  var lastFocus = null;

  function recentlySeen() {
    var seen = parseInt(store("get", SEEN_KEY) || "0", 10);
    return seen > 0 && Date.now() - seen < WEEK_MS;
  }

  function leadSent() {
    return !!store("get", LEAD_KEY);
  }

  function engaged() {
    return Date.now() - start >= MIN_TIME_MS || maxScroll >= MIN_SCROLL;
  }

  function onScroll() {
    var doc = document.documentElement;
    var range = doc.scrollHeight - window.innerHeight;
    if (range > 0) {
      maxScroll = Math.max(maxScroll, window.scrollY / range);
    }
  }

  function focusables() {
    return Array.prototype.slice.call(
      dialog.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])')
    );
  }

  function open() {
    shownThisView = true;
    store("set", SEEN_KEY, String(Date.now()));
    lastFocus = document.activeElement;
    root.hidden = false;
    document.documentElement.classList.add("has-dialog");
    /* next frame, so the entrance transition runs from the hidden state */
    window.requestAnimationFrame(function () {
      root.classList.add("is-open");
      var first = dialog.querySelector("[data-exit-cta]") || dialog;
      first.focus();
    });
    track("exit_offer_shown");
  }

  function close() {
    if (root.hidden) {
      return;
    }
    root.classList.remove("is-open");
    root.hidden = true;
    document.documentElement.classList.remove("has-dialog");
    if (lastFocus && typeof lastFocus.focus === "function") {
      lastFocus.focus();
    }
  }

  function maybeOpen(e) {
    if (shownThisView || !desktop.matches) {
      return;
    }
    /* Leaving through the top edge only: that is the tab bar / address bar,
       not a move onto the scrollbar or out of the side of the window. */
    if (e.relatedTarget || e.toElement || e.clientY > 0) {
      return;
    }
    if (!engaged() || recentlySeen() || leadSent()) {
      return;
    }
    if (document.querySelector(".wa-menu:not([hidden])")) {
      return;
    }
    open();
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  document.addEventListener("mouseout", maybeOpen);

  root.querySelectorAll("[data-exit-close]").forEach(function (el) {
    el.addEventListener("click", close);
  });

  root.querySelectorAll("[data-exit-cta]").forEach(function (el) {
    el.addEventListener("click", function () {
      track("exit_offer_click", { target: el.getAttribute("data-exit-cta") });
    });
  });

  document.addEventListener("keydown", function (e) {
    if (root.hidden) {
      return;
    }
    if (e.key === "Escape") {
      e.preventDefault();
      close();
      return;
    }
    if (e.key !== "Tab") {
      return;
    }
    var items = focusables();
    if (items.length === 0) {
      e.preventDefault();
      return;
    }
    var first = items[0];
    var last = items[items.length - 1];
    if (e.shiftKey && (document.activeElement === first || document.activeElement === dialog)) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  });
})(window, document);
