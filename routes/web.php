<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;

use Maatwebsite\Excel\Facades\Excel; // eksport excel
use Barryvdh\DomPDF\Facade\Pdf;    // eksport pdf

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. HALAMAN UTAMA (Otomatis diarahkan ke halaman login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. HALAMAN LOGIN & REGISTER nek eneng
Route::get('/login', [LoginController::class, 'index'])->name('login'); // Diubah ke /login
Route::get('/register', function () {
    return view('auth.register'); 
})->name('register');

// 3. PROSES LOGIN & LOGOUT
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// 4. RUTE MIDDLEWARE (iso diakses nek wesan login)
Route::middleware(['auth'])->group(function () {

        // Route penengah (Redirect berdasarkan role saat login)
        Route::get('/dashboard', function () {
            $role = auth()->user()->role;

            // PERBAIKAN: Sesuaikan persis dengan huruf kapital di database (Admin, IT Support, HRD)
            if ($role == 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role == 'IT Support') {
                return redirect()->route('it.dashboard');
            } else {
                return redirect()->route('hrd.dashboard');
            }
        })->name('dashboard');


    // 5. GROUP ROLE: ADMINISTRATOR (Akses Penuh)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminIndex'])->name('dashboard');
        Route::get('/monitor', [AssetController::class, 'monitorAdmin'])->name('monitor');
        Route::get('/laptop', [AssetController::class, 'laptopAdmin'])->name('laptop');
        Route::get('/pc', [AssetController::class, 'pcAdmin'])->name('pc');
        Route::get('/eksternal', [AssetController::class, 'eksternalAdmin'])->name('eksternal');
        Route::get('/user', [UserController::class, 'indexAdmin'])->name('user');
        Route::get('/divisi', [DivisionController::class, 'indexAdmin'])->name('divisi');
        Route::get('/service', [ServiceController::class, 'indexAdmin'])->name('service');

        // Rute untuk memproses form tambah data
        Route::post('/monitor/store', [AssetController::class, 'storeMonitorAdmin'])->name('monitor.store');

        // route detail
        // Route::get('/monitor/{id}', [AssetController::class, 'showMonitorAdmin'])->name('monitor.show');
        Route::get('/monitor/detail/{id}', [AssetController::class, 'showMonitorAdmin'])->where('id', '.*')->name('monitor.show');

        // Rute untuk mengeksekusi penghapusan data
        Route::delete('/monitor/hapus/{id}', [AssetController::class, 'destroyMonitorAdmin'])->name('monitor.destroy');

        //route import excel
        Route::post('/monitor/import-excel', [AssetController::class, 'importMonitorExcel'])->name('monitor.import');

    });


    // 6. GROUP ROLE: IT SUPPORT
    Route::prefix('it')->name('it.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'itIndex'])->name('dashboard');
        Route::get('/laptop', [AssetController::class, 'laptop'])->name('laptop');
        Route::get('/monitor', [AssetController::class, 'monitorIt'])->name('monitor');
        Route::get('/pc', [AssetController::class, 'pc'])->name('pc');
        Route::get('/perangkat-eksternal', [AssetController::class, 'eksternal'])->name('eksternal');
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/divisi', [DivisionController::class, 'index'])->name('divisi');
        Route::get('/service', [ServiceController::class, 'index'])->name('service');
        
        // route detail
        Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show');

        // route eksport excel/ pdf
        Route::get('/monitor/export-excel', [AssetController::class, 'exportMonitorExcel'])->name('monitor.excel');
        Route::get('/monitor/export-pdf', [AssetController::class, 'exportMonitorPdf'])->name('monitor.pdf');
    });


    // 7. GROUP ROLE: HRD       
    Route::prefix('hrd')->name('hrd.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'hrdIndex'])->name('dashboard');
        Route::get('/laptop', [AssetController::class, 'laptopHRD'])->name('laptop');
        Route::get('/monitor', [AssetController::class, 'monitorHRD'])->name('monitor');
        Route::get('/pc', [AssetController::class, 'pcHRD'])->name('pc');
        Route::get('/perangkat-eksternal', [AssetController::class, 'eksternalHRD'])->name('eksternal');
    });

    // 8. RUTE PROFILE 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});