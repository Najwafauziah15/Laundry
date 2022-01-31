<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;

// Home
Route::get('/home', [HomeController::class, 'index4']);
// Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role');
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role');
Route::get('/homeOwner', [HomeController::class, 'index3'])->name('homeOwner');
Route::get('/homeKasir', [HomeController::class, 'index2'])->name('homeKasir');

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Registrasi
Route::resource('/registrasi', RegistrasiController::class)->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::delete('{id}/registrasi/delete' ,  [RegistrasiController::class, 'destroy']);

// Outlet
Route::resource('outlet', OutletController::class)->middleware('role');
Route::delete('{id}/outlet/delete' ,  [OutletController::class, 'destroy']);

// Paket atau Produk
Route::resource('paket', PaketController::class)->middleware('role');
Route::delete('{id}/paket/delete' ,  [PaketController::class, 'destroy']);