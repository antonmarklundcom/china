<?php
/**
 * Segment landing pages: one page per rubro (sector) or per situation, rendered
 * by templates/segment.php. One 3-line route file per slug.
 *
 * A segment page does not carry its own tier or WhatsApp message — it presets
 * the visitor into the real service that anchors its bundle ('leadSlug', an
 * existing key in content/lead-values.php's 'services'), so the lead form, the
 * WhatsApp CTA and the CRM tag all resolve through the one lead value model
 * rather than a second copy of it.
 *
 * Record shape:
 *
 *   path             string   URL, trailing slash
 *   navLabel         string   short label for the homepage rubros band
 *   seoTitle         string   <title> without the site suffix, <= 42 chars
 *   metaDescription  string   120–155 chars, unique site-wide
 *   hero             array    eyebrow, h1, lead
 *   leadSlug         string   the bundle's highest-value service slug
 *   bundle           string[] service slugs shown as the "lo que armamos" grid
 *   traps            array    [['title' => ..., 'text' => ...], ...] — the
 *                             mistakes that cost this segment money (no stats)
 *   sections         array    optional prose blocks, same shape as
 *                             content/services.php's 'sections'
 *   weNeed           string[] "qué necesitamos de usted" checklist
 *   faq              array    [['q' => ..., 'a' => ...], ...], 3–5 items
 *   example          bool     seed record only — see content/services.php
 *
 * Adding a segment: add a record here and a 3-line route file. deploy/routes.php
 * and sitemap.php already read this file, so the new page joins the route
 * contract and the sitemap by existing.
 */

/* Cluster file loaded by content/segmentos.php. Product pages under /importar/. */

declare(strict_types=1);

return [

    'importar-ropa-de-china' => [
        'draft' => true,
        'path' => '/importar/ropa-de-china/',
        'navLabel' => 'Ropa',
        'seoTitle' => 'Importar ropa de China a Paraguay',
        'metaDescription' => 'Cómo importar ropa de China a Paraguay: proveedores, talles, etiquetado, mínimos de compra, flete y lo que cuesta ponerla en su local.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar ropa de China a Paraguay',
            'lead' => 'Cómo importar ropa de China a Paraguay: proveedores, talles, etiquetado, mínimos de compra, flete y lo que cuesta ponerla en su local.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-zapatillas-de-china' => [
        'draft' => true,
        'path' => '/importar/zapatillas-de-china/',
        'navLabel' => 'Zapatillas',
        'seoTitle' => 'Importar zapatillas de China',
        'metaDescription' => 'Importar zapatillas de China a Paraguay: fábricas, numeración, marcas registradas, control de calidad y costos de flete por par.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar zapatillas de China a Paraguay',
            'lead' => 'Importar zapatillas de China a Paraguay: fábricas, numeración, marcas registradas, control de calidad y costos de flete por par.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-celulares-de-china' => [
        'draft' => true,
        'path' => '/importar/celulares-de-china/',
        'navLabel' => 'Celulares',
        'seoTitle' => 'Importar celulares de China',
        'metaDescription' => 'Importar celulares y accesorios de China a Paraguay: modelos globales, homologación, garantía, baterías en el flete y proveedores.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar celulares de China a Paraguay',
            'lead' => 'Importar celulares y accesorios de China a Paraguay: modelos globales, homologación, garantía, baterías en el flete y proveedores.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-juguetes-de-china' => [
        'draft' => true,
        'path' => '/importar/juguetes-de-china/',
        'navLabel' => 'Juguetes',
        'seoTitle' => 'Importar juguetes de China',
        'metaDescription' => 'Importar juguetes de China a Paraguay: normas de seguridad, edades, pilas y baterías, empaque, temporada y cómo elegir fábrica.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar juguetes de China a Paraguay',
            'lead' => 'Importar juguetes de China a Paraguay: normas de seguridad, edades, pilas y baterías, empaque, temporada y cómo elegir fábrica.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-telas-de-china' => [
        'draft' => true,
        'path' => '/importar/telas-de-china/',
        'navLabel' => 'Telas',
        'seoTitle' => 'Importar telas de China',
        'metaDescription' => 'Importar telas de China a Paraguay: composición, rollos y metros, muestras de color, mínimos por diseño y costo de flete por kilo.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar telas de China a Paraguay',
            'lead' => 'Importar telas de China a Paraguay: composición, rollos y metros, muestras de color, mínimos por diseño y costo de flete por kilo.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-repuestos-de-autos-de-china' => [
        'draft' => true,
        'path' => '/importar/repuestos-de-autos-de-china/',
        'navLabel' => 'Repuestos de autos',
        'seoTitle' => 'Importar repuestos de autos de China',
        'metaDescription' => 'Importar repuestos de autos de China a Paraguay: códigos OEM, originales y alternativos, calidad, garantía y flete de piezas pesadas.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar repuestos de autos de China a Paraguay',
            'lead' => 'Importar repuestos de autos de China a Paraguay: códigos OEM, originales y alternativos, calidad, garantía y flete de piezas pesadas.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-maquinaria-de-china' => [
        'draft' => true,
        'path' => '/importar/maquinaria-de-china/',
        'navLabel' => 'Maquinaria',
        'seoTitle' => 'Importar maquinaria de China',
        'metaDescription' => 'Importar maquinaria de China a Paraguay: especificaciones, voltaje, repuestos, inspección antes del embarque, flete y despacho.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar maquinaria de China a Paraguay',
            'lead' => 'Importar maquinaria de China a Paraguay: especificaciones, voltaje, repuestos, inspección antes del embarque, flete y despacho.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-motos-de-china' => [
        'draft' => true,
        'path' => '/importar/motos-de-china/',
        'navLabel' => 'Motos',
        'seoTitle' => 'Importar motos de China a Paraguay',
        'metaDescription' => 'Importar motos de China a Paraguay: modelos, documentación para registrar, repuestos, contenedor, despacho y requisitos a confirmar.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar motos de China a Paraguay',
            'lead' => 'Importar motos de China a Paraguay: modelos, documentación para registrar, repuestos, contenedor, despacho y requisitos a confirmar.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-muebles-de-china' => [
        'draft' => true,
        'path' => '/importar/muebles-de-china/',
        'navLabel' => 'Muebles',
        'seoTitle' => 'Importar muebles de China',
        'metaDescription' => 'Importar muebles de China a Paraguay: materiales, desarmado y volumen, contenedor completo o compartido, daños en tránsito y costos.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar muebles de China a Paraguay',
            'lead' => 'Importar muebles de China a Paraguay: materiales, desarmado y volumen, contenedor completo o compartido, daños en tránsito y costos.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

    'importar-papeleria-de-china' => [
        'draft' => true,
        'path' => '/importar/papeleria-de-china/',
        'navLabel' => 'Papelería',
        'seoTitle' => 'Importar papelería de China',
        'metaDescription' => 'Importar papelería y útiles escolares de China a Paraguay: temporada escolar, mínimos, surtidos, empaque y costo puesto en depósito.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar papelería de China a Paraguay',
            'lead' => 'Importar papelería y útiles escolares de China a Paraguay: temporada escolar, mínimos, surtidos, empaque y costo puesto en depósito.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [],
        'sections' => [],
        'weNeed' => [],
        'faq' => [],
        'image' => null,
    ],

];
