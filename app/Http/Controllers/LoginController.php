<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class LoginController extends Controller
{
    /**
     * Untuk menampilkan halaman login
     */
    public function index () {
        return view('login.index');
    }

    /**
     * Untuk mengautektikasi user yang login
     */
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if(auth()->user()){
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login Failed!!');
    }

    /**
     * Untuk logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
