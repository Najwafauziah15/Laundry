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
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjemputanController;

//barang
Route::get('barang/cetak', [BarangController::class, 'cetak'])->name('barang_cetak');

// Penjemputan
Route::get('penjemputan/cetak', [PenjemputanController::class, 'cetak']);
Route::resource('/penjemputan', PenjemputanController::class);
Route::post('/status', [PenjemputanController::class ,'status'])->name('status');
Route::get('export/penjemputan', [PenjemputanController::class, 'export'])->name('barang');
Route::get('format/penjemputan', [PenjemputanController::class, 'format'])->name('format_penjemputan');
Route::post('import/penjemputan', [PenjemputanController::class, 'import'])->name('import_penjemputan');
Route::delete('{id}/penjemputan/delete', [PenjemputanController::class, 'destroy']);
Route::post('status', [PenjemputanController::class ,'status'])->name('status');

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
Route::get('export/outlet', [OutletController::class, 'export'])->name('export_outlet');
Route::post('import/outlet', [OutletController::class, 'import'])->name('import_outlet');

// Paket atau Produk
Route::resource('paket', PaketController::class)->middleware('role');
Route::delete('{id}/paket/delete' ,  [PaketController::class, 'destroy']);
Route::get('export/paket', [PaketController::class, 'export'])->name('export_paket');
Route::post('/import', [PaketController::class, 'import'])->name('import_paket');

// Member
Route::resource('pengguna', PenggunaController::class)->middleware('auth');
Route::delete('{id}/pengguna/delete' ,  [PenggunaController::class, 'destroy']);
Route::get('export/pengguna', [PenggunaController::class, 'export'])->name('export_pengguna');
Route::post('import/pengguna', [PenggunaController::class, 'import'])->name('import_pengguna');

// Pengguna atau user
Route::resource('user', UserController::class)->middleware('role');
Route::get('export/user', [UserController::class, 'export'])->name('export_user');
Route::post('import/user', [UserController::class, 'import'])->name('import_user');
Route::delete('{id}/user/delete' , [UserController::class, 'destroy']);

// Transaksi
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
Route::get('{id}/cetak', [TransaksiController::class, 'faktur'])->middleware('auth'); //data transaksi
Route::post('transaksi/status', [TransaksiController::class ,'status'])->name('transaksi_status');
// Route::post('/transaksi/store', [TransaksiController::class, 'store'])->middleware('auth')->middleware('role');

// Laporan
// Route::get('{id}/cetak', [LaporanController::class, 'faktur'])->middleware('auth'); //data transaksi
Route::get('laporan', [LaporanController::class, 'index'])->middleware('auth');
// Route::get('/export', [LaporanController::class, 'export']);
// Route::get('cetak', [LaporanController::class, 'index2'])->middleware('auth');

// Barang
Route::resource('barang', BarangController::class)->middleware('auth');
Route::delete('{id}/barang/delete' ,  [BarangController::class, 'destroy']);
Route::post('status/barang', [BarangController::class ,'status'])->name('status_barang');
Route::get('export/barang', [BarangController::class, 'export'])->name('export_barang');
Route::get('format/barang', [BarangController::class, 'format'])->name('format_barang');
Route::post('import/barang', [BarangController::class, 'import'])->name('import_barang');

// Karyawan Sorting
Route::resource('karyawan', KaryawanController::class)->middleware('auth');