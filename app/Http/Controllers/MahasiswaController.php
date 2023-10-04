<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->prodi) {
            $id_prodi = $request->prodi;
        } else {
            $id_prodi = 0;
        }

        $datas = [
            'mahasiswas' => Mahasiswa::Where('id_prodi', $id_prodi)->get(),
            'prodi' => Prodi::all(),
        ];

        return view('pages.admin.manajemen-mahasiswa.data-mahasiswa', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'prodis' => Prodi::all(),
        ];

        return view('pages.admin.manajemen-mahasiswa.create-mahasiswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi request mahasiswa
        $validated = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'angkatan' => 'required|string',
            'id_prodi' => 'required',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $user_mahasiswa = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['nim'],
            'password' => bcrypt($validated['password']),
        ]);

        $user_mahasiswa->assignRole('mahasiswa');

        Mahasiswa::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'angkatan' => $validated['angkatan'],
            'no_telp' => $validated['no_telp'],
            'id_prodi' => $validated['id_prodi'],
            'id_user' => $user_mahasiswa->id,
        ]);

        $credentials = [
            'username' => $user_mahasiswa->username, // Menggunakan nim yang diinputkan pengguna pada form
            'password' => $validated['password'], // Menggunakan kata sandi yang diinputkan pengguna pada form
        ];

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     $user = Auth::user(); // Mengambil data pengguna yang sudah login
        //     Alert::toast('Selamat datang ' . $user->name, 'success');

        // }
        Alert::success('Success', 'Berhasil Menambahkan Data Mahasiswa');
        return redirect()->route('data.mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
