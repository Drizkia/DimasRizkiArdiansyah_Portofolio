<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ✅ HAPUS YANG INI - DUPLICATE
// Route::get('/', function () {
//     return view('main');
// });

// Porto Route
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Public Admin Login Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes (harus login dulu)
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // CRUD Routes
    Route::resource('admin/experiences', ExperienceController::class);
    Route::resource('admin/projects', ProjectController::class);
    Route::resource('admin/skills', SkillController::class);
});


//! iini test
Route::get('/debug-db', function() {
    try {
        \DB::connection()->getPdo();
        echo "✅ DATABASE CONNECTED<br>";
        
        // Cek tables
        $tables = \DB::select('SHOW TABLES');
        echo "✅ TABLES: " . count($tables) . " found<br>";
        
        foreach($tables as $table) {
            echo " - " . $table->Tables_in_railway . "<br>";
        }
        
    } catch (\Exception $e) {
        echo "❌ DATABASE ERROR: " . $e->getMessage() . "<br>";
        echo "Config: " . json_encode([
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
            'database' => config('database.connections.mysql.database'),
            'username' => config('database.connections.mysql.username'),
        ]);
    }
});
