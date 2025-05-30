<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\VisualController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\PredictionController; // Tambahkan ini
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PredictionResultController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Data Master
    Route::resource('data-master', DataMahasiswaController::class)->parameters([
        'data-master' => 'dataMahasiswa',
    ]);
    
    // Edukasi
    Route::resource('edukasi', EdukasiController::class);
    
    // Visualisasi
    Route::get('/visualisasi', [VisualController::class, 'index'])->name('visualisasi.index');
    
    Route::resource('predict', PredictionResultController::class)->except(['show']);



    
    
});

require __DIR__.'/auth.php';