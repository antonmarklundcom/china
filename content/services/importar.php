<?php
/**
 * The service pages, keyed by slug. THIS SHAPE IS THE CONTRACT: a site fills the
 * empty keys and may add optional ones, but never renames or removes a key.
 * README.md ("Content model") documents it.
 *
 *   path             string   URL, always with a trailing slash. On a rebuild,
 *                             an existing URL is frozen for SEO — never change one.
 *   title            string   the page's own concept, used as the H1 fallback
 *   navLabel         string   short label for the mega-menu and the footer
 *   cluster          string   key into ui('clusters')
 *   parent           ?string  slug of the sub-hub this page sits under, if any
 *   seoTitle         string   <title> without the ' | <site name>' suffix,
 *                             <= 42 chars so the full title stays under 60
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   hero             array    eyebrow, h1, h2, lead
 *   includes         string[] the "qué incluye" checklist
 *   excludes         string[] the "qué no incluye" checklist (optional)
 *   weNeed           string[] the "qué necesitamos de usted" checklist (optional)
 *   sections         array    [['h2' => ..., 'body' => [paragraph, ...],
 *                              'items' => [['title' => ..., 'text' => ...]]], ...]
 *   benefits         array    [['title' => ..., 'text' => ...], ...]
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   cta              array    label (the button text)
 *   related          string[] sibling service slugs shown as cards
 *   guides           string[] guide slugs (content/guias.php)
 *   articles         string[] article slugs (content/blog.php)
 *   toolLinks        array    [['path' => ..., 'label' => ..., 'text' => ...], ...]
 *   example          bool     present ONLY on the seed record below. Deleting
 *                             every 'example' => true entry across content/ is
 *                             step 3 of "Start a new site (T0)" in README.md.
 *
 * Every service slug also needs a record in content/lead-values.php — verify.sh
 * fails the build when one is missing, because a service page whose form is not
 * in the lead value model quietly sends untagged leads.
 */

/* Cluster file loaded by content/services.php. Cluster: importar. */

declare(strict_types=1);

return [

    'agente-de-compras-china' => [
        'draft' => true,
        'path' => '/servicios/agente-de-compras-china/',
        'title' => 'Agente de compras en China',
        'navLabel' => 'Agente de compras en China',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Agente de compras en China para Paraguay',
        'metaDescription' => 'Un agente en China busca proveedores, negocia precio y mínimos, y controla su pedido antes de que salga. Para importadores de Paraguay.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Agente de compras en China',
            'h2' => '',
            'lead' => 'Un agente en China busca proveedores, negocia precio y mínimos, y controla su pedido antes de que salga. Para importadores de Paraguay.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

    'inspeccion-de-calidad' => [
        'draft' => true,
        'path' => '/servicios/inspeccion-de-calidad/',
        'title' => 'Inspección de calidad en China',
        'navLabel' => 'Inspección de calidad',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Inspección de calidad en fábrica China',
        'metaDescription' => 'Inspección en la fábrica china antes del pago final: cantidades, medidas, terminaciones y empaque, con informe y fotos para usted.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Inspección de calidad en China',
            'h2' => '',
            'lead' => 'Inspección en la fábrica china antes del pago final: cantidades, medidas, terminaciones y empaque, con informe y fotos para usted.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

    'flete-maritimo-contenedor' => [
        'draft' => true,
        'path' => '/servicios/flete-maritimo-contenedor/',
        'title' => 'Flete marítimo desde China: contenedor y carga consolidada',
        'navLabel' => 'Flete marítimo y contenedor',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Flete marítimo China–Paraguay',
        'metaDescription' => 'Contenedor completo o carga consolidada desde China a Paraguay: puerto de salida, transbordo, llegada por río o por tierra y plazos reales.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Flete marítimo desde China: contenedor y carga consolidada',
            'h2' => '',
            'lead' => 'Contenedor completo o carga consolidada desde China a Paraguay: puerto de salida, transbordo, llegada por río o por tierra y plazos reales.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

    'flete-aereo-china' => [
        'draft' => true,
        'path' => '/servicios/flete-aereo-china/',
        'title' => 'Flete aéreo desde China a Paraguay',
        'navLabel' => 'Flete aéreo',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Flete aéreo y courier de carga desde China',
        'metaDescription' => 'Carga aérea desde China a Paraguay para muestras, repuestos y pedidos urgentes: cuándo conviene frente al marítimo y cómo se cotiza.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Flete aéreo desde China a Paraguay',
            'h2' => '',
            'lead' => 'Carga aérea desde China a Paraguay para muestras, repuestos y pedidos urgentes: cuándo conviene frente al marítimo y cómo se cotiza.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

    'importacion-llave-en-mano' => [
        'draft' => true,
        'path' => '/servicios/importacion-llave-en-mano/',
        'title' => 'Importación llave en mano desde China',
        'navLabel' => 'Importación llave en mano',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Importación llave en mano desde China',
        'metaDescription' => 'Del proveedor chino a su depósito en Paraguay con un solo interlocutor: compra, inspección, flete, seguro y despacho coordinados.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Importación llave en mano desde China',
            'h2' => '',
            'lead' => 'Del proveedor chino a su depósito en Paraguay con un solo interlocutor: compra, inspección, flete, seguro y despacho coordinados.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

];
