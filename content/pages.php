<?php
/**
 * The static (non-service) pages, keyed by path. Services live in
 * content/services.php, tools in content/tools.php, guides in content/guias.php,
 * segment pages in content/segmentos.php; this is everything else with a URL.
 *
 *   title        string  <title> without the ' | <site name>' suffix
 *   description  string  120–155 chars, unique across the whole site
 *   h1           string  visible heading
 *   lead         string  one-line intro under the H1
 *   sections     array   optional prose blocks for templates/page.php:
 *                        [['h2' => ..., 'body' => [paragraph, ...]], ...]
 *   stub         bool    true while the page is still a placeholder: it renders
 *                        through templates/page-stub.php, is marked noindex and
 *                        stays out of sitemap.php. The phase that writes the
 *                        page sets this to false.
 *   noindex      bool    the page exists but is not a URL of its own (/404).
 *                        Excluded from sitemap.php and from the route contract.
 *   changefreq   string  sitemap hint
 *   priority     string  sitemap hint
 *
 * Every entry here needs a route file (<path>/index.php) except '/404', which
 * is served by 404.php.
 */

declare(strict_types=1);

return [
    '/' => [
        'title'       => 'Inicio',
        'description' => 'Página de ejemplo del template: reemplace este texto por lo que hace el '
                       . 'negocio, para quién y en qué ciudad, en 120–155 caracteres.',
        'h1'          => '',
        'lead'        => '',
        'stub'        => false,
        'changefreq'  => 'weekly',
        'priority'    => '1.0',
    ],

    '/servicios/' => [
        'title'       => 'Servicios',
        'description' => 'Todos los servicios del negocio en una sola página, agrupados por tipo, '
                       . 'con el detalle de qué incluye cada uno.',
        'h1'          => '',
        'lead'        => '',
        'stub'        => false,
        'changefreq'  => 'monthly',
        'priority'    => '0.9',
    ],

    '/precios/' => [
        'title'       => 'Precios y planes',
        'description' => 'Los planes disponibles, con el alcance de cada uno y un presupuesto a '
                       . 'medida cuando el caso no entra en ninguno.',
        'h1'          => 'Precios',
        'lead'        => 'El alcance se define por escrito antes de empezar.',
        'stub'        => false,
        'changefreq'  => 'monthly',
        'priority'    => '0.7',
    ],

    '/herramientas/' => [
        'title'       => 'Herramientas',
        'description' => 'Calculadoras gratuitas para resolver las cuentas que más nos preguntan, '
                       . 'con el detalle de cómo se calcula cada una.',
        'h1'          => 'Herramientas',
        'lead'        => 'Calculadoras gratuitas para las cuentas más frecuentes.',
        'stub'        => false,
        'changefreq'  => 'monthly',
        'priority'    => '0.7',
    ],

    '/guias/' => [
        'title'       => 'Guías',
        'description' => 'Guías paso a paso de los trámites y procesos que más nos consultan, '
                       . 'escritas para hacerlas uno mismo.',
        'h1'          => 'Guías',
        'lead'        => 'Cómo hacer, paso a paso, lo que más nos preguntan.',
        'stub'        => false,
        'changefreq'  => 'monthly',
        'priority'    => '0.7',
    ],

    '/blog/' => [
        'title'       => 'Blog',
        'description' => 'Artículos prácticos sobre el rubro, escritos por el equipo y '
                       . 'actualizados cuando cambia algo que importa.',
        'h1'          => 'Blog',
        'lead'        => 'Artículos prácticos sobre el rubro.',
        'stub'        => false,
        'changefreq'  => 'weekly',
        'priority'    => '0.6',
    ],

    '/contacto/' => [
        'title'       => 'Contacto',
        'description' => 'Escríbanos por WhatsApp o déjenos sus datos: le respondemos dentro del '
                       . 'siguiente día hábil con una propuesta concreta.',
        'h1'          => '',
        'lead'        => '',
        'stub'        => false,
        'changefreq'  => 'yearly',
        'priority'    => '0.8',
    ],

    '/privacidad/' => [
        'title'       => 'Política de privacidad',
        'description' => 'Cómo tratamos los datos personales que nos deja en el formulario y cómo '
                       . 'puede pedir su acceso, corrección o eliminación.',
        'h1'          => 'Política de privacidad',
        'lead'        => 'Cómo tratamos los datos personales que nos confía.',
        'sections'    => [
            [
                'h2'   => 'Qué datos recogemos',
                'body' => [
                    'Reemplace este texto. Recogemos únicamente los datos que usted escribe en el '
                        . 'formulario de contacto —nombre, teléfono, correo y el mensaje— más los '
                        . 'parámetros de campaña que trae el enlace por el que llegó.',
                ],
            ],
            [
                'h2'   => 'Para qué los usamos',
                'body' => [
                    'Reemplace este texto. Usamos sus datos para responderle y para llevar el '
                        . 'seguimiento de su consulta. No los vendemos ni los cedemos a terceros '
                        . 'ajenos a la prestación del servicio.',
                ],
            ],
            [
                'h2'   => 'Sus derechos',
                'body' => [
                    'Reemplace este texto por la vía de contacto real para pedir el acceso, la '
                        . 'corrección o la eliminación de sus datos.',
                ],
            ],
        ],
        'stub'        => false,
        'changefreq'  => 'yearly',
        'priority'    => '0.3',
    ],

    '/terminos/' => [
        'title'       => 'Términos de servicio',
        'description' => 'Las condiciones bajo las que prestamos nuestros servicios: alcance, '
                       . 'plazos y responsabilidades de cada parte.',
        'h1'          => 'Términos de servicio',
        'lead'        => 'Condiciones bajo las que prestamos nuestros servicios.',
        'sections'    => [
            [
                'h2'   => 'Alcance',
                'body' => [
                    'Reemplace este texto por el alcance real: qué se contrata, qué queda fuera y '
                        . 'cómo se acuerda cualquier trabajo adicional.',
                ],
            ],
            [
                'h2'   => 'Plazos y responsabilidades',
                'body' => [
                    'Reemplace este texto por los plazos reales y por lo que necesita de parte del '
                        . 'cliente para poder cumplirlos.',
                ],
            ],
        ],
        'stub'        => false,
        'changefreq'  => 'yearly',
        'priority'    => '0.3',
    ],

    // Served by 404.php, not by a route file: it has no URL of its own, so it
    // is excluded from the sitemap and from the route contract.
    '/404' => [
        'title'       => 'Página no encontrada',
        'description' => 'No encontramos la página que buscaba. Vea nuestros servicios o '
                       . 'escríbanos y le indicamos dónde está lo que necesita.',
        'h1'          => 'No encontramos esta página',
        'lead'        => '',
        'stub'        => false,
        'noindex'     => true,
        'changefreq'  => 'yearly',
        'priority'    => '0.1',
    ],
];
