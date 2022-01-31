<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Home
Route::get('/home', [HomeController::class, 'index4']);
// Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/homeOwner', [HomeController::class, 'index3'])->name('homeOwner');
Route::get('/homeKasir', [HomeController::class, 'index2'])->name('homeKasir');
