<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::create('/');
    $response = $kernel->handle($request);
    
    echo "ROUTE DISPATCH SUCCESS - Status: " . $response->getStatusCode();
    $response->send();
    
} catch (Throwable $e) {
    echo "ROUTE ERROR: " . $e->getMessage();
}
