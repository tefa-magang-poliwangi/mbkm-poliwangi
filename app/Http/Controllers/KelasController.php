<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Prodi;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'kelas' => Kelas::all(),
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'create_tingkat_kelas' => ['required'],
            'create_abjad_kelas' => ['required'],
            'create_id_prodi' => ['required'],
            'create_id_periode' => ['required'],
        ]);

        Kelas::create([
            'tingkat_kelas' => $validated['create_tingkat_kelas'],
            'abjad_kelas' => $validated['create_abjad_kelas'],
            'id_prodi' => $validated['create_id_prodi'],
            'id_periode' => $validated['create_id_periode'],
        ]);

        return redirect()->route('manajemen.kelas.index');
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
            'update_tingkat_kelas' => ['required'],
            'update_abjad_kelas' => ['required'],
            'update_id_prodi' => ['required'],
            'update_id_periode' => ['required'],
        ]);

        Kelas::where('id', $id)->update([
            'tingkat_kelas' => $validated['update_tingkat_kelas'],
            'abjad_kelas' => $validated['update_abjad_kelas'],
            'id_prodi' => $validated['update_id_prodi'],
            'id_periode' => $validated['update_id_periode'],
        ]);

        return redirect()->route('manajemen.kelas.index');
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

        return redirect()->route('manajemen.kelas.index');
    }
}
