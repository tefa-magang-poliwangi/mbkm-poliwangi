<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\SektorIndustri;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class FormMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'mitras' => Mitra::all(),
            'sektor_industri' => SektorIndustri::all(),
            'kategori' => Kategori::all(),
        ];

        return view('pages.mitra.manajemen-pelamar-mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'formmitra' => Mitra::all(),
            'sektor_industri' => SektorIndustri::all(),
            'kategori' => Kategori::all(),
        ];

        return view('pages.mitra.manajemen-pelamar-mitra.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'id_sektor_industri' => ['required'],
            'id_kategori' => ['required'],
            'alamat' => ['required', 'string'],
            'provinces' => ['required'],
            'cities' => ['required'],
            'website' => ['required'],
            'narahubung' => ['required', 'string', 'between:11,15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8', Rules\Password::defaults()],
            'status' => ['required'],
        ]);

        $user_mitra = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'username' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user_mitra->assignRole('mitra');

        $saveData = [];

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $saveData['file'] = $uploadedFile->store('public/mitra/profile');
        }

        Mitra::create([
            'nama' => $validated['nama'],
            'id_sektor_industri' => $validated['id_sektor_industri'],
            'id_kategori' => $validated['id_kategori'],
            'alamat' => $validated['alamat'],
            'provinsi' => $validated['provinces'],
            'kota' => $validated['cities'],
            'website' => $validated['website'],
            'narahubung' => $validated['narahubung'],
            'email' => $validated['email'],
            'password_confirmation' => $validated['password_confirmation'],
            'status' => $validated['status'],
            'id_user' => $user_mitra->id,
        ]);

        Alert::success('Success', 'Mitra Berhasil Ditambahkan');

        return redirect()->route('manajemen.mitra.index');
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
            'sektor_industri' => SektorIndustri::all(),
            'kategori' => Kategori::all(),
            'mitra' => Mitra::findOrFail($id),
        ];

        return view('pages.mitra.manajemen-pelamar-mitra.update', $data);
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
            'update_nama' => ['required', 'string'],
            'update_sektor_industri' => ['required'],
            'update_kategori' => ['required'],
            'update_alamat' => ['required', 'string'],
            'provinces' => ['required'],
            'cities' => ['required'],
            'update_link_website' => ['required'],
            'update_no_telephone' => ['required', 'string', 'between:11,15'],
            'update_email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'min:8', Rules\Password::defaults()],
            'update_status' => ['required'],
        ]);

        $user = User::findOrFail($mitra->id_user);

        User::where('id', $user->id)->update([
            'name' => $validated['update_nama'],
            'email' => $validated['update_email'],
            'username' => $validated['update_email'],
            'password' => bcrypt($validated['password']),
        ]);

        Mitra::where('id', $mitra->id)->update([
            'nama' => $validated['update_nama'],
            'id_sektor_industri' => $validated['update_sektor_industri'],
            'id_kategori' => $validated['update_kategori'],
            'alamat' => $validated['update_alamat'],
            'provinsi' => $validated['provinces'],
            'kota' => $validated['cities'],
            'website' => $validated['update_link_website'],
            'narahubung' => $validated['update_no_telephone'],
            'email' => $validated['update_email'],
            'status' => $validated['update_status'],
            'id_user' => $user->id,
        ]);

        Alert::success('Success', 'Mitra Berhasil Diupdate');

        return redirect()->route('manajemen.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $user = User::findOrFail($mitra->id_user);
        $user->delete();
        $mitra->delete();

        Alert::success('Success', 'Mitra Berhasil Dihapus');

        return redirect()->route('manajemen.mitra.index');
    }
}
