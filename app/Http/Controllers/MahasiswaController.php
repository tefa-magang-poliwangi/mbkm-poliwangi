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
        $mahasiswas = Mahasiswa::query();

        if ($request->prodi) {
            $mahasiswas->where('id_prodi', $request->prodi);
        }

        $datas = [
            'mahasiswas' => $mahasiswas->get(),
            'prodi' => Prodi::all(),
            'request' => $request,
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
            'angkatan' => 'required',
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
        $data = [
            'mahasiswa' => Mahasiswa::findOrFail($id),
            'prodis' => Prodi::all(),
        ];

        return view('pages.admin.manajemen-mahasiswa.form-mahasiswa', $data);
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
        $mahasiswa = Mahasiswa::findOrFail($id);

        // validasi request mahasiswa
        $validated = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'angkatan' => 'required',
            'id_prodi' => 'required',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($mahasiswa->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['nim'],
            'password' => bcrypt($validated['password']),
        ]);

        Mahasiswa::where('id', $mahasiswa->id)->update([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'angkatan' => $validated['angkatan'],
            'no_telp' => $validated['no_telp'],
            'id_prodi' => $validated['id_prodi'],
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'Berhasil Mengubah Data Mahasiswa');

        return redirect()->route('data.mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = User::findOrFail($mahasiswa->id_user);
        $user->delete();
        $mahasiswa->delete();

        Alert::success('Success', 'Berhasil Menghapus Data Mahasiswa');

        return redirect()->route('data.mahasiswa.index');
    }
}
