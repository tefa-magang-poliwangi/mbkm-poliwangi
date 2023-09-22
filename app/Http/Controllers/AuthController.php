<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // backend login mahasiswa
    public function login_mahasiswa()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard.admin.page');
        } else if (Auth::guard('mahasiswas')->check()) {
            return redirect()->route('dashboard.user.page');
        }

        return view('pages.auth.login-mahasiswa');
    }

    public function do_login_mahasiswa(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'nim' => ['required', 'string', 'between:12,12'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if (Auth::guard('mahasiswas')->attempt($credentials)) {
            $request->session()->regenerate();

            // dd($request->session()->all());
            // Otentikasi pengguna
            return redirect()->route('dashboard.user.page');
        }

        // Menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'nim' => 'Nim or password invalid.',
        ])->onlyInput('nim');
    }


    public function do_logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('landing.page');
    }
}
