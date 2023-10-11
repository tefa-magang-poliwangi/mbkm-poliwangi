<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\Mitra;
=======
use App\Models\PelamarMagang;
>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MitraDaftarPelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
<<<<<<< HEAD
            'mitradaftarpelamar' => Mitra::all(),
            'mahasiswa' => Mahasiswa::all(),
            'Lowongan' => Lowongan::all(),
=======
            'daftar_pelamar' => PelamarMagang::all()
>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
        ];

        return view('pages.mitra.manajemen-pelamar-mitra.mitra-daftar-pelamar', $data);
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
        $validated = $request->validate([
            'create_mahasiswa' => ['required'],
            'create_lowongan' => ['required'],
        ]);

         MitraDaftarPelamarController::create([
            'id_mahasiswa' => $validated['create_mahasiswa'],
            'id_lowongan' => $validated['create_lowongan']
        ]);

        Alert::success('Succes', 'Data Admin Prodi Berhasil Ditambahkan');
        return redirect()->route('daftar-pelamar.mitra.page');
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
