<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
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
        if (!$user || !$user->hasAnyRole(['admin', 'akademik', 'wadir', 'admin-jurusan', 'kaprodi', 'dosen', 'dosen-wali', 'dosen-pl', 'mahasiswa', 'mitra', 'pl-mitra', 'koordinator'])) {
            return back()->withErrors([
                'username' => 'User tidak ditemukan atau tidak memiliki role',
            ])->onlyInput('username');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user(); // Mengambil data pengguna yang sudah login
            Alert::toast('Selamat datang ' . $user->name, 'success');

            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard.admin.page');
            } elseif ($user->hasRole('wadir')) {
                return redirect()->route('dashboard.wadir.page');
            } elseif ($user->hasRole('akademik')) {
                return redirect()->route('dashboard.akademik.page');
            } elseif ($user->hasRole('admin-jurusan')) {
                return redirect()->route('dashboard.admin.jurusan.page');
            } elseif ($user->hasRole('kaprodi')) {
                return redirect()->route('dashboard.dosen.page');
            } elseif ($user->hasRole('dosen')) {
                return redirect()->route('dashboard.dosen.page');
            } elseif ($user->hasRole('dosen-wali')) {
                return redirect()->route('dashboard.dosen.page');
            } elseif ($user->hasRole('dosen-pl')) {
                return redirect()->route('dashboard.dosen.page');
            } elseif ($user->hasRole('mahasiswa')) {
                return redirect()->route('dashboard.mahasiswa.page');
            } elseif ($user->hasRole('mitra')) {
                return redirect()->route('dashboard.mitra.page');
            } elseif ($user->hasRole('pl-mitra')) {
                return redirect()->route('dashboard.plmitra.page');
            } elseif ($user->hasRole('koordinator')) {
                return redirect()->route('dashboard.koordinator.page');
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

        Alert::toast('Anda baru saja Sign out', 'info');

        return redirect()->route('landing.page');
    }
}
