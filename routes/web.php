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


// //! iini test
// Route::get('/test-upload', function() { // ✅ TAMBAH INI - GET ROUTE
//     return view('test-upload');
// });

// Route::post('/test-upload', function(Request $request) {
//     try {
//         if (!$request->hasFile('image')) {
//             return response()->json(['success' => false, 'error' => 'No file uploaded']);
//         }
        
//         $file = $request->file('image');
        
//         // HARCODE CREDENTIALS - PAKAI YANG ASLI DARI CLOUDINARY
//         $cloudinary = new \Cloudinary\Cloudinary([
//             "cloud" => [
//                 "cloud_name" => "ddgrw2t9u",  // ✅ Cloud Name kamu
//                 "api_key" => "129649819264383",  // ✅ API Key asli
//                 "api_secret" => "xzFm4W_Y3nsuL8yNwgrfJeFgNSQ",  // ✅ API Secret asli
//             ],
//             "url" => [
//                 "secure" => true
//             ]
//         ]);
        
//         $result = $cloudinary->uploadApi()->upload($file->getRealPath(), [
//             'folder' => 'test'
//         ]);
        
//         return response()->json([
//             'success' => true, 
//             'url' => $result['secure_url'],
//             'public_id' => $result['public_id'],
//             'message' => 'Cloudinary work! 🚀'
//         ]);
        
//     } catch (\Exception $e) {
//         return response()->json(['success' => false, 'error' => $e->getMessage()]);
//     }
// });