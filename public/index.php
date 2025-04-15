<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// (require_once __DIR__.'/../bootstrap/app.php')
//     ->handleRequest(Request::capture());

// Register the Composer autoloader...
require __DIR__.'/'.(getenv('LARAVEL_VENDOR_PATH') ?: '../vendor').'/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/'.(getenv('LARAVEL_BOOTSTRAP_PATH') ?: '../bootstrap').'/app.php')
    ->handleRequest(Request::capture());