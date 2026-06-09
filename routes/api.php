<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IotController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\SiklusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Sistem Monitoring Kumbung Jamur Tiram
|--------------------------------------------------------------------------
*/

// ─── IoT Device Endpoints ────────────────────────────────────────────────────
// Endpoint untuk perangkat IoT mengirim data sensor dan status aktuator
Route::prefix('iot')->name('iot.')->group(function () {

    // POST /api/iot/monitoring  → Kirim data suhu & kelembapan
    Route::post('/monitoring', [IotController::class, 'storeMonitoring'])
        ->name('monitoring');

    // POST /api/iot/status  → Kirim status aktuator (ON/OFF)
    Route::post('/status', [IotController::class, 'storeStatus'])
        ->name('status');
});

// ─── Dashboard Endpoints ──────────────────────────────────────────────────────
// Endpoint untuk konsumsi frontend/dashboard monitoring
Route::prefix('dashboard')->name('dashboard.')->group(function () {

    // GET /api/dashboard/latest  → Data terbaru (suhu, kelembapan, status)
    Route::get('/latest', [DashboardController::class, 'latest'])
        ->name('latest');

    // GET /api/dashboard/statistik  → Statistik harian & ringkasan produksi
    Route::get('/statistik', [DashboardController::class, 'statistik'])
        ->name('statistik');
});

// ─── Siklus Endpoints ─────────────────────────────────────────────────────────
Route::prefix('siklus')->name('siklus.')->group(function () {

    // GET  /api/siklus        → List semua siklus
    Route::get('/', [SiklusController::class, 'index'])->name('index');

    // POST /api/siklus        → Buat siklus baru
    Route::post('/', [SiklusController::class, 'store'])->name('store');

    // GET  /api/siklus/{id}   → Detail siklus + data panen
    Route::get('/{id}', [SiklusController::class, 'show'])->name('show');

    // PUT  /api/siklus/{id}   → Update siklus
    Route::put('/{id}', [SiklusController::class, 'update'])->name('update');

    // DELETE /api/siklus/{id} → Hapus siklus
    Route::delete('/{id}', [SiklusController::class, 'destroy'])->name('destroy');
});

// ─── Panen Endpoints ──────────────────────────────────────────────────────────
Route::prefix('panen')->name('panen.')->group(function () {

    // GET  /api/panen         → List semua data panen
    Route::get('/', [PanenController::class, 'index'])->name('index');

    // POST /api/panen         → Catat hasil panen baru
    Route::post('/', [PanenController::class, 'store'])->name('store');

    // GET  /api/panen/{id}    → Detail satu data panen
    Route::get('/{id}', [PanenController::class, 'show'])->name('show');

    // PUT  /api/panen/{id}    → Update data panen
    Route::put('/{id}', [PanenController::class, 'update'])->name('update');

    // DELETE /api/panen/{id}  → Hapus data panen
    Route::delete('/{id}', [PanenController::class, 'destroy'])->name('destroy');
});