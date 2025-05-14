<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\DataMasterController;
use App\Http\Controllers\DataMahasiswaController;
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


// Route untuk halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Data Mahasiswa
    Route::resource('data-master', DataMahasiswaController::class)->parameters([
        'data-master' => 'dataMahasiswa',
    ]);
    
});



require __DIR__.'/auth.php';
