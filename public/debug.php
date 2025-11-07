<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Force error logging
$app->make('config')->set('logging.default', 'stderr');

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::create('/');
    $response = $kernel->handle($request);
    
    // Check if Laravel wrote to logs
    $logPath = __DIR__.'/../storage/logs/laravel.log';
    if (file_exists($logPath)) {
        echo "LOG CONTENT:\n" . file_get_contents($logPath);
    } else {
        echo "NO LOG FILE FOUND\n";
    }
    
} catch (Throwable $e) {
    error_log($e->getMessage());
    echo "ERROR LOGGED: " . $e->getMessage();
}
