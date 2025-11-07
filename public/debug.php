<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    $request = Illuminate\Http\Request::capture();
    $response = $kernel->handle($request);
    
    echo "REQUEST HANDLING SUCCESS";
    $response->send();
    
} catch (Throwable $e) {
    echo "REQUEST ERROR: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . "\n"; 
    echo "LINE: " . $e->getLine() . "\n";
}
