<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;

class ProfileMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != Auth::user()->id) {
            return redirect()->back();
        }

        $data = [
            'mahasiswa' => Mahasiswa::where('id_user', $id)->first(),
        ];

        return view('pages.mahasiswa.profil-mahasiswa.mahasiswa-profil', $data);
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
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'angkatan' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . (date('Y'))],
            'no_telp' => 'required|string|between:11,15',
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        // Menggunakan array kosong untuk $saveData sebagai awalan
        $saveData = [];

        // Pengecekan apakah ada input password
        if (!empty($request->input('password'))) {
            // Hash password
            $saveData['password'] = bcrypt($request->input('password'));
        }

        $user = User::findOrFail($mahasiswa->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
        ]);

        // Jika ada password baru, update password
        if (isset($saveData['password'])) {
            $user->update(['password' => $saveData['password']]);
        }

        Mahasiswa::where('id', $mahasiswa->id)->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'angkatan' => $validated['angkatan'],
            'no_telp' => $validated['no_telp'],
        ]);

        Alert::success('Success', 'Profil Berhasil Diubah');

        return redirect()->back();
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
