<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
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
    public function index(Request $request)
    {
        $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        // Ambil daftar mahasiswa berdasarkan prodi_id
        $matakuliah = Matkul::where('id_prodi', $prodi_id)->get();

        $data = [
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
    public function store(Request $request)
    {
        $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        $validated = $request->validate([
            'create_matkul' => ['required', 'string'],
            'create_kode_matkul' => ['required', 'string'],
            'create_sks' => ['required'],
        ]);

        Matkul::create([
            'nama' => $validated['create_matkul'],
            'kode_matakuliah' => $validated['create_kode_matkul'],
            'sks' => $validated['create_sks'],
            'id_prodi' => $prodi_id,
        ]);

        Alert::success('Succsess', 'Data Matakuliah Berhasil Ditambahkan');

        return redirect()->route('manajemen.matakuliah.index');
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
        $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        $validated = $request->validate([
            'update_matkul' => ['required', 'string'],
            'update_kode_matkul' => ['required', 'string'],
            'update_sks' => ['required'],
        ]);

        Matkul::where('id', $id)->update([
            'nama' => $validated['update_matkul'],
            'kode_matakuliah' => $validated['update_kode_matkul'],
            'sks' => $validated['update_sks'],
            'id_prodi' => $prodi_id,
        ]);

        Alert::success('Success', 'Data Matakuliah Berhasil Diupdate');
        return redirect()->route('manajemen.matakuliah.index');
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


        return redirect()->route('manajemen.matakuliah.index');
    }
}
