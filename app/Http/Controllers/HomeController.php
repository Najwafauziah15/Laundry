<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Untuk menampilkan halaman home setelah login
    */
    public function index () {
        return view('index');
    }

    /**
     * Untuk menampilkan halaman home sebelum login
    */
    public function index4 () {
        return view('home.index');
    }
}
