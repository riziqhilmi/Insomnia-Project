<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman landing
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Route yang membutuhkan autentikasi
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});


// Route untuk halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/master', function () {
        return view('auth.master');
    })->name('master');
    
Route::get('/predision', function () {
        return view('auth.predision');
    })->name('predision');
    
Route::get('/visualization', function () {
        return view('auth.visualization');
    })->name('visualization');

require __DIR__.'/auth.php';
