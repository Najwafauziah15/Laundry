<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Untuk menampilkan halaman simulasi
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karyawan.test2');
    }
}
 