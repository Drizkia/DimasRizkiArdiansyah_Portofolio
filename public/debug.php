<?php
require __DIR__.'/../vendor/autoload.php';

// SET DEBUG MANUAL SEBELUM BOOTSTRAP
putenv('APP_DEBUG=true');
putenv('APP_ENV=local');

$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::create('/');
    $response = $kernel->handle($request);
    
    echo "Response Status: " . $response->getStatusCode() . "\n";
    echo "Response Content:\n";
    echo $response->getContent();
    
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "TRACE: " . $e->getTraceAsString();
}
