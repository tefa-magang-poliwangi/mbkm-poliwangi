<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\PenilaianMagangExt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_magang_ext)
    {
        $data = [
            'id_magang_ext' => $id_magang_ext,
            'kriteria' => PenilaianMagangExt::where('id_magang_ext', $id_magang_ext)->get(),
            'magang_ext' => MagangExt::findOrFail($id_magang_ext),
        ];

        return view('pages.admin.manajemen-kriteria.index', $data);
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
    public function store(Request $request, $id_magang_ext)
    {
        $validated = $request->validate([
            'create_kriteria' => ['required']
        ]);

        PenilaianMagangExt::create([
            'id_magang_ext' => $id_magang_ext,
            'penilaian' => $validated['create_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil Ditambahkan');
        return redirect()->route('kriteria.penilaian.index', $id_magang_ext);
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
        $validated = $request->validate([
            'update_kriteria' => ['required']
        ]);

        PenilaianMagangExt::where('id', $id)->update([
            'penilaian' => $validated['update_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil Diubah');
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
        $kriteria = PenilaianMagangExt::findOrFail($id);
        $kriteria->delete();

        Alert::success('Success', 'Kriteria Penilaian Berhasil Dihapus');

        return redirect()->back();
    }
}
