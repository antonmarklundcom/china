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

/* Cluster file loaded by content/guias.php. Cluster: viajes. */

declare(strict_types=1);

return [

    'feria-de-canton' => [
        'draft' => true,
        'path' => '/feria-de-canton/',
        'title' => 'Feria de Cantón: guía para compradores de Paraguay',
        'navLabel' => 'Feria de Cantón',
        'cluster' => 'viajes',
        'seoTitle' => 'Feria de Cantón: guía para ir desde PY',
        'metaDescription' => 'Cómo ir a la Feria de Cantón desde Paraguay: fases y sectores, registro de comprador, visa, vuelos, hotel y cómo negociar con fábricas.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Feria de Cantón: guía para compradores de Paraguay',
            'lead' => 'Cómo ir a la Feria de Cantón desde Paraguay: fases y sectores, registro de comprador, visa, vuelos, hotel y cómo negociar con fábricas.',
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
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'visa-china-para-paraguayos' => [
        'draft' => true,
        'path' => '/viajar-a-china/visa-china-para-paraguayos/',
        'title' => 'Visa para China para paraguayos',
        'navLabel' => 'Visa China para paraguayos',
        'cluster' => 'viajes',
        'seoTitle' => 'Visa para China desde Paraguay',
        'metaDescription' => 'Cómo tramitar la visa china con pasaporte paraguayo: dónde se presenta, tipos de visa, documentos, plazos y errores que retrasan el trámite.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Visa para China para paraguayos',
            'lead' => 'Cómo tramitar la visa china con pasaporte paraguayo: dónde se presenta, tipos de visa, documentos, plazos y errores que retrasan el trámite.',
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
        'relatedService' => 'visa-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'guia-para-viajar-a-china' => [
        'draft' => true,
        'path' => '/viajar-a-china/guia-para-viajar-a-china/',
        'title' => 'Guía para viajar a China desde Paraguay',
        'navLabel' => 'Guía para viajar a China',
        'cluster' => 'viajes',
        'seoTitle' => 'Guía para viajar a China desde Paraguay',
        'metaDescription' => 'Lo práctico para viajar a China desde Paraguay: vuelos, internet y eSIM, VPN, pagos con Alipay y WeChat, apps útiles y seguro de viaje.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Guía para viajar a China desde Paraguay',
            'lead' => 'Lo práctico para viajar a China desde Paraguay: vuelos, internet y eSIM, VPN, pagos con Alipay y WeChat, apps útiles y seguro de viaje.',
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
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'mejor-epoca-para-viajar-a-china' => [
        'draft' => true,
        'path' => '/viajar-a-china/mejor-epoca-para-viajar-a-china/',
        'title' => 'Mejor época para viajar a China',
        'navLabel' => 'Mejor época para ir',
        'cluster' => 'viajes',
        'seoTitle' => 'Mejor época para viajar a China',
        'metaDescription' => 'Cuál es la mejor época para viajar a China según el clima, las ferias comerciales y los feriados chinos que conviene evitar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Mejor época para viajar a China',
            'lead' => 'Cuál es la mejor época para viajar a China según el clima, las ferias comerciales y los feriados chinos que conviene evitar.',
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
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'que-ver-en-china' => [
        'draft' => true,
        'path' => '/viajar-a-china/que-ver-en-china/',
        'title' => 'Qué ver en China: ciudades para un primer viaje',
        'navLabel' => 'Qué ver en China',
        'cluster' => 'viajes',
        'seoTitle' => 'Qué ver en China en un primer viaje',
        'metaDescription' => 'Qué ver en China en un primer viaje: Pekín, Shanghái, Cantón, Shenzhen y otras ciudades, y cómo combinarlas con un viaje de negocios.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Qué ver en China: ciudades para un primer viaje',
            'lead' => 'Qué ver en China en un primer viaje: Pekín, Shanghái, Cantón, Shenzhen y otras ciudades, y cómo combinarlas con un viaje de negocios.',
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
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'viaje-de-negocios-a-china' => [
        'draft' => true,
        'path' => '/viajar-a-china/viaje-de-negocios-a-china/',
        'title' => 'Viaje de negocios a China: cómo prepararlo',
        'navLabel' => 'Viaje de negocios',
        'cluster' => 'viajes',
        'seoTitle' => 'Viaje de negocios a China: cómo prepararlo',
        'metaDescription' => 'Cómo preparar un viaje de negocios a China desde Paraguay: agenda de fábricas, intérprete, muestras, negociación y seguimiento al volver.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Viaje de negocios a China: cómo prepararlo',
            'lead' => 'Cómo preparar un viaje de negocios a China desde Paraguay: agenda de fábricas, intérprete, muestras, negociación y seguimiento al volver.',
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
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

];
