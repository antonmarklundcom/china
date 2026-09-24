<?php
/**
 * A service page is three lines: the record in content/services.php holds
 * everything, templates/service.php renders it. EXAMPLE ROUTE — delete this
 * directory when you delete the 'example' => true records.
 */

require __DIR__ . '/../../lib/bootstrap.php';

$slug = 'servicio-ejemplo';
require ROOT_DIR . '/templates/service.php';
