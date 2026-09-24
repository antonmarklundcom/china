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

/* Cluster file loaded by content/tools.php. All calculators. */

declare(strict_types=1);

return [

    'calculadora-costo-importacion' => [
        'draft' => true,
        'path' => '/herramientas/calculadora-costo-importacion/',
        'title' => 'Calculadora de costo de importación',
        'navLabel' => 'Costo de importación',
        'seoTitle' => 'Calculadora de costo de importación',
        'metaDescription' => 'Calcule cuánto le cuesta poner en Paraguay un producto comprado en China: FOB, flete, seguro, valor CIF, tributos y costo por unidad.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de costo de importación',
            'lead' => 'Calcule cuánto le cuesta poner en Paraguay un producto comprado en China: FOB, flete, seguro, valor CIF, tributos y costo por unidad.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'faq' => [],
        'related' => [
            'importacion-llave-en-mano',
            'flete-maritimo-contenedor',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'importar',
        'analyticsTool' => 'costo_importacion',
    ],

    'calculadora-cbm-contenedor' => [
        'draft' => true,
        'path' => '/herramientas/calculadora-cbm-contenedor/',
        'title' => 'Calculadora de CBM y contenedor',
        'navLabel' => 'CBM y contenedor',
        'seoTitle' => 'Calculadora de CBM y contenedor',
        'metaDescription' => 'Calcule los metros cúbicos (CBM) de su carga, cuánto ocupa de un contenedor de 20 o 40 pies y si le conviene contenedor completo o compartido.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de CBM y contenedor',
            'lead' => 'Calcule los metros cúbicos (CBM) de su carga, cuánto ocupa de un contenedor de 20 o 40 pies y si le conviene contenedor completo o compartido.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'faq' => [],
        'related' => [
            'importacion-llave-en-mano',
            'flete-maritimo-contenedor',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'importar',
        'analyticsTool' => 'cbm_contenedor',
    ],

    'calculadora-compras-online' => [
        'draft' => true,
        'path' => '/herramientas/calculadora-compras-online/',
        'title' => 'Calculadora de compras online',
        'navLabel' => 'Compras online',
        'seoTitle' => 'Calculadora de compras online a Paraguay',
        'metaDescription' => 'Calcule el total de una compra en Temu, Shein o AliExpress puesta en Paraguay: precio, courier por kilo, peso volumétrico y cargos al recibir.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de compras online',
            'lead' => 'Calcule el total de una compra en Temu, Shein o AliExpress puesta en Paraguay: precio, courier por kilo, peso volumétrico y cargos al recibir.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'faq' => [],
        'related' => [
            'asesoria-compras-online',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'compras',
        'analyticsTool' => 'compras_online',
    ],

];
