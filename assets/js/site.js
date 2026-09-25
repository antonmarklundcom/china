/**
 * Site chrome behaviour:
 *   1. the header: shrink + shadow once the page scrolls, the services
 *      mega-menu and the mobile drawer
 *   2. the mobile conversion bar: slides away while an on-page lead form is
 *      in view, so it never covers the form's own submit button
 *   3. the calculator → quote handoff: when a tool shows its result, the
 *      "Reciba una cotización real" block moves into the result panel
 *
 * Progressive enhancement — without JS the nav still renders every link,
 * because the mega panel is a plain list that this script hides on load; the
 * bar stays put and the handoff block stays hidden (the calculators need JS).
 */
(function (window, document) {
  "use strict";

  var root = document.documentElement;
  root.classList.add("js");

  /* -- 1. header ----------------------------------------------------------- */

  var header = document.querySelector("[data-header]");

  if (header) {
    var drawer = header.querySelector("[data-nav]");
    var toggle = header.querySelector("[data-nav-toggle]");
    var toggleLabel = toggle ? toggle.querySelector("[data-nav-label]") : null;
    var megaButton = header.querySelector("[data-mega-toggle]");
    var mega = header.querySelector("[data-mega]");
    var megaItem = megaButton ? megaButton.parentElement : null;
    var desktop = window.matchMedia("(min-width: 1081px)");
    var hoverable = window.matchMedia("(hover: hover) and (pointer: fine)");
    var closeTimer = null;

    /* Shrink on scroll. rAF-throttled; a class, so the CSS owns the look. */
    var ticking = false;
    var syncScrolled = function () {
      ticking = false;
      header.classList.toggle("is-scrolled", window.scrollY > 12);
    };
    window.addEventListener(
      "scroll",
      function () {
        if (!ticking) {
          ticking = true;
          window.requestAnimationFrame(syncScrolled);
        }
      },
      { passive: true }
    );
    syncScrolled();

    /* Hidden only once JS is running, so a no-JS visitor keeps the full list. */
    if (mega && megaButton) {
      mega.hidden = true;
      megaButton.setAttribute("aria-expanded", "false");
    }
    if (drawer && toggle && !desktop.matches) {
      drawer.hidden = true;
    }

    var setMega = function (open) {
      if (!mega || !megaButton) {
        return;
      }
      mega.hidden = !open;
      megaButton.setAttribute("aria-expanded", open ? "true" : "false");
      header.classList.toggle("has-mega", open && desktop.matches);
    };

    var setDrawer = function (open) {
      if (!drawer || !toggle) {
        return;
      }
      drawer.hidden = !open;
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      if (toggleLabel) {
        toggleLabel.textContent = open ? toggle.dataset.labelClose : toggle.dataset.labelOpen;
      }
      root.classList.toggle("has-drawer", open);
      document.body.style.overflow = open ? "hidden" : "";
      if (open) {
        setMega(false);
      }
    };

    if (megaButton) {
      megaButton.addEventListener("click", function () {
        setMega(mega.hidden);
      });
    }

    /* Desktop mouse users also get hover-to-open, with a short grace period
       so the pointer can travel from the button into the panel. Keyboard and
       touch keep the click toggle above. */
    if (megaItem && mega) {
      megaItem.addEventListener("mouseenter", function () {
        if (desktop.matches && hoverable.matches) {
          window.clearTimeout(closeTimer);
          setMega(true);
        }
      });
      megaItem.addEventListener("mouseleave", function () {
        if (desktop.matches && hoverable.matches) {
          closeTimer = window.setTimeout(function () {
            setMega(false);
          }, 180);
        }
      });
    }

    if (toggle) {
      toggle.addEventListener("click", function () {
        setDrawer(drawer.hidden);
      });
    }

    document.addEventListener("click", function (e) {
      if (desktop.matches && mega && !mega.hidden && !(megaItem && megaItem.contains(e.target))) {
        setMega(false);
      }
    });

    document.addEventListener("keydown", function (e) {
      if (e.key !== "Escape") {
        return;
      }
      if (drawer && !drawer.hidden && !desktop.matches) {
        setDrawer(false);
        toggle.focus();
      } else if (mega && !mega.hidden) {
        setMega(false);
        megaButton.focus();
      }
    });

    /* Crossing the breakpoint resets both, so a drawer left open on a phone
       does not become a stuck overlay on a rotated tablet. */
    desktop.addEventListener("change", function (e) {
      document.body.style.overflow = "";
      root.classList.remove("has-drawer");
      if (e.matches) {
        if (drawer) {
          drawer.hidden = false;
        }
        if (toggle) {
          toggle.setAttribute("aria-expanded", "false");
          if (toggleLabel) {
            toggleLabel.textContent = toggle.dataset.labelOpen;
          }
        }
        setMega(false);
      } else {
        setDrawer(false);
        setMega(false);
      }
    });
  }

  /* -- 2. mobile bar vs. the on-page lead form ------------------------------ */

  var bar = document.querySelector("[data-mbar]");
  var forms = document.querySelectorAll(".lead-form, [data-quote-form]");

  if (bar && forms.length && "IntersectionObserver" in window) {
    var visible = new Set();
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            visible.add(entry.target);
          } else {
            visible.delete(entry.target);
          }
        });
        root.classList.toggle("lead-form-in-view", visible.size > 0);
      },
      { rootMargin: "0px 0px -8% 0px", threshold: 0 }
    );
    Array.prototype.forEach.call(forms, function (form) {
      observer.observe(form);
    });
  }

  /* -- 3. calculator result → quote handoff -------------------------------- */

  var handoff = document.querySelector("[data-tool-handoff]");
  var results = document.querySelectorAll(".tool-result");

  if (handoff && results.length && "MutationObserver" in window) {
    var place = function (result) {
      if (result.hidden) {
        return;
      }
      if (handoff.parentElement !== result) {
        result.appendChild(handoff);
      }
      handoff.hidden = false;
    };
    Array.prototype.forEach.call(results, function (result) {
      new MutationObserver(function () {
        place(result);
      }).observe(result, { attributes: true, attributeFilter: ["hidden"] });
      place(result);
    });

    var handoffLink = handoff.querySelector("a[href]");
    if (handoffLink) {
      handoffLink.addEventListener("click", function () {
        if (window.siteAnalytics) {
          window.siteAnalytics.track("tool_quote_click", {
            tool: handoff.getAttribute("data-tool-handoff") || "",
            page_path: window.location.pathname
          });
        }
      });
    }
  }
})(window, document);
