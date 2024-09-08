<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\KategoriBeasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [BeasiswaController::class, 'index'])->name('home');
    Route::post('/beasiswa_store', [BeasiswaController::class, 'store'])->name('store.beasiswa');
    Route::get('/hasil_beasiswa', [BeasiswaController::class, 'show'])->name('show.beasiswa');
    Route::get('/kategori_beasiswa', [KategoriBeasiswaController::class, 'index'])->name('kategory_beasiswa');
    Route::post('/kategori_beasiswa', [KategoriBeasiswaController::class, 'store'])->name('kategory_beasiswa.store');
    Route::post('/verify_user', [KategoriBeasiswaController::class, 'verify_user'])->name('verify_user');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
