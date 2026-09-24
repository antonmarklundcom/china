<?php
/**
 * The tool pages under /herramientas/, keyed by slug — same shape discipline as
 * content/services.php: fill every key, never rename or remove one.
 *
 *   path             string   URL, trailing slash
 *   title            string   the tool's concept, used as the title fallback
 *   navLabel         string   short label for the hub, the nav and the footer
 *   seoTitle         string   <title> without the site suffix, <= 41 chars
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   hero             array    eyebrow, h1, lead
 *   intro            string[] 200–300 words of copy, readable without JS
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   related          string[] related service slugs (content/services.php)
 *   ctaWhatsapp      string   kept EMPTY: every wa.me prefill comes from
 *                             content/lead-values.php through
 *                             whatsapp_text_for_page(). The key exists so the
 *                             record shape is stable.
 *   formNeed         string   pre-selected chip key in content/ui.php 'needs'
 *   analyticsTool    string   tool_used event name (assets/js/analytics.js)
 *   example          bool     seed record only — see content/services.php
 *
 * The calculator markup itself lives in each tool's own route file, which builds
 * it into $toolCalcHtml and requires templates/tool.php; the arithmetic lives in
 * assets/js/tools/<slug>.js and reads its rules from window.Market.
 *
 * Every tool slug also needs a record in content/lead-values.php.
 */

declare(strict_types=1);

return [

    'herramienta-ejemplo' => [
        'example' => true,
        'path'            => '/herramientas/herramienta-ejemplo/',
        'title'           => 'Calculadora de ejemplo',
        'navLabel'        => 'Calculadora de ejemplo',
        'seoTitle'        => 'Calculadora de ejemplo',
        'metaDescription' => 'Calculadora de ejemplo: muestra cómo una herramienta se arma sobre '
                           . 'templates/tool.php y el módulo de mercado, sin tocar el chrome.',
        'hero' => [
            'eyebrow' => 'Herramientas',
            'h1'      => 'Calculadora de ejemplo',
            'lead'    => 'Una línea que dice exactamente qué calcula y para quién.',
        ],
        'intro' => [
            'Dos o tres párrafos que explican la cuenta que hace la calculadora, con las reglas '
                . 'que aplica y sus límites. Este texto se lee sin JavaScript y es lo que posiciona '
                . 'la página: la calculadora convierte, el texto es lo que trae la visita.',
        ],
        'faq' => [
            [
                'q' => '¿De dónde salen los números?',
                'a' => 'Del módulo de mercado (lib/market/<market>.php), que es la única fuente de '
                     . 'tablas legales del sitio.',
            ],
        ],
        'related'       => ['servicio-ejemplo'],
        'ctaWhatsapp'   => '',
        'formNeed'      => 'servicio',
        'analyticsTool' => 'herramienta_ejemplo',
    ],
];
