<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'prodi' => Prodi::all(),
            'jurusan' => Jurusan::all()
        ];

        return view('pages.prodi.daftar-prodi', $data);
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
            'create_nama_prodi' => ['required', 'string'],
            'create_jenjang_pendidikan' => ['required', 'string'],
            'create_kode_prodi' => ['required', 'string'],
            'create_jurusan' => ['required', 'string'],
        ]);

        Prodi::create([
            'nama' => $validated['create_nama_prodi'],
            'jenjang_pendidikan' => $validated['create_jenjang_pendidikan'],
            'kode_prodi' => $validated['create_kode_prodi'],
            'id_jurusan' => $validated['create_jurusan']
        ]);

        Alert::success('Success', 'Data Prodi Berhasil Ditambahkan');

        return redirect()->route('manajemen.prodi.index');
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
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        Alert::success('Success', 'Data Program Studi Berhasil Dihapus');

        return redirect()->route('manajemen.prodi.index');
    }
}
