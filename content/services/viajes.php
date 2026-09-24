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

/* Cluster file loaded by content/services.php. Cluster: viajes. */

declare(strict_types=1);

return [

    'visa-china' => [
        'path' => '/servicios/visa-china/',
        'title' => 'Visa para China para paraguayos',
        'navLabel' => 'Visa China',
        'cluster' => 'viajes',
        'parent' => null,
        'seoTitle' => 'Visa China para paraguayos: gestión',
        'metaDescription' => 'Asistencia con la visa china para pasaportes paraguayos: formulario, documentos, turno y envío al consulado que corresponde.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Visa para China para paraguayos',
            'h2' => 'Ordenamos su solicitud para que llegue completa a la misión china que corresponde.',
            'lead' => 'Como no hay embajada china en Paraguay, la visa se presenta en una misión en el exterior y un error en el formulario o un documento faltante puede costarle un viaje perdido. Lo conectamos con un gestor de viajes que revisa sus documentos, completa el formulario en línea y coordina el turno y la presentación.',
        ],
        'includes' => [
            'Orientación sobre el tipo de visa según el motivo del viaje (turismo, negocios, feria)',
            'Consulta previa con la misión o centro de visas sobre si acepta su solicitud',
            'Revisión de la lista de documentos que pide esa misión',
            'Carga del formulario en línea con sus datos y revisión antes de enviarlo',
            'Coordinación del turno y de la presentación, en persona o por tercero si la misión lo permite',
            'Seguimiento hasta el retiro del pasaporte con la visa',
        ],
        'excludes' => [
            'La decisión sobre la visa, que es exclusiva de la misión china',
            'Tasas consulares, traslados y envío del pasaporte',
            'Cartas de invitación de empresas chinas (se las pide usted al proveedor o a la feria)',
        ],
        'weNeed' => [
            'Foto o escaneo de la página de datos del pasaporte',
            'Motivo y fechas tentativas del viaje',
            'País donde reside y ciudades de China que va a visitar',
            'Carta de invitación, si viaja por negocios o a una feria',
        ],
        'sections' => [
            [
                'h2' => 'Por qué la visa china es distinta para un paraguayo',
                'body' => [
                    'Paraguay reconoce a Taiwán y no tiene relaciones diplomáticas con la República Popular China. Por eso no hay embajada ni consulado chino en Asunción, y el pasaporte paraguayo se presenta en una misión china de otro país. Cada misión decide si atiende a no residentes y qué documentos extra les pide.',
                    'El riesgo está en los detalles: una misión que no acepta su caso, un formulario con un dato que no coincide o una invitación incompleta significan volver a empezar, con otro viaje y otro turno.',
                ],
            ],
            [
                'h2' => 'Cómo trabajamos',
                'body' => [
                    'Usted nos escribe con el motivo y las fechas del viaje. Revisamos su caso y lo conectamos con un gestor de viajes asociado, que le confirma qué misión corresponde, qué documentos necesita y el costo de su gestión antes de empezar.',
                ],
                'items' => [
                    ['title' => '1. Diagnóstico', 'text' => 'Tipo de visa, misión posible y plazos según sus fechas.'],
                    ['title' => '2. Documentos', 'text' => 'Lista a medida y revisión de cada documento antes de presentar.'],
                    ['title' => '3. Formulario y turno', 'text' => 'Carga del formulario en línea y reserva del turno.'],
                    ['title' => '4. Presentación y retiro', 'text' => 'Coordinación de la presentación y del retiro del pasaporte.'],
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'Nosotros recibimos su consulta y lo conectamos con el gestor. El gestor asociado ejecuta el trámite y le cobra directamente su servicio. La misión china evalúa la solicitud y decide; ni nosotros ni el gestor podemos influir en esa decisión. Este sitio no es oficial ni está vinculado a ninguna embajada.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Menos viajes perdidos', 'text' => 'Se confirma antes que la misión atiende su caso y que los documentos están completos.'],
            ['title' => 'Formulario sin errores', 'text' => 'Datos revisados contra el pasaporte y las reservas antes de enviar.'],
            ['title' => 'Plazos claros', 'text' => 'Sabe desde el inicio cuánto margen necesita para su fecha de viaje.'],
            ['title' => 'Pensado para negocios', 'text' => 'Útil si viaja a la Feria de Cantón o a visitar fábricas con visa de negocios.'],
        ],
        'faq' => [
            ['q' => '¿Garantizan la aprobación de la visa?', 'a' => 'No. La decisión es exclusiva de la misión china. Lo que se hace es presentar una solicitud completa y coherente para reducir observaciones.'],
            ['q' => '¿Dónde se presenta la visa?', 'a' => 'En una misión china o centro de visas en el exterior que acepte solicitudes de paraguayos. El gestor le confirma cuál corresponde a su caso.'],
            ['q' => '¿Cuánto cuesta el servicio?', 'a' => 'El gestor asociado le pasa el presupuesto de su gestión antes de empezar. Las tasas consulares y los traslados se pagan aparte.'],
            ['q' => '¿Con cuánta anticipación debo empezar?', 'a' => 'Idealmente dos o tres meses antes del viaje, sobre todo si va a una feria con fechas fijas.'],
            ['q' => '¿Tengo que viajar yo a la misión?', 'a' => 'Depende de la misión: algunas exigen presentación en persona, por ejemplo para huellas digitales, y otras aceptan un tercero. Se lo confirmamos en el diagnóstico.'],
        ],
        'cta' => [
            'label' => 'Consultar por mi visa',
            'whatsappText' => '',
        ],
        'related' => ['tour-negocios-china', 'agente-de-compras-china'],
        'guides' => ['visa-china-para-paraguayos', 'guia-para-viajar-a-china', 'feria-de-canton'],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => ['seguro-viaje'],
        'disclaimer' => true,
    ],

    'tour-negocios-china' => [
        'path' => '/servicios/tour-negocios-china/',
        'title' => 'Viaje de negocios a la Feria de Cantón',
        'navLabel' => 'Tour Feria de Cantón',
        'cluster' => 'viajes',
        'parent' => null,
        'seoTitle' => 'Viaje grupal a la Feria de Cantón',
        'metaDescription' => 'Viaje grupal desde Paraguay a la Feria de Cantón con visitas a fábricas, intérprete y logística. Anótese en la lista de interesados.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Viaje de negocios a la Feria de Cantón',
            'h2' => 'Un viaje grupal desde Paraguay a la feria y a fábricas, con intérprete y logística resueltas.',
            'lead' => 'Ir solo a la Feria de Cantón por primera vez significa resolver visa, hotel, intérprete y agenda de fábricas sin conocer el terreno. Estamos armando un viaje grupal coordinado con agentes y agencias de viaje asociados: anótese en la lista de interesados y le avisamos cuando haya fechas y condiciones.',
        ],
        'includes' => [
            'Lista de interesados sin compromiso ni pago',
            'Aviso con fechas, programa y condiciones cuando el grupo esté armado',
            'Orientación sobre la fase de la feria que corresponde a su rubro',
            'Coordinación con agencia de viajes asociada para vuelos y hotel',
            'Intérprete de español o inglés durante la feria y las visitas',
            'Visitas a fábricas preseleccionadas según los rubros del grupo',
            'Orientación sobre la visa de negocios y conexión con un gestor',
        ],
        'excludes' => [
            'Fechas y precio definidos: todavía no hay grupo confirmado',
            'La emisión de la visa, que decide la misión china',
            'Compras, pagos a proveedores y flete de la mercadería',
        ],
        'weNeed' => [
            'Su nombre y WhatsApp',
            'Rubro o productos que busca en China',
            'Temporada que le interesa (primavera u otoño)',
            'Si viajaría solo o con otra persona de su empresa',
        ],
        'sections' => [
            [
                'h2' => 'Cómo funciona la lista de interesados',
                'body' => [
                    'Todavía no hay fechas ni precio. Reunimos interesados de Paraguay para saber qué rubros y qué temporada tienen más demanda. Cuando haya un grupo suficiente, la agencia asociada arma el programa y el presupuesto, y le escribimos para que decida si viaja. Anotarse no lo compromete a nada.',
                ],
            ],
            [
                'h2' => 'Cuándo conviene ir en grupo',
                'body' => [
                    'El viaje grupal sirve sobre todo a quien va por primera vez, no habla chino ni inglés con soltura, o compra volúmenes que todavía no justifican contratar un agente propio. Compartir intérprete, traslados y agenda de fábricas reduce el costo por persona y el margen de error.',
                    'Si ya conoce China o necesita una agenda muy específica, puede convenirle un viaje individual con un agente local; también podemos conectarlo con uno.',
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'Nosotros reunimos a los interesados y coordinamos la comunicación. La agencia de viajes asociada se encarga de vuelos, hotel y seguro, y le cobra directamente. Los agentes e intérpretes en China organizan la agenda en la feria y las visitas a fábricas. Cada compra que usted haga es una relación directa entre usted y el proveedor.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Llega con agenda', 'text' => 'Visitas a fábricas pensadas para los rubros del grupo, no recorridas al azar.'],
            ['title' => 'Sin barrera de idioma', 'text' => 'Intérprete durante la feria y las visitas.'],
            ['title' => 'Logística resuelta', 'text' => 'Vuelos, hotel y traslados coordinados por una agencia.'],
            ['title' => 'Aprende con otros', 'text' => 'Viaja con otros compradores paraguayos que están en la misma etapa.'],
        ],
        'faq' => [
            ['q' => '¿Cuándo es el próximo viaje?', 'a' => 'Todavía no hay fechas. Se definen cuando haya suficientes interesados, en función de las sesiones de primavera y otoño de la feria.'],
            ['q' => '¿Cuánto cuesta?', 'a' => 'No hay precio definido. Cuando el programa esté armado, la agencia asociada le envía el presupuesto completo antes de que decida.'],
            ['q' => '¿Anotarme me obliga a viajar?', 'a' => 'No. La lista de interesados es solo para avisarle cuando haya fechas y condiciones.'],
            ['q' => '¿Incluye la visa?', 'a' => 'Se orienta sobre la visa de negocios y se lo conecta con un gestor. La decisión es de la misión china y el trámite debe empezar con tiempo.'],
            ['q' => '¿Puedo ir si mi rubro es distinto al del grupo?', 'a' => 'Indíquenos su rubro al anotarse. La fase de la feria y las visitas se arman según los rubros de los interesados.'],
        ],
        'cta' => [
            'label' => 'Anotarme en la lista de interesados',
            'whatsappText' => '',
        ],
        'related' => ['visa-china', 'agente-de-compras-china', 'inspeccion-de-calidad'],
        'guides' => ['feria-de-canton', 'viaje-de-negocios-a-china', 'visa-china-para-paraguayos'],
        'articles' => [],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Estime cuánto le cuesta en Paraguay lo que compre en la feria.'],
        ],
        'affiliates' => ['trip', 'seguro-viaje'],
        'disclaimer' => false,
        'image' => ['src' => '/assets/img/guias/feria-de-canton-pabellon.webp', 'alt' => 'Pasillos de un pabellón de feria comercial en Cantón con compradores y stands de productos', 'width' => 1600, 'height' => 905],
    ],

];
