<?php

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'comercio-china-paraguay';

$sections = [
    [
        'h2'   => 'Un comercio sin relaciones diplomáticas',
        'body' => [
            'Paraguay mantiene relaciones diplomáticas con Taiwán (República de China) y no con la República Popular China. Aun así, China continental es uno de los principales orígenes de los productos que Paraguay importa. Para quien importa, esto no impide comprar, pero sí cambia algunos aspectos prácticos: dónde se tramita la visa, cómo se paga a los proveedores y por qué rutas llega la mercadería.',
            'En este artículo explicamos, sin entrar en valoraciones políticas, cómo funciona en la práctica el comercio entre China y Paraguay y qué debe tener en cuenta un importador paraguayo. No incluimos estadísticas de comercio: si necesita cifras actualizadas, consulte las publicaciones del Banco Central del Paraguay (BCP), de la Dirección Nacional de Ingresos Tributarios (DNIT), que tiene a su cargo la aduana, o de bases internacionales como UN Comtrade.',
        ],
    ],
    [
        'h2'   => 'El contexto: Taiwán, la RPC y el comercio',
        'body' => [
            'La relación diplomática define con qué gobierno Paraguay tiene embajadas, acuerdos oficiales y representación consular. El comercio privado, en cambio, depende de empresas: un importador paraguayo puede comprar a un fabricante de Guangdong o de Zhejiang igual que a uno de cualquier otro país, siempre que cumpla con las reglas de importación paraguayas.',
            'Por eso en los comercios de Paraguay, desde Asunción hasta Ciudad del Este, abundan productos fabricados en China continental: electrónica, ropa, juguetes, herramientas, repuestos, motos y maquinaria. Lo que cambia es la infraestructura alrededor de esas compras.',
        ],
    ],
    [
        'h2'   => 'Cómo llega la mercadería de China a Paraguay',
        'body' => [
            'Paraguay no tiene salida al mar, así que la carga marítima desde China no llega directamente a un puerto paraguayo en el mismo buque. Lo habitual es que el contenedor viaje hasta un puerto de la región, como los de Brasil, Uruguay o Argentina, y desde allí continúe hacia Paraguay.',
        ],
        'items' => [
            ['title' => 'Por río', 'text' => 'Desde puertos del Río de la Plata, la carga puede seguir en barcaza por la hidrovía Paraná-Paraguay hasta terminales portuarias paraguayas.'],
            ['title' => 'Por tierra', 'text' => 'Desde puertos brasileños, el contenedor puede seguir en camión hasta un paso fronterizo, por ejemplo hacia Ciudad del Este.'],
            ['title' => 'Por aire', 'text' => 'La carga aérea y los envíos de courier llegan por vía aérea, normalmente con conexiones en otros aeropuertos.'],
        ],
    ],
    [
        'h2'   => 'Qué significa esto en la práctica',
        'body' => [
            'Para usted, la ruta se traduce en tiempo y costo. El tránsito por un tercer país agrega un tramo, un transbordo y documentos adicionales. Su forwarder le puede indicar qué ruta conviene según el puerto de origen, el tipo de carga y la época del año, y la cotización debe detallar cada tramo hasta el destino final en Paraguay.',
            'Al comparar cotizaciones de flete, verifique que todas incluyan el mismo recorrido: por ejemplo, hasta el puerto de tránsito o hasta la terminal en Paraguay. Una cotización barata que termina en Montevideo o Paranaguá puede resultar más cara cuando se suma el tramo final.',
        ],
    ],
    [
        'h2'   => 'Visas para viajar a China',
        'body' => [
            'Como no hay embajada ni consulado de la República Popular China en Asunción, un paraguayo que quiere viajar a China continental, por ejemplo para visitar fábricas o la Feria de Cantón, debe tramitar la visa en una representación china de otro país o por el procedimiento que esté vigente para ciudadanos paraguayos. Confirme los requisitos en el sitio oficial de la representación a la que vaya a presentar su solicitud, ya que cambian con el tiempo.',
            'Planifique con meses de anticipación: el trámite puede requerir enviar el pasaporte al exterior o viajar para presentarlo.',
        ],
    ],
    [
        'h2'   => 'Pagos a proveedores chinos',
        'body' => [
            'Los pagos de Paraguay a proveedores chinos se hacen en general en dólares estadounidenses, por transferencia bancaria internacional o por medio de plataformas de pago. Pagar en yuanes es posible en algunos casos, pero depende de su banco y del proveedor.',
            'Antes de transferir, verifique que la cuenta de destino esté a nombre de la misma empresa que figura en la proforma y en el contrato. Un cambio de cuenta de último momento, pedido por correo, es una forma conocida de fraude: confírmelo siempre por otro canal. Consulte con su banco las comisiones, el tiempo de acreditación y la documentación que le piden para justificar el pago.',
        ],
    ],
    [
        'h2'   => 'Ciudad del Este y la reexportación',
        'body' => [
            'Ciudad del Este es conocida por su comercio de productos importados, muchos de ellos fabricados en China, que se venden a compradores de Brasil y Argentina además del mercado local. Una parte de ese comercio funciona como reexportación: la mercadería entra a Paraguay y luego sale hacia países vecinos.',
            'Si su negocio apunta a ese mercado, tenga en cuenta que existen regímenes aduaneros específicos, con requisitos propios, y que las reglas de los países de destino también se aplican a sus clientes. Consulte con un despachante de aduana qué régimen corresponde a su operación antes de hacer el primer pedido.',
        ],
    ],
    [
        'h2'   => 'Recomendaciones para importadores',
        'body' => [
            'Resumiendo lo que conviene tener en cuenta al importar de China desde Paraguay:',
        ],
        'items' => [
            ['title' => 'Ruta completa', 'text' => 'Pida cotizaciones de flete hasta el destino final en Paraguay, con el tramo de tránsito incluido.'],
            ['title' => 'Visa con tiempo', 'text' => 'Si va a viajar, confirme dónde tramitar la visa y empiece meses antes.'],
            ['title' => 'Pagos verificados', 'text' => 'Pague en dólares a cuentas verificadas a nombre del proveedor.'],
            ['title' => 'Despachante desde el inicio', 'text' => 'Consulte la clasificación arancelaria y los requisitos antes de comprar.'],
            ['title' => 'Datos oficiales', 'text' => 'Para cifras de comercio, use fuentes como el BCP, la DNIT o UN Comtrade.'],
        ],
    ],
];

$faq = [
    ['q' => '¿Se puede importar de China si Paraguay no tiene relaciones con la RPC?', 'a' => 'Sí. Las relaciones diplomáticas no impiden el comercio privado; un importador paraguayo puede comprar a proveedores chinos cumpliendo las normas de importación de Paraguay.'],
    ['q' => '¿Hay embajada de China en Asunción?', 'a' => 'No hay embajada de la República Popular China en Asunción. Paraguay tiene relaciones con Taiwán, que sí tiene representación en el país.'],
    ['q' => '¿Por qué puerto llega un contenedor de China a Paraguay?', 'a' => 'Normalmente llega primero a un puerto de Brasil, Uruguay o Argentina y sigue por río o por tierra. Su forwarder le indica la ruta según el caso.'],
    ['q' => '¿En qué moneda se paga a los proveedores chinos?', 'a' => 'Lo más habitual es en dólares estadounidenses por transferencia internacional. Consulte con su banco comisiones y documentación requerida.'],
];

require ROOT_DIR . '/templates/article.php';
