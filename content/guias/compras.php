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

/* Cluster file loaded by content/guias.php. Cluster: compras. */

declare(strict_types=1);

return [

    'temu-paraguay' => [
        'path' => '/comprar/temu-paraguay/',
        'title' => 'Temu en Paraguay: cómo comprar y cuánto se paga',
        'navLabel' => 'Temu en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Temu en Paraguay: envío, plazos y costos',
        'metaDescription' => 'Cómo comprar en Temu desde Paraguay: si envía directo o por casilla, cuánto demora, qué se paga al recibir y cómo evitar demoras en aduana.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Temu en Paraguay: cómo comprar y cuánto se paga',
            'lead' => 'Se puede comprar en Temu desde Paraguay, pero conviene saber cómo llega el pedido. En abril de 2026 medios locales informaron que Temu suspendió los envíos directos al país tras meses de demoras en la entrega, así que hoy el camino más previsible es enviar el pedido a una casilla de courier. Lo que paga al final es el precio del carrito, más el envío, más el flete del courier y los tributos que correspondan al ingresar el paquete.',
        ],
        'intro' => [
            'Temu en Paraguay se puede usar de dos maneras. La primera es el envío directo: usted carga su dirección paraguaya y el paquete llega por el operador que Temu tenga contratado para el país, siempre que la aplicación le ofrezca esa opción al pagar. La segunda es enviar el pedido a una [casilla de courier en Paraguay](/comprar/casillas-courier-paraguay/) con dirección en China o en Estados Unidos, y que el courier lo traiga y se lo entregue.',
            'El envío directo tuvo problemas. El Correo Paraguayo fue anunciado como operador de última milla de Temu en el país, pero entre fines de 2025 y marzo de 2026 se acumularon reclamos por paquetes demorados, y en abril de 2026 medios locales informaron que Temu dejó de enviar a Paraguay; según el propio correo, los pedidos afectados fueron reembolsados. Antes de comprar, fíjese si la pantalla de pago le ofrece entrega a una dirección paraguaya. Si no aparece, o si prefiere un único responsable del transporte, use una casilla.',
            'Esta guía es para quien compra para uso personal y quiere saber qué se paga, cuánto puede demorar y qué hacer si el paquete queda retenido. Si piensa revender, lea también la guía [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/), porque las compras de cantidades comerciales no se tratan igual en aduana.',
        ],
        'steps' => [
            [
                'title' => 'Cree la cuenta y verifique su dirección',
                'body' => [
                    'Descargue la aplicación o entre al sitio oficial de Temu y cree la cuenta. Si usa casilla, cargue como dirección de envío la que le dio el courier, con su número de casilla. Si la aplicación le ofrece entrega en Paraguay, cargue la dirección completa con ciudad, barrio, referencias y un número de celular activo, porque quien entrega suele contactar por teléfono o WhatsApp.',
                    'Use el mismo nombre que figura en su cédula. Si el paquete necesita algún trámite en aduana o en el correo, le pedirán documento y el nombre debe coincidir.',
                ],
            ],
            [
                'title' => 'Arme el carrito pensando en peso y cantidad',
                'body' => [
                    'Temu muestra precios bajos por unidad, pero el costo real depende de cómo llega el paquete. Evite comprar muchas unidades iguales del mismo artículo: una cantidad que parece comercial puede hacer que la aduana trate el envío fuera del régimen simplificado de compras personales.',
                    'Revise la ficha de cada producto: medidas, material, voltaje en aparatos eléctricos y tipo de enchufe. Paraguay usa 220 V, así que un aparato solo para 110 V necesita un transformador.',
                ],
            ],
            [
                'title' => 'Compare envío directo contra casilla',
                'body' => [
                    'Si la pantalla de pago le ofrece envío a su dirección en Paraguay, anote el costo y la fecha estimada. Luego calcule lo que costaría enviar el mismo pedido a una casilla: el [courier de China a Paraguay](/comprar/courier-china-paraguay/) cobra por kilo (o por peso volumétrico) y le entrega el paquete en su oficina o a domicilio.',
                    'Si el envío directo no aparece, la casilla es la opción. Aun cuando aparezca, la casilla permite consolidar varios pedidos y tener un solo interlocutor si algo se demora.',
                ],
            ],
            [
                'title' => 'Pague con un medio que le permita reclamar',
                'body' => [
                    'En general se paga con tarjeta de crédito o débito internacional; la aplicación muestra los medios disponibles al momento de pagar. Antes de pagar, consulte con su banco si la tarjeta está habilitada para compras en el exterior y qué recargo aplica por operación en moneda extranjera.',
                    'Pagar dentro de la plataforma es lo que le da acceso a la política de reembolsos de Temu. No acepte pagar por fuera de la aplicación a nadie que diga ser vendedor de Temu.',
                ],
            ],
            [
                'title' => 'Siga el pedido y guarde la factura',
                'body' => [
                    'Desde la sección de pedidos puede ver el número de seguimiento. Guarde una captura del detalle del pedido con el valor pagado: si la aduana o el courier le piden el valor de la compra, ese comprobante es lo que presenta.',
                    'Si el seguimiento se detiene muchos días en el mismo estado, no es necesariamente una pérdida: puede estar esperando vuelo, clasificación o control aduanero.',
                ],
            ],
            [
                'title' => 'Reciba el paquete y pague los cargos que correspondan',
                'body' => [
                    'Si llega por envío directo, el operador de última milla lo entrega en su dirección o le avisa para retirarlo. Si llega por casilla, el courier le informa el peso, el flete y los tributos antes de entregarlo.',
                    'Controle el paquete al recibirlo. Si falta algo o llegó dañado, saque fotos y abra el reclamo en la aplicación dentro del plazo que fija la política de Temu.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Temu en Paraguay: envío directo o casilla de courier',
            'head' => ['Aspecto', 'Envío directo de Temu', 'Casilla de courier'],
            'rows' => [
                ['Dónde se carga la dirección', 'Su dirección en Paraguay', 'La dirección de la casilla en China o EE. UU.'],
                ['Disponibilidad', 'Suspendido según medios locales (abril de 2026); verifique al pagar', 'Disponible con cualquier courier que tenga casilla'],
                ['Costo de envío', 'El que muestra Temu al pagar', 'Tarifa del courier por kilo o peso volumétrico'],
                ['Plazo', 'Fecha estimada de Temu para su dirección', 'Tránsito a la casilla más el tránsito del courier'],
                ['Tributos al ingresar', 'Según el régimen que aplique al paquete', 'El courier los calcula y los cobra antes de entregar'],
                ['A quién reclamar', 'A Temu y al operador de entrega', 'A Temu por el producto y al courier por el transporte'],
                ['Conviene para', 'Pedidos chicos, si la opción aparece al pagar', 'Cualquier pedido, sobre todo varios juntos o voluminosos'],
            ],
            'note' => 'Los plazos y costos cambian según la dirección y el carrito. Confírmelos siempre en la pantalla de pago de Temu y en la tarifa vigente del courier.',
        ],
        'sections' => [
            [
                'h2' => 'Qué hacer si el paquete queda retenido en aduana',
                'body' => [
                    'Un paquete puede quedar retenido por varios motivos: falta de factura o valor declarado, sospecha de subvaluación, mercadería que necesita permiso previo o una cantidad que parece comercial. En esos casos le van a pedir datos o documentos antes de liberar el envío.',
                    'Si llegó por casilla, el courier le dice qué falta y lo gestiona con usted. Si llegó por envío directo, siga las instrucciones del aviso que reciba y tenga a mano cédula y comprobante de compra. Si la aduana exige un despacho formal, ese trámite lo hace un [despachante de aduana matriculado](/aduana/despachantes-de-aduana-paraguay/).',
                ],
                'items' => [
                    ['title' => 'Productos que suelen generar demoras', 'text' => 'Medicamentos y suplementos, alimentos, cosméticos en cantidad, equipos con radio o antena, baterías sueltas y réplicas de armas.'],
                    ['title' => 'Cantidades comerciales', 'text' => 'Muchas unidades del mismo artículo pueden sacar el envío del régimen de compras personales.'],
                    ['title' => 'Valor que no coincide', 'text' => 'Si el valor declarado no coincide con lo pagado, la aduana puede pedir la factura o valorar la mercadería.'],
                ],
            ],
            [
                'h2' => 'Cuánto se paga de más sobre el precio de Temu',
                'body' => [
                    'Al precio del carrito se pueden sumar tres cosas: el envío (si no es gratis), los tributos que correspondan al ingresar a Paraguay y, si usa casilla, el flete del courier. El recargo del banco por compra en el exterior es un cuarto costo que muchos olvidan.',
                    'La forma de calcular los tributos, los montos exentos y los topes de valor los fija la DNIT y pueden cambiar. Consulte el monto vigente en el portal de la DNIT o con su courier antes de comprar (le explicamos el mecanismo en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/)), y use la [calculadora de compras online](/herramientas/calculadora-compras-online/) para sumar todos los componentes.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Temu envía directo a Paraguay?', 'a' => 'No de forma confiable en este momento. En abril de 2026 medios locales informaron que Temu suspendió los envíos directos a Paraguay tras demoras en la entrega de última milla, y el Correo Paraguayo indicó que los pedidos afectados fueron reembolsados. Revise si la pantalla de pago ofrece entrega a Paraguay; si no, use una casilla de courier.'],
            ['q' => '¿Cuánto tarda un pedido de Temu en llegar a Paraguay?', 'a' => 'Depende del método de envío. Con casilla, sume la fecha estimada de entrega en la casilla que muestra Temu y el tránsito que le informe el courier por escrito.'],
            ['q' => '¿Hay que pagar impuestos por compras en Temu?', 'a' => 'Puede corresponder pagar tributos al ingresar el paquete, según su valor y el régimen que aplique. Los montos y topes vigentes se consultan en la DNIT o con el courier.'],
            ['q' => '¿Dónde retiro mi paquete de Temu?', 'a' => 'Si llegó por envío directo, el operador de entrega lo lleva a su dirección o le indica dónde retirarlo. Si usó casilla, lo retira en la oficina del courier o pide entrega a domicilio.'],
            ['q' => '¿Qué hago si mi pedido de Temu no llega?', 'a' => 'Revise el seguimiento y, si el plazo estimado ya pasó, abra un reclamo dentro de la aplicación. Guarde capturas del pedido y de la conversación con soporte.'],
            ['q' => '¿Puedo comprar en Temu para revender?', 'a' => 'Puede, pero una cantidad comercial puede quedar fuera del régimen de compras personales y requerir despacho formal. Para revender, conviene planificarlo como una importación.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Calcular el costo final de mi pedido',
            'text' => 'Sume precio, envío, flete del courier y tributos estimados para saber cuánto le cuesta el pedido de Temu puesto en Paraguay.',
        ],
        'related' => ['casillas-courier-paraguay', 'impuestos-compras-online-paraguay', 'shein-paraguay'],
        'affiliates' => ['temu'],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/compras-online-entrega-asuncion', 'widths' => [640, 1280, 1920], 'alt' => 'Una mujer recibe en la puerta de su casa en Asunción varios paquetes de una compra online', 'width' => 1920, 'height' => 1086],
    ],

    'shein-paraguay' => [
        'path' => '/comprar/shein-paraguay/',
        'title' => 'Shein en Paraguay: envíos, talles y costos',
        'navLabel' => 'Shein en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Shein en Paraguay: envíos y costos',
        'metaDescription' => 'Shein en Paraguay: cómo llega el pedido, cuánto tarda, qué costos se suman al precio y cómo elegir talle sin tener que devolver.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Shein en Paraguay: envíos, talles y costos',
            'lead' => 'Para comprar en Shein desde Paraguay tiene dos caminos: el envío que Shein ofrezca a su dirección, si al pagar le aparece disponible, o una casilla de courier en Estados Unidos o China. En los dos casos el costo final es el precio de la ropa más el envío, el flete del courier si lo usa y los tributos que correspondan al entrar al país.',
        ],
        'intro' => [
            'Shein en Paraguay es una de las tiendas más buscadas para ropa, calzado y accesorios. La pregunta práctica no es si se puede comprar, sino cómo llega el pedido. Lo primero es entrar al sitio o la aplicación, elegir Paraguay como país de envío y ver qué opciones y plazos le muestra la pantalla de pago. Si el envío directo no aparece, o el plazo no le sirve, la alternativa habitual es enviar el pedido a una [casilla de courier en Paraguay](/comprar/casillas-courier-paraguay/).',
            'La segunda pregunta es el talle. Una devolución desde Paraguay a Shein suele ser lenta y, si usó casilla, el flete de ida ya está pagado y no se recupera. Por eso vale la pena medir antes de comprar, y esta guía le explica cómo.',
            'Aquí encontrará los pasos para comprar, cómo elegir entre envío directo y casilla, qué costos se suman al precio de la etiqueta, cómo acertar con el talle y qué hacer si el paquete queda retenido.',
        ],
        'steps' => [
            [
                'title' => 'Entre al sitio oficial y elija Paraguay',
                'body' => [
                    'Use la aplicación o el sitio oficial de Shein y configure Paraguay como país. Los precios, promociones y métodos de envío cambian según el país elegido, así que compare siempre con Paraguay seleccionado.',
                    'Desconfíe de perfiles de redes que venden "Shein al por mayor" con pago por transferencia: eso no es Shein, es un revendedor.',
                ],
            ],
            [
                'title' => 'Mida antes de elegir el talle',
                'body' => [
                    'Cada prenda de Shein tiene su propia guía de talles con medidas en centímetros. No elija por la letra (S, M, L): mida busto, cintura y cadera con una cinta métrica y compare con la tabla de esa prenda en particular.',
                    'Lea también las medidas del producto (largo, ancho de hombros, largo de manga) y compare con una prenda suya que le quede bien. Las reseñas con fotos y datos de altura y peso de otras compradoras ayudan a saber si la prenda talla chico o grande.',
                ],
            ],
            [
                'title' => 'Decida entre envío directo y casilla',
                'body' => [
                    'Si la pantalla de pago le ofrece envío a su dirección en Paraguay, anote el costo y la fecha estimada. No dé por hecho que la opción existe: muchos compradores paraguayos usan casilla porque el envío directo no aparece o es muy lento. Compare con el costo de mandar el pedido a una casilla: el courier cobra por kilo o por peso volumétrico y le entrega en su oficina o en su domicilio.',
                    'La ropa pesa poco, pero algunos artículos (carteras rígidas, calzado en caja, artículos para el hogar) ocupan volumen. En esos casos el courier puede cobrar por peso volumétrico y conviene saberlo antes.',
                ],
            ],
            [
                'title' => 'Cargue la dirección correctamente',
                'body' => [
                    'Para envío directo, cargue su dirección completa y un celular activo. Para casilla, copie exactamente la dirección que le dio el courier e incluya su número de casilla en el campo que el courier indique; sin ese número el paquete puede quedar sin identificar en el depósito.',
                ],
            ],
            [
                'title' => 'Pague y guarde el comprobante',
                'body' => [
                    'Shein acepta tarjetas internacionales y otros medios que se muestran según el país. Consulte con su banco si la tarjeta está habilitada para compras en el exterior y qué recargo cobra.',
                    'Guarde el detalle del pedido con el valor pagado. Si el courier o la aduana piden la factura, es lo que presenta.',
                ],
            ],
            [
                'title' => 'Reciba, controle y reclame a tiempo',
                'body' => [
                    'Cuando el paquete llegue, revise que estén todas las prendas y que coincidan en talle y color. Si algo falta o no corresponde, saque fotos y abra el reclamo en la aplicación dentro del plazo de la política de devoluciones de Shein.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué medir para elegir talle en Shein',
            'head' => ['Tipo de prenda', 'Medidas clave', 'Consejo práctico'],
            'rows' => [
                ['Remeras y blusas', 'Busto y largo total', 'Compare con una remera suya medida en plano'],
                ['Vestidos', 'Busto, cintura, cadera y largo', 'Fíjese si la tela tiene elasticidad en la ficha'],
                ['Pantalones y jeans', 'Cintura, cadera y largo de entrepierna', 'La letra no alcanza: use los centímetros'],
                ['Calzado', 'Largo del pie en centímetros', 'Mida el pie al final del día y sume holgura'],
                ['Ropa de niños', 'Altura y edad', 'Elija por altura, no solo por edad'],
            ],
            'note' => 'Cada prenda tiene su propia tabla. Dos prendas del mismo talle pueden medir distinto.',
        ],
        'sections' => [
            [
                'h2' => 'Cuánto se paga de más sobre el precio de Shein',
                'body' => [
                    'El precio de la etiqueta no es el costo final. Se pueden sumar el envío de Shein (si no alcanza el monto para envío gratis), el flete del courier si usa casilla, los tributos que correspondan al ingresar a Paraguay y el recargo del banco por compra en el exterior.',
                    'Los montos exentos, los topes de valor y las alícuotas los fija la DNIT y pueden cambiar. Consulte el valor vigente en el portal de la DNIT o pídale a su courier una estimación antes de comprar; el mecanismo está explicado en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/) y puede sumar todo con la [calculadora de compras online](/herramientas/calculadora-compras-online/).',
                ],
            ],
            [
                'h2' => 'Si el paquete queda retenido',
                'body' => [
                    'Los paquetes de ropa rara vez tienen restricciones, pero pueden retenerse si el valor declarado no coincide con lo pagado o si hay muchas unidades iguales. Tenga a mano el comprobante del pedido y su cédula. Si usó casilla, el courier le indica qué documento falta.',
                    'Si compra para revender, planifíquelo como importación: una cantidad comercial puede requerir despacho formal con [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/). Si duda entre plataformas, vea nuestra [comparación de Temu, Shein y AliExpress](/blog/temu-shein-aliexpress-paraguay-comparacion/).',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Shein envía a Paraguay?', 'a' => 'Elija Paraguay como país en el sitio o la aplicación y revise las opciones de envío en la pantalla de pago. Si no aparece envío directo o el plazo no le sirve, puede usar una [casilla de courier](/comprar/casillas-courier-paraguay/).'],
            ['q' => '¿Cuánto tarda Shein en llegar a Paraguay?', 'a' => 'Depende del método de envío. Tome como referencia la fecha estimada que Shein muestra al pagar y, si usa casilla, sume el tránsito del courier.'],
            ['q' => '¿Cómo sé mi talle en Shein?', 'a' => 'Mida busto, cintura y cadera en centímetros y compárelos con la tabla de talles de esa prenda en particular. Las reseñas con fotos ayudan a saber si talla chico o grande.'],
            ['q' => '¿Se pagan impuestos por compras en Shein?', 'a' => 'Puede corresponder pagar tributos al ingresar el paquete. Los montos y topes vigentes se consultan en la DNIT o con el courier.'],
            ['q' => '¿Puedo devolver ropa de Shein desde Paraguay?', 'a' => 'La política de devoluciones vigente en el centro de ayuda de Shein define plazos y condiciones; léala antes de comprar. Desde Paraguay la devolución suele ser lenta y el flete de ida no se recupera, por eso conviene acertar con el talle.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Calcular el costo de mi pedido de Shein',
            'text' => 'Sume precio, envío, flete del courier y tributos estimados antes de confirmar la compra.',
        ],
        'related' => ['temu-paraguay', 'casillas-courier-paraguay', 'impuestos-compras-online-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/compra-online-desempaque-paraguay', 'widths' => [640, 1280], 'alt' => 'Persona abre en la mesa de su cocina un paquete de una compra online y sostiene una prenda', 'width' => 1280, 'height' => 716],
    ],

    'aliexpress-paraguay' => [
        'path' => '/comprar/aliexpress-paraguay/',
        'title' => 'AliExpress en Paraguay: cómo comprar sin sorpresas',
        'navLabel' => 'AliExpress en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'AliExpress en Paraguay: guía de compra',
        'metaDescription' => 'Comprar en AliExpress desde Paraguay: opciones de envío, casilla o entrega directa, plazos, vendedores confiables y costos al recibir.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'AliExpress en Paraguay: cómo comprar sin sorpresas',
            'lead' => 'En AliExpress se puede comprar desde Paraguay con envío a su dirección o a una casilla de courier; el método y el plazo los define cada vendedor y se ven en la ficha del producto. El costo final es el precio, más el envío, más el flete del courier si lo usa, más los tributos que correspondan al ingresar.',
        ],
        'intro' => [
            'AliExpress en Paraguay es una buena opción para repuestos pequeños, electrónica menor, herramientas y accesorios que no se consiguen en el mercado local. A diferencia de [Temu en Paraguay](/comprar/temu-paraguay/) o Shein, en AliExpress cada vendedor es una tienda distinta: el precio, el método de envío, el plazo y la calidad dependen de ese vendedor, no de la plataforma.',
            'Por eso la clave es leer la ficha del producto con Paraguay seleccionado como destino. Ahí aparece si el vendedor envía a Paraguay, con qué método, cuánto cuesta y la fecha estimada. Si no envía, o el plazo es demasiado largo, puede mandar el pedido a una casilla de [courier de China a Paraguay](/comprar/courier-china-paraguay/) o de Estados Unidos.',
            'Esta guía le muestra cómo elegir vendedor, cómo comparar envío directo con casilla, cómo pagar con protección y qué hacer si el paquete no llega o queda retenido.',
        ],
        'steps' => [
            [
                'title' => 'Configure Paraguay como destino',
                'body' => [
                    'En la parte superior del sitio o en la aplicación, elija Paraguay como país de envío. Así cada ficha le muestra los métodos disponibles y el costo real hasta su dirección.',
                ],
            ],
            [
                'title' => 'Evalúe al vendedor, no solo el producto',
                'body' => [
                    'Mire la antigüedad de la tienda, el porcentaje de valoraciones positivas, la cantidad de ventas del artículo y las reseñas con fotos. Una tienda nueva con precio muy por debajo del resto es una señal de alerta.',
                    'En productos electrónicos, lea las preguntas de otros compradores: suelen aclarar compatibilidad, voltaje y si el artículo es original o genérico.',
                ],
            ],
            [
                'title' => 'Compare los métodos de envío del vendedor',
                'body' => [
                    'Un mismo producto puede tener varios métodos: uno económico y lento, otro con seguimiento completo y otro más rápido. Elija uno con seguimiento hasta Paraguay; sin seguimiento, un reclamo es mucho más difícil.',
                    'Si el vendedor no ofrece envío a Paraguay, calcule el costo de enviarlo a una casilla de courier y compare con comprar el mismo artículo en otra tienda que sí envíe.',
                ],
            ],
            [
                'title' => 'Pague dentro de AliExpress',
                'body' => [
                    'Pague siempre dentro de la plataforma, con tarjeta internacional u otro medio que le aparezca en el pago. La protección al comprador de AliExpress solo cubre pagos hechos dentro del sitio.',
                    'Nunca acepte pagar por transferencia o billetera externa a pedido del vendedor, aunque le ofrezca descuento.',
                ],
            ],
            [
                'title' => 'Siga el envío y confirme la recepción recién al recibir',
                'body' => [
                    'Desde "Mis pedidos" verá el número de seguimiento. No confirme la recepción antes de tener el paquete en la mano: al confirmar, el pago se libera al vendedor.',
                    'Si el plazo de protección que muestra el pedido está por vencer y el paquete no llegó, puede solicitar desde el pedido una extensión de la protección (el vendedor debe aceptarla) o abrir una disputa. Las condiciones vigentes están en la página de protección al comprador de AliExpress.',
                ],
            ],
            [
                'title' => 'Reciba y pague los cargos que correspondan',
                'body' => [
                    'Según el método de envío, el paquete llega a su dirección, a una oficina de correo o a la casilla del courier. En cualquiera de los casos pueden corresponder tributos al ingresar a Paraguay. Tenga a mano su cédula y el detalle del pedido.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'AliExpress en Paraguay: qué revisar antes de comprar',
            'head' => ['Qué revisar', 'Dónde se ve', 'Por qué importa'],
            'rows' => [
                ['Envío a Paraguay', 'Ficha del producto con Paraguay elegido', 'No todos los vendedores envían al país'],
                ['Método y seguimiento', 'Selector de envío en la ficha', 'Sin seguimiento es difícil reclamar'],
                ['Fecha estimada', 'Ficha y pantalla de pago', 'Define el plazo de protección'],
                ['Valoración del vendedor', 'Página de la tienda', 'La calidad depende de cada tienda'],
                ['Voltaje y enchufe', 'Descripción y preguntas', 'Paraguay usa 220 V'],
                ['Costo total', 'Pantalla de pago y tarifa del courier', 'Evita sorpresas al recibir'],
            ],
            'note' => 'Plazos y costos varían por vendedor y método. La referencia válida es lo que muestra AliExpress con Paraguay como destino.',
        ],
        'sections' => [
            [
                'h2' => 'Qué hacer si el paquete no llega o queda retenido',
                'body' => [
                    'Si el seguimiento no avanza, primero escriba al vendedor por el chat de AliExpress. Si no hay respuesta y el plazo de protección está por vencer, abra una disputa con capturas del seguimiento.',
                    'Si el paquete quedó retenido en aduana, suele ser por falta de factura, por mercadería que necesita permiso previo o por cantidad comercial. Si llegó por casilla, el courier le indica qué falta. Si la aduana exige despacho formal, lo hace un [despachante de aduana matriculado](/aduana/despachantes-de-aduana-paraguay/).',
                ],
                'items' => [
                    ['title' => 'Artículos con restricciones frecuentes', 'text' => 'Baterías sueltas, equipos con radio o antena, medicamentos, suplementos y productos para la salud.'],
                    ['title' => 'Marcas imitadas', 'text' => 'Los productos que copian marcas registradas pueden ser retenidos y usted pierde lo pagado.'],
                ],
            ],
            [
                'h2' => 'Cuánto se paga de más sobre el precio de AliExpress',
                'body' => [
                    'Al precio del producto se suman el envío del vendedor (si no es gratis), el flete del courier si usa casilla, los tributos que correspondan al ingresar a Paraguay y el recargo de su banco por compra en moneda extranjera. Los montos exentos y las alícuotas los fija la DNIT; consulte el valor vigente en el portal de la DNIT o con su courier (vea [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/)), y use la [calculadora de compras online](/herramientas/calculadora-compras-online/) para sumar todo antes de pagar.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿AliExpress envía a Paraguay?', 'a' => 'Muchos vendedores envían a Paraguay. Con Paraguay elegido como destino, la ficha de cada producto le muestra si hay envío, con qué método y la fecha estimada.'],
            ['q' => '¿Cuánto tarda AliExpress en llegar a Paraguay?', 'a' => 'Depende del vendedor y del método de envío. Tome como referencia la fecha estimada de la ficha; si usa casilla, sume el tránsito del courier.'],
            ['q' => '¿Conviene comprar en AliExpress con casilla?', 'a' => 'Conviene cuando el vendedor no envía a Paraguay, cuando junta varios pedidos o cuando quiere un solo responsable del transporte. Para un artículo chico con envío directo con seguimiento, la casilla suele no hacer falta.'],
            ['q' => '¿Qué pasa si no me llega un pedido de AliExpress?', 'a' => 'Puede abrir una disputa dentro del plazo de protección del comprador. No confirme la recepción antes de tener el paquete.'],
            ['q' => '¿Pago impuestos por compras en AliExpress?', 'a' => 'Puede corresponder pagar tributos al ingresar el paquete, según su valor y el régimen aplicable. Consulte los montos vigentes en la DNIT o con su courier.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Calcular el costo de mi compra en AliExpress',
            'text' => 'Sume precio, envío, flete del courier y tributos estimados para comparar con el precio en Paraguay.',
        ],
        'related' => ['courier-china-paraguay', 'impuestos-compras-online-paraguay', 'alibaba-paraguay'],
        'affiliates' => ['aliexpress'],
        'disclaimer' => false,
        'image' => null,
    ],

    'alibaba-paraguay' => [
        'path' => '/comprar/alibaba-paraguay/',
        'title' => 'Alibaba en Paraguay: cómo comprar al por mayor',
        'navLabel' => 'Alibaba en Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Alibaba en Paraguay: cómo comprar',
        'metaDescription' => 'Alibaba desde Paraguay: diferencia con AliExpress, cómo elegir proveedor, pedir muestras, pagar seguro y traer el pedido hasta Asunción.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Alibaba en Paraguay: cómo comprar al por mayor',
            'lead' => 'Comprar en Alibaba desde Paraguay es posible, pero no es como comprar en una tienda: usted negocia con fábricas y mayoristas chinos, con cantidades mínimas, y el flete y el despacho aduanero se organizan aparte. Para pedidos chicos puede usar courier; para volumen comercial, es una importación con despachante.',
        ],
        'intro' => [
            'Alibaba en Paraguay se busca mucho, y la primera confusión es con AliExpress. Los dos son del mismo grupo, pero AliExpress vende por unidad con envío incluido, mientras que Alibaba.com es una plataforma para comprar al por mayor directamente a fábricas y distribuidores. En Alibaba el precio depende de la cantidad, cada proveedor fija un pedido mínimo (MOQ) y el precio publicado casi nunca incluye el envío hasta Paraguay.',
            'Para comprar en Alibaba desde Paraguay necesita tres cosas: un proveedor verificado y comparado con otros, una forma de pago con protección y una logística definida desde la fábrica hasta Asunción, incluido el despacho aduanero si el pedido es comercial.',
            'Esta guía es para emprendedores y comercios que dan el primer paso en compras mayoristas. Al final le explicamos cuándo su compra ya es una importación y qué cambia.',
        ],
        'steps' => [
            [
                'title' => 'Defina producto, cantidad y precio objetivo',
                'body' => [
                    'Antes de escribir a proveedores, defina qué quiere exactamente: material, medidas, colores, embalaje, cantidad y a qué precio necesita venderlo en Paraguay para que le quede margen. Sin eso, cada proveedor le cotiza algo distinto y no puede comparar.',
                ],
            ],
            [
                'title' => 'Busque y filtre proveedores',
                'body' => [
                    'Use los filtros de Alibaba para proveedores verificados y con Trade Assurance. Nuestra guía de [proveedores chinos confiables](/importar/proveedores-chinos-confiables/) detalla cómo verificarlos. Revise años en la plataforma, tasa de respuesta, si es fábrica o empresa comercial y las fotos de la planta si las publica.',
                    'Pida cotización a tres a cinco proveedores con la misma especificación. Una diferencia de precio muy grande suele indicar otra calidad, otro material o un problema.',
                ],
            ],
            [
                'title' => 'Negocie condiciones por escrito',
                'body' => [
                    'Acuerde por el chat de Alibaba: precio por unidad según cantidad, pedido mínimo, plazo de producción, embalaje, Incoterm (por ejemplo EXW o FOB) y qué pasa si la mercadería llega con defectos. Lo que queda escrito en la plataforma sirve si luego tiene que reclamar.',
                ],
            ],
            [
                'title' => 'Pida muestras antes del pedido grande',
                'body' => [
                    'Pague una muestra y hágala enviar por courier a su casilla o a su dirección. La muestra le permite verificar calidad, medidas y embalaje antes de comprometer un monto mayor.',
                    'Guarde la muestra aprobada: es la referencia contra la que se compara la producción.',
                ],
            ],
            [
                'title' => 'Pague con protección',
                'body' => [
                    'Pague dentro de Alibaba con Trade Assurance cuando sea posible: según Alibaba, cubre el incumplimiento de la fecha de envío pactada y la calidad o cantidad que no coincide con lo acordado en el pedido, con plazos para reclamar que fija la plataforma. Solo protege pagos hechos dentro de Alibaba y sobre lo que quedó escrito en la orden. Si el proveedor pide transferencia bancaria internacional fuera de Alibaba, evalúe el riesgo y verifique que la cuenta esté a nombre de la empresa con la que firmó.',
                    'Para transferencias internacionales puede comparar el costo de su banco con servicios de pago internacionales; mire siempre el tipo de cambio aplicado y las comisiones. Más detalle en [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/).',
                ],
            ],
            [
                'title' => 'Controle la producción antes del embarque',
                'body' => [
                    'Para pedidos de cierto valor, conviene una [inspección de calidad en China](/servicios/inspeccion-de-calidad/) antes de pagar el saldo. Un inspector revisa cantidades, medidas y defectos contra la muestra aprobada y le envía un informe con fotos.',
                ],
            ],
            [
                'title' => 'Organice el envío y el despacho hasta Asunción',
                'body' => [
                    'Para cajas chicas, el proveedor puede enviar por courier a su casilla. Para volumen comercial, el flete es aéreo o marítimo con un agente de carga, y el ingreso al país requiere [despacho aduanero](/servicios/despacho-aduanero/) con despachante matriculado.',
                    'Pida cotizaciones de flete con el peso y el volumen reales de las cajas, que el proveedor le informa en la lista de empaque.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Alibaba y AliExpress: diferencias para quien compra desde Paraguay',
            'head' => ['Aspecto', 'AliExpress', 'Alibaba.com'],
            'rows' => [
                ['Para quién', 'Consumidor final', 'Comercios y empresas'],
                ['Cantidad', 'Desde una unidad', 'Pedido mínimo por proveedor'],
                ['Precio', 'Fijo, publicado', 'Negociable según cantidad'],
                ['Envío', 'Incluido o elegido en la ficha', 'Se organiza aparte (courier, aéreo o marítimo)'],
                ['Aduana', 'Régimen de compras personales si aplica', 'Importación con despacho formal si es comercial'],
                ['Protección', 'Protección al comprador', 'Trade Assurance si paga dentro de la plataforma'],
            ],
            'note' => null,
        ],
        'sections' => [
            [
                'h2' => 'Errores comunes al comprar en Alibaba desde Paraguay',
                'body' => [
                    'La mayoría de los problemas no vienen del proveedor sino de lo que no se acordó por escrito.',
                ],
                'items' => [
                    ['title' => 'Comparar precios sin la misma especificación', 'text' => 'Dos cotizaciones solo se comparan si el material, las medidas y el embalaje son iguales.'],
                    ['title' => 'Olvidar el flete y los tributos', 'text' => 'El precio FOB o EXW no incluye transporte, seguro, tributos ni honorarios del despachante.'],
                    ['title' => 'Saltarse la muestra', 'text' => 'Pedir producción sin muestra aprobada deja sin referencia cualquier reclamo.'],
                    ['title' => 'Pagar fuera de la plataforma', 'text' => 'Se pierde la protección de Trade Assurance.'],
                ],
            ],
            [
                'h2' => 'Cuando su compra en Alibaba ya es una importación',
                'body' => [
                    'Si compra para revender, en cantidad o por un valor que supera lo que admite el régimen de compras por courier, lo que está haciendo es importar. Eso implica figurar como importador ante la DNIT, contratar un despachante de aduana, clasificar la mercadería por su posición arancelaria y pagar los tributos de importación correspondientes.',
                    'Le explicamos el proceso completo, paso a paso, en la guía [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/). Si prefiere que alguien busque y verifique proveedores por usted en China, podemos conectarlo con un [agente de compras en China](/servicios/agente-de-compras-china/).',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Alibaba envía a Paraguay?', 'a' => 'Muchos proveedores envían a Paraguay, pero el envío no suele estar incluido en el precio. Se acuerda con cada proveedor o con un agente de carga, según el volumen.'],
            ['q' => '¿Cuál es la diferencia entre Alibaba y AliExpress?', 'a' => 'AliExpress vende por unidad al consumidor final con envío incluido. Alibaba es para comprar al por mayor, con pedido mínimo y precio negociable.'],
            ['q' => '¿Cuál es el pedido mínimo en Alibaba?', 'a' => 'Lo fija cada proveedor y aparece en la ficha como MOQ. Muchas veces se puede negociar, sobre todo para una primera compra o una muestra.'],
            ['q' => '¿Cómo pago a un proveedor de Alibaba desde Paraguay?', 'a' => 'Lo más seguro es pagar dentro de Alibaba con Trade Assurance. Si paga por transferencia internacional, verifique que la cuenta sea de la empresa con la que negoció.'],
            ['q' => '¿Necesito ser importador para comprar en Alibaba?', 'a' => 'Para una muestra o un pedido chico por courier, en general no. Para volumen comercial, sí: se requiere despacho formal con despachante de aduana.'],
            ['q' => '¿Puedo comprar en Alibaba en español?', 'a' => 'El sitio tiene versión en español, pero la negociación con proveedores suele ser en inglés o con traductor. Un agente de compras puede hacer de intermediario.'],
        ],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calcular el costo de importación',
            'text' => 'Estime cuánto le cuesta su pedido de Alibaba puesto en Paraguay: mercadería, flete, seguro, tributos y despacho.',
        ],
        'related' => ['como-importar-de-china-a-paraguay', '1688-en-espanol', 'proveedores-chinos-confiables'],
        'affiliates' => ['wise'],
        'disclaimer' => false,
        'image' => null,
    ],

    '1688-en-espanol' => [
        'path' => '/comprar/1688-en-espanol/',
        'title' => '1688 en español: cómo comprar en el mayorista chino',
        'navLabel' => '1688 en español',
        'cluster' => 'compras',
        'seoTitle' => '1688 en español: cómo comprar',
        'metaDescription' => 'Qué es 1688.com, por qué es más barato que Alibaba, cómo usarlo en español y por qué casi siempre necesita un agente en China.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => '1688 en español: cómo comprar en el mayorista chino',
            'lead' => '1688.com es la plataforma mayorista del Grupo Alibaba para el mercado interno de China: está en chino, los proveedores venden dentro de China y casi nunca envían al exterior. Se puede usar en español con un traductor del navegador, pero para comprar desde Paraguay casi siempre necesita un agente en China que pague, reciba y despache.',
        ],
        'intro' => [
            '1688 en español es una búsqueda frecuente de quienes ya compraron en Alibaba o AliExpress y descubrieron que los mismos productos aparecen más baratos en 1688. La razón es simple: 1688 es el mercado mayorista interno de China, donde fábricas y distribuidores venden a comerciantes chinos, sin la estructura orientada al comprador extranjero que tiene Alibaba.com.',
            'Esa ventaja de precio viene con obstáculos: el sitio está en chino, los pagos se hacen con medios de pago chinos, los proveedores envían solo a direcciones dentro de China y la atención es en mandarín. Por eso el camino habitual desde Paraguay es trabajar con un [agente de compras en China](/servicios/agente-de-compras-china/) o un almacén que haga de puente.',
            'Esta guía le explica cómo navegar 1688 en español, cómo evaluar proveedores, cómo funciona el esquema con agente y cuándo conviene frente a [Alibaba en Paraguay](/comprar/alibaba-paraguay/).',
        ],
        'steps' => [
            [
                'title' => 'Abra 1688 con traducción automática',
                'body' => [
                    'Entre a [1688.com](https://www.1688.com/) desde un navegador con traducción automática (por ejemplo, Chrome) y traduzca la página al español. La traducción no es perfecta, pero alcanza para navegar categorías, precios y fichas.',
                    'También puede buscar por imagen: subir la foto de un producto suele dar mejores resultados que escribir el nombre traducido.',
                ],
            ],
            [
                'title' => 'Entienda cómo se muestran los precios',
                'body' => [
                    'Los precios están en yuanes (CNY) y suelen tener escalones: un precio desde cierta cantidad y otro más bajo desde una cantidad mayor. Ese precio es puesto en el depósito del proveedor en China, sin flete internacional.',
                ],
            ],
            [
                'title' => 'Evalúe al proveedor',
                'body' => [
                    'Revise antigüedad de la tienda, calificaciones, volumen de ventas y si es fábrica o revendedor. Compare el mismo producto en varias tiendas: en 1688 es común que muchas vendan el mismo artículo con diferencias de calidad.',
                ],
            ],
            [
                'title' => 'Elija un agente o almacén en China',
                'body' => [
                    'El agente compra en su nombre con medios de pago chinos, recibe la mercadería en su almacén, la revisa, la consolida con otras compras y la despacha hacia Paraguay. Cobra una comisión o tarifa por servicio, que debe estar clara antes de empezar.',
                    'Pida al agente fotos de la mercadería al llegar al almacén. Es su primer control de calidad antes de que salga de China.',
                ],
            ],
            [
                'title' => 'Pague al agente con un medio trazable',
                'body' => [
                    'Al agente se le paga normalmente por transferencia internacional o por un servicio de pagos internacionales. Compare comisiones y tipo de cambio, y pida siempre comprobante; vea [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/).',
                ],
            ],
            [
                'title' => 'Defina el envío hacia Paraguay',
                'body' => [
                    'Para cantidades chicas, el agente puede enviar por [courier de China a Paraguay](/comprar/courier-china-paraguay/). Para volumen comercial, el envío es aéreo o marítimo con agente de carga (por ejemplo, en [contenedor compartido desde China](/importar/contenedor-compartido-desde-china/)) y requiere despacho aduanero en Paraguay con despachante matriculado.',
                ],
            ],
        ],
        'table' => [
            'caption' => '1688, Alibaba y AliExpress comparados',
            'head' => ['Aspecto', '1688.com', 'Alibaba.com', 'AliExpress'],
            'rows' => [
                ['Mercado', 'Interno de China', 'Exportación', 'Consumidor internacional'],
                ['Idioma', 'Chino', 'Inglés y otros', 'Español y otros'],
                ['Pago', 'Medios de pago chinos', 'Trade Assurance y transferencias', 'Tarjeta internacional'],
                ['Envío al exterior', 'En general no', 'Se acuerda con el proveedor', 'Sí, según vendedor'],
                ['Necesita agente', 'Casi siempre', 'Opcional', 'No'],
            ],
            'note' => null,
        ],
        'sections' => [
            [
                'h2' => 'Cuándo conviene 1688 y cuándo no',
                'body' => [
                    'Conviene cuando compra variedad de productos baratos en cantidades medianas (por ejemplo, surtido para una tienda) y el ahorro frente a Alibaba cubre la comisión del agente. No conviene para una sola unidad, ni para productos que necesitan certificaciones o fabricación a medida: ahí Alibaba o una negociación directa con fábrica suelen ser mejor camino.',
                    'Tenga en cuenta que en 1688 también hay imitaciones de marcas registradas. Ese tipo de mercadería puede ser retenida en aduana y usted pierde lo pagado.',
                ],
            ],
            [
                'h2' => 'Cómo elegir un agente de compras para 1688',
                'body' => [
                    'El agente es quien maneja su dinero y su mercadería en China, así que la elección pesa más que el precio de cualquier producto. Antes de enviar el primer pago, pida por escrito cómo cobra, qué controles hace y cómo responde si algo sale mal.',
                ],
                'items' => [
                    ['title' => 'Tarifa clara', 'text' => 'Comisión sobre la compra o tarifa fija, y qué cargos aparte existen (almacenaje, reempaque, fotos, inspección).'],
                    ['title' => 'Control al recibir', 'text' => 'Que envíe fotos y verifique cantidades y defectos visibles antes de despachar.'],
                    ['title' => 'Almacenaje y consolidación', 'text' => 'Cuánto tiempo guarda la mercadería sin costo y si junta compras de distintas tiendas en un solo envío.'],
                    ['title' => 'Comunicación en español', 'text' => 'Que pueda explicarle en español lo que dice el proveedor y lo que se acordó.'],
                    ['title' => 'Logística a Paraguay', 'text' => 'Con qué courier o agente de carga trabaja y si coordina con un despachante para envíos comerciales.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿1688 está en español?', 'a' => 'No, 1688 está en chino. Se puede navegar en español con la traducción automática del navegador y usando la búsqueda por imagen.'],
            ['q' => '¿1688 envía a Paraguay?', 'a' => 'En general no: los proveedores de 1688 venden dentro de China. Para traer la compra a Paraguay se usa un agente o almacén en China que reenvía.'],
            ['q' => '¿Por qué 1688 es más barato que Alibaba?', 'a' => 'Porque es el mercado mayorista interno de China, sin la estructura orientada a compradores extranjeros. El ahorro se reduce al sumar comisión del agente y flete.'],
            ['q' => '¿Cómo pago en 1688 desde Paraguay?', 'a' => 'Los pagos en 1688 se hacen con medios de pago chinos. Lo habitual es pagarle al agente por transferencia internacional y que el agente pague al proveedor.'],
            ['q' => '¿Qué hace un agente de compras en 1688?', 'a' => 'Compra en su nombre, recibe la mercadería, la revisa, la consolida y la envía a Paraguay. Algunos también negocian con el proveedor.'],
        ],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calcular el costo de importación',
            'text' => 'Sume mercadería, comisión del agente, flete y tributos para ver si 1688 le conviene frente a Alibaba.',
        ],
        'related' => ['alibaba-paraguay', 'pagar-a-proveedores-chinos', 'courier-china-paraguay'],
        'affiliates' => ['wise'],
        'disclaimer' => false,
        'image' => null,
    ],

    'courier-china-paraguay' => [
        'path' => '/comprar/courier-china-paraguay/',
        'title' => 'Courier de China a Paraguay: cómo funciona',
        'navLabel' => 'Courier China–Paraguay',
        'cluster' => 'compras',
        'seoTitle' => 'Courier de China a Paraguay',
        'metaDescription' => 'Cómo funciona el courier de China a Paraguay: casilla, precio por kilo, peso volumétrico, plazos y qué hacer si el paquete se demora.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Courier de China a Paraguay: cómo funciona',
            'lead' => 'Un courier de China a Paraguay le da una dirección (casilla) en China donde usted envía sus compras; el courier las recibe, las trae por vía aérea, hace el trámite aduanero simplificado y se las entrega cobrando flete por kilo más los tributos que correspondan.',
        ],
        'intro' => [
            'El courier de China a Paraguay resuelve un problema concreto: muchas tiendas y proveedores chinos no envían a Paraguay, o lo hacen con plazos largos y poco seguimiento. Con una casilla en China, el proveedor entrega en una dirección local china y el courier se ocupa del resto: transporte internacional, declaración ante la aduana paraguaya y entrega en Asunción o en su ciudad.',
            'El costo se calcula sobre el peso real o el peso volumétrico del paquete, el que sea mayor, a la tarifa por kilo del courier. El peso volumétrico es largo por ancho por alto (en centímetros) dividido por un factor que fija cada courier; en el transporte aéreo son habituales factores de 5.000 o 6.000, así que pídale el suyo por escrito. A eso se suman los tributos aduaneros si corresponden y, a veces, cargos por seguro, reempaque o entrega a domicilio.',
            'Esta guía explica el proceso paso a paso, cómo se calcula el peso volumétrico, qué cargos pueden aparecer y qué hacer si el paquete se demora.',
        ],
        'steps' => [
            [
                'title' => 'Abra una casilla en China',
                'body' => [
                    'Regístrese en un courier que tenga depósito en China y servicio a Paraguay (vea cómo comparar [casillas de courier en Paraguay](/comprar/casillas-courier-paraguay/)). Le asignan un número de casilla y una dirección en China (en chino y en letras latinas) que usted usa como dirección de envío en sus compras.',
                ],
            ],
            [
                'title' => 'Cargue bien la dirección en la tienda',
                'body' => [
                    'Copie la dirección exactamente como la da el courier e incluya su número de casilla donde se indique. Un paquete sin número de casilla puede quedar sin identificar en el depósito.',
                ],
            ],
            [
                'title' => 'Avise al courier qué va a llegar',
                'body' => [
                    'Muchos couriers piden que usted declare o prealerte el paquete con el número de seguimiento, la descripción y el valor, y que adjunte la factura. Esto agiliza el ingreso y la declaración ante la aduana.',
                ],
            ],
            [
                'title' => 'Consolide si tiene varias compras',
                'body' => [
                    'Si espera varios paquetes, pregunte si el courier puede juntarlos en uno. Consolidar reduce cajas vacías y a veces el peso volumétrico total. Consulte si cobra por el servicio de consolidación o reempaque.',
                ],
            ],
            [
                'title' => 'Siga el tránsito y la liberación',
                'body' => [
                    'El courier informa cuando el paquete sale de China, llega a Paraguay y queda liberado por aduana. El plazo lo fija cada courier según su frecuencia de vuelos; pídalo por escrito al contratar.',
                ],
            ],
            [
                'title' => 'Pague y retire',
                'body' => [
                    'Antes de entregar, el courier le informa el peso facturado, el flete, los tributos y otros cargos. Pague y retire en la oficina o pida entrega a domicilio. Revise el paquete al recibirlo.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué compone el costo de un envío por courier desde China',
            'head' => ['Componente', 'Cómo se calcula', 'Dónde confirmarlo'],
            'rows' => [
                ['Flete', 'Tarifa por kilo sobre el peso facturable', 'Tarifario del courier'],
                ['Peso facturable', 'El mayor entre peso real y peso volumétrico', 'El courier informa ambos pesos'],
                ['Peso volumétrico', 'Largo por ancho por alto dividido por un factor que fija cada courier', 'Condiciones del courier'],
                ['Tributos', 'Según el valor y el régimen aduanero que aplique', 'DNIT o el propio courier'],
                ['Seguro', 'Opcional o incluido, sobre el valor declarado', 'Condiciones del courier'],
                ['Otros cargos', 'Reempaque, consolidación, almacenaje, entrega a domicilio', 'Tarifario del courier'],
            ],
            'note' => 'No hay una tarifa única: compare el costo total de un mismo paquete entre couriers, no solo el precio por kilo.',
        ],
        'sections' => [
            [
                'h2' => 'Qué hacer si el paquete se demora',
                'body' => [
                    'Primero verifique en qué tramo está: si todavía no llegó al depósito en China, el problema es del vendedor; si ya llegó, el responsable del transporte es el courier. Pida al courier el estado con el número de casilla y el seguimiento.',
                    'Si el paquete está retenido en aduana, suele faltar la factura o el valor no coincide, o la mercadería necesita un permiso previo. El courier le indica qué documento presentar. Si el envío se trata como comercial, el despacho lo hace un [despachante de aduana matriculado](/aduana/despachantes-de-aduana-paraguay/).',
                ],
                'items' => [
                    ['title' => 'Mercadería que suele complicar el envío aéreo', 'text' => 'Baterías sueltas, líquidos, aerosoles, imanes potentes y productos inflamables. Consulte la lista de prohibidos de su courier.'],
                    ['title' => 'Mercadería que puede necesitar permiso', 'text' => 'Medicamentos, suplementos y cosméticos (registro sanitario de DINAVISA), alimentos, equipos de telecomunicaciones (homologación de CONATEL) y productos veterinarios (SENACSA). Consulte con su courier antes de comprar.'],
                ],
            ],
            [
                'h2' => 'Courier, correo o carga: cuál usar',
                'body' => [
                    'El courier no es la única forma de traer algo de China. La elección depende del tamaño, del valor y de si la compra es personal o para vender.',
                ],
                'items' => [
                    ['title' => 'Envío directo por correo o por la tienda', 'text' => 'Para un paquete chico con seguimiento, cuando la tienda ofrece entrega en Paraguay. Es el más simple, con menos control sobre el tramo final.'],
                    ['title' => 'Courier con casilla en China', 'text' => 'Para compras personales de varias tiendas, artículos que la tienda no envía a Paraguay o cuando quiere un único responsable del transporte y la declaración.'],
                    ['title' => 'Carga aérea con agente de carga', 'text' => 'Para mercadería comercial liviana y urgente, con [flete aéreo desde China](/servicios/flete-aereo-china/). Requiere despacho aduanero con despachante matriculado.'],
                    ['title' => 'Carga marítima', 'text' => 'Para volumen comercial, en contenedor completo o [contenedor compartido desde China](/importar/contenedor-compartido-desde-china/). Es más lenta, pero el costo por unidad baja mucho.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto cuesta el courier de China a Paraguay?', 'a' => 'Cada courier fija su tarifa por kilo y sus cargos adicionales. Compare el costo total de un mismo paquete, incluidos tributos y otros cargos.'],
            ['q' => '¿Cuánto tarda un courier de China a Paraguay?', 'a' => 'Depende de la frecuencia de envíos de cada courier y del tiempo de liberación en aduana. Pida el plazo por escrito al contratar.'],
            ['q' => '¿Qué es el peso volumétrico?', 'a' => 'Es un peso calculado a partir de las medidas de la caja. Si el paquete es liviano pero grande, se cobra por ese peso en lugar del peso real.'],
            ['q' => '¿El courier paga los impuestos por mí?', 'a' => 'El courier declara el paquete ante la aduana, paga los tributos que correspondan y se los cobra a usted antes de entregar. Vea cómo funciona en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/).'],
            ['q' => '¿Puedo traer mercadería para vender por courier?', 'a' => 'El courier sirve para compras personales y cantidades chicas. Una carga comercial puede requerir despacho formal con despachante.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Calcular flete y costo final',
            'text' => 'Ingrese precio, peso y medidas del paquete para estimar el costo por courier hasta Paraguay.',
        ],
        'related' => ['casillas-courier-paraguay', 'impuestos-compras-online-paraguay', 'aliexpress-paraguay'],
        'affiliates' => ['courier-1', 'courier-2'],
        'disclaimer' => false,
        'image' => null,
    ],

    'casillas-courier-paraguay' => [
        'path' => '/comprar/casillas-courier-paraguay/',
        'title' => 'Casillas de courier en Paraguay: cómo elegir',
        'navLabel' => 'Casillas de courier',
        'cluster' => 'compras',
        'seoTitle' => 'Casillas de courier en Paraguay',
        'metaDescription' => 'Cómo elegir una casilla de courier en Paraguay para compras en China y Estados Unidos: tarifa por kilo, plazos, seguro y retiro.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Casillas de courier en Paraguay: cómo elegir',
            'lead' => 'Para elegir una casilla de courier en Paraguay compare el costo total de un mismo paquete (no solo el precio por kilo), el origen que necesita (Estados Unidos o China), la frecuencia de envíos, cómo calcula el peso volumétrico, qué cubre el seguro y dónde y cómo retira.',
        ],
        'intro' => [
            'Una casilla de courier en Paraguay es una dirección en el exterior (normalmente en Miami o en China) donde usted recibe sus compras online. El courier las junta, las trae al país, las declara ante la aduana y se las entrega. En Paraguay hay muchas empresas que ofrecen casillas y la mayoría tiene registro gratuito, así que la diferencia está en las condiciones.',
            'El error más común es elegir solo por la tarifa por kilo. Dos couriers con la misma tarifa pueden cobrar montos muy distintos por el mismo paquete si uno redondea el peso hacia arriba, usa un factor volumétrico más exigente o suma cargos por manejo, seguro o entrega.',
            'Esta guía le da los criterios para comparar casillas, una tabla para hacerlo con números propios y los pasos para abrir la suya.',
        ],
        'steps' => [
            [
                'title' => 'Defina de dónde compra',
                'body' => [
                    'Si compra sobre todo en tiendas de Estados Unidos (Amazon, eBay, tiendas de marcas), necesita casilla en Miami. Si compra en tiendas o proveedores chinos, una casilla en China evita el tramo China–Estados Unidos (vea [courier de China a Paraguay](/comprar/courier-china-paraguay/)). Algunos couriers ofrecen ambas.',
                ],
            ],
            [
                'title' => 'Pida el tarifario completo',
                'body' => [
                    'Solicite por escrito la tarifa por kilo, el peso mínimo facturable, cómo redondea el peso, el factor de peso volumétrico y la lista de cargos adicionales (seguro, manejo, almacenaje, reempaque, entrega a domicilio).',
                ],
            ],
            [
                'title' => 'Simule el costo de un paquete real',
                'body' => [
                    'Tome una compra típica suya (por ejemplo, una caja de zapatillas o un paquete de ropa) y pida a dos o tres couriers el costo total hasta la entrega, o simúlelo con la [calculadora de compras online](/herramientas/calculadora-compras-online/). Esa comparación vale más que cualquier promoción.',
                ],
            ],
            [
                'title' => 'Revise plazos y frecuencia',
                'body' => [
                    'Pregunte cuántas veces por semana envía desde el origen y cuánto demora en promedio la liberación. Pida el dato por escrito y compárelo con lo que dicen otros clientes.',
                ],
            ],
            [
                'title' => 'Lea la política de seguro y reclamos',
                'body' => [
                    'Averigüe si el seguro es opcional u obligatorio, sobre qué valor se calcula, qué cubre (pérdida, daño, robo) y en qué plazo responde el courier.',
                ],
            ],
            [
                'title' => 'Abra la casilla y haga una compra de prueba',
                'body' => [
                    'Regístrese con sus datos tal como figuran en la cédula. Haga una primera compra chica para ver cómo funciona la prealerta, la comunicación y el cobro antes de traer algo de valor.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Criterios para comparar casillas de courier en Paraguay',
            'head' => ['Criterio', 'Qué preguntar', 'Por qué importa'],
            'rows' => [
                ['Tarifa por kilo', '¿Cuánto por kilo y desde qué origen?', 'Es la base, pero no el total'],
                ['Peso mínimo y redondeo', '¿Cobra un mínimo? ¿Redondea al kilo o a la fracción?', 'En paquetes chicos puede duplicar el costo'],
                ['Peso volumétrico', '¿Qué factor usa? ¿Lo aplica siempre?', 'Encarece paquetes livianos y grandes'],
                ['Origen', '¿Casilla en Miami, en China o ambas?', 'Evita tramos intermedios'],
                ['Frecuencia y plazo', '¿Cuántos envíos por semana? ¿Plazo promedio?', 'Define cuándo recibe'],
                ['Tributos', '¿Los cobra aparte y con detalle?', 'Transparencia en lo que paga'],
                ['Seguro', '¿Es opcional? ¿Qué cubre y sobre qué valor?', 'Define qué recupera ante pérdida o daño'],
                ['Cargos adicionales', '¿Manejo, almacenaje, reempaque, consolidación?', 'Suman al total'],
                ['Retiro y entrega', '¿Sucursales, horarios, delivery al interior?', 'Comodidad y costo final'],
                ['Atención', '¿WhatsApp, seguimiento en línea, respuesta ante reclamos?', 'Clave cuando algo sale mal'],
            ],
            'note' => 'Use la misma compra de referencia para todos los couriers. Así compara costos reales y no promociones.',
        ],
        'sections' => [
            [
                'h2' => 'Casilla o envío directo de la tienda',
                'body' => [
                    'Algunas tiendas ofrecen envío directo a Paraguay; en [AliExpress en Paraguay](/comprar/aliexpress-paraguay/) depende de cada vendedor, y [Temu en Paraguay](/comprar/temu-paraguay/) suspendió sus envíos directos en 2026, según medios locales. Para un paquete chico con seguimiento, el envío directo suele ser suficiente cuando la tienda lo ofrece. La casilla conviene cuando la tienda no envía al país, cuando junta varias compras o cuando quiere un único responsable del transporte y del trámite aduanero.',
                ],
            ],
            [
                'h2' => 'Señales de alerta al elegir una casilla',
                'body' => [
                    'La mayoría de los problemas con casillas se ven venir si se pregunta antes. Estas son las señales que conviene tomar en serio.',
                ],
                'items' => [
                    ['title' => 'Tarifa sin letra chica', 'text' => 'Si el courier publica solo el precio por kilo y no aclara mínimo, redondeo ni factor volumétrico, pídalo por escrito antes de enviar.'],
                    ['title' => 'Tributos sin detalle', 'text' => 'Si la factura muestra un único monto sin separar flete, tributos y cargos, no puede controlar lo que paga.'],
                    ['title' => 'Promesas de "sin impuestos"', 'text' => 'Ningún courier puede evitar legalmente los tributos que correspondan. Una oferta así puede implicar declarar un valor falso a su nombre.'],
                    ['title' => 'Almacenaje sin plazo claro', 'text' => 'Pregunte cuántos días guarda su paquete sin costo y qué pasa si no lo retira a tiempo.'],
                    ['title' => 'Sin canal de reclamos', 'text' => 'Antes de traer algo de valor, compruebe que respondan por escrito y en plazo razonable.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué es una casilla de courier?', 'a' => 'Es una dirección en el exterior asignada a su nombre, donde recibe sus compras online. El courier las trae a Paraguay y se las entrega.'],
            ['q' => '¿Cuánto cuesta abrir una casilla en Paraguay?', 'a' => 'En muchos couriers el registro es gratuito y se paga por cada envío. Confirme si hay cuota o cargos fijos en las condiciones del courier.'],
            ['q' => '¿Casilla en Miami o en China?', 'a' => 'Depende de dónde compra. Para tiendas chinas, una casilla en China evita el tramo por Estados Unidos; para tiendas estadounidenses, la de Miami.'],
            ['q' => '¿Cuál es el courier más barato de Paraguay?', 'a' => 'Depende del paquete. Simule el costo total de una compra real con dos o tres couriers, incluidos peso volumétrico y cargos adicionales.'],
            ['q' => '¿La casilla incluye los impuestos?', 'a' => 'El courier suele cobrar los tributos aparte del flete. Pida que se los detalle en la factura; le explicamos el mecanismo en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/).'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Comparar costos de courier',
            'text' => 'Calcule el costo total de un mismo paquete con distintas tarifas por kilo y factores volumétricos.',
        ],
        'related' => ['courier-china-paraguay', 'impuestos-compras-online-paraguay', 'compras-por-internet-paraguay'],
        'affiliates' => ['courier-1', 'courier-2'],
        'disclaimer' => false,
        'image' => null,
    ],

    'impuestos-compras-online-paraguay' => [
        'path' => '/comprar/impuestos-compras-online-paraguay/',
        'title' => 'Impuestos de compras online en Paraguay',
        'navLabel' => 'Impuestos de compras online',
        'cluster' => 'compras',
        'seoTitle' => 'Impuestos de compras online en Paraguay',
        'metaDescription' => 'Qué impuestos y cargos se pagan en Paraguay por una compra online del exterior, cómo se calculan y dónde confirmar el monto vigente.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Impuestos de compras online en Paraguay',
            'lead' => 'Las compras online del exterior que ingresan a Paraguay por courier se declaran ante la aduana bajo un régimen simplificado y pueden pagar tributos según su valor y el tipo de mercadería. El courier calcula el monto, lo paga en su nombre y se lo cobra antes de entregar; los topes y alícuotas vigentes los publica la DNIT.',
        ],
        'intro' => [
            'Los impuestos de compras online en Paraguay no son un único porcentaje fijo. Lo que usted paga depende de cómo ingresa el paquete (courier o correo), del valor declarado, de si la compra es para uso personal o comercial y del tipo de producto. La aduana forma parte hoy de la Dirección Nacional de Ingresos Tributarios (DNIT), creada por la Ley 7143/2023 al fusionar la Subsecretaría de Estado de Tributación y la Dirección Nacional de Aduanas. La DNIT administra el régimen de remesa expresa, el régimen para envíos que ingresan por empresas de courier habilitadas.',
            'En la práctica, usted rara vez trata directamente con la aduana: el courier declara el paquete, se calculan los tributos, el courier los paga y se los cobra junto con el flete. Por eso la factura del courier debería separar flete, tributos y otros cargos. Si todavía no eligió courier, vea cómo comparar [casillas de courier en Paraguay](/comprar/casillas-courier-paraguay/).',
            'Esta guía explica el mecanismo, qué componentes forman el costo final y dónde confirmar los montos vigentes. No publicamos alícuotas ni topes porque cambian por resolución y deben consultarse en la fuente oficial.',
        ],
        'steps' => [
            [
                'title' => 'Identifique cómo va a ingresar el paquete',
                'body' => [
                    'Si usa casilla de courier, el paquete entra por el régimen de remesa expresa. Si la tienda envía directo por correo o por un operador propio, el ingreso y el cobro de tributos pueden seguir otro procedimiento. Pregunte a quien entrega cómo se liquidan los cargos.',
                ],
            ],
            [
                'title' => 'Tenga claro el valor de la compra',
                'body' => [
                    'Los tributos se calculan sobre el valor declarado del envío, según la base que fija la normativa aduanera; esa base no siempre se limita al precio del producto. Pida al courier que le indique sobre qué valor liquidó. Guarde la factura o el detalle del pedido: es lo que respalda el valor declarado.',
                    'Declarar un valor menor al pagado es una infracción y puede terminar en retención, multa o valoración de oficio.',
                ],
            ],
            [
                'title' => 'Verifique si la compra es personal o comercial',
                'body' => [
                    'El régimen de remesa expresa está pensado para compras de uso personal, no para fines comerciales. Muchas unidades iguales, un valor alto o mercadería claramente para reventa pueden sacar el envío de ese régimen y exigir despacho formal con [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/). Si ese es su caso, lea [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'title' => 'Revise si el producto necesita permiso',
                'body' => [
                    'Algunos productos requieren autorización o registro de otra institución: medicamentos, suplementos y cosméticos ante DINAVISA, equipos de telecomunicaciones con homologación de CONATEL, productos veterinarios ante SENACSA, y alimentos según su tipo. Sin ese permiso, el paquete puede quedar retenido aunque los tributos estén pagos.',
                ],
            ],
            [
                'title' => 'Consulte los montos vigentes',
                'body' => [
                    'Los topes de valor, los montos exentos y las alícuotas se fijan por ley y resoluciones y se actualizan. Consulte la sección de remesa expresa del portal de la DNIT ([dnit.gov.py](https://www.dnit.gov.py/)) o pídale a su courier la liquidación estimada antes de comprar.',
                ],
            ],
            [
                'title' => 'Controle la liquidación del courier',
                'body' => [
                    'Cuando el courier le avise el monto, pida el detalle: valor declarado, flete, tributos y otros cargos. Si algo no coincide con su factura, reclame antes de pagar.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Componentes del costo de una compra online del exterior',
            'head' => ['Componente', 'Quién lo cobra', 'Cómo se determina'],
            'rows' => [
                ['Precio del producto', 'La tienda', 'Precio del carrito'],
                ['Envío de la tienda', 'La tienda', 'Según método elegido, puede ser gratis'],
                ['Recargo bancario', 'Su banco o emisor de tarjeta', 'Condiciones de su tarjeta para compras en el exterior'],
                ['Flete del courier', 'El courier', 'Tarifa por kilo sobre el peso facturable'],
                ['Tributos aduaneros', 'La aduana, a través del courier', 'Según valor, régimen y mercadería; montos vigentes en la DNIT'],
                ['Otros cargos', 'El courier', 'Seguro, manejo, almacenaje, entrega a domicilio'],
            ],
            'note' => 'No incluimos porcentajes ni topes porque cambian. Confírmelos en dnit.gov.py o con su courier.',
        ],
        'sections' => [
            [
                'h2' => 'Por qué dos compras del mismo precio pagan distinto',
                'body' => [
                    'Dos paquetes con el mismo precio de producto pueden terminar costando distinto por el peso volumétrico, el método de ingreso, los cargos del courier o el tipo de mercadería. Por eso conviene simular cada compra y no aplicar un porcentaje genérico.',
                ],
                'items' => [
                    ['title' => 'Peso y volumen', 'text' => 'Afectan el flete del courier, que a veces pesa más que los tributos.'],
                    ['title' => 'Valor declarado', 'text' => 'Los tributos se calculan sobre el valor y pueden variar según el tramo en que quede la compra.'],
                    ['title' => 'Tipo de producto', 'text' => 'Algunos productos tienen tratamiento especial o requieren permiso.'],
                ],
            ],
            [
                'h2' => 'Si la liquidación le parece alta o el paquete queda retenido',
                'body' => [
                    'Pida al courier la liquidación detallada y compárela con su factura de compra. Revise que el valor declarado sea el que usted pagó, que el peso facturado coincida con el paquete y que no haya cargos duplicados. Si encuentra un error, reclame por escrito antes de pagar.',
                    'Si el paquete queda retenido, el motivo más común es la falta de factura, un valor que no coincide, un producto que necesita permiso previo o una cantidad que parece comercial. El courier le indica qué documento presentar. Cuando la aduana exige despacho formal, el trámite lo hace un despachante de aduana matriculado, que le confirma la alícuota según la [posición arancelaria NCM](/aduana/ncm-nomenclatura-mercosur/) de la mercadería. Los tributos de una importación formal se explican en [tributos aduaneros en Paraguay](/aduana/tributos-aduaneros-paraguay/).',
                    'Este sitio no es la aduana ni un despachante. Si necesita ayuda para entender una liquidación o para destrabar un paquete, nuestra [asesoría para compras online](/servicios/asesoria-compras-online/) puede orientarlo y conectarlo con un despachante.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Se pagan impuestos por compras online en Paraguay?', 'a' => 'Puede corresponder pagar tributos al ingresar el paquete, según su valor, el régimen y el tipo de mercadería. El courier los calcula y se los cobra antes de entregar.'],
            ['q' => '¿Cuál es el monto libre de impuestos para compras por internet?', 'a' => 'Los topes y exenciones se fijan por normativa y pueden cambiar. Consulte el monto vigente en la sección de remesa expresa del portal de la DNIT o con su courier.'],
            ['q' => '¿Qué es la remesa expresa?', 'a' => 'Es el régimen aduanero que administra la DNIT para envíos transportados por empresas de courier habilitadas, que se despachan de forma prioritaria y simplificada. Está pensado para compras de uso personal, no para mercadería comercial.'],
            ['q' => '¿Los impuestos se calculan sobre el precio o también sobre el envío?', 'a' => 'La base de cálculo la define la normativa aduanera y no siempre se limita al precio del producto. Pida al courier que le muestre sobre qué valor liquidó, o consulte a la DNIT.'],
            ['q' => '¿Qué pasa si compro varias unidades para vender?', 'a' => 'Una compra comercial puede quedar fuera del régimen de remesa expresa y requerir despacho formal con despachante de aduana.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Estimar el costo final de mi compra',
            'text' => 'Sume precio, envío, flete del courier y tributos estimados. Usted carga la alícuota vigente que le confirme la DNIT o su courier.',
        ],
        'related' => ['casillas-courier-paraguay', 'tributos-aduaneros-paraguay', 'compras-por-internet-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'compras-por-internet-paraguay' => [
        'path' => '/comprar/compras-por-internet-paraguay/',
        'title' => 'Compras por internet en Paraguay: cómo funcionan',
        'navLabel' => 'Compras por internet',
        'cluster' => 'compras',
        'seoTitle' => 'Compras por internet en Paraguay: guía',
        'metaDescription' => 'Cómo comprar por internet desde Paraguay en tiendas del exterior: envío directo o casilla, Temu, Shein, AliExpress, Alibaba, pago con tarjeta e impuestos.',
        'lastReviewed' => '2026-09-25',
        'hero' => [
            'eyebrow' => 'Comprar online',
            'h1' => 'Compras por internet en Paraguay: cómo funcionan',
            'lead' => 'Las compras por internet desde Paraguay en tiendas del exterior llegan por uno de dos caminos: la tienda envía directo a su dirección, si al pagar le ofrece esa opción, o usted envía el pedido a una casilla de courier en el exterior y el courier lo trae al país. Se paga con una tarjeta habilitada para compras en el exterior, y al precio se suman el envío, el flete del courier si lo usa y los tributos que correspondan al ingresar.',
        ],
        'intro' => [
            'Esta guía reúne lo básico para comprar en el exterior desde Paraguay, con foco en las plataformas chinas: Temu, Shein, AliExpress y Alibaba. Cada una tiene su guía propia; aquí verá qué tienen en común, en qué se diferencian y qué revisar antes de pagar para que el costo final no lo sorprenda.',
            'Las tiendas de Estados Unidos funcionan igual: si no envían a Paraguay, se compra con una casilla en Miami y el courier se encarga del resto. Las reglas de tributos y de productos con permiso son las mismas, venga el paquete de donde venga.',
            'Si piensa comprar para revender o en cantidad, no es una compra personal sino una importación. En ese caso lea [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/) antes de hacer el pedido.',
        ],
        'steps' => [
            [
                'title' => 'Elija la tienda según lo que compra',
                'body' => [
                    'Ropa y artículos baratos del hogar se suelen buscar en Temu o Shein; repuestos chicos, electrónica menor y herramientas, en AliExpress; mercadería por cantidad, en Alibaba o 1688. No hay una tienda que convenga para todo: compare el mismo producto en dos o tres plataformas con el costo puesto en Paraguay, no solo con el precio del carrito.',
                ],
            ],
            [
                'title' => 'Vea si la tienda envía directo a Paraguay',
                'body' => [
                    'Cargue su dirección paraguaya y llegue hasta la pantalla de pago sin pagar. Si la tienda ofrece envío a Paraguay, ahí verá el método, el costo y la fecha estimada. Esa opción cambia: por ejemplo, en abril de 2026 medios locales informaron que Temu suspendió los envíos directos al país (los detalles están en [Temu en Paraguay](/comprar/temu-paraguay/)).',
                    'Si no aparece envío a Paraguay, o prefiere que un único responsable se ocupe del transporte y del trámite aduanero, use una casilla.',
                ],
            ],
            [
                'title' => 'Si usa casilla, abra una en el origen correcto',
                'body' => [
                    'La casilla es una dirección a su nombre en el exterior. Para tiendas chinas conviene una casilla en China; para tiendas estadounidenses, una en Miami. Al comprar, usted carga esa dirección como destino y el courier le avisa cuando el paquete llega. Vea cómo elegir en [casillas de courier en Paraguay](/comprar/casillas-courier-paraguay/) y cómo funciona el tramo desde China en [courier de China a Paraguay](/comprar/courier-china-paraguay/).',
                ],
            ],
            [
                'title' => 'Pague con un medio habilitado para el exterior',
                'body' => [
                    'Lo más común es una tarjeta de crédito o débito internacional habilitada para compras en el exterior y por internet. Antes de comprar, consulte con su banco si debe activarla para ese uso, qué límite tiene y qué recargo o comisión cobra por compras en moneda extranjera. Los demás medios de pago que acepta cada tienda varían según el país de destino; los ve en la pantalla de pago.',
                    'Pague siempre dentro de la plataforma. Si un vendedor le pide transferencia o pago por fuera, pierde la protección al comprador de la tienda.',
                ],
            ],
            [
                'title' => 'Calcule el costo final antes de pagar',
                'body' => [
                    'Sume precio, envío de la tienda, flete del courier (por kilo sobre el peso facturable, que puede ser el volumétrico), tributos al ingresar y recargo bancario. La [calculadora de compras online](/herramientas/calculadora-compras-online/) le permite hacer esa suma con sus propios datos.',
                ],
            ],
            [
                'title' => 'Siga el envío y reciba el paquete',
                'body' => [
                    'Guarde la factura o el detalle del pedido y el número de seguimiento. El plazo de entrega depende de la tienda y del courier: tome como referencia la fecha estimada de la tienda y, si usa casilla, sume el tránsito que el courier le informe por escrito. Al recibir, revise el contenido antes de confirmar la recepción en la plataforma.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué revisar antes de una compra por internet desde Paraguay',
            'head' => ['Qué revisar', 'Dónde se ve', 'Por qué importa'],
            'rows' => [
                ['Envío a Paraguay', 'Pantalla de pago con su dirección cargada', 'Define si necesita casilla'],
                ['Vendedor o tienda', 'Valoraciones, antigüedad y reseñas con fotos', 'En los marketplaces la calidad depende de cada vendedor'],
                ['Tarjeta habilitada', 'Su banco o la app de la tarjeta', 'Una tarjeta sin habilitar para el exterior rechaza el pago'],
                ['Peso y tamaño del paquete', 'Ficha del producto y tarifa del courier', 'El flete se cobra por peso real o volumétrico'],
                ['Producto con permiso', 'Tipo de artículo (medicamentos, cosméticos, equipos con radio)', 'Puede quedar retenido aunque los tributos estén pagos'],
                ['Cantidad', 'Su carrito', 'Una cantidad comercial puede salir del régimen de compras personales'],
                ['Costo total', 'Pantalla de pago más tarifa del courier', 'Evita sorpresas al retirar'],
            ],
            'note' => 'Lista orientativa. Métodos de envío, plazos y medios de pago cambian por tienda y por fecha; la referencia válida es lo que muestra la tienda al pagar.',
        ],
        'sections' => [
            [
                'h2' => 'Tiendas chinas: en qué se diferencia cada una',
                'body' => [
                    'Todas se pueden usar desde Paraguay, pero no funcionan igual. Esta es la diferencia práctica, con el enlace a la guía de cada una.',
                ],
                'items' => [
                    ['title' => 'Temu', 'text' => 'Catálogo amplio de artículos de bajo precio para el hogar, ropa y accesorios. Hoy el camino más previsible es la casilla. Guía: [Temu en Paraguay](/comprar/temu-paraguay/).'],
                    ['title' => 'Shein', 'text' => 'Ropa y accesorios de moda; conviene revisar la tabla de talles de cada prenda. Guía: [Shein en Paraguay](/comprar/shein-paraguay/).'],
                    ['title' => 'AliExpress', 'text' => 'Cada vendedor es una tienda distinta, con su propio método de envío y plazo. Guía: [AliExpress en Paraguay](/comprar/aliexpress-paraguay/).'],
                    ['title' => 'Alibaba y 1688', 'text' => 'Plataformas mayoristas: se negocia con fábricas, hay cantidades mínimas y el flete se organiza aparte. Guías: [Alibaba en Paraguay](/comprar/alibaba-paraguay/) y [1688 en español](/comprar/1688-en-espanol/).'],
                ],
            ],
            [
                'h2' => 'Impuestos y retenciones en aduana',
                'body' => [
                    'Las compras que entran por courier se declaran ante la aduana, que hoy forma parte de la DNIT, bajo el régimen de remesa expresa, pensado para compras de uso personal. El courier calcula los tributos, los paga en su nombre y se los cobra antes de entregar. Los topes y alícuotas cambian por normativa, así que no los repetimos aquí: el mecanismo está explicado en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/), y los montos vigentes se confirman en la DNIT o con su courier.',
                    'Si un paquete queda retenido, lo habitual es que falte la factura, que el valor no coincida, que el producto necesite permiso previo o que la cantidad parezca comercial. Cuando la aduana exige despacho formal, el trámite lo hace un [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/).',
                    'Este sitio no está afiliado a ninguna de las tiendas mencionadas ni a la aduana. Si quiere ayuda para elegir tienda o courier, o para entender una liquidación, puede pedir nuestra [asesoría para compras online](/servicios/asesoria-compras-online/).',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cómo se hacen compras por internet desde Paraguay?', 'a' => 'Elige la tienda, verifica si envía directo a Paraguay y, si no, usa una casilla de courier en el exterior. Paga con una tarjeta habilitada para compras en el exterior y, al recibir, paga el flete del courier y los tributos que correspondan.'],
            ['q' => '¿Cuáles son las mejores tiendas online para comprar desde Paraguay?', 'a' => 'Depende de lo que compra. Para ropa y artículos baratos se usan Temu y Shein, para repuestos y electrónica menor AliExpress, y para cantidades Alibaba o 1688. Compare siempre el costo puesto en Paraguay, no solo el precio.'],
            ['q' => '¿Necesito casilla para comprar en tiendas del exterior?', 'a' => 'Solo si la tienda no envía a Paraguay o si prefiere que el courier se encargue del transporte y del trámite. Para tiendas chinas conviene una casilla en China; para tiendas de Estados Unidos, una en Miami.'],
            ['q' => '¿Con qué tarjeta puedo pagar compras en el exterior?', 'a' => 'Con una tarjeta de crédito o débito internacional habilitada para compras en el exterior y por internet. Consulte con su banco si debe activarla y qué recargo cobra por compras en moneda extranjera.'],
            ['q' => '¿Cuánto tarda en llegar una compra por internet?', 'a' => 'Depende de la tienda y del courier. Tome la fecha estimada que muestra la tienda al pagar y, si usa casilla, sume el tránsito que le informe el courier.'],
            ['q' => '¿Se pagan impuestos por compras por internet en Paraguay?', 'a' => 'Puede corresponder pagar tributos al ingresar el paquete, según su valor, el régimen y el tipo de mercadería. Los montos vigentes se consultan en la DNIT o con el courier.'],
        ],
        'relatedService' => 'asesoria-compras-online',
        'toolLink' => [
            'path' => '/herramientas/calculadora-compras-online/',
            'label' => 'Calcular el costo final de mi compra',
            'text' => 'Sume precio, envío, flete del courier y tributos estimados para saber cuánto le cuesta la compra puesta en Paraguay.',
        ],
        'related' => ['casillas-courier-paraguay', 'impuestos-compras-online-paraguay', 'temu-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/compras-online-entrega-asuncion', 'widths' => [640, 1280, 1920], 'alt' => 'Una mujer recibe en la puerta de su casa en Asunción varios paquetes de una compra online', 'width' => 1920, 'height' => 1086],
    ],

];
