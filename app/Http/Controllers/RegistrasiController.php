<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    /** 
     * Untuk menampilkan halaman registrasi dan memberikan data outlet
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet['outlet'] = Outlet::all();
        return view('registrasi.index', $outlet);
    }

    /**
     * menginput/menyimpan data user ke tabel user di database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'unique:users'],
            'id_outlet' => ['required'],
            'password' => ['required', 'min:5', 'max:255'],
            'role' => 'required'
        ]);

        //$validateData ['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        //$request->session()->flash('success', 'registration successfull! please login');

        return redirect('/login')->with('success', 'registration successfull! please login');
    }
}
