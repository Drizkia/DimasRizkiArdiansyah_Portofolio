<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "KERNEL SUCCESS";
} catch (Throwable $e) {
    echo "KERNEL ERROR: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . "\n"; 
    echo "LINE: " . $e->getLine() . "\n";
    echo "TRACE: " . $e->getTraceAsString();
}
