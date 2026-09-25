/**
 * Reading pages (templates/guide.php, segment.php, article.php): scroll-spy on
 * the "En esta guía" TOC, a thin reading-progress bar and a "Volver arriba"
 * button. Pure enhancement — without JS the TOC is a list of in-page links and
 * the page is complete; the bar and the button simply never exist.
 */
(function (window, document) {
  "use strict";

  var article = document.querySelector("[data-reading]");
  if (!article) {
    return;
  }

  var root = document.documentElement;
  var header = document.querySelector(".site-header");
  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
  var headerHeight = 80;

  /* The sticky sidebar and the anchor scroll-margin sit under the sticky
     header; CSS falls back to 80px until this runs. */
  function measureHeader() {
    headerHeight = header ? header.offsetHeight : 0;
    root.style.setProperty("--header-h", headerHeight + "px");
  }
  measureHeader();

  /* ---- TOC scroll-spy --------------------------------------------------- */

  var tocs = Array.prototype.slice.call(document.querySelectorAll("[data-toc]"));
  var links = [];
  tocs.forEach(function (toc) {
    links = links.concat(Array.prototype.slice.call(toc.querySelectorAll("a[href^='#']")));
  });

  var targets = [];
  var seen = {};
  links.forEach(function (link) {
    var id = decodeURIComponent(link.getAttribute("href").slice(1));
    if (seen[id]) {
      return;
    }
    var el = document.getElementById(id);
    if (el) {
      seen[id] = true;
      targets.push(el);
    }
  });

  /* The sidebar list scrolls inside itself when it is taller than the space
     left above the lead card: keep the active entry visible without moving
     the page (scrollIntoView would scroll the window too). */
  function keepInView(link) {
    var list = link.closest(".toc__list");
    if (!list || list.scrollHeight <= list.clientHeight) {
      return;
    }
    var top = link.offsetTop - list.offsetTop;
    if (top < list.scrollTop) {
      list.scrollTop = top - 8;
    } else if (top + link.offsetHeight > list.scrollTop + list.clientHeight - 20) {
      list.scrollTop = top + link.offsetHeight - list.clientHeight + 28;
    }
  }

  var activeId = null;
  function setActive(id) {
    if (id === activeId) {
      return;
    }
    activeId = id;
    links.forEach(function (link) {
      var on = link.getAttribute("href") === "#" + id;
      link.classList.toggle("is-active", on);
      if (on) {
        link.setAttribute("aria-current", "location");
        keepInView(link);
      } else {
        link.removeAttribute("aria-current");
      }
    });
  }

  var observer = null;
  var visible = {};
  function observe() {
    if (!("IntersectionObserver" in window) || targets.length === 0) {
      return;
    }
    if (observer) {
      observer.disconnect();
    }
    visible = {};
    /* A band from just under the header to 40% down the viewport: the entry
       the reader is actually in, not the one merely peeking at the bottom. */
    observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          visible[entry.target.id] = entry.isIntersecting;
        });
        /* the newest section to enter the band wins */
        for (var i = targets.length - 1; i >= 0; i--) {
          if (visible[targets[i].id]) {
            setActive(targets[i].id);
            return;
          }
        }
      },
      { rootMargin: "-" + (headerHeight + 24) + "px 0px -60% 0px", threshold: 0 }
    );
    targets.forEach(function (t) {
      observer.observe(t);
    });
  }
  observe();

  /* On phones the TOC is a <details>: close it after a jump so the reader
     lands on the section, not on an open list. */
  tocs.forEach(function (toc) {
    if (toc.tagName !== "DETAILS") {
      return;
    }
    toc.addEventListener("click", function (e) {
      if (e.target.closest("a")) {
        toc.open = false;
      }
    });
  });

  /* ---- progress bar + back to top --------------------------------------- */

  var bar = document.createElement("div");
  bar.className = "reading-progress";
  bar.setAttribute("aria-hidden", "true");
  var fill = document.createElement("span");
  bar.appendChild(fill);
  document.body.appendChild(bar);

  var topLabel = article.getAttribute("data-top-label") || "Volver arriba";
  var toTop = document.createElement("button");
  toTop.type = "button";
  toTop.className = "back-to-top";
  toTop.setAttribute("aria-label", topLabel);
  toTop.title = topLabel;
  toTop.innerHTML =
    '<svg viewBox="0 0 20 20" aria-hidden="true" focusable="false"><path d="M10 16V4m-5 5 5-5 5 5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  document.body.appendChild(toTop);

  toTop.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: reduceMotion.matches ? "auto" : "smooth" });
    /* Keyboard users land back at the top of the content, not the button. */
    var h1 = document.querySelector("main h1");
    if (h1) {
      h1.setAttribute("tabindex", "-1");
      h1.focus({ preventScroll: true });
    }
  });

  var ticking = false;
  function update() {
    ticking = false;
    var rect = article.getBoundingClientRect();
    var viewport = window.innerHeight;
    /* 0 when the article's top reaches the header, 1 when its end is in view */
    var total = rect.height - viewport + headerHeight;
    var read = headerHeight - rect.top;
    var progress = total > 0 ? Math.min(1, Math.max(0, read / total)) : 1;
    fill.style.transform = "scaleX(" + progress.toFixed(4) + ")";
    toTop.classList.toggle("is-visible", window.scrollY > viewport * 1.2);
  }
  function onScroll() {
    if (!ticking) {
      ticking = true;
      window.requestAnimationFrame(update);
    }
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener(
    "resize",
    function () {
      var before = headerHeight;
      measureHeader();
      if (before !== headerHeight) {
        observe();
      }
      onScroll();
    },
    { passive: true }
  );
  update();
})(window, document);
