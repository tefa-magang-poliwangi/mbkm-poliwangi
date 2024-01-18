<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use App\Models\AdminProdi;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan_id = AdminJurusan::where('id_user', Auth::user()->id)->first();

        // dd($jurusan_id);

        $datas = [
            'jurusan' => Jurusan::all(),
            'dosens' => Dosen::where('id_jurusan', $jurusan_id->id_jurusan)->get(),
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

        return view('pages.admin.manajemen-dosen.create-dosen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurusan = AdminJurusan::where('id_user', Auth::user()->id)->first();

        // validasi request dosen
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
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
            'id_jurusan' => $jurusan->id_jurusan,
            'id_user' => $user_dosen->id,
        ]);

        Alert::success('Success', 'Berhasil Menambahkan Data Dosen');

        return redirect()->route('manajemen.dosen.index');
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
            'dosen' => Dosen::findOrFail($id),
        ];

        return view('pages.admin.manajemen-dosen.form-dosen', $data);
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
        $dosen = Dosen::findOrFail($id);
        $jurusan = AdminJurusan::where('id_user', Auth::user()->id)->first();

        // validasi request dosen
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required|string|between:11,15',
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($dosen->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Dosen::where('id', $dosen->id)->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'id_jurusan' => $jurusan->id_jurusan,
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'Berhasil Mengubah Data Dosen');

        return redirect()->route('manajemen.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->id_user);
        $user->delete();
        $dosen->delete();

        Alert::success('Success', 'Berhasil Menghapus Data Dosen');

        return redirect()->route('manajemen.dosen.index');
    }
}
