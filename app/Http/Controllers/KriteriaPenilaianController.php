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
    public function index(Request $request)
    {
        $kriteria = PenilaianMagangExt::query();
        if ($request->magang_ext) {
            $kriteria->where('id_magang_ext', $request->magang_ext);
        }

        $data = [
            'magangext'=> MagangExt::all(),
            'kriteria' =>$kriteria->get(),
            'request' => $request
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'create_perusahaan' => ['required'],
            'create_kriteria' => ['required']
        ]);

        PenilaianMagangExt::create([
            'id_magang_ext' => $validated['create_perusahaan'],
            'penilaian' => $validated['create_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil Ditambahkan');
        return redirect()->route('kriteria.penilaian.index');
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
            'update_perusahaan' => ['required'],
            'update_kriteria' => ['required']
        ]);

        PenilaianMagangExt::where('id', $id)->update([
            'id_magang_ext' => $validated['update_perusahaan'],
            'penilaian' => $validated['update_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil DiUpdate');
        return redirect()->route('kriteria.penilaian.index');
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


        Alert::success('Success', 'Kriteria Penilaia Berhasil Dihapus');

        return redirect()->route('kriteria.penilaian.index');
    }
}
