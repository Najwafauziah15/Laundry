<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        return view('index');
    }

    public function index2 () {
        return view('kasir.index');
    }

    public function index3 () {
        return view('owner.index');
    }

    public function index4 () {
        return view('home.index');
    }
}
