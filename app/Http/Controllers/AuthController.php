<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard.admin.page');
        }

        return view('pages.auth.login');
    }

    public function doLogin(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.admin.page');
        }

        // Menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'email' => 'Email or password invalid.',
        ])->onlyInput('email');
    }

    public function doLogout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login.page');
    }
}
