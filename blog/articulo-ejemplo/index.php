<?php
/**
 * The example article. EXAMPLE ROUTE — delete this directory together with the
 * 'example' => true records.
 *
 * The pattern every article follows: the index record lives in
 * content/blog.php, the body lives here as $sections (and optionally $faq and
 * $toolLink), and templates/article.php renders the chrome, the reading time,
 * the JSON-LD and the related services.
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'articulo-ejemplo';

$sections = [
    [
        'h2'   => 'Cómo se estructura un artículo',
        'body' => [
            'El índice del blog vive en content/blog.php: slug, título, descripción, fecha y el '
                . 'servicio con el que se relaciona. El cuerpo vive en este archivo, en $sections, '
                . 'porque ninguna otra página lo reutiliza.',
            'La plantilla calcula el tiempo de lectura a partir de este texto, arma el JSON-LD de '
                . 'Article y muestra los servicios relacionados a partir del campo "service".',
        ],
    ],
    [
        'h2'    => 'Qué acepta cada sección',
        'body'  => [
            'Cada sección tiene un h2, una lista de párrafos y, opcionalmente, una lista de items '
                . 'que se renderiza como checklist.',
        ],
        'items' => [
            ['title' => 'h2', 'text' => 'El título de la sección.'],
            ['title' => 'body', 'text' => 'Los párrafos, como strings.'],
            ['title' => 'items', 'text' => 'Puntos con título y texto.'],
        ],
    ],
];

$faq = [
    [
        'q' => '¿Dónde se agrega un artículo nuevo?',
        'a' => 'Un registro en content/blog.php y un directorio /blog/<slug>/ con este mismo patrón.',
    ],
];

$toolLink = [
    'path'  => '/herramientas/herramienta-ejemplo/',
    'label' => 'Haga la cuenta',
    'text'  => 'La calculadora de ejemplo resuelve el cálculo que menciona este artículo.',
];

require ROOT_DIR . '/templates/article.php';
