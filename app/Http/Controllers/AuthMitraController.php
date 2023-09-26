<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class AuthMitraController extends Controller
{
    // backend login mitra
    public function login_mitra()
    {
        // if (auth()->user()) {
        //     return redirect()->route('dashboard.admin.page');
        // } else if (Auth::guard('mahasiswas')->check()) {
        //     return redirect()->route('dashboard.mahasiswa.page');
        // } else if (Auth::guard('dosens')->check()) {
        //     return redirect()->route('dashboard.dosen.page');
        // } else if (Auth::guard('mitras')->check()) {
        //     return redirect()->route('dashboard.mitra.page');
        // }

        return view('pages.auth.login-mitra');
    }

    public function do_login_mitra(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if (Auth::guard('mitras')->attempt($credentials)) {
            // Otentikasi pengguna
            $request->session()->regenerate();
            return redirect()->route('dashboard.mitra.page');
        }

        // Menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'username' => 'Username or password invalid.',
        ])->onlyInput('username');
    }
}