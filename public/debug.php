<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
echo "LARAVEL BOOTSTRAP SUCCESS";

include __DIR__.'/../vendor/autoload.php';
echo "AUTOLOAD SUCCESS";

include __DIR__.'/../vendor/autoload.php';
$app = include_once __DIR__.'/../bootstrap/app.php';
echo "APP BOOTSTRAP SUCCESS";

include __DIR__.'/../vendor/autoload.php';
$app = include_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo "KERNEL SUCCESS";
