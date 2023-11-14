<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PlMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;

class ProfilePLMitraController extends Controller
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
            'plmitra' => PlMitra::where('id_user', $id)->first(),
        ];

        return view('pages.plmitra.profil-plmitra.plmitra-profil', $data);
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
        $plmitra = PlMitra::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'between:11,15'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:8',],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($plmitra->id_user);

        User::where('id', $user->id)->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        PlMitra::where('id', $plmitra->id)->update([
            'nama' => $validated['nama'],
            'no_telp' => $validated['no_telp'],
            'email' => $validated['email'],
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
