<?php

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'errores-al-importar-de-china';

$sections = [
    [
        'h2'   => 'Los errores que más cuestan',
        'body' => [
            'Los errores más costosos al importar de China desde Paraguay casi nunca son de mala suerte: son decisiones que se toman antes de pagar. Comprar a un intermediario creyendo que es fábrica, no pedir muestras, elegir mal el Incoterm, no inspeccionar, clasificar mal la mercadería o declarar menos de lo pagado pueden convertir una buena oportunidad en una pérdida.',
            'A continuación repasamos los diez errores que más vemos, por qué ocurren y qué hacer para evitarlos. Sirve tanto para quien hace su primera importación como para quien ya importa y quiere ordenar el proceso.',
        ],
    ],
    [
        'h2'   => '1. Pagarle a una trading creyendo que es la fábrica',
        'body' => [
            'Muchos perfiles en Alibaba se presentan como fabricantes pero son empresas comerciales (trading companies) que compran a una fábrica y revenden. No es ilegal ni siempre es malo, pero usted paga un margen adicional y pierde control sobre la calidad y los plazos.',
            'Pida la licencia comercial (business license) y verifique el alcance de actividades (le explicamos cómo en [proveedores chinos confiables](/importar/proveedores-chinos-confiables/)), solicite fotos o video de la línea de producción y pregunte cuántos operarios y máquinas tiene. Si el proveedor ofrece productos de categorías muy distintas, probablemente no fabrica todo lo que vende.',
        ],
    ],
    [
        'h2'   => '2. No pedir muestras',
        'body' => [
            'Las fotos del catálogo muestran el mejor producto posible. La muestra le muestra el producto real: material, terminación, embalaje y etiquetado. Pagar una muestra y su envío cuesta poco comparado con recibir un contenedor que no puede vender.',
            'Guarde la muestra aprobada y úsela como referencia en el contrato y en la inspección. Si el proveedor se niega a enviar muestras, considérelo una señal de alerta.',
        ],
    ],
    [
        'h2'   => '3. Elegir el Incoterm equivocado',
        'body' => [
            'El Incoterm define hasta dónde se encarga el proveedor y desde dónde empieza su responsabilidad. Un precio EXW parece más barato que uno FOB, pero con EXW usted debe organizar el retiro en fábrica, el transporte interno en China y el despacho de exportación, lo que suma costos y trámites.',
            'Para Paraguay, lo habitual es comprar FOB en un puerto chino y contratar el flete internacional con un forwarder de confianza. Antes de comparar cotizaciones, asegúrese de que todas usan el mismo Incoterm y el mismo puerto.',
        ],
    ],
    [
        'h2'   => '4. No inspeccionar antes del embarque',
        'body' => [
            'Una vez que la mercadería sale de China, reclamar es difícil y lento. Una inspección antes del embarque verifica cantidades, medidas, funcionamiento, embalaje y etiquetado contra la muestra aprobada, mientras todavía queda un saldo por pagar al proveedor.',
            'Negocie la forma de pago de modo que el saldo se pague después de la [inspección de calidad](/servicios/inspeccion-de-calidad/). Así el proveedor tiene un motivo concreto para corregir los defectos.',
        ],
    ],
    [
        'h2'   => '5. Clasificar mal la mercadería (NCM)',
        'body' => [
            'Cada producto tiene una posición arancelaria en la [Nomenclatura Común del Mercosur (NCM)](/aduana/ncm-nomenclatura-mercosur/), y de ella dependen los tributos, las licencias previas y los registros que exige cada organismo. Una clasificación incorrecta puede significar pagar de más, pagar de menos y ser observado, o descubrir en la aduana que el producto necesitaba un permiso que usted no tramitó.',
            'Consulte la clasificación con su [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/) antes de comprar, no cuando la carga ya está en camino. El despachante le confirma la alícuota y los requisitos según la posición arancelaria.',
        ],
    ],
    [
        'h2'   => '6. Subfacturar o declarar menos de lo pagado',
        'body' => [
            'Algunos proveedores ofrecen emitir una factura por un valor menor "para que pague menos impuestos". Declarar un valor inferior al real es una infracción aduanera y la aduana cuenta con herramientas para controlar valores. El Código Aduanero (Ley 2422/2004) prevé sanciones para estas infracciones; según la gravedad del caso, usted se expone a la retención de la mercadería, a multas y a otras consecuencias como importador.',
            'Declare siempre el valor real, con factura, comprobante de pago y documentos coherentes entre sí. Su despachante le explica las consecuencias concretas según la normativa aduanera vigente, y en [tributos aduaneros en Paraguay](/aduana/tributos-aduaneros-paraguay/) verá cómo se calcula lo que corresponde pagar.',
        ],
    ],
    [
        'h2'   => '7. Importar productos con marcas falsificadas',
        'body' => [
            'Zapatillas, ropa, relojes, auriculares o accesorios con marcas conocidas a precios muy bajos suelen ser falsificaciones. Importarlos puede terminar en la retención de la carga por infracción a derechos de propiedad intelectual y en la pérdida total de lo pagado.',
            'Si quiere vender productos con marca, cómprelos a distribuidores autorizados. Si importa de fábricas chinas, trabaje con productos genéricos o con su propia marca registrada.',
        ],
    ],
    [
        'h2'   => '8. Ignorar el peso volumétrico',
        'body' => [
            'En flete aéreo y courier, lo que se cobra es el mayor entre el peso real y el peso volumétrico, que se calcula con las medidas de la caja. Productos livianos pero voluminosos, como almohadas, juguetes de plástico o lámparas, pueden costar varias veces más de lo que usted calculó con la balanza.',
            'Pida al proveedor las medidas y el peso de cada caja maestra antes de cerrar la compra y calcule el volumen. A partir de cierto volumen, el flete marítimo en contenedor compartido desde China suele convenir más que el aéreo.',
        ],
    ],
    [
        'h2'   => '9. Viajar sin seguro de carga',
        'body' => [
            'El flete no incluye automáticamente un seguro que cubra el valor de la mercadería. Si la carga se daña, se moja o se pierde, la responsabilidad del transportista suele estar limitada y puede no cubrir lo que usted pagó.',
            'Pida a su forwarder la cotización de un seguro de carga y lea qué cubre, con qué deducible y cómo se hace el reclamo. Es un costo pequeño frente al valor de un embarque.',
        ],
    ],
    [
        'h2'   => '10. Trabajar sin una cotización escrita',
        'body' => [
            'Acordar precios, plazos o condiciones por mensajes sueltos de WeChat o WhatsApp deja espacio para malentendidos. Cuando surge un problema, no hay un documento claro al que remitirse.',
            'Pida una proforma (proforma invoice) con descripción exacta del producto, cantidades, precio unitario, Incoterm, puerto, plazo de producción, forma de pago y especificaciones de embalaje. Lo mismo vale para el flete y el despacho: cotización escrita, con cada cargo detallado.',
        ],
    ],
    [
        'h2'   => 'Una lista de control para su próxima importación',
        'body' => [
            'Antes de transferir el anticipo, confirme estos puntos:',
        ],
        'items' => [
            ['title' => 'Proveedor', 'text' => 'Licencia comercial verificada y evidencia de que fabrica el producto.'],
            ['title' => 'Producto', 'text' => 'Muestra aprobada, NCM confirmada por el despachante y sin marcas de terceros.'],
            ['title' => 'Condiciones', 'text' => 'Proforma escrita con Incoterm, puerto, plazos y forma de pago con saldo después de la inspección.'],
            ['title' => 'Logística', 'text' => 'Medidas y peso de las cajas, cotización de flete escrita y seguro de carga.'],
            ['title' => 'Aduana', 'text' => 'Documentos coherentes con el valor real pagado.'],
        ],
    ],
];

$faq = [
    ['q' => '¿Cómo sé si un proveedor chino es fábrica o trading?', 'a' => 'Pida la licencia comercial y revise su alcance de actividades, solicite un video de la línea de producción y desconfíe si ofrece productos de categorías sin relación entre sí.'],
    ['q' => '¿Qué Incoterm conviene para importar a Paraguay?', 'a' => 'FOB en un puerto chino es lo más común, porque el proveedor se encarga de la exportación y usted controla el flete internacional con su forwarder. El proceso completo está en [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).'],
    ['q' => '¿Es legal pedir una factura por menos valor?', 'a' => 'No. Declarar menos de lo pagado es una infracción aduanera sancionada por el Código Aduanero, que puede terminar en la retención de la mercadería y en multas.'],
    ['q' => '¿Cuándo conviene una inspección de calidad?', 'a' => 'En cualquier pedido cuyo valor haría daño perder, y sobre todo en la primera compra con un proveedor nuevo. Se hace antes de pagar el saldo.'],
];

$toolLink = [
    [
        'path'  => '/herramientas/calculadora-costo-importacion/',
        'label' => 'Calcule el costo de su importación',
        'text'  => 'Sume mercadería, flete, seguro y gastos para ver el costo puesto en Paraguay antes de comprar.',
    ],
    [
        'path'  => '/herramientas/calculadora-cbm-contenedor/',
        'label' => 'Calcule el volumen de su carga',
        'text'  => 'Con las medidas de las cajas, estime los metros cúbicos y compare aéreo con marítimo.',
    ],
];

require ROOT_DIR . '/templates/article.php';
