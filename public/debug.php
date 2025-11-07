<?php
// Test PHP error reporting directly
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

echo "PHP ERROR REPORTING TEST\n";

// Test basic PHP
echo "PHP VERSION: " . PHP_VERSION . "\n";

// Test require files
echo "REQUIRE AUTOLOAD: ";
require_once __DIR__.'/../vendor/autoload.php';
echo "SUCCESS\n";

echo "REQUIRE APP: ";
$app = require_once __DIR__.'/../bootstrap/app.php';
echo "SUCCESS\n";

echo "MAKE KERNEL: ";
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo "SUCCESS\n";

echo "HANDLE REQUEST: ";
$request = Illuminate\Http\Request::create('/');
$response = $kernel->handle($request);
echo "SUCCESS\n";

echo "RESPONSE STATUS: " . $response->getStatusCode() . "\n";
echo "CONTENT LENGTH: " . strlen($response->getContent()) . " bytes\n";
