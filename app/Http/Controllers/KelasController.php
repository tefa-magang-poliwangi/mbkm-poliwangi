<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use App\Models\AdminProdi;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_prodi()
    {
        $jurusan = AdminJurusan::where('id_user', Auth::user()->id)->first();

        $data = [
            'prodis' => Prodi::where('id_jurusan', $jurusan->id_jurusan)->get(),
        ];

        return view('pages.admin.manajemen-kelas.daftar-prodi', $data);
    }
    public function index($id_prodi)
    {
        // $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        // Ambil daftar mahasiswa berdasarkan prodi_id
        $kelas = Kelas::where('id_prodi', $id_prodi)->get();

        $data = [
            'id_prodi' => $id_prodi,
            'kelas' => $kelas,
            'prodis' => Prodi::all(),
            'periodes' => Periode::all(),
        ];

        return view('pages.admin.manajemen-kelas.index', $data);
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
        // $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        $validated = $request->validate([
            'create_tingkat_kelas' => ['required'],
            'create_abjad_kelas' => ['required'],

            'create_id_periode' => ['required'],
        ]);

        Kelas::create([
            'tingkat_kelas' => $validated['create_tingkat_kelas'],
            'abjad_kelas' => $validated['create_abjad_kelas'],
            'id_prodi' => $id_prodi,
            'id_periode' => $validated['create_id_periode'],
        ]);

        Alert::success('Success', 'Data Kelas Berhasil Ditambahan');

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
        $kelas = Kelas::findOrFail($id);
        $id_prodi = $kelas->id_prodi;
        // $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        $validated = $request->validate([
            'update_tingkat_kelas' => ['required'],
            'update_abjad_kelas' => ['required'],
            'update_id_periode' => ['required'],
        ]);

        Kelas::where('id', $id)->update([
            'tingkat_kelas' => $validated['update_tingkat_kelas'],
            'abjad_kelas' => $validated['update_abjad_kelas'],
            'id_prodi' => $id_prodi,
            'id_periode' => $validated['update_id_periode'],
        ]);

        Alert::success('Success', 'Data Kelas Berhasil Diupdate');

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
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        Alert::success('Success', 'Data Kelas Berhasil Dihapus');

        return redirect()->back();
    }
}
