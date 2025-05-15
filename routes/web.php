<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMahasiswaController;
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

require __DIR__.'/auth.php';
