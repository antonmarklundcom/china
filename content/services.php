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

declare(strict_types=1);

return [

    'servicio-ejemplo' => [
        'example' => true,
        'path'            => '/servicios/servicio-ejemplo/',
        'title'           => 'Servicio de ejemplo',
        'navLabel'        => 'Servicio de ejemplo',
        'cluster'         => 'principal',
        'parent'          => null,
        'seoTitle'        => 'Servicio de ejemplo',
        'metaDescription' => 'Página de servicio de ejemplo: muestra todos los bloques que el '
                           . 'template renderiza cuando el registro tiene datos completos.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1'      => 'Servicio de ejemplo',
            'h2'      => 'El subtítulo va acá, con la promesa concreta.',
            'lead'    => 'Un párrafo que explica el servicio en los términos del cliente: qué '
                       . 'problema resuelve, con qué frecuencia y qué recibe.',
        ],
        'includes' => [
            'Primer entregable, con su frecuencia',
            'Segundo entregable',
            'Una persona asignada a su cuenta',
        ],
        'excludes' => [
            'Lo que se cotiza aparte',
        ],
        'weNeed' => [
            'La documentación que hace falta para empezar',
        ],
        'sections' => [
            [
                'h2'   => 'Cómo trabajamos este servicio',
                'body' => [
                    'Dos o tres párrafos de copy real. Este bloque acepta párrafos y, opcionalmente, '
                        . 'una grilla de tarjetas con "items".',
                ],
                'items' => [
                    ['title' => 'Un detalle', 'text' => 'Una línea que lo explica.'],
                    ['title' => 'Otro detalle', 'text' => 'Otra línea que lo explica.'],
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Beneficio uno', 'text' => 'Por qué le conviene, en una línea.'],
            ['title' => 'Beneficio dos', 'text' => 'Por qué le conviene, en una línea.'],
        ],
        'faq' => [
            [
                'q' => '¿Cuánto demora?',
                'a' => 'Una respuesta concreta y verificable. Nada que no se pueda sostener.',
            ],
            [
                'q' => '¿Qué necesitan de mí para empezar?',
                'a' => 'La lista corta de lo que el cliente tiene que enviar.',
            ],
        ],
        'cta'       => ['label' => 'Pedir presupuesto', 'whatsappText' => ''],
        'related'   => [],
        'guides'    => ['guia-ejemplo'],
        'articles'  => ['articulo-ejemplo'],
        'toolLinks' => [
            [
                'path'  => '/herramientas/herramienta-ejemplo/',
                'label' => 'Calcule usted mismo',
                'text'  => 'La calculadora de ejemplo, para hacer la cuenta antes de escribirnos.',
            ],
        ],
    ],
];
