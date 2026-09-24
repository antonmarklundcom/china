<?php

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'preparar-visita-feria-de-canton';

$sections = [
    [
        'h2'   => 'Lo esencial en pocas líneas',
        'body' => [
            'Para aprovechar la Feria de Cantón conviene empezar varios meses antes: elegir la fase que corresponde a sus productos, registrarse como comprador en el sitio oficial, tramitar la visa china y reservar hotel cerca del complejo de Pazhou. En la feria, lleve tarjetas, use WeChat y fotografíe el número de cada stand. Al volver, el seguimiento ordenado es lo que convierte contactos en proveedores.',
            'La Feria de Cantón (China Import and Export Fair) se realiza en Guangzhou dos veces por año, en primavera y en otoño, y cada edición se divide en tres fases con categorías de productos distintas. Las fechas exactas de cada edición las publica la organización en cantonfair.org.cn; verifíquelas allí antes de comprar pasajes.',
        ],
    ],
    [
        'h2'   => 'Meses antes: elegir la fase',
        'body' => [
            'Cada fase reúne rubros diferentes. En términos generales, una fase se orienta a electrónica, electrodomésticos, maquinaria, herramientas, materiales de construcción y vehículos; otra a artículos para el hogar, regalos y decoración; y otra a textiles, ropa, calzado, papelería y productos de salud y recreación. La distribución exacta puede cambiar de una edición a otra.',
            'Revise en el sitio oficial la lista de categorías de la fase que le interesa. Si sus productos están en dos fases, evalúe si le conviene quedarse entre ambas o priorizar una. Ir a la fase equivocada significa recorrer días de pabellones que no le sirven.',
        ],
    ],
    [
        'h2'   => 'Registro como comprador',
        'body' => [
            'Los compradores extranjeros se registran en línea en el sitio oficial de la feria y, con ese registro y su pasaporte, obtienen la credencial de ingreso. Hágalo con anticipación: el registro previo le ahorra filas el primer día.',
            'Consulte en el sitio oficial si ofrecen una carta de invitación para compradores; en muchos casos es útil para la solicitud de visa. Guarde en el teléfono y en papel el comprobante de registro.',
        ],
    ],
    [
        'h2'   => 'Visa y pasaje',
        'body' => [
            'Paraguay no tiene relaciones diplomáticas con la República Popular China, de modo que no hay embajada ni consulado de la RPC en Asunción. Los ciudadanos paraguayos deben averiguar dónde y cómo tramitar la visa en una representación china de otro país de la región o mediante el procedimiento que esté vigente. Los requisitos y plazos cambian: confírmelos en el sitio oficial de la embajada o el consulado donde vaya a presentar la solicitud.',
            'Inicie el trámite con margen, porque puede requerir enviar el pasaporte o viajar. Los vuelos desde Asunción a Guangzhou tienen al menos una escala; compare rutas por São Paulo, Buenos Aires, Europa o Medio Oriente, y verifique si alguna escala exige visa de tránsito.',
        ],
    ],
    [
        'h2'   => 'Hotel cerca de Pazhou',
        'body' => [
            'El complejo ferial está en la zona de Pazhou, en el distrito de Haizhu de Guangzhou. Durante la feria los hoteles de la zona suben sus tarifas y se llenan, por lo que conviene reservar temprano y con cancelación flexible.',
            'Si no consigue hotel cerca, busque uno bien conectado por metro con las estaciones del complejo ferial. Una hora de viaje por día, ida y vuelta, se nota después de varias jornadas caminando.',
        ],
    ],
    [
        'h2'   => 'Antes de viajar: preparación práctica',
        'body' => [
            'Unos detalles que ahorran tiempo en Guangzhou:',
        ],
        'items' => [
            ['title' => 'Lista de productos', 'text' => 'Lleve una lista con los productos, cantidades aproximadas, precios objetivo y especificaciones que busca.'],
            ['title' => 'WeChat y pagos', 'text' => 'Instale WeChat y configure un medio de pago usable en China antes de salir; muchos proveedores se comunican solo por WeChat.'],
            ['title' => 'Conexión', 'text' => 'Tenga resuelta la conexión a internet en China, con un eSIM o roaming, y sepa que algunos servicios que usa en Paraguay pueden no funcionar allí.'],
            ['title' => 'Traductor', 'text' => 'Descargue un traductor con modo sin conexión; muchos expositores hablan inglés básico, pero no todos.'],
        ],
    ],
    [
        'h2'   => 'Durante la feria',
        'body' => [
            'La feria es enorme y los días pasan rápido. La clave es registrar bien cada contacto para poder distinguirlos después.',
        ],
        'items' => [
            ['title' => 'Tarjetas de presentación', 'text' => 'Lleve suficientes tarjetas con su nombre, empresa, correo y número de WhatsApp o WeChat. Pida siempre la tarjeta del expositor.'],
            ['title' => 'WeChat en el stand', 'text' => 'Agregue al vendedor en WeChat ahí mismo y escríbale un mensaje corto con el producto que le interesa, para que ambos recuerden la conversación.'],
            ['title' => 'Foto del número de stand', 'text' => 'Fotografíe el cartel con el número de stand y el nombre de la empresa, y luego los productos. Así sabe a quién corresponde cada foto.'],
            ['title' => 'Muestras', 'text' => 'Pida muestras o catálogos solo de lo que realmente evalúa. Traer muestras en la valija puede tener límites y tributos; consulte antes cómo tratarlas en la aduana paraguaya.'],
            ['title' => 'Preguntas clave', 'text' => 'Cantidad mínima, precio por volumen, plazo de producción, Incoterm y si son fábrica o trading.'],
        ],
    ],
    [
        'h2'   => 'Después de la feria: el seguimiento',
        'body' => [
            'La mayoría de los negocios se cierran después, no en el stand. Dentro de la primera semana de regreso, ordene sus contactos en una planilla con empresa, stand, producto, precio indicado y observaciones, y escriba a cada proveedor que le interese con una consulta concreta.',
            'Pida cotizaciones escritas con el mismo Incoterm para poder compararlas, solicite muestras de los finalistas y verifique la empresa antes del primer pago. Si piensa importar en volumen, coordine con su despachante la clasificación arancelaria y los requisitos de su producto antes de cerrar el pedido.',
        ],
    ],
];

$faq = [
    ['q' => '¿Cuándo es la Feria de Cantón?', 'a' => 'Se realiza dos veces por año en Guangzhou, en primavera y en otoño, en tres fases. Las fechas exactas de cada edición se publican en el sitio oficial cantonfair.org.cn.'],
    ['q' => '¿Dónde se tramita la visa china desde Paraguay?', 'a' => 'No hay embajada de la RPC en Asunción. Confirme en el sitio oficial de la representación china donde piense presentar la solicitud cuáles son los requisitos y el procedimiento vigentes.'],
    ['q' => '¿Qué fase de la feria me conviene?', 'a' => 'La que incluye la categoría de sus productos. Revise la lista de categorías por fase en el sitio oficial antes de reservar.'],
    ['q' => '¿Necesito hablar chino para ir a la feria?', 'a' => 'No es imprescindible. Muchos expositores hablan inglés y un traductor en el teléfono resuelve lo básico; para negociaciones complejas conviene un intérprete.'],
];

require ROOT_DIR . '/templates/article.php';
