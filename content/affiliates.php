<?php
/**
 * Affiliate partners, keyed by id. A record with 'url' => null is hidden
 * everywhere: partials/affiliate-box.php renders only ids whose url is set, so
 * adding an account is one edit here and no page changes.
 *
 *   label     string   what the visitor sees ("Holafly — eSIM para China")
 *   text      string   one line on why it helps in this context
 *   url       ?string  the affiliate link; null until Anton has the account
 *   category  string   compras | pagos | viajes | courier
 *
 * Pages name ids in their record's 'affiliates' => [...] key.
 */

declare(strict_types=1);

return [
    'temu'         => ['label' => 'Temu',          'text' => 'Tienda online con envío desde China.',                          'url' => null, 'category' => 'compras'],
    'aliexpress'   => ['label' => 'AliExpress',    'text' => 'Compras minoristas a vendedores chinos.',                       'url' => null, 'category' => 'compras'],
    'wise'         => ['label' => 'Wise',          'text' => 'Transferencias al exterior con el tipo de cambio a la vista.',  'url' => null, 'category' => 'pagos'],
    'payoneer'     => ['label' => 'Payoneer',      'text' => 'Cuenta para pagar y cobrar en dólares.',                         'url' => null, 'category' => 'pagos'],
    'holafly'      => ['label' => 'Holafly',       'text' => 'eSIM con datos para China, lista antes de salir.',               'url' => null, 'category' => 'viajes'],
    'airalo'       => ['label' => 'Airalo',        'text' => 'eSIM por país o región, con planes cortos.',                     'url' => null, 'category' => 'viajes'],
    'vpn'          => ['label' => 'VPN para China', 'text' => 'Para usar WhatsApp, Google e Instagram desde China.',           'url' => null, 'category' => 'viajes'],
    'seguro-viaje' => ['label' => 'Seguro de viaje', 'text' => 'Cobertura médica y de equipaje para el viaje.',                'url' => null, 'category' => 'viajes'],
    'trip'         => ['label' => 'Trip.com',      'text' => 'Hoteles, vuelos y trenes dentro de China.',                      'url' => null, 'category' => 'viajes'],
    'civitatis'    => ['label' => 'Civitatis',     'text' => 'Excursiones y visitas guiadas en español.',                      'url' => null, 'category' => 'viajes'],
    'courier-1'    => ['label' => 'Courier socio', 'text' => 'Casilla en China con entrega en Paraguay.',                      'url' => null, 'category' => 'courier'],
    'courier-2'    => ['label' => 'Courier socio', 'text' => 'Casilla en Miami con entrega en Paraguay.',                      'url' => null, 'category' => 'courier'],
];
