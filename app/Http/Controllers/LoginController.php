<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class LoginController extends Controller
{
    public function index () {
        return view('login.index');
    }

    public function index2 () {
        return view('owner.login.index');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if(auth()->user()->role == 'admin'){
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            elseif(auth()->user()->role == 'kasir'){
                $request->session()->regenerate();
                return redirect()->intended('/homeKasir');
            }
            elseif(auth()->user()->role == 'owner'){
                $request->session()->regenerate();
                return redirect()->intended('/homeOwner');
            }
        }

        return back()->with('loginError', 'Login Failed!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
