<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [PartController::class, 'catalog'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kode yang error sebelumnya sudah diganti menjadi seperti ini:
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/admin/dashboard', [PartController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/parts', [PartController::class, 'store'])->name('parts.store');
        Route::delete('/admin/parts/{id}', [PartController::class, 'destroy'])->name('parts.destroy');
        Route::get('/admin/export-pdf', [PartController::class, 'exportPdf'])->name('admin.exportPdf');
    });
});

require __DIR__.'/auth.php';