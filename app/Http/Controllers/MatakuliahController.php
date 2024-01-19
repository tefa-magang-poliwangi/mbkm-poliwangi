<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_prodi()
    {
        $jurusan_id = AdminJurusan::where('id_user', Auth::user()->id)->first()->id_jurusan;

        $data = [
            'prodis' => Prodi::where('id_jurusan', $jurusan_id)->get(),
        ];

        return view('pages.prodi.matkul.daftar-prodi', $data);
    }

    public function index(Request $request, $id_prodi)
    {
        // Ambil daftar mahasiswa berdasarkan prodi_id
        $matakuliah = Matkul::where('id_prodi', $id_prodi)->get();

        $data = [
            'id_prodi' => $id_prodi,
            'matakuliah' => $matakuliah,
            'prodi' => Prodi::all(),
            'request' => $request
        ];
        return view('pages.prodi.matkul.index', $data);
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
    public function store(Request $request, $id_prodi)
    {
        $validated = $request->validate([
            'create_matkul' => ['required', 'string'],
            'create_kode_matkul' => ['required', 'string'],
            'create_sks' => ['required'],
            'create_id_matkul_feeder' => ['required'],
        ]);

        Matkul::create([
            'nama' => $validated['create_matkul'],
            'kode_matakuliah' => $validated['create_kode_matkul'],
            'sks' => $validated['create_sks'],
            'id_matkul_feeder' => $validated['create_id_matkul_feeder'],
            'id_prodi' => $id_prodi,
        ]);

        Alert::success('Succsess', 'Data Matakuliah Berhasil Ditambahkan');

        return redirect()->back();
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

        $matkul = Matkul::findOrFail($id);
        $id_prodi = $matkul->id_prodi;

        $validated = $request->validate([
            'update_matkul' => ['required', 'string'],
            'update_kode_matkul' => ['required', 'string'],
            'update_sks' => ['required'],
            'update_id_matkul_feeder' => ['required'],
        ]);

        Matkul::where('id', $id)->update([
            'nama' => $validated['update_matkul'],
            'kode_matakuliah' => $validated['update_kode_matkul'],
            'sks' => $validated['update_sks'],
            'id_matkul_feeder' => $validated['update_id_matkul_feeder'],
            'id_prodi' => $id_prodi,
        ]);

        Alert::success('Success', 'Data Matakuliah Berhasil Diupdate');
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
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        Alert::success('Success', 'Data Matakuliah Berhasil Dihapus');


        return redirect()->back();
    }
}
