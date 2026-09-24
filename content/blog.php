<?php
/**
 * Article index. The body of each article lives in its own
 * /blog/<slug>/index.php, rendered through templates/article.php; this file is
 * the index that the blog listing, the sitemap and the route contract read.
 *
 *   slug         string   directory name under /blog/
 *   title        string   H1 and card title — may run longer than the <title>
 *   seoTitle     string   <title>, <= 41 chars so it fits the 60-char budget
 *                         with the ' | <site name>' suffix; '' falls back to title
 *   description  string   meta description, 120–155 chars, unique site-wide
 *   date         string   YYYY-MM-DD, publication date
 *   updated      ?string  YYYY-MM-DD, when meaningfully revised
 *   tags         string[] free-form
 *   service      ?string  slug of the service this article links to — it also
 *                         decides the article's WhatsApp prefill and tier
 */

declare(strict_types=1);

return [
    [
        'slug'        => 'temu-shein-aliexpress-paraguay-comparacion',
        'title'       => 'Temu, Shein o AliExpress desde Paraguay: comparación práctica para comprar mejor',
        'seoTitle'    => 'Temu, Shein o AliExpress en Paraguay',
        'description' => 'Temu, Shein y AliExpress comparados para un comprador en Paraguay: catálogo, envío, devoluciones, formas de pago y talles, con criterios para elegir.',
        'date'        => '2026-09-24',
        'updated'     => null,
        'tags'        => ['Temu', 'Shein', 'AliExpress', 'Compras online'],
        'service'     => 'asesoria-compras-online',
    ],
    [
        'slug'        => 'errores-al-importar-de-china',
        'title'       => 'Los 10 errores más costosos al importar de China (y cómo evitarlos)',
        'seoTitle'    => 'Errores al importar de China',
        'description' => 'Diez errores que encarecen una importación desde China: intermediarios, muestras, Incoterms, inspección, NCM, subfacturación, marcas y seguro.',
        'date'        => '2026-09-24',
        'updated'     => null,
        'tags'        => ['Importar', 'Proveedores', 'Aduana'],
        'service'     => 'importacion-llave-en-mano',
    ],
    [
        'slug'        => 'preparar-visita-feria-de-canton',
        'title'       => 'Cómo preparar su visita a la Feria de Cantón: antes, durante y después',
        'seoTitle'    => 'Cómo preparar la Feria de Cantón',
        'description' => 'Guía para preparar la Feria de Cantón desde Paraguay: elegir la fase, registrarse, visa y hotel, qué hacer en los stands y cómo seguir a los proveedores.',
        'date'        => '2026-09-24',
        'updated'     => null,
        'tags'        => ['Feria de Cantón', 'Viajar a China', 'Proveedores'],
        'service'     => 'tour-negocios-china',
    ],
    [
        'slug'        => 'comercio-china-paraguay',
        'title'       => 'Comercio entre China y Paraguay: qué significa para quien importa',
        'seoTitle'    => 'Comercio China Paraguay',
        'description' => 'Paraguay reconoce a Taiwán y no tiene relaciones con la RPC, pero importa mucho de China. Qué implica en visas, pagos, rutas de flete y reexportación.',
        'date'        => '2026-09-24',
        'updated'     => null,
        'tags'        => ['Importar', 'Comercio exterior', 'Ciudad del Este'],
        'service'     => 'agente-de-compras-china',
    ],
];
