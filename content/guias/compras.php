<?php
/**
 * The how-to guides under /guias/, keyed by slug — same shape discipline as
 * content/services.php and content/tools.php.
 *
 * Why this content type exists: a how-to query ("cómo se hace X") is answered
 * only partly by a service page. A guide answers it in full, then offers the
 * "¿prefiere que lo hagamos nosotros?" box to hand the task over — which is why
 * every guide names a relatedService.
 *
 *   path             string   URL, trailing slash
 *   title            string   the guide's concept, used as the title fallback
 *   navLabel         string   short label for the hub, the nav and the footer
 *   seoTitle         string   <title> without the site suffix, <= 41 chars
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   lastReviewed     string   ISO date, shown next to the "orientativo" note
 *   hero             array    eyebrow, h1, lead
 *   intro            string[] 2–3 paragraphs read before the numbered steps
 *   steps            array    [['title' => ..., 'body' => string[]], ...] →
 *                             both the visible numbered list and the HowTo
 *                             JSON-LD (templates/guide.php builds both from
 *                             this one array)
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   relatedService   ?string  slug into content/services.php AND
 *                             content/lead-values.php — the delegate box's form,
 *                             WhatsApp prefill and next-step text all resolve
 *                             from this one slug
 *   toolLink         ?array   ['path' => ..., 'label' => ..., 'text' => ...]
 *   related          string[] 2–3 sibling guide slugs
 *   example          bool     seed record only — see content/services.php
 */

/* Cluster file loaded by content/guias.php. Cluster: compras. */

declare(strict_types=1);

return [

    'temu-paraguay' => [
        'draft' => true,
        'path' => '/comprar/temu-paraguay/',
        'title' => 'Temu en Paraguay: cómo comprar y cuánto se paga',
        'navLabel' => 'Temu en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Temu en Paraguay: envío, plazos y costos',
        'metaDescription' => 'Cómo comprar en Temu desde Paraguay: si envía directo o por casilla, cuánto demora, qué se paga al recibir y cómo evitar demoras en aduana.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Temu en Paraguay: cómo comprar y cuánto se paga',
            'lead' => 'Cómo comprar en Temu desde Paraguay: si envía directo o por casilla, cuánto demora, qué se paga al recibir y cómo evitar demoras en aduana.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'shein-paraguay' => [
        'draft' => true,
        'path' => '/comprar/shein-paraguay/',
        'title' => 'Shein en Paraguay: envíos, talles y costos',
        'navLabel' => 'Shein en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Shein en Paraguay: envíos y costos',
        'metaDescription' => 'Shein en Paraguay: cómo llega el pedido, cuánto tarda, qué costos se suman al precio y cómo elegir talle sin tener que devolver.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Shein en Paraguay: envíos, talles y costos',
            'lead' => 'Shein en Paraguay: cómo llega el pedido, cuánto tarda, qué costos se suman al precio y cómo elegir talle sin tener que devolver.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'aliexpress-paraguay' => [
        'draft' => true,
        'path' => '/comprar/aliexpress-paraguay/',
        'title' => 'AliExpress en Paraguay: cómo comprar sin sorpresas',
        'navLabel' => 'AliExpress en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'AliExpress en Paraguay: guía de compra',
        'metaDescription' => 'Comprar en AliExpress desde Paraguay: opciones de envío, casilla o entrega directa, plazos, vendedores confiables y costos al recibir.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'AliExpress en Paraguay: cómo comprar sin sorpresas',
            'lead' => 'Comprar en AliExpress desde Paraguay: opciones de envío, casilla o entrega directa, plazos, vendedores confiables y costos al recibir.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'alibaba-paraguay' => [
        'draft' => true,
        'path' => '/comprar/alibaba-paraguay/',
        'title' => 'Alibaba en Paraguay: cómo comprar al por mayor',
        'navLabel' => 'Alibaba en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Alibaba en Paraguay: cómo comprar',
        'metaDescription' => 'Alibaba desde Paraguay: diferencia con AliExpress, cómo elegir proveedor, pedir muestras, pagar seguro y traer el pedido hasta Asunción.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Alibaba en Paraguay: cómo comprar al por mayor',
            'lead' => 'Alibaba desde Paraguay: diferencia con AliExpress, cómo elegir proveedor, pedir muestras, pagar seguro y traer el pedido hasta Asunción.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    '1688-en-espanol' => [
        'draft' => true,
        'path' => '/comprar/1688-en-espanol/',
        'title' => '1688 en español: cómo comprar en el mayorista chino',
        'navLabel' => '1688 en español',
        'cluster' => 'compras',
        'seoTitle' => '1688 en español: cómo comprar',
        'metaDescription' => 'Qué es 1688.com, por qué es más barato que Alibaba, cómo usarlo en español y por qué casi siempre necesita un agente en China.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => '1688 en español: cómo comprar en el mayorista chino',
            'lead' => 'Qué es 1688.com, por qué es más barato que Alibaba, cómo usarlo en español y por qué casi siempre necesita un agente en China.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'courier-china-paraguay' => [
        'draft' => true,
        'path' => '/comprar/courier-china-paraguay/',
        'title' => 'Courier de China a Paraguay: cómo funciona',
        'navLabel' => 'Courier China–Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Courier de China a Paraguay',
        'metaDescription' => 'Cómo funciona el courier de China a Paraguay: casilla, precio por kilo, peso volumétrico, plazos y qué hacer si el paquete se demora.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Courier de China a Paraguay: cómo funciona',
            'lead' => 'Cómo funciona el courier de China a Paraguay: casilla, precio por kilo, peso volumétrico, plazos y qué hacer si el paquete se demora.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'casillas-courier-paraguay' => [
        'draft' => true,
        'path' => '/comprar/casillas-courier-paraguay/',
        'title' => 'Casillas de courier en Paraguay: cómo elegir',
        'navLabel' => 'Casillas de courier',
        'cluster' => 'compras',
        'seoTitle' => 'Casillas de courier en Paraguay',
        'metaDescription' => 'Cómo elegir una casilla de courier en Paraguay para compras en China y Estados Unidos: tarifa por kilo, plazos, seguro y retiro.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Casillas de courier en Paraguay: cómo elegir',
            'lead' => 'Cómo elegir una casilla de courier en Paraguay para compras en China y Estados Unidos: tarifa por kilo, plazos, seguro y retiro.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'impuestos-compras-online-paraguay' => [
        'draft' => true,
        'path' => '/comprar/impuestos-compras-online-paraguay/',
        'title' => 'Impuestos de compras online en Paraguay',
        'navLabel' => 'Impuestos de compras online',
        'cluster' => 'compras',
        'seoTitle' => 'Impuestos de compras online en Paraguay',
        'metaDescription' => 'Qué impuestos y cargos se pagan en Paraguay por una compra online del exterior, cómo se calculan y dónde confirmar el monto vigente.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Impuestos de compras online en Paraguay',
            'lead' => 'Qué impuestos y cargos se pagan en Paraguay por una compra online del exterior, cómo se calculan y dónde confirmar el monto vigente.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

];
