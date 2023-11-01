<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;

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
        // dd($request);

        $validated = $request->validate([
            'foto' => ['max:10240', 'mimes:png,jpeg,jpg'],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'website' => ['required'],
            'narahubung' => ['required', 'string', 'between:11,15'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:8',],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
            'deskripsi' => ['required'],
        ]);

        // checking any field foto
        if ($request->file('foto')) {
            // if user does not have foto
            if ($mitra->foto == null || $mitra->foto == '') {
                $saveData['foto'] = Storage::putFile('public/profile-mitra', $request->file('foto'));
            } else {
                //   delete any foto files that own already
                Storage::delete($mitra->foto);

                // and then save new foto
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
            'password' => bcrypt($validated['password']),
        ]);

        Mitra::where('id', $mitra->id)->update([
            'foto' => $saveData['foto'],
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'website' => $validated['website'],
            'narahubung' => $validated['narahubung'],
            'email' => $validated['email'],
            'deskripsi' => $validated['deskripsi'],
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
