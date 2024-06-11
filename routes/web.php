<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/jadwal', JadwalKuliahController::class);

    Route::get('jadwal-kuliah/export', [JadwalKuliahController::class, 'export'])->name('jadwal-kuliah.export');
    Route::get('jadwal-kuliah/pdf', [JadwalKuliahController::class, 'downloadPDF'])->name('jadwal-kuliah.pdf');
});

require __DIR__.'/auth.php';

