<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Pengguna2Controller;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

// Home
Route::get('/home', [HomeController::class, 'index4']);
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

// Outlet
Route::resource('outlet', OutletController::class)->middleware('role');
Route::delete('{id}/outlet/delete' ,  [OutletController::class, 'destroy']);

// Paket atau Produk
Route::resource('paket', PaketController::class)->middleware('role');
Route::delete('{id}/paket/delete' ,  [PaketController::class, 'destroy']);

// Member
Route::resource('pengguna', PenggunaController::class)->middleware('role');
Route::delete('{id}/pengguna/delete' ,  [PenggunaController::class, 'destroy']);

// Member2
Route::resource('pengguna2', Pengguna2Controller::class)->middleware('auth');
Route::delete('{id}/pengguna2/delete' ,  [Pengguna2Controller::class, 'destroy']);

// Pengguna atau user
Route::resource('user', UserController::class)->middleware('role');
Route::delete('{id}/user/delete' , [UserController::class, 'destroy']);

// Transaksi    
Route::resource('transaksi', TransaksiController::class);