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
        'path' => '/feria-de-canton/',
        'title' => 'Feria de Cantón: guía para compradores de Paraguay',
        'navLabel' => 'Feria de Cantón',
        'cluster' => 'viajes',
        'seoTitle' => 'Feria de Cantón: guía para ir desde PY',
        'metaDescription' => 'Cómo ir a la Feria de Cantón desde Paraguay: fases y sectores, registro de comprador, visa, vuelos, hotel y cómo negociar con fábricas.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Feria de Cantón: guía para compradores de Paraguay',
            'lead' => 'La Feria de Cantón (China Import and Export Fair) se realiza dos veces al año en Guangzhou, en primavera y en otoño, dividida en tres fases por sector. Para ir desde Paraguay necesita elegir la fase de su rubro, registrarse en línea como comprador, tramitar la visa china en una misión en el exterior y reservar vuelo y hotel con anticipación.',
        ],
        'intro' => [
            'La Feria de Cantón es la feria comercial más conocida de China para compradores extranjeros: miles de fábricas y exportadoras exponen en el complejo de Pazhou, en Guangzhou (Cantón). Cada edición tiene una sesión de primavera, que suele caer entre abril y mayo, y una de otoño, entre octubre y noviembre. Cada sesión se divide en tres fases de pocos días, y cada fase reúne sectores distintos. Por eso lo primero es saber qué fase corresponde a los productos que usted busca.',
            'Esta guía es para importadores, comerciantes y emprendedores de Paraguay que evalúan viajar a la Feria de Cantón por primera vez. Explica cómo elegir la fase, cómo funciona el registro de comprador y el gafete de ingreso, qué tener en cuenta con la visa (Paraguay no tiene embajada china), cómo organizar vuelos y hotel, y cómo aprovechar las reuniones con proveedores.',
            'Las fechas exactas de cada fase se publican en el sitio oficial de la feria, cantonfair.org.cn. Confírmelas allí antes de comprar pasajes: esta guía no reemplaza la información oficial.',
        ],
        'steps' => [
            [
                'title' => 'Elija la sesión y la fase según su rubro',
                'body' => [
                    'En términos generales, la primera fase reúne electrónica, electrodomésticos, maquinaria, herramientas, vehículos y repuestos; la segunda, artículos para el hogar, decoración, regalos, vajilla y materiales de construcción; y la tercera, textiles, ropa, calzado, juguetes, artículos de oficina, alimentos y salud. La distribución exacta de sectores cambia de una edición a otra.',
                    'Revise el listado de sectores y expositores de la edición que le interesa en cantonfair.org.cn. Si su negocio abarca varios rubros, puede quedarse más de una fase, pero calcule el costo extra de hotel y días fuera de Paraguay.',
                ],
            ],
            [
                'title' => 'Regístrese en línea como comprador',
                'body' => [
                    'Los compradores extranjeros se preinscriben en la plataforma oficial de la feria: crean una cuenta, cargan sus datos personales y de empresa, una foto y los datos del pasaporte. Con el registro aprobado se obtiene el gafete de comprador, que se retira en los mostradores de registro con el pasaporte o, según la edición, se puede imprimir con anticipación.',
                    'Haga el registro con semanas de anticipación. La feria suele ofrecer además una carta de invitación electrónica para compradores registrados, que puede servir como respaldo para la visa de negocios. Confirme en el sitio oficial qué emite la edición actual y si el gafete tiene costo.',
                ],
            ],
            [
                'title' => 'Tramite la visa con tiempo',
                'body' => [
                    'Como Paraguay mantiene relaciones diplomáticas con Taiwán y no con la República Popular China, no hay embajada ni consulado chino en Asunción. El pasaporte paraguayo se presenta en una misión china o centro de visas en el exterior, lo que suma viaje, turno y tiempo de envío.',
                    'Para un viaje a la feria se suele pedir la visa de negocios (tipo M) con la invitación de la feria o de un proveedor. Los detalles están en nuestra guía de visa para China para paraguayos. Empiece el trámite al menos dos o tres meses antes.',
                ],
            ],
            [
                'title' => 'Reserve vuelo y hotel temprano',
                'body' => [
                    'No hay vuelos directos entre Paraguay y China; las rutas habituales conectan por São Paulo, Europa, Medio Oriente o Estados Unidos. Si una escala exige visa de tránsito para su pasaporte, confírmelo con la aerolínea antes de pagar.',
                    'Durante la feria los hoteles de Guangzhou suben de precio y se llenan. Conviene alojarse cerca de una estación de la línea de metro que llega a Pazhou, así evita el tráfico de la mañana. Muchos hoteles ofrecen traslado a la feria en esos días.',
                ],
            ],
            [
                'title' => 'Prepare la lista de productos y preguntas',
                'body' => [
                    'Lleve por escrito los productos que busca, cantidades aproximadas, especificaciones, precio objetivo y requisitos para Paraguay (etiquetado, voltaje, certificaciones). Cuanto más concreta sea la consulta, más útil será la respuesta del expositor.',
                    'Prepare tarjetas personales con su WhatsApp y correo, y tenga WeChat instalado y activo: es el canal que la mayoría de los proveedores usa para seguir la conversación.',
                ],
            ],
            [
                'title' => 'Recorra la feria con método',
                'body' => [
                    'El predio es muy grande. Use el mapa oficial para ubicar los pabellones de su sector y dedique el primer día a recorrer y anotar. Fotografíe el stand y la tarjeta de cada proveedor que le interese, y anote en la misma foto el producto y el precio que le dieron.',
                    'Pregunte si el expositor es fábrica o empresa comercial, cuál es la cantidad mínima de pedido (MOQ), el plazo de producción y bajo qué Incoterm cotiza (FOB, CIF u otro). No cierre pedidos grandes en el stand sin comparar.',
                ],
            ],
            [
                'title' => 'Visite fábricas y pida muestras',
                'body' => [
                    'Con los proveedores preseleccionados, pida muestras y, si el tiempo alcanza, visite la fábrica en Guangdong o en provincias cercanas. Una visita le muestra la escala real, el control de calidad y las condiciones de trabajo.',
                    'Para visitas con intérprete y traslados, coordinar con un agente local ahorra tiempo. Nosotros podemos conectarlo con agentes y traductores de confianza.',
                ],
            ],
            [
                'title' => 'Haga el seguimiento al volver',
                'body' => [
                    'Dentro de la semana siguiente escriba a cada proveedor con la foto del stand, el producto y lo conversado. Pida la proforma (PI) por escrito con precio, Incoterm, plazo y forma de pago.',
                    'Antes de pagar, calcule el costo puesto en Paraguay: flete, seguro, tributos aduaneros y honorarios del despachante. Nuestra calculadora de costo de importación le da una estimación orientativa.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué tener listo antes de viajar a la Feria de Cantón',
            'head' => ['Tema', 'Qué hacer', 'Dónde confirmarlo'],
            'rows' => [
                ['Fechas y fase', 'Elegir la fase según el sector de sus productos', 'cantonfair.org.cn'],
                ['Registro de comprador', 'Preinscribirse en línea y obtener el gafete', 'Plataforma oficial de la feria'],
                ['Visa', 'Visa de negocios (M) en una misión china en el exterior', 'Misión china que atienda su solicitud'],
                ['Vuelo', 'Ruta con escala y requisitos de tránsito de cada escala', 'Aerolínea'],
                ['Hotel', 'Reserva temprana, cerca del metro a Pazhou', 'Plataforma de reservas u hotel'],
                ['Internet y pagos', 'eSIM o roaming, WeChat y Alipay configurados', 'Proveedor de eSIM y apps oficiales'],
            ],
            'note' => 'Lista orientativa. Los requisitos y las fechas los define cada organismo y pueden cambiar.',
        ],
        'sections' => [
            [
                'h2' => 'Errores comunes de quien va por primera vez',
                'body' => [
                    'La mayoría de los problemas en la Feria de Cantón no vienen de los proveedores sino de la preparación.',
                ],
                'items' => [
                    ['title' => 'Ir en la fase equivocada', 'text' => 'Llegar a la fase de electrónica cuando se buscan textiles significa perder el viaje. Confirme la fase antes de comprar el pasaje.'],
                    ['title' => 'Dejar la visa para último momento', 'text' => 'Sin misión china en Paraguay, el trámite lleva más tiempo que para un argentino o un brasileño.'],
                    ['title' => 'No anotar lo conversado', 'text' => 'Después de cien stands todo se mezcla. Foto del stand, tarjeta y nota del precio en el mismo momento.'],
                    ['title' => 'Pagar sin calcular el costo en destino', 'text' => 'Un buen precio FOB puede dejar de serlo con el flete y los tributos. Calcule antes de pagar el anticipo.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuándo es la Feria de Cantón?', 'a' => 'Se realiza dos veces al año en Guangzhou: una sesión de primavera, en general entre abril y mayo, y una de otoño, entre octubre y noviembre, cada una en tres fases. Las fechas exactas de cada edición se publican en cantonfair.org.cn.'],
            ['q' => '¿Cuánto cuesta entrar a la Feria de Cantón?', 'a' => 'El ingreso es con gafete de comprador, que se obtiene con el registro en línea. Si tiene costo y cuánto depende de la edición y de cómo se registre; consúltelo en el sitio oficial de la feria.'],
            ['q' => '¿Qué visa necesito para ir a la feria desde Paraguay?', 'a' => 'En general se tramita la visa de negocios (tipo M) con una invitación de la feria o de un proveedor. Como no hay misión china en Paraguay, se presenta en una misión en el exterior; consulte en la misión china que corresponda.'],
            ['q' => '¿Puedo comprar en pequeñas cantidades en la feria?', 'a' => 'La feria está orientada a compras mayoristas y la mayoría de los expositores trabaja con cantidades mínimas de pedido. Algunos aceptan pedidos de prueba pequeños; pregunte el MOQ en cada stand.'],
            ['q' => '¿Necesito intérprete?', 'a' => 'Muchos expositores hablan inglés básico, pero pocos hablan español. Si usted no maneja inglés, un intérprete o un agente local facilita la negociación y las visitas a fábricas.'],
            ['q' => '¿Hay viajes grupales desde Paraguay?', 'a' => 'Estamos armando una lista de interesados para un viaje grupal a la feria. Puede anotarse sin compromiso en la página del servicio.'],
        ],
        'relatedService' => 'tour-negocios-china',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Antes de cerrar con un proveedor de la feria, estime cuánto le cuesta el producto puesto en Paraguay.',
        ],
        'related' => ['viaje-de-negocios-a-china', 'visa-china-para-paraguayos', 'proveedores-chinos-confiables'],
        'affiliates' => ['trip', 'seguro-viaje'],
        'disclaimer' => false,
        'image' => ['src' => '/assets/img/guias/feria-de-canton-pabellon.webp', 'alt' => 'Pasillos de un pabellón de feria comercial en Cantón con compradores y stands de productos', 'width' => 1600, 'height' => 905],
    ],

    'visa-china-para-paraguayos' => [
        'path' => '/viajar-a-china/visa-china-para-paraguayos/',
        'title' => 'Visa para China para paraguayos',
        'navLabel' => 'Visa China para paraguayos',
        'cluster' => 'viajes',
        'seoTitle' => 'Visa para China desde Paraguay',
        'metaDescription' => 'Cómo tramitar la visa china con pasaporte paraguayo: dónde se presenta, tipos de visa, documentos, plazos y errores que retrasan el trámite.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Visa para China para paraguayos',
            'lead' => 'Con pasaporte paraguayo se necesita tramitar la visa para China antes de viajar, y como no hay embajada ni consulado chino en Paraguay, la solicitud se presenta en una misión china o centro de visas en el exterior. El trámite empieza con el formulario en línea y sigue con la presentación de documentos en la misión que acepte su solicitud.',
        ],
        'intro' => [
            'Paraguay mantiene relaciones diplomáticas con Taiwán y no con la República Popular China. Por eso no existe una embajada ni un consulado de China continental en Asunción, y el paraguayo que quiere visitar China tiene que presentar su visa en una misión china de otro país. Esa es la diferencia principal con los vecinos de la región, y la razón por la que el trámite lleva más tiempo y más planificación.',
            'Esta guía es para quien viaja a China por turismo, por negocios o para la Feria de Cantón con pasaporte paraguayo. Explica qué tipo de visa corresponde, cómo funciona el formulario en línea, qué documentos se suelen pedir, cómo elegir la misión y qué errores retrasan el trámite.',
            'Los requisitos, las tasas consulares y las exenciones de visa cambian con frecuencia y los define cada misión china. Antes de iniciar el trámite, consulte en la misión china que corresponda: esta guía es orientativa.',
        ],
        'steps' => [
            [
                'title' => 'Defina el tipo de visa según el motivo del viaje',
                'body' => [
                    'Para turismo se usa en general la visa tipo L. Para negocios, visitas a fábricas o ferias comerciales como la de Cantón, la visa tipo M, que requiere una carta de invitación de una empresa o entidad en China. Existen otros tipos para trabajo, estudio o tránsito.',
                    'Pida el tipo que corresponde al motivo real del viaje. Declarar turismo cuando el viaje es de negocios puede traer problemas en la entrevista o al ingresar.',
                ],
            ],
            [
                'title' => 'Verifique si aplica alguna exención de visa',
                'body' => [
                    'China amplió en los últimos años las exenciones de visa y el tránsito sin visa para varias nacionalidades. No hemos podido confirmar en una fuente oficial que el pasaporte paraguayo esté incluido en alguna de ellas a la fecha de esta guía.',
                    'Antes de tramitar, consulte en la misión china que corresponda o en el sitio de la Administración Nacional de Inmigración de China si hay alguna política vigente para pasaportes paraguayos, incluido el tránsito sin visa.',
                ],
            ],
            [
                'title' => 'Elija la misión donde va a presentar',
                'body' => [
                    'Los paraguayos suelen tramitar en misiones chinas de países vecinos, como Argentina o Brasil, o en el país donde residen. Cada misión decide si atiende a solicitantes no residentes y qué documentos adicionales les pide; algunas exigen demostrar residencia o estadía legal en ese país.',
                    'Antes de viajar a presentar, confirme por escrito con la misión o su centro de visas que acepta solicitudes de ciudadanos paraguayos y qué agenda de turnos tiene.',
                ],
            ],
            [
                'title' => 'Complete el formulario en línea',
                'body' => [
                    'Las misiones chinas usan el sistema en línea de solicitud de visa del Ministerio de Relaciones Exteriores de China (COVA): se completa el formulario, se sube la foto digital y se adjuntan los documentos escaneados. Luego se imprime y firma la confirmación.',
                    'Revise que nombres, número de pasaporte y fechas coincidan exactamente con el pasaporte. Un error de tipeo obliga a rehacer el formulario.',
                ],
            ],
            [
                'title' => 'Reúna los documentos',
                'body' => [
                    'Lo habitual es: pasaporte vigente con validez suficiente y hojas libres, foto según especificación, formulario impreso y firmado, itinerario de vuelos y reserva de hotel, y para la visa M la carta de invitación. Algunas misiones piden además constancia de trabajo o de solvencia.',
                    'La lista exacta, la validez mínima del pasaporte y el formato de la foto los fija cada misión. Consúltelos en su sitio antes de reunir papeles.',
                ],
            ],
            [
                'title' => 'Presente y pague la tasa',
                'body' => [
                    'En la fecha del turno se presenta el pasaporte con la documentación, en persona o por medio de un tercero si la misión lo permite. Se paga la tasa consular vigente, cuyo monto publica cada misión y varía según el tipo y la cantidad de entradas.',
                    'Si la misión toma huellas digitales, la presentación debe ser en persona.',
                ],
            ],
            [
                'title' => 'Retire el pasaporte y revise la visa',
                'body' => [
                    'Al retirar el pasaporte, controle en la visa el tipo, la cantidad de entradas, la duración de cada estadía y la fecha límite de ingreso. Si algo no coincide con lo pedido, consúltelo en el momento.',
                    'Con la visa emitida, recién ahí conviene pagar pasajes no reembolsables.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Tipos de visa china más usados por viajeros paraguayos',
            'head' => ['Tipo', 'Para qué sirve', 'Documento clave'],
            'rows' => [
                ['L (turismo)', 'Turismo y visitas familiares', 'Itinerario y reservas'],
                ['M (negocios)', 'Reuniones, ferias, visitas a fábricas', 'Carta de invitación de empresa o feria en China'],
                ['G (tránsito)', 'Pasar por China hacia un tercer país', 'Pasaje con destino final'],
            ],
            'note' => 'Orientativo. Los requisitos de cada tipo los define la misión china donde se presenta.',
        ],
        'sections' => [
            [
                'h2' => 'Errores que retrasan la visa',
                'body' => [
                    'Estos son los problemas más frecuentes cuando se tramita desde Paraguay.',
                ],
                'items' => [
                    ['title' => 'Viajar a presentar sin confirmar', 'text' => 'Llegar a una misión que no atiende a no residentes es un viaje perdido. Confirme por escrito antes.'],
                    ['title' => 'Datos que no coinciden', 'text' => 'Diferencias entre el formulario, la reserva de vuelo y el pasaporte generan observaciones.'],
                    ['title' => 'Invitación incompleta', 'text' => 'La carta para la visa M debe incluir los datos que la misión pide; revísela antes de presentar.'],
                    ['title' => 'Pasaporte por vencer', 'text' => 'Si le queda poca validez o pocas hojas libres, renuévelo antes de empezar.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Los paraguayos necesitan visa para China?', 'a' => 'En general sí. No hemos confirmado en una fuente oficial que el pasaporte paraguayo tenga exención o tránsito sin visa vigente; consulte en la misión china que corresponda antes de viajar.'],
            ['q' => '¿Dónde se tramita la visa china si no hay embajada en Paraguay?', 'a' => 'En una misión china o centro de visas en el exterior, habitualmente en un país vecino o en el país donde usted reside. Confirme antes que esa misión atiende a ciudadanos paraguayos.'],
            ['q' => '¿Cuánto tarda la visa china?', 'a' => 'El plazo lo define cada misión y puede ir de pocos días hábiles a varias semanas, más el tiempo de turno y de traslado. Empiece al menos dos o tres meses antes del viaje.'],
            ['q' => '¿Cuánto cuesta la visa china para paraguayos?', 'a' => 'La tasa consular la publica cada misión y depende del tipo de visa y de la cantidad de entradas. A eso se suman el traslado a la misión y, si usa un gestor, sus honorarios.'],
            ['q' => '¿La embajada de Taiwán en Asunción emite visa para China?', 'a' => 'No. La embajada de la República de China (Taiwán) emite visas para Taiwán, no para China continental.'],
        ],
        'relatedService' => 'visa-china',
        'toolLink' => null,
        'related' => ['guia-para-viajar-a-china', 'feria-de-canton', 'viaje-de-negocios-a-china'],
        'affiliates' => ['seguro-viaje', 'trip'],
        'disclaimer' => true,
        'image' => null,
    ],

    'guia-para-viajar-a-china' => [
        'path' => '/viajar-a-china/guia-para-viajar-a-china/',
        'title' => 'Guía para viajar a China desde Paraguay',
        'navLabel' => 'Guía para viajar a China',
        'cluster' => 'viajes',
        'seoTitle' => 'Guía para viajar a China desde Paraguay',
        'metaDescription' => 'Lo práctico para viajar a China desde Paraguay: vuelos, internet y eSIM, VPN, pagos con Alipay y WeChat, apps útiles y seguro de viaje.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Guía para viajar a China desde Paraguay',
            'lead' => 'Para viajar a China desde Paraguay necesita visa tramitada en una misión china en el exterior, un vuelo con escala, internet que funcione con las apps bloqueadas en China (eSIM o VPN), Alipay o WeChat Pay configurados para pagar, y seguro de viaje. Esta guía ordena esos pasos antes y durante el viaje.',
        ],
        'intro' => [
            'Viajar a China desde Paraguay es más sencillo de lo que parece, pero exige preparar algunas cosas que en otros destinos no hacen falta. La visa se tramita fuera del país porque no hay embajada china en Asunción. Google, WhatsApp, Instagram y otras apps de uso diario están bloqueadas en China continental, así que conviene resolver el acceso a internet antes de salir. Y en China casi todo se paga con el celular, con Alipay o WeChat Pay, más que con tarjeta o efectivo.',
            'Esta guía es para quien viaja por primera vez, sea por turismo, para visitar proveedores o para ir a la Feria de Cantón. Cubre documentos, vuelos, internet y VPN, pagos, apps útiles, trenes, seguro y cómo manejarse en las ciudades. Al final encontrará una tabla con lo que conviene llevar resuelto desde Paraguay.',
            'Los requisitos de entrada, las políticas de visa y las condiciones de las apps cambian. Donde un dato depende de un organismo o de una empresa, le indicamos dónde confirmarlo.',
        ],
        'steps' => [
            [
                'title' => 'Revise el pasaporte y tramite la visa',
                'body' => [
                    'Controle que el pasaporte tenga validez suficiente para todo el viaje y hojas libres; si está cerca del vencimiento, renuévelo primero. Luego tramite la visa: para turismo en general la tipo L, para negocios o ferias la tipo M con carta de invitación.',
                    'Como no hay misión china en Paraguay, la solicitud se presenta en una misión china en el exterior. Los pasos están en nuestra guía de visa para China para paraguayos. Cuente con dos o tres meses de margen.',
                ],
            ],
            [
                'title' => 'Compre el vuelo con escala',
                'body' => [
                    'No hay vuelos directos de Paraguay a China. Las rutas habituales salen de Asunción con conexión en São Paulo y luego vía Europa, Medio Oriente o Estados Unidos, o parten de Buenos Aires o São Paulo. El viaje total suele superar las 30 horas.',
                    'Revise si alguna escala exige visa de tránsito para el pasaporte paraguayo (por ejemplo, Estados Unidos o algunos países europeos) y confírmelo con la aerolínea. Compre el pasaje no reembolsable recién con la visa china emitida.',
                ],
            ],
            [
                'title' => 'Resuelva internet: eSIM, roaming o VPN',
                'body' => [
                    'En China continental están bloqueados Google (incluidos Gmail y Maps), WhatsApp, Instagram, Facebook, YouTube y otros servicios. Hay dos formas habituales de seguir usándolos: una eSIM internacional o roaming de su operador, cuyo tráfico en general se enruta fuera de China, o una VPN instalada y probada antes de salir.',
                    'La eSIM es lo más simple: se compra en línea, se instala con un código QR antes del viaje y se activa al llegar. Confirme con el proveedor que su plan incluye acceso a esas apps en China y que su celular admite eSIM. Si prefiere VPN, instálela y pruébela en Paraguay, porque descargarla desde China es difícil.',
                ],
            ],
            [
                'title' => 'Configure Alipay y WeChat Pay',
                'body' => [
                    'En China la mayoría de los comercios, taxis, restaurantes y hasta puestos callejeros cobran con código QR. Alipay y WeChat Pay permiten a los extranjeros vincular tarjetas internacionales Visa o Mastercard y pagar escaneando el código del comercio.',
                    'Descargue las dos apps en Paraguay, regístrese con su número de teléfono, verifique la identidad con el pasaporte cuando la app lo pida y vincule la tarjeta. Haga una prueba antes de viajar si es posible. Las comisiones por pagos con tarjeta extranjera y los límites los publica cada app; revíselos en sus condiciones.',
                ],
            ],
            [
                'title' => 'Descargue las apps útiles',
                'body' => [
                    'Además de Alipay y WeChat, conviene tener un mapa que funcione en China (Amap/Gaode o Baidu Maps, o Apple Maps en iPhone), una app de transporte como DiDi, que también funciona dentro de Alipay, un traductor con modo sin conexión y cámara, y la app de su aerolínea.',
                    'Para trenes, la app oficial 12306 tiene versión en inglés; también se compran por agencias en línea como Trip.com. Guarde capturas de reservas y direcciones escritas en chino para mostrarlas al taxista.',
                ],
            ],
            [
                'title' => 'Contrate seguro de viaje',
                'body' => [
                    'Una consulta médica o una internación en China sin seguro se paga de su bolsillo. Contrate un seguro con cobertura médica internacional, repatriación y equipaje, y verifique que cubra China y la duración completa del viaje.',
                    'Si la misión china le pide seguro para la visa, confirme qué cobertura exige antes de contratarlo.',
                ],
            ],
            [
                'title' => 'Lleve algo de efectivo y avise a su banco',
                'body' => [
                    'Aunque casi todo se paga con el celular, tenga algo de efectivo en yuanes (RMB) para imprevistos. Se puede cambiar en bancos o casas de cambio, o retirar en cajeros que aceptan tarjetas extranjeras.',
                    'Avise a su banco que viaja a China para que no bloquee la tarjeta y consulte las comisiones por uso en el exterior.',
                ],
            ],
            [
                'title' => 'Muévase en tren y metro',
                'body' => [
                    'La red de trenes de alta velocidad conecta las principales ciudades y suele ser más práctica que el avión en trayectos medios, por ejemplo Pekín–Shanghái o Cantón–Shenzhen. El pasaje se compra con el pasaporte, y en muchas estaciones el mismo pasaporte funciona como boleto.',
                    'Llegue a la estación con tiempo: hay control de seguridad y de pasaporte antes de entrar. En las ciudades el metro es rápido, barato y tiene carteles en inglés.',
                ],
            ],
            [
                'title' => 'Tenga en cuenta el registro de alojamiento',
                'body' => [
                    'Los extranjeros deben registrarse en la policía local al alojarse. Los hoteles habilitados para extranjeros lo hacen automáticamente con su pasaporte en el check-in. Si se aloja en una casa particular, pregunte al anfitrión cómo hacer el registro.',
                    'Al reservar, confirme que el hotel acepta huéspedes extranjeros: algunos alojamientos económicos no están habilitados.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Lista de lo que conviene resolver antes de salir de Paraguay',
            'head' => ['Tema', 'Qué hacer', 'Cuándo'],
            'rows' => [
                ['Pasaporte y visa', 'Pasaporte vigente y visa china emitida', '2 a 3 meses antes'],
                ['Vuelo', 'Ruta con escala y requisitos de tránsito revisados', 'Con la visa emitida'],
                ['Internet', 'eSIM instalada o VPN probada', 'Antes de salir'],
                ['Pagos', 'Alipay y WeChat Pay con tarjeta vinculada', '1 a 2 semanas antes'],
                ['Apps', 'Mapa, transporte, traductor, trenes', 'Antes de salir'],
                ['Seguro', 'Cobertura médica que incluya China', 'Al comprar el vuelo'],
                ['Efectivo', 'Algo de yuanes para imprevistos', 'Al llegar o antes'],
            ],
            'note' => 'Plazos orientativos. Confirme los requisitos vigentes con la misión china, la aerolínea y cada proveedor.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo manejarse en las ciudades',
                'body' => [
                    'En las grandes ciudades chinas pocas personas hablan inglés fuera de hoteles y zonas turísticas, y casi nadie habla español. Un traductor en el celular resuelve la mayoría de las situaciones: pedir comida, indicar una dirección o preguntar un precio.',
                    'China es un país con controles frecuentes. Lleve siempre el pasaporte, porque se pide para comprar pasajes de tren, entrar a algunos museos y alojarse. Respete las normas locales, no fotografíe instalaciones militares o de seguridad y evite temas políticos en conversaciones con desconocidos.',
                ],
                'items' => [
                    ['title' => 'Direcciones en chino', 'text' => 'Guarde el nombre y la dirección del hotel escritos en caracteres chinos para mostrarlos.'],
                    ['title' => 'Horario', 'text' => 'China tiene un solo huso horario para todo el país, con varias horas de diferencia respecto a Paraguay.'],
                    ['title' => 'Enchufes', 'text' => 'Lleve un adaptador universal; los tipos de enchufe difieren de los de Paraguay.'],
                ],
            ],
            [
                'h2' => 'Errores comunes de un primer viaje',
                'body' => [
                    'La mayoría se evitan con una hora de preparación en Paraguay.',
                ],
                'items' => [
                    ['title' => 'Llegar sin internet funcionando', 'text' => 'Sin WhatsApp ni Google Maps al aterrizar, cuesta hasta avisar que llegó. Pruebe la eSIM o la VPN antes de salir.'],
                    ['title' => 'Depender solo de la tarjeta', 'text' => 'Muchos comercios no tienen terminal para tarjetas extranjeras; cobran por QR.'],
                    ['title' => 'Viajar en feriados chinos', 'text' => 'En Año Nuevo Chino y en la primera semana de octubre los trenes y hoteles se llenan y los precios suben.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué necesito para viajar a China desde Paraguay?', 'a' => 'Pasaporte vigente, visa china tramitada en una misión en el exterior, pasaje con escala, seguro de viaje, y en la práctica internet con eSIM o VPN y Alipay o WeChat Pay configurados para pagar.'],
            ['q' => '¿Funciona WhatsApp en China?', 'a' => 'No con una red o wifi chinos: WhatsApp, Google e Instagram están bloqueados en China continental. Muchos viajeros los usan con una eSIM internacional o roaming, o con una VPN instalada antes de viajar.'],
            ['q' => '¿Puedo pagar con mi tarjeta paraguaya en China?', 'a' => 'Algunos hoteles y comercios grandes aceptan Visa o Mastercard, pero la forma práctica es vincular su tarjeta a Alipay o WeChat Pay, que aceptan tarjetas internacionales, y pagar con QR.'],
            ['q' => '¿Qué eSIM conviene para China?', 'a' => 'Una que incluya China continental, dé datos suficientes para su estadía y permita usar las apps bloqueadas. Compare planes y confirme con el proveedor que su celular es compatible con eSIM.'],
            ['q' => '¿Cuánto dura el vuelo de Paraguay a China?', 'a' => 'No hay vuelos directos; con una o dos escalas el viaje suele superar las 30 horas en total, según la ruta y el tiempo de conexión.'],
            ['q' => '¿Es seguro viajar a China?', 'a' => 'Las grandes ciudades chinas tienen fama de seguras para turistas en cuanto a delitos comunes. Aun así, cuide sus pertenencias en lugares concurridos y respete las normas locales.'],
        ],
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => ['visa-china-para-paraguayos', 'mejor-epoca-para-viajar-a-china', 'que-ver-en-china'],
        'affiliates' => ['holafly', 'airalo', 'vpn', 'seguro-viaje', 'trip', 'civitatis'],
        'disclaimer' => false,
        'image' => ['src' => '/assets/img/hubs/viajar-a-china-estacion-tren.webp', 'alt' => 'Viajero de negocios con equipaje de mano en una estación de tren de alta velocidad en China', 'width' => 1600, 'height' => 905],
    ],

    'mejor-epoca-para-viajar-a-china' => [
        'path' => '/viajar-a-china/mejor-epoca-para-viajar-a-china/',
        'title' => 'Mejor época para viajar a China',
        'navLabel' => 'Mejor época para ir',
        'cluster' => 'viajes',
        'seoTitle' => 'Mejor época para viajar a China',
        'metaDescription' => 'Cuál es la mejor época para viajar a China según el clima, las ferias comerciales y los feriados chinos que conviene evitar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Mejor época para viajar a China',
            'lead' => 'La mejor época para viajar a China suele ser la primavera (abril y mayo) y el otoño (septiembre a noviembre): el clima es templado en la mayor parte del país y coinciden con las dos sesiones de la Feria de Cantón. Conviene evitar el Año Nuevo Chino y la primera semana de octubre, cuando viaja medio país.',
        ],
        'intro' => [
            'China es un país enorme y el clima cambia mucho entre el norte (Pekín, con inviernos fríos y secos) y el sur (Cantón, Shenzhen y Hong Kong, con veranos calurosos, húmedos y lluviosos). Aun así, para un primer viaje la primavera y el otoño del hemisferio norte son las estaciones más cómodas en casi todo el país. Recuerde que las estaciones están invertidas respecto a Paraguay: cuando aquí es invierno, allá es verano.',
            'Si viaja por negocios, el calendario comercial pesa tanto como el clima. La Feria de Cantón se hace en primavera y en otoño, y las fábricas paran durante el Año Nuevo Chino. Esta guía le ayuda a elegir el mes según el motivo del viaje, las ciudades que quiere visitar y los feriados que conviene evitar.',
        ],
        'steps' => [
            [
                'title' => 'Defina el motivo principal del viaje',
                'body' => [
                    'Si el viaje es por la Feria de Cantón, las fechas las fija la feria: primavera o otoño. Si es para visitar fábricas, lo que importa es evitar los feriados largos. Si es turismo, el clima de las ciudades que quiere ver es lo principal.',
                ],
            ],
            [
                'title' => 'Evite el Año Nuevo Chino',
                'body' => [
                    'El Año Nuevo Chino (Fiesta de la Primavera) cae entre fines de enero y febrero según el calendario lunar. Es la mayor migración interna del mundo: trenes y vuelos llenos, precios altos y muchos comercios cerrados.',
                    'Para negocios es la peor época: las fábricas cierran una o varias semanas antes y después, y la producción se retrasa. Si tiene un pedido en curso, planifique pensando en ese parate.',
                ],
            ],
            [
                'title' => 'Evite la Semana Dorada de octubre',
                'body' => [
                    'Desde el Día Nacional, el 1 de octubre, hay una semana de feriado en que millones de personas viajan. Los sitios turísticos se llenan y los precios suben. Algo parecido, más corto, ocurre en torno al 1 de mayo.',
                    'Las fechas exactas de los feriados las publica cada año el gobierno chino; revíselas antes de reservar.',
                ],
            ],
            [
                'title' => 'Elija la estación según las ciudades',
                'body' => [
                    'Pekín y el norte: primavera y otoño son templados; el invierno es frío y seco, y el verano caluroso. Shanghái y el este: primavera y otoño agradables; el verano es húmedo y en junio suele llover mucho.',
                    'Cantón, Shenzhen y el sur: el otoño y el invierno son lo más cómodo; de mayo a septiembre hay calor húmedo, lluvias fuertes y posibilidad de tifones. Para ver varias regiones en un viaje, octubre y noviembre son una buena opción.',
                ],
            ],
            [
                'title' => 'Cruce el clima con el calendario de ferias',
                'body' => [
                    'La sesión de primavera de la Feria de Cantón suele ir de abril a principios de mayo y la de otoño de octubre a principios de noviembre. En esos días los hoteles de Guangzhou suben de precio.',
                    'Si va a la feria, reserve temprano. Si no va a la feria pero visita Guangzhou, puede convenirle evitar esas semanas.',
                ],
            ],
            [
                'title' => 'Reserve con anticipación',
                'body' => [
                    'Con la época elegida, tramite la visa y compre el vuelo con margen. En temporada alta, dos o tres meses de anticipación evitan precios altos y falta de disponibilidad en hoteles y trenes.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Épocas del año en China y para qué convienen',
            'head' => ['Época (hemisferio norte)', 'Clima general', 'Para negocios', 'Para turismo'],
            'rows' => [
                ['Primavera (marzo a mayo)', 'Templado en la mayor parte del país', 'Buena: Feria de Cantón de primavera', 'Buena, salvo semana del 1 de mayo'],
                ['Verano (junio a agosto)', 'Caluroso; húmedo y lluvioso en el sur y el este', 'Posible, sin feria grande en Cantón', 'Menos cómoda por el calor'],
                ['Otoño (septiembre a noviembre)', 'Templado y más seco', 'Buena: Feria de Cantón de otoño', 'Muy buena, salvo la Semana Dorada'],
                ['Invierno (diciembre a febrero)', 'Frío en el norte, templado en el sur', 'Mala cerca del Año Nuevo Chino', 'Buena para el sur, fría en Pekín'],
            ],
            'note' => 'Orientativo. El clima varía por región y año; los feriados y las fechas de la feria cambian cada año.',
        ],
        'sections' => [
            [
                'h2' => 'Qué tener en cuenta desde Paraguay',
                'body' => [
                    'Al estar en el hemisferio sur, lo que en China es otoño aquí es primavera. Eso importa para la ropa que lleva: en octubre en Pekín puede hacer frío aunque en Asunción haga calor.',
                    'También importa para su propio negocio: si importa para la temporada de verano paraguaya, un viaje a la feria de primavera china (abril) le deja tiempo para producir y enviar la mercadería antes de fin de año. Consulte los plazos reales de producción y flete con su proveedor y su forwarder.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuál es el mejor mes para viajar a China?', 'a' => 'Abril, mayo, septiembre (después de las lluvias fuertes), octubre (después de la Semana Dorada) y noviembre suelen ser los más cómodos en la mayor parte del país.'],
            ['q' => '¿Cuándo no conviene viajar a China?', 'a' => 'Durante el Año Nuevo Chino, entre fines de enero y febrero, y en la semana del 1 de octubre. Son feriados largos con transporte lleno y precios altos.'],
            ['q' => '¿Cuál es la mejor época para ir a Cantón?', 'a' => 'Entre octubre y marzo el clima es más fresco y seco. Si va por negocios, las fechas las marcan las sesiones de la Feria de Cantón en primavera y otoño.'],
            ['q' => '¿Se puede viajar a China en verano?', 'a' => 'Sí, pero hace calor y en el sur y el este llueve mucho; es además temporada de tifones en la costa sur. Planifique con margen para retrasos.'],
        ],
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => ['feria-de-canton', 'guia-para-viajar-a-china', 'que-ver-en-china'],
        'affiliates' => ['holafly', 'airalo', 'vpn', 'seguro-viaje', 'trip', 'civitatis'],
        'disclaimer' => false,
        'image' => null,
    ],

    'que-ver-en-china' => [
        'path' => '/viajar-a-china/que-ver-en-china/',
        'title' => 'Qué ver en China: ciudades para un primer viaje',
        'navLabel' => 'Qué ver en China',
        'cluster' => 'viajes',
        'seoTitle' => 'Qué ver en China en un primer viaje',
        'metaDescription' => 'Qué ver en China en un primer viaje: Pekín, Shanghái, Cantón, Shenzhen y otras ciudades, y cómo combinarlas con un viaje de negocios.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Qué ver en China: ciudades para un primer viaje',
            'lead' => 'En un primer viaje, lo que más conviene ver en China es Pekín (la Gran Muralla y la Ciudad Prohibida), Shanghái (el Bund y la ciudad moderna) y Xi\'an (los Guerreros de Terracota). Si viaja por negocios, Cantón y Shenzhen quedan cerca de las fábricas y de la Feria de Cantón.',
        ],
        'intro' => [
            'China tiene tanto para ver que un primer viaje obliga a elegir. Para quien sale de Paraguay, con un vuelo largo y una visa que lleva tiempo tramitar, lo razonable es armar un recorrido de dos o tres ciudades bien conectadas en tren de alta velocidad, en lugar de intentar abarcar todo el país.',
            'Esta guía propone las ciudades más visitadas en un primer viaje y explica qué ver en cada una, cómo combinarlas y cómo sumar días de turismo a un viaje de negocios o a la Feria de Cantón. No es una lista exhaustiva: es un punto de partida práctico.',
        ],
        'steps' => [
            [
                'title' => 'Pekín: historia imperial y la Gran Muralla',
                'body' => [
                    'La capital concentra los sitios más conocidos: la Ciudad Prohibida, la plaza de Tiananmén, el Templo del Cielo, el Palacio de Verano y los hutongs, callejones tradicionales. La Gran Muralla se visita en excursión de un día; los tramos más cercanos a la ciudad son los más concurridos.',
                    'Cuente con tres o cuatro días. Varios sitios exigen reservar entrada con el pasaporte en línea y tienen cupo diario; resérvelos con anticipación.',
                ],
            ],
            [
                'title' => 'Shanghái: la China moderna',
                'body' => [
                    'Shanghái muestra la cara comercial y moderna del país: el paseo del Bund frente a los rascacielos de Pudong, el Jardín Yuyuan, la antigua concesión francesa y sus museos. Desde allí se visitan pueblos de canales cercanos en excursión de un día.',
                    'Es además un centro de negocios y de ferias comerciales, útil si su viaje incluye reuniones en la región del delta del Yangtsé.',
                ],
            ],
            [
                'title' => 'Xi\'an: los Guerreros de Terracota',
                'body' => [
                    'Xi\'an fue capital imperial y punto de partida de la Ruta de la Seda. El ejército de Guerreros de Terracota es su principal atractivo, junto con la muralla de la ciudad, que se recorre en bicicleta, y el barrio musulmán.',
                    'Se llega en tren de alta velocidad desde Pekín. Con dos días alcanza para lo principal.',
                ],
            ],
            [
                'title' => 'Cantón (Guangzhou): comercio y gastronomía',
                'body' => [
                    'Guangzhou es la ciudad de la Feria de Cantón y un gran centro de mercados mayoristas. Para visitar: la torre de Cantón, la isla de Shamian con sus edificios coloniales, el río Perla y su cocina cantonesa, conocida por el dim sum.',
                    'Si va a la feria, reserve uno o dos días antes o después para recorrer la ciudad y sus mercados mayoristas por rubro.',
                ],
            ],
            [
                'title' => 'Shenzhen: tecnología y fábricas',
                'body' => [
                    'Shenzhen, a poca distancia de Guangzhou en tren, es el centro de la electrónica china. El mercado de Huaqiangbei reúne miles de puestos de componentes y dispositivos. Es un buen lugar para entender la cadena de suministro de electrónica y visitar fábricas del rubro.',
                    'Desde Shenzhen se cruza a Hong Kong, que tiene su propio régimen de ingreso; confirme los requisitos para su pasaporte antes de planearlo.',
                ],
            ],
            [
                'title' => 'Guilin y Yangshuo: paisajes',
                'body' => [
                    'Si quiere naturaleza, la zona de Guilin y Yangshuo, con sus montañas kársticas y el río Li, es uno de los paisajes más fotografiados del país. Se llega en tren rápido desde Guangzhou o Shenzhen.',
                ],
            ],
            [
                'title' => 'Arme el recorrido en tren',
                'body' => [
                    'Un circuito clásico de 10 a 14 días es Pekín, Xi\'an y Shanghái. Si su viaje es de negocios en el sur, Guangzhou, Shenzhen y Guilin combinan bien. Los trenes de alta velocidad conectan todas estas ciudades y evitan traslados a aeropuertos.',
                    'Deje un día libre entre ciudades para el cansancio del cambio de horario, que desde Paraguay es de muchas horas.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Ciudades para un primer viaje a China',
            'head' => ['Ciudad', 'Qué ver', 'Días sugeridos', 'Encaja con negocios'],
            'rows' => [
                ['Pekín', 'Ciudad Prohibida, Gran Muralla, Templo del Cielo', '3 a 4', 'Reuniones institucionales'],
                ['Shanghái', 'Bund, Pudong, Jardín Yuyuan', '2 a 3', 'Ferias y oficinas comerciales'],
                ['Xi\'an', 'Guerreros de Terracota, muralla', '2', 'Poco'],
                ['Guangzhou', 'Torre de Cantón, Shamian, mercados', '2 a 3', 'Feria de Cantón, mayoristas'],
                ['Shenzhen', 'Huaqiangbei, ciudad moderna', '1 a 2', 'Electrónica, fábricas'],
                ['Guilin y Yangshuo', 'Río Li, montañas kársticas', '2 a 3', 'Poco'],
            ],
            'note' => 'Días orientativos para un primer viaje; dependen de su ritmo y del motivo del viaje.',
        ],
        'sections' => [
            [
                'h2' => 'Cómo combinar turismo y negocios',
                'body' => [
                    'Muchos paraguayos viajan a China por trabajo y agregan unos días de turismo. Lo más práctico es hacer primero la parte de negocios, cuando llega descansado y con la agenda fija, y después el turismo. La visa debe corresponder al motivo principal del viaje; consulte en la misión china qué tipo pedir si combina ambos.',
                    'Para las excursiones, las plataformas de actividades en línea permiten reservar visitas guiadas en español en las ciudades más turísticas, algo útil si no habla inglés.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué ver en China en 10 días?', 'a' => 'Un recorrido habitual es Pekín, Xi\'an y Shanghái, unidos en tren de alta velocidad. Si va por negocios al sur, Guangzhou, Shenzhen y Guilin combinan mejor.'],
            ['q' => '¿Hace falta reservar la entrada a la Ciudad Prohibida?', 'a' => 'Sí, en general se reserva en línea con el pasaporte y hay cupo diario. Reserve con anticipación y lleve el pasaporte ese día.'],
            ['q' => '¿Hay tours en español en China?', 'a' => 'En las ciudades más turísticas hay visitas guiadas en español que se reservan en línea. Fuera de ellas, la oferta es menor.'],
            ['q' => '¿Puedo ir a Hong Kong desde Shenzhen con la visa china?', 'a' => 'Hong Kong tiene su propio régimen de ingreso y salir de China continental puede consumir una entrada de su visa. Confirme los requisitos para su pasaporte y la cantidad de entradas de su visa antes de cruzar.'],
        ],
        'relatedService' => 'tour-negocios-china',
        'toolLink' => null,
        'related' => ['guia-para-viajar-a-china', 'mejor-epoca-para-viajar-a-china', 'viaje-de-negocios-a-china'],
        'affiliates' => ['holafly', 'airalo', 'vpn', 'seguro-viaje', 'trip', 'civitatis'],
        'disclaimer' => false,
        'image' => null,
    ],

    'viaje-de-negocios-a-china' => [
        'path' => '/viajar-a-china/viaje-de-negocios-a-china/',
        'title' => 'Viaje de negocios a China: cómo prepararlo',
        'navLabel' => 'Viaje de negocios',
        'cluster' => 'viajes',
        'seoTitle' => 'Viaje de negocios a China: cómo prepararlo',
        'metaDescription' => 'Cómo preparar un viaje de negocios a China desde Paraguay: agenda de fábricas, intérprete, muestras, negociación y seguimiento al volver.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Viajar a China',
            'h1' => 'Viaje de negocios a China: cómo prepararlo',
            'lead' => 'Un viaje de negocios a China se prepara desde Paraguay: defina qué productos busca, contacte y preseleccione proveedores antes de salir, arme la agenda de visitas a fábricas, tramite la visa de negocios y contrate un intérprete. En China verifica, negocia y pide muestras; la compra se cierra al volver.',
        ],
        'intro' => [
            'Viajar a China para comprar tiene sentido cuando el volumen justifica el gasto, cuando necesita ver con sus ojos la fábrica y la calidad, o cuando quiere construir una relación directa con proveedores. Un viaje bien preparado le ahorra errores de compra que cuestan más que el pasaje.',
            'Esta guía es para importadores y comerciantes paraguayos que viajan a China por primera vez con fines comerciales, con o sin Feria de Cantón. Explica cómo armar la agenda, qué llevar, cómo conducir una visita a fábrica, cómo negociar y cómo hacer el seguimiento al volver.',
        ],
        'steps' => [
            [
                'title' => 'Defina objetivos concretos',
                'body' => [
                    'Antes de sacar el pasaje, escriba qué productos busca, en qué cantidades, con qué especificaciones y a qué precio de venta en Paraguay. Con eso sabrá qué costo máximo puede pagar en China y qué proveedores descartar.',
                    'Calcule el costo de importación completo (flete, seguro, tributos, despachante) para cada producto; nuestra calculadora le da una estimación orientativa.',
                ],
            ],
            [
                'title' => 'Preseleccione proveedores antes de viajar',
                'body' => [
                    'Busque proveedores en Alibaba, 1688 o en el catálogo de expositores de la feria, y contacte a varios. Pida catálogo, precios orientativos, MOQ y la ubicación de la fábrica. Descarte a quien no responda con claridad.',
                    'Agrupe a los preseleccionados por ciudad: en China las distancias son grandes y cada traslado consume medio día.',
                ],
            ],
            [
                'title' => 'Arme la agenda y tramite la visa',
                'body' => [
                    'Con fechas tentativas, confirme las citas con cada fábrica y pida a una de ellas, o a la feria, la carta de invitación para la visa de negocios tipo M. Como no hay misión china en Paraguay, el trámite se hace en el exterior y lleva tiempo.',
                    'Deje un día de margen entre visitas para imprevistos y para volver a ver a un proveedor que le interesó.',
                ],
            ],
            [
                'title' => 'Contrate intérprete o agente local',
                'body' => [
                    'Pocos proveedores hablan español y muchos manejan un inglés limitado. Un intérprete le evita malentendidos en precios, especificaciones y plazos. Un agente local puede además organizar traslados y verificar antecedentes de las empresas.',
                    'Nosotros podemos conectarlo con agentes e intérpretes que trabajan con compradores de habla hispana.',
                ],
            ],
            [
                'title' => 'Prepare lo que va a llevar',
                'body' => [
                    'Lleve tarjetas personales, fotos y muestras de lo que vende hoy, especificaciones por escrito, requisitos de etiquetado y certificación para Paraguay, y una planilla para anotar precios y condiciones de cada proveedor.',
                    'Instale WeChat antes de salir: la mayor parte de la comunicación con proveedores chinos pasa por esa app. Resuelva también internet (eSIM o VPN) y pagos (Alipay o WeChat Pay).',
                ],
            ],
            [
                'title' => 'Visite la fábrica con una lista de control',
                'body' => [
                    'En cada visita verifique que la empresa sea realmente fábrica y no solo intermediaria: licencia comercial, líneas de producción, cantidad de operarios, control de calidad, depósito de producto terminado y otros clientes de exportación.',
                    'Pida ver el producto en producción, no solo el showroom, y fotografíe lo que le permitan.',
                ],
            ],
            [
                'title' => 'Negocie y pida muestras',
                'body' => [
                    'Negocie precio, MOQ, plazo de producción, Incoterm, forma de pago y penalidades por retraso o defectos. Pida todo por escrito en una proforma (PI). Lo habitual es un anticipo y el saldo antes del embarque, pero cada proveedor tiene sus condiciones.',
                    'Antes de un pedido grande, pida muestras de producción o una orden de prueba. Si no puede estar al momento del embarque, considere una inspección de calidad por un tercero.',
                ],
            ],
            [
                'title' => 'Haga el seguimiento al volver',
                'body' => [
                    'En los días siguientes escriba a cada proveedor con un resumen de lo conversado. Compare proformas con la misma base (Incoterm y especificación) y calcule el costo puesto en Paraguay antes de decidir.',
                    'Coordine con un forwarder el flete y con un despachante de aduana el despacho, antes de pagar el anticipo.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué verificar en una visita a fábrica',
            'head' => ['Punto', 'Qué mirar', 'Señal de alerta'],
            'rows' => [
                ['Licencia comercial', 'Nombre y alcance de la empresa', 'El nombre no coincide con el de la proforma'],
                ['Producción', 'Líneas activas del producto que usted busca', 'Solo hay showroom, sin producción visible'],
                ['Control de calidad', 'Procedimiento y registros de inspección', 'No hay nadie a cargo de calidad'],
                ['Capacidad', 'Operarios, turnos, plazos reales', 'Plazos muy cortos para volúmenes grandes'],
                ['Exportación', 'Experiencia con otros mercados', 'No conoce los documentos de exportación'],
            ],
            'note' => 'Lista orientativa. Para compras importantes, considere una verificación formal por un tercero.',
        ],
        'sections' => [
            [
                'h2' => 'Errores comunes en viajes de negocios a China',
                'body' => [
                    'Estos errores se repiten en compradores que viajan por primera vez.',
                ],
                'items' => [
                    ['title' => 'Viajar sin preselección', 'text' => 'Llegar sin citas confirmadas convierte el viaje en turismo por mercados mayoristas.'],
                    ['title' => 'Cerrar en el momento', 'text' => 'La presión para firmar en la visita es común. Pida la proforma y decida en frío.'],
                    ['title' => 'No aclarar el Incoterm', 'text' => 'Un precio FOB y uno EXW no son comparables. Pida siempre el mismo Incoterm a todos.'],
                    ['title' => 'Olvidar los requisitos de Paraguay', 'text' => 'Etiquetado, registros sanitarios o certificaciones pueden frenar la mercadería en aduana. Consulte con su despachante antes de comprar.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué visa necesito para un viaje de negocios a China?', 'a' => 'En general la visa de negocios tipo M, con carta de invitación de una empresa china o de la feria. Desde Paraguay se tramita en una misión china en el exterior; consulte en la misión que corresponda.'],
            ['q' => '¿Cuántos días necesito para un viaje de negocios a China?', 'a' => 'Depende de la cantidad de proveedores y ciudades. Sin contar los días de vuelo, una agenda de una o dos semanas permite visitar varias fábricas en una misma región con margen.'],
            ['q' => '¿Conviene ir a la Feria de Cantón o visitar fábricas directamente?', 'a' => 'La feria le permite ver muchos proveedores en pocos días; las visitas a fábrica le muestran la capacidad real. Muchos compradores combinan ambas en el mismo viaje.'],
            ['q' => '¿Cómo pago a un proveedor chino?', 'a' => 'Lo habitual es transferencia bancaria internacional con anticipo y saldo antes del embarque. Evite pagar a cuentas personales o de terceros que no coincidan con la empresa de la proforma.'],
            ['q' => '¿Necesito un agente en China?', 'a' => 'No es obligatorio, pero ayuda si no habla chino ni inglés, si compra a varios proveedores o si necesita consolidar carga e inspeccionar calidad.'],
        ],
        'relatedService' => 'tour-negocios-china',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Estime el costo puesto en Paraguay de cada producto antes de negociar en China.',
        ],
        'related' => ['feria-de-canton', 'proveedores-chinos-confiables', 'pagar-a-proveedores-chinos'],
        'affiliates' => ['trip', 'seguro-viaje'],
        'disclaimer' => false,
        'image' => null,
    ],

];
