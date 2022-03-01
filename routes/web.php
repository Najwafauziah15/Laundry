<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

// Home
Route::get('/home', [HomeController::class, 'index4']);
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
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
Route::resource('pengguna', PenggunaController::class)->middleware('auth');
Route::delete('{id}/pengguna/delete' ,  [PenggunaController::class, 'destroy']);

// Pengguna atau user
Route::resource('user', UserController::class)->middleware('role');
Route::delete('{id}/user/delete' , [UserController::class, 'destroy']);

// Transaksi
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
// Route::post('/transaksi/store', [TransaksiController::class, 'store'])->middleware('auth')->middleware('role');

// Laporan
Route::get('{id}/cetak', [LaporanController::class, 'faktur'])->middleware('auth');
Route::get('laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::get('/export', [LaporanController::class, 'export']);
// Route::get('cetak', [LaporanController::class, 'index2'])->middleware('auth');

// Barang
Route::resource('barang', BarangController::class);
Route::delete('{id}/barang/delete' ,  [BarangController::class, 'destroy']);
