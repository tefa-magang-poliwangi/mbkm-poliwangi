<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ProfileMitraController extends Controller
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
            'mitra' => Mitra::where('id_user', $id)->first(),
        ];

        return view('pages.mitra.profil-mitra.mitra-profil', $data);
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
        $mitra = Mitra::findOrFail($id);

        $validated = $request->validate([
            'foto' => ['max:10240', 'mimes:png,jpeg,jpg'],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'website' => ['required', 'url'],
            'narahubung' => ['required', 'string', 'between:11,15'],
            'email' => ['required', 'email'],
            'deskripsi' => ['required'],
            'provinces' => ['required'],
            'cities' => ['required'],
            'password' => ['nullable', 'confirmed', 'min:8', Rules\Password::defaults()],
            'password_confirmation' => ['nullable', 'min:8'],
        ]);

        // Menggunakan array kosong untuk $saveData sebagai awalan
        $saveData = [];

        // Pengecekan apakah ada input password
        if (!empty($request->input('password'))) {
            // Hash password
            $saveData['password'] = bcrypt($request->input('password'));
        }

        // checking any field foto
        if ($request->file('foto')) {
            if ($mitra->foto == null || $mitra->foto == '') {
                $saveData['foto'] = Storage::putFile('public/profile-mitra', $request->file('foto'));
            } else {
                Storage::delete($mitra->foto);
                $saveData['foto'] = Storage::putFile('public/profile-mitra', $request->file('foto'));
            }
        } else {
            $saveData['foto'] = $mitra->foto;
        }

        $user = User::findOrFail($mitra->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
        ]);

        // Jika ada password baru, update password
        if (isset($saveData['password'])) {
            $user->update(['password' => $saveData['password']]);
        }

        Mitra::where('id', $mitra->id)->update([
            'foto' => $saveData['foto'],
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'website' => $validated['website'],
            'narahubung' => $validated['narahubung'],
            'email' => $validated['email'],
            'deskripsi' => $validated['deskripsi'],
            'provinsi' => $validated['provinces'],
            'kota' => $validated['cities'],
        ]);

        Alert::success('Success', 'Profile Berhasil Diupdate');

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
