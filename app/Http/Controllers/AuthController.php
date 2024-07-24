<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('blog.login')->with(['title' => 'Login']);
    }

    public function authenticate(Request $request) {
        $otentikasi = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ],[
            'email.required'    =>  'email harus diisi..',
            'email.email'       =>  'masukkan email yang valid..',
            'password.required' =>  'password harus diisi..',
        ]);

        if (Auth::attempt($otentikasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('Gagal', 'Email atau Password salah');
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
