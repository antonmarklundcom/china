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

/* Cluster file loaded by content/guias.php. Cluster: importar. */

declare(strict_types=1);

return [

    'como-importar-de-china-a-paraguay' => [
        'draft' => true,
        'path' => '/importar/como-importar-de-china-a-paraguay/',
        'title' => 'Cómo importar de China a Paraguay, paso a paso',
        'navLabel' => 'Cómo importar de China',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo importar de China a Paraguay',
        'metaDescription' => 'Guía completa para importar de China a Paraguay: proveedor, muestras, pago, flete, seguro, despacho aduanero y entrega, en orden.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Cómo importar de China a Paraguay, paso a paso',
            'lead' => 'Guía completa para importar de China a Paraguay: proveedor, muestras, pago, flete, seguro, despacho aduanero y entrega, en orden.',
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
        'relatedService' => 'importacion-llave-en-mano',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'requisitos-para-importar-paraguay' => [
        'draft' => true,
        'path' => '/importar/requisitos-para-importar-paraguay/',
        'title' => 'Requisitos para importar en Paraguay',
        'navLabel' => 'Requisitos para importar',
        'cluster' => 'importar',
        'seoTitle' => 'Requisitos para importar en Paraguay',
        'metaDescription' => 'Qué necesita para importar en Paraguay: RUC, registro de importador, despachante, documentos del embarque y permisos según el producto.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Requisitos para importar en Paraguay',
            'lead' => 'Qué necesita para importar en Paraguay: RUC, registro de importador, despachante, documentos del embarque y permisos según el producto.',
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
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'como-ser-importador-paraguay' => [
        'draft' => true,
        'path' => '/importar/como-ser-importador-paraguay/',
        'title' => 'Cómo ser importador en Paraguay',
        'navLabel' => 'Cómo ser importador',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo ser importador en Paraguay',
        'metaDescription' => 'Cómo registrarse como importador en Paraguay: pasos ante la DNIT y la aduana, qué cambia si es persona física o empresa, y errores comunes.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Cómo ser importador en Paraguay',
            'lead' => 'Cómo registrarse como importador en Paraguay: pasos ante la DNIT y la aduana, qué cambia si es persona física o empresa, y errores comunes.',
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
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'proveedores-chinos-confiables' => [
        'draft' => true,
        'path' => '/importar/proveedores-chinos-confiables/',
        'title' => 'Cómo encontrar proveedores chinos confiables',
        'navLabel' => 'Proveedores chinos confiables',
        'cluster' => 'importar',
        'seoTitle' => 'Proveedores chinos confiables: cómo elegir',
        'metaDescription' => 'Cómo encontrar y verificar proveedores chinos confiables: fábrica o comerciante, licencia, muestras, auditoría y señales de alerta.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Cómo encontrar proveedores chinos confiables',
            'lead' => 'Cómo encontrar y verificar proveedores chinos confiables: fábrica o comerciante, licencia, muestras, auditoría y señales de alerta.',
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

    'contenedor-compartido-desde-china' => [
        'draft' => true,
        'path' => '/importar/contenedor-compartido-desde-china/',
        'title' => 'Contenedor compartido desde China (carga consolidada)',
        'navLabel' => 'Contenedor compartido',
        'cluster' => 'importar',
        'seoTitle' => 'Contenedor compartido desde China',
        'metaDescription' => 'Cómo funciona el contenedor compartido o carga consolidada desde China a Paraguay: desde cuántos metros cúbicos conviene y cómo se cobra.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Contenedor compartido desde China (carga consolidada)',
            'lead' => 'Cómo funciona el contenedor compartido o carga consolidada desde China a Paraguay: desde cuántos metros cúbicos conviene y cómo se cobra.',
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
        'relatedService' => 'flete-maritimo-contenedor',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'productos-para-importar-de-china' => [
        'draft' => true,
        'path' => '/importar/productos-para-importar-de-china/',
        'title' => 'Qué productos conviene importar de China',
        'navLabel' => 'Productos para importar',
        'cluster' => 'importar',
        'seoTitle' => 'Productos para importar de China',
        'metaDescription' => 'Cómo elegir productos para importar de China a Paraguay: margen, peso, volumen, restricciones y demanda local, con ejemplos por rubro.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Qué productos conviene importar de China',
            'lead' => 'Cómo elegir productos para importar de China a Paraguay: margen, peso, volumen, restricciones y demanda local, con ejemplos por rubro.',
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

    'pagar-a-proveedores-chinos' => [
        'draft' => true,
        'path' => '/importar/pagar-a-proveedores-chinos/',
        'title' => 'Cómo pagar a proveedores chinos desde Paraguay',
        'navLabel' => 'Pagar a proveedores chinos',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo pagar a proveedores chinos',
        'metaDescription' => 'Formas de pagar a un proveedor chino desde Paraguay: transferencia bancaria, Alibaba Trade Assurance, Wise y otras, con costos y riesgos.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Cómo pagar a proveedores chinos desde Paraguay',
            'lead' => 'Formas de pagar a un proveedor chino desde Paraguay: transferencia bancaria, Alibaba Trade Assurance, Wise y otras, con costos y riesgos.',
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

    'importadoras-en-paraguay' => [
        'draft' => true,
        'path' => '/importar/importadoras-en-paraguay/',
        'title' => 'Importadoras en Paraguay: cuándo usar una',
        'navLabel' => 'Importadoras en Paraguay',
        'cluster' => 'importar',
        'seoTitle' => 'Importadoras en Paraguay: cuándo conviene',
        'metaDescription' => 'Qué hace una importadora en Paraguay, cuándo conviene contratar una en lugar de importar a su nombre y qué preguntar antes de firmar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Importadoras en Paraguay: cuándo usar una',
            'lead' => 'Qué hace una importadora en Paraguay, cuándo conviene contratar una en lugar de importar a su nombre y qué preguntar antes de firmar.',
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
        'relatedService' => 'importacion-llave-en-mano',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

];
