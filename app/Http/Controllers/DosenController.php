<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->prodi) {
            $id_prodi = $request->prodi;
        } else {
            $id_prodi = 0;
        }

        $datas = [
            'dosens' => Dosen::where('id_prodi', $id_prodi)->get(),
            'prodi' => Prodi::all()
        ];

        return view('pages.admin.manajemen-dosen.data-dosen', $datas);
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

        return view('pages.admin.manajemen-dosen.create-dosen', $data);
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
            'nama' => 'required|string',
            'email' => 'required|email',
            'id_prodi' => 'required',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
        ]);

        $user_dosen = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user_dosen->assignRole('dosen');

        Dosen::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'id_prodi' => $validated['id_prodi'],
            'id_user' => $user_dosen->id,
        ]);

        $credentials = [
            'username' => $user_dosen->username, // Menggunakan nim yang diinputkan pengguna pada form
            'password' => $validated['password'], // Menggunakan kata sandi yang diinputkan pengguna pada form
        ];

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     $user = Auth::user(); // Mengambil data pengguna yang sudah login
        //     Alert::toast('Selamat datang ' . $user->name, 'success');

        // }
        Alert::success('Success', 'Berhasil Menambahkan Data Dosen');
        return redirect()->route('data.dosen.index');
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
