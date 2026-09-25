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
        'title' => 'Comprar e importar de China a Paraguay',
        'description' => 'Guías y calculadoras para comprar en Temu, Shein y Alibaba, importar de China a Paraguay, pasar la aduana y viajar a la Feria de Cantón.',
        'h1' => '',
        'lead' => '',
        'changefreq' => 'weekly',
        'priority' => '1.0',
        'popular' => ['temu-paraguay', 'como-importar-de-china-a-paraguay', 'shein-paraguay', 'aduana-clorinda', 'aliexpress-paraguay', 'feria-de-canton'],
        'image' => ['base' => '/assets/img/puerto-fluvial-contenedores-paraguay', 'widths' => [640, 1280, 1920], 'alt' => 'Contenedores apilados en un puerto fluvial al atardecer, con una barcaza sobre el río', 'width' => 1920, 'height' => 1434],
        'doorImages' => [
            'compras' => ['base' => '/assets/img/compras-online-entrega-asuncion', 'widths' => [640, 1280, 1920], 'alt' => 'Una mujer recibe en la puerta de su casa en Asunción varios paquetes de una compra online', 'width' => 1920, 'height' => 1086],
            'importar' => ['base' => '/assets/img/importar-de-china-deposito-fabrica', 'widths' => [640, 1280, 1920], 'alt' => 'Comprador y encargado revisan una lista junto a cajas de exportación en un depósito de fábrica en China', 'width' => 1920, 'height' => 1086],
            'aduana' => ['base' => '/assets/img/despacho-aduanero-documentos-puerto', 'widths' => [640, 1280, 1920], 'alt' => 'Escritorio con facturas, lista de empaque y calculadora, con contenedores de fondo', 'width' => 1920, 'height' => 1086],
            'viajes' => ['base' => '/assets/img/viaje-negocios-china-estacion-tren', 'widths' => [640, 1280, 1920], 'alt' => 'Viajero de negocios con equipaje de mano en una estación de tren de alta velocidad en China', 'width' => 1920, 'height' => 1086],
        ],
        'stub' => false,
    ],
    '/comprar/' => [
        'title' => 'Comprar online desde Paraguay',
        'description' => 'Cómo comprar en Temu, Shein, AliExpress, Alibaba y 1688 desde Paraguay: envío, casillas de courier, plazos y lo que se paga al recibir.',
        'h1' => 'Comprar en Temu, Shein, AliExpress y Alibaba desde Paraguay',
        'lead' => 'Cómo llega su pedido, cuánto tarda y cuánto termina pagando, tienda por tienda.',
        'changefreq' => 'weekly',
        'priority' => '0.9',
        'image' => ['base' => '/assets/img/compras-online-entrega-asuncion', 'widths' => [640, 1280, 1920], 'alt' => 'Una mujer recibe en la puerta de su casa en Asunción varios paquetes de una compra online', 'width' => 1920, 'height' => 1086],
        'stub' => false,
    ],
    '/importar/' => [
        'title' => 'Importar de China a Paraguay',
        'description' => 'Todo para importar de China a Paraguay: proveedores, agente de compras, contenedor o carga consolidada, costos, despacho y guías por producto.',
        'h1' => 'Importar de China a Paraguay',
        'lead' => 'Para quien compra en China para vender: del proveedor al depósito, con los costos a la vista.',
        'changefreq' => 'weekly',
        'priority' => '0.9',
        'image' => ['base' => '/assets/img/importar-de-china-deposito-fabrica', 'widths' => [640, 1280, 1920], 'alt' => 'Comprador y encargado revisan una lista junto a cajas de exportación en un depósito de fábrica en China', 'width' => 1920, 'height' => 1086],
        'stub' => false,
    ],
    '/aduana/' => [
        'title' => 'Aduana en Paraguay: guías prácticas',
        'description' => 'Guías prácticas sobre la aduana en Paraguay: despachantes, costo del despacho, tributos, NCM y cruces de frontera. Sitio privado, no oficial.',
        'h1' => 'Aduana en Paraguay, explicada en lenguaje claro',
        'lead' => 'Despacho, tributos y fronteras. Somos un sitio privado de información: siempre enlazamos la fuente oficial.',
        'changefreq' => 'monthly',
        'priority' => '0.9',
        'image' => ['base' => '/assets/img/despacho-aduanero-documentos-puerto', 'widths' => [640, 1280, 1920], 'alt' => 'Escritorio con facturas, lista de empaque y calculadora, con contenedores de fondo', 'width' => 1920, 'height' => 1086],
        'stub' => false,
    ],
    '/viajar-a-china/' => [
        'title' => 'Viajar a China desde Paraguay',
        'description' => 'Cómo viajar a China desde Paraguay: visa, Feria de Cantón, viajes de negocios, mejor época, internet, pagos y qué ver en un primer viaje.',
        'h1' => 'Viajar a China desde Paraguay',
        'lead' => 'Visa, Feria de Cantón y lo práctico para un primer viaje de negocios o de turismo.',
        'changefreq' => 'monthly',
        'priority' => '0.8',
        'image' => ['base' => '/assets/img/viaje-negocios-china-estacion-tren', 'widths' => [640, 1280, 1920], 'alt' => 'Viajero de negocios con equipaje de mano en una estación de tren de alta velocidad en China', 'width' => 1920, 'height' => 1086],
        'stub' => false,
    ],
    '/servicios/' => [
        'title' => 'Servicios de compra e importación',
        'description' => 'Agente de compras en China, inspección, flete marítimo y aéreo, despacho aduanero, visa y viajes a la Feria de Cantón, coordinados desde Paraguay.',
        'h1' => '',
        'lead' => '',
        'changefreq' => 'monthly',
        'priority' => '0.8',
        'stub' => false,
    ],
    '/herramientas/' => [
        'title' => 'Calculadoras de importación',
        'description' => 'Calculadoras gratuitas: costo de importar de China a Paraguay, metros cúbicos y contenedor, y total de una compra en Temu o Shein.',
        'h1' => 'Calculadoras',
        'lead' => 'Haga la cuenta antes de comprar: costo puesto en Paraguay, volumen de carga y compras online.',
        'changefreq' => 'monthly',
        'priority' => '0.8',
        'stub' => false,
    ],
    '/guias/' => [
        'title' => 'Guías China–Paraguay',
        'description' => 'Todas las guías de China-Paraguay en un lugar: compras online, importación, aduana y viajes, escritas para resolverlo usted mismo.',
        'h1' => 'Guías',
        'lead' => 'Paso a paso, con las fuentes a la vista y lo que conviene confirmar antes de actuar.',
        'changefreq' => 'weekly',
        'priority' => '0.7',
        'stub' => false,
    ],
    '/blog/' => [
        'title' => 'Blog',
        'description' => 'Novedades y análisis sobre compras online, importación y comercio entre China y Paraguay, con las fuentes citadas en cada artículo.',
        'h1' => 'Blog',
        'lead' => 'Novedades y análisis sobre compras e importación desde China.',
        'changefreq' => 'weekly',
        'priority' => '0.6',
        'stub' => false,
    ],
    '/contacto/' => [
        'title' => 'Contacto',
        'description' => 'Escríbanos por WhatsApp o déjenos sus datos: le respondemos dentro del siguiente día hábil con los pasos y costos de su caso.',
        'h1' => '',
        'lead' => '',
        'changefreq' => 'yearly',
        'priority' => '0.8',
        'stub' => false,
    ],
    /* The quote wizard (partials/quote-wizard.php). Its copy lives here under
       'quote' so the partial holds no text of its own. 'details' is per need
       key (content/ui.php 'needs'): at most four fields each, exactly one
       'required'. A field's 'label' is also the line label in the message the
       wizard composes for the CRM, so keep it short and readable. 'service' on
       an option is a content/lead-values.php slug the answer maps to (a more
       precise tier than the chip's own). */
    '/cotizar/' => [
        'title' => 'Pedir cotización para importar de China',
        'description' => 'Pida una cotización en tres pasos: importar para vender, despacho aduanero, compras online o viaje a la Feria de Cantón. Sin costo ni compromiso.',
        'h1' => 'Pida su cotización en tres pasos',
        'lead' => 'Unas pocas preguntas para entender su caso. Le respondemos dentro del siguiente día hábil, con los pasos y los costos por escrito.',
        'changefreq' => 'monthly',
        'priority' => '0.9',
        'stub' => false,
        'quote' => [
            'eyebrow' => 'Cotización',
            'steps' => [
                ['title' => '¿Qué necesita?', 'short' => 'Necesidad', 'hint' => 'Elija la opción más cercana. Puede cambiarla después.'],
                ['title' => 'Detalles', 'short' => 'Detalles', 'hint' => 'Lo que sepa por ahora. Aproximado está bien.'],
                ['title' => 'Sus datos de contacto', 'short' => 'Contacto', 'hint' => 'Solo para responderle. No compartimos sus datos.'],
            ],
            'progress' => 'Paso %1$d de %2$d',
            'next' => 'Continuar',
            'back' => 'Atrás',
            'submit' => 'Enviar solicitud',
            'sending' => 'Enviando…',
            'edit' => 'Cambiar',
            'required' => 'Complete este dato para continuar.',
            'required_choice' => 'Elija una opción para continuar.',
            'invalid_phone' => 'Revise el número: necesitamos un WhatsApp o teléfono válido.',
            'invalid_email' => 'Revise el correo: parece incompleto.',
            'email_needed' => 'Para responderle por correo necesitamos su dirección.',
            'optional' => 'opcional',
            'done_title' => 'Solicitud enviada',
            'message_title' => 'Solicitud de cotización',
            'channel_label' => 'Prefiere que le respondamos por',
            'channels' => ['WhatsApp', 'Llamada', 'Correo'],
            /* The one detail field shown when JavaScript is off: enviar.php
               forwards `message` and nothing else, so the no-JS form asks for
               everything in one box. */
            'static_label' => 'Cuéntenos qué necesita',
            'static_hint' => 'Producto o servicio, cantidad aproximada, presupuesto y para cuándo.',
            'needs' => [
                'compras' => 'Un pedido de Temu, Shein, AliExpress o Alibaba: envío, courier y costos al recibir.',
                'importar' => 'Traer mercadería para su negocio: proveedor, flete, despacho y entrega.',
                'aduana' => 'Despachar una carga que viene o ya llegó, con un despachante matriculado.',
                'viajes' => 'Visa, viaje de negocios o la Feria de Cantón en Guangzhou.',
            ],
            'details' => [
                'importar' => [
                    ['name' => 'producto', 'label' => 'Producto', 'question' => '¿Qué producto quiere importar?', 'type' => 'text', 'required' => true, 'placeholder' => 'Ej.: luminarias LED, repuestos de moto, ropa de trabajo'],
                    ['name' => 'cantidad', 'label' => 'Cantidad', 'question' => 'Cantidad aproximada', 'type' => 'text', 'placeholder' => 'Ej.: 500 unidades, un contenedor de 20 pies'],
                    ['name' => 'presupuesto', 'label' => 'Presupuesto', 'question' => 'Presupuesto aproximado', 'type' => 'choice', 'options' => ['Menos de USD 5.000', 'USD 5.000 a 20.000', 'USD 20.000 a 50.000', 'Más de USD 50.000', 'Todavía no sé']],
                    ['name' => 'plazo', 'label' => 'Plazo', 'question' => '¿Para cuándo lo necesita?', 'type' => 'choice', 'options' => ['Es urgente', 'En 1 a 3 meses', 'Estoy explorando']],
                ],
                'aduana' => [
                    ['name' => 'mercaderia', 'label' => 'Mercadería', 'question' => '¿Qué tipo de mercadería es?', 'type' => 'text', 'required' => true, 'placeholder' => 'Ej.: maquinaria, electrónica, textiles'],
                    ['name' => 'estado', 'label' => 'Estado del envío', 'question' => '¿La carga ya está en camino?', 'type' => 'choice', 'options' => ['Todavía no salió', 'Sí, ya está en camino', 'Ya llegó a Paraguay']],
                    ['name' => 'via', 'label' => 'Vía', 'question' => '¿Cómo viaja?', 'type' => 'choice', 'options' => ['Marítima', 'Aérea', 'Terrestre', 'No sé']],
                ],
                'compras' => [
                    ['name' => 'tienda', 'label' => 'Tienda', 'question' => '¿En qué tienda?', 'type' => 'choice', 'options' => ['Temu', 'Shein', 'AliExpress', 'Alibaba', '1688', 'Otra']],
                    ['name' => 'articulo', 'label' => 'Qué quiere comprar', 'question' => '¿Qué quiere comprar?', 'type' => 'text', 'required' => true, 'placeholder' => 'Ej.: ropa, accesorios para celular, repuestos'],
                    ['name' => 'uso', 'label' => 'Uso', 'question' => '¿Para qué es?', 'type' => 'choice', 'options' => ['Uso personal', 'Para revender']],
                ],
                'viajes' => [
                    ['name' => 'motivo', 'label' => 'Motivo', 'question' => '¿Qué necesita para el viaje?', 'type' => 'choice', 'required' => true, 'options' => [
                        ['label' => 'Ir a la Feria de Cantón', 'service' => 'tour-negocios-china'],
                        ['label' => 'Tramitar la visa', 'service' => 'visa-china'],
                        ['label' => 'Visitar fábricas o proveedores', 'service' => 'tour-negocios-china'],
                        ['label' => 'Otro'],
                    ]],
                    ['name' => 'fechas', 'label' => 'Fechas', 'question' => 'Fechas aproximadas', 'type' => 'text', 'placeholder' => 'Ej.: segunda quincena de octubre'],
                    ['name' => 'personas', 'label' => 'Personas', 'question' => '¿Cuántas personas viajan?', 'type' => 'choice', 'options' => ['1', '2', '3 a 5', 'Más de 5']],
                ],
            ],
            'aside' => [
                'title' => 'Qué pasa después de enviar',
                'free' => 'La consulta no tiene costo ni compromiso.',
                'official' => 'No somos un organismo oficial: coordinamos con profesionales independientes, como despachantes matriculados y agentes de carga.',
                'whatsapp_title' => '¿Prefiere escribirnos?',
                'whatsapp_text' => 'Abrimos WhatsApp con el mensaje ya escrito. Puede cambiarlo antes de enviarlo.',
            ],
        ],
    ],
    '/sobre/' => [
        'title' => 'Sobre China-Paraguay',
        'description' => 'Qué es China-Paraguay, quién está detrás, cómo elegimos la información que publicamos y cómo trabajamos con socios en China y en Paraguay.',
        'h1' => 'Sobre China-Paraguay',
        'lead' => 'Un sitio privado de información práctica sobre China y Paraguay.',
        'sections' => [
            [
                'h2' => 'Qué es China-Paraguay',
                'body' => [
                    'China-Paraguay es un sitio privado de información práctica para quien compra, importa o viaja entre China y Paraguay. Reunimos en un solo lugar lo que normalmente se aprende a fuerza de errores: cómo llega un pedido de Temu, qué se paga en la aduana, cómo se elige un proveedor chino o cómo se prepara una visita a la Feria de Cantón.',
                ],
            ],
            [
                'h2' => 'Cómo elegimos lo que publicamos',
                'body' => [
                    'Cada guía responde primero la pregunta concreta y después explica los pasos. Cuando damos un monto, un plazo o un requisito, enlazamos la fuente oficial; cuando no podemos confirmarlo, lo decimos y le indicamos dónde verificarlo.',
                    'Revisamos las guías cuando cambian las reglas. La fecha de revisión aparece al comienzo de cada una.',
                ],
            ],
            [
                'h2' => 'Cómo trabajamos cuando pide ayuda',
                'body' => [
                    'No somos un despachante, ni una aerolínea, ni un organismo público. Cuando nos pide un servicio, lo coordinamos con socios especializados —agentes de compra en China, transportistas, despachantes de aduana matriculados y agencias de viajes— y usted sabe desde el primer mensaje quién hace cada parte y cuánto cuesta.',
                ],
            ],
            [
                'h2' => 'Cómo se financia el sitio',
                'body' => [
                    'Con los servicios que coordinamos y con algunos enlaces de afiliado, siempre señalados. Ninguno de los dos cambia lo que recomendamos: si una opción no le conviene, se lo decimos.',
                ],
            ],
        ],
        'stub' => false,
        'changefreq' => 'yearly',
        'priority' => '0.4',
    ],
    '/para-empresas/' => [
        'title' => 'Para couriers, despachantes y agentes',
        'description' => 'Couriers, despachantes, agentes de compra y agencias de viaje: reciba consultas calificadas de personas que quieren comprar o importar de China.',
        'h1' => 'Para empresas',
        'lead' => 'Reciba consultas de personas que ya decidieron comprar o importar.',
        'sections' => [
            [
                'h2' => 'Para quién es',
                'body' => [
                    'Para couriers y casillas, despachantes de aduana, agentes de compra y control de calidad en China, transitarios y agencias de viajes que atienden a clientes de Paraguay.',
                ],
            ],
            [
                'h2' => 'Qué recibe',
                'body' => [
                    'Consultas de personas que ya están decididas a comprar, importar o viajar, con el producto, la cantidad y el destino que nos contaron. Cada consulta llega clasificada por tema: compras online, importación, aduana o viajes.',
                    'También puede aparecer como opción recomendada en la guía que corresponde a su servicio, identificada como socio.',
                ],
            ],
            [
                'h2' => 'Qué pedimos',
                'body' => [
                    'Que esté habilitado para lo que ofrece (matrícula, registro o licencia, según el rubro), que responda las consultas en un plazo acordado y que cotice por escrito. Verificamos los datos antes de publicar a un socio.',
                ],
            ],
            [
                'h2' => 'Cómo sumarse',
                'body' => [
                    'Escríbanos desde el formulario de contacto contando qué servicio presta, en qué ciudades y con qué volumen puede trabajar. Le respondemos con las condiciones.',
                ],
            ],
        ],
        'stub' => false,
        'changefreq' => 'monthly',
        'priority' => '0.5',
    ],
    '/afiliados/' => [
        'title' => 'Enlaces de afiliado',
        'description' => 'Cómo funcionan los enlaces de afiliado en China-Paraguay: qué son, qué comisión podemos recibir y por qué no cambian el precio que usted paga.',
        'h1' => 'Enlaces de afiliado',
        'lead' => 'Transparencia sobre cómo se financia este sitio.',
        'sections' => [
            [
                'h2' => 'Qué es un enlace de afiliado',
                'body' => [
                    'Algunos enlaces del sitio llevan a tiendas o servicios —por ejemplo una eSIM para viajar, una forma de pagar al exterior o una tienda online— que nos pagan una comisión si usted compra a través de ellos.',
                ],
            ],
            [
                'h2' => 'Qué cambia para usted',
                'body' => [
                    'Nada en el precio: la comisión la paga la empresa, no usted. Los enlaces de afiliado están agrupados en un recuadro identificado como tal y siempre van acompañados de esta aclaración.',
                ],
            ],
            [
                'h2' => 'Cómo elegimos qué recomendar',
                'body' => [
                    'Recomendamos lo que usaríamos nosotros para ese caso. Si una opción sin comisión es mejor para usted, la nombramos igual.',
                ],
            ],
        ],
        'stub' => false,
        'changefreq' => 'yearly',
        'priority' => '0.2',
    ],
    '/aviso-legal/' => [
        'title' => 'Aviso legal',
        'description' => 'China-Paraguay es un sitio privado de información. No es un organismo oficial ni representa a la aduana, a la DNIT, a embajadas ni a las tiendas que menciona.',
        'h1' => 'Aviso legal',
        'lead' => 'Lo que este sitio es, y lo que no es.',
        'sections' => [
            [
                'h2' => 'Sitio privado, no oficial',
                'body' => [
                    'China-Paraguay es un sitio privado de información. No es la aduana —hoy la Gerencia General de Aduanas de la Dirección Nacional de Ingresos Tributarios (DNIT), antes Dirección Nacional de Aduanas—, ni la DNIT en ninguna de sus áreas, ni una embajada o consulado, ni representa a ningún organismo público de Paraguay, de China ni de otro país.',
                ],
            ],
            [
                'h2' => 'Marcas mencionadas',
                'body' => [
                    'Temu, Shein, AliExpress, Alibaba, 1688, la Feria de Cantón y otras marcas mencionadas pertenecen a sus titulares. Las nombramos solo para explicar cómo comprar o participar en ellas. No tenemos relación con esas empresas salvo que se indique expresamente.',
                ],
            ],
            [
                'h2' => 'Carácter orientativo',
                'body' => [
                    'Las guías y calculadoras son orientativas. Los montos, tasas, requisitos y plazos cambian. Antes de comprar, pagar, embarcar o viajar, confírmelos en la fuente oficial o con un profesional matriculado.',
                ],
            ],
            [
                'h2' => 'Fuentes oficiales',
                'body' => [
                    'Aduana: Gerencia General de Aduanas de la DNIT (aduana.gov.py). Impuestos: DNIT (dnit.gov.py). Visas para China: la misión diplomática china que corresponda a su residencia.',
                ],
            ],
        ],
        'stub' => false,
        'changefreq' => 'yearly',
        'priority' => '0.2',
    ],
    '/privacidad/' => [
        'title' => 'Política de privacidad',
        'description' => 'Cómo tratamos los datos que deja en el formulario de China-Paraguay, con quién los compartimos y cómo pedir su acceso, corrección o eliminación.',
        'h1' => 'Política de privacidad',
        'lead' => 'Cómo tratamos los datos personales que nos confía.',
        'changefreq' => 'yearly',
        'priority' => '0.3',
        'sections' => [
            [
                'h2' => 'Qué datos recogemos',
                'body' => [
                    'Solo los que usted escribe en el formulario —nombre, teléfono, correo, empresa y mensaje— más la página desde la que escribió y los parámetros de campaña del enlace por el que llegó.',
                ],
            ],
            [
                'h2' => 'Para qué los usamos',
                'body' => [
                    'Para responder su consulta y darle seguimiento. Si pide un servicio que presta un socio (un despachante, un transportista, un agente en China o una agencia de viajes), le compartimos a ese socio solo los datos necesarios para cotizarle, y se lo decimos antes.',
                    'No vendemos sus datos ni los usamos para publicidad de terceros.',
                ],
            ],
            [
                'h2' => 'Dónde se guardan',
                'body' => [
                    'Las consultas se registran en nuestro sistema de gestión de clientes. Las conservamos mientras dure la relación comercial o hasta que usted pida borrarlas.',
                ],
            ],
            [
                'h2' => 'Sus derechos',
                'body' => [
                    'Puede pedir acceso, corrección o eliminación de sus datos escribiéndonos por el formulario de contacto o por WhatsApp. Respondemos dentro de los diez días hábiles.',
                ],
            ],
        ],
        'stub' => false,
    ],
    '/terminos/' => [
        'title' => 'Términos de uso',
        'description' => 'Condiciones de uso de China-Paraguay: carácter informativo de las guías y calculadoras, servicios de socios, enlaces de afiliado y responsabilidades.',
        'h1' => 'Términos de uso',
        'lead' => 'Las condiciones bajo las que puede usar este sitio.',
        'changefreq' => 'yearly',
        'priority' => '0.3',
        'sections' => [
            [
                'h2' => 'Información orientativa',
                'body' => [
                    'Las guías y calculadoras son orientativas. Montos, tasas, requisitos y plazos cambian; confírmelos en la fuente oficial o con un profesional matriculado antes de comprar, pagar o embarcar.',
                ],
            ],
            [
                'h2' => 'Servicios de socios',
                'body' => [
                    'Cuando pide un servicio, lo presta un socio independiente (despachante de aduana, transportista, agente de compras, agencia de viajes). El alcance, el precio y las responsabilidades se acuerdan por escrito con usted antes de empezar.',
                ],
            ],
            [
                'h2' => 'Enlaces a terceros',
                'body' => [
                    'El sitio enlaza tiendas y servicios de terceros, algunos con enlaces de afiliado. No controlamos sus precios, stock ni políticas de envío y devolución.',
                ],
            ],
            [
                'h2' => 'Marcas',
                'body' => [
                    'Temu, Shein, AliExpress, Alibaba, 1688 y otras marcas mencionadas pertenecen a sus titulares. Las nombramos solo para describir cómo comprar en ellas; no tenemos relación con esas empresas salvo que se indique.',
                ],
            ],
        ],
        'stub' => false,
    ],
    '/404' => [
        'title' => 'Página no encontrada',
        'description' => 'No encontramos la página que buscaba. Vea las guías de compras, importación y aduana, o escríbanos y le indicamos dónde está.',
        'h1' => 'No encontramos esta página',
        'lead' => '',
        'noindex' => true,
        'changefreq' => 'yearly',
        'priority' => '0.1',
        'stub' => false,
    ],
];
