<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->roles == 'admin') {
                return redirect()->route('dashboard.admin.page');
            } elseif ($user->roles == 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa.page');
            } elseif ($user->roles == 'dosen') {
                return redirect()->route('dashboard.dosen.page');
            }
        }

        return view('pages.auth.login');
    }

    public function do_login(Request $request)
    {
        // Validasi credential
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        // Mengecek apakah user memiliki role yang diizinkan untuk login
        $user = User::where('username', $credentials['username'])->first();
        if (!$user || !$user->hasAnyRole(['admin', 'mahasiswa', 'dosen', 'mitra'])) {
            return back()->withErrors([
                'username' => 'User tidak ditemukan atau tidak memiliki role',
            ])->onlyInput('username');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user(); // Mengambil data pengguna yang sudah login

            if ($user->roles == 'admin') {
                return redirect()->route('dashboard.admin.page');
            } elseif ($user->roles == 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa.page');
            } elseif ($user->roles == 'dosen') {
                return redirect()->route('dashboard.dosen.page');
            }
        }

        // Menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'username' => 'Username or password invalid.',
        ])->onlyInput('username');
    }

    public function do_logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('landing.page');
    }
}
