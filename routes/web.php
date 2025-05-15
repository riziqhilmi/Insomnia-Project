<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\VisualController;
use App\Http\Controllers\EdukasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('data-master', DataMahasiswaController::class)->parameters([
        'data-master' => 'dataMahasiswa',
    ]);
});


Route::get('/visualisasi', [VisualController::class, 'index'])->name('visualisasi.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('edukasi', EdukasiController::class);
});


require __DIR__.'/auth.php';
