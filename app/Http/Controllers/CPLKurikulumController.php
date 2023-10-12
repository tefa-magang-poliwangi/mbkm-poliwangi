<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CPLKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kurikulum)
    {
       $data = [
            'id_kurikulum' => $id_kurikulum,
            'cpl' => Cpl::where('id_kurikulum', $id_kurikulum)->get(),
            'kurikulum' => Kurikulum::findOrFail($id_kurikulum),
        ];
         return view('pages.prodi.daftar-cpl-kurikulum', $data);

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
    public function store(Request $request, $id_kurikulum)
    {
        $validated = $request->validate([
            'create_kode_cpl' => ['required'],
            'create_deskripsi' => ['required'],
            'create_jenis_cpl' => ['required'],

        ]);

        Cpl::create([
            'kode_cpl' => $validated['create_kode_cpl'],
            'deskripsi' => $validated['create_deskripsi'],

            'jenis_cpl' => $validated['create_jenis_cpl'],
            'id_kurikulum' =>$id_kurikulum,
        ]);

        Alert::success('Success', 'Data Kategori Berhasil Ditambahkan');

        return redirect()->route('daftar.cpl_kurikulum.index', $id_kurikulum);
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
    public function update(Request $request, $id, $id_kurikulum)
    {
        $validated = $request->validate([
            'update_kode_cpl' => ['required'],
            'update_deskripsi' => ['required'],
            'update_jenis_cpl' => ['required'],

        ]);

        Cpl::where('id', $id)->update([
            'kode_cpl' => $validated['update_kode_cpl'],
            'deskripsi' => $validated['update_deskripsi'],
            'jenis_cpl' => $validated['update_jenis_cpl'],
            'id_kurikulum' =>$id_kurikulum,
        ]);

        Alert::success('Success', 'Data Kategori Berhasil Diupdate');

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
        $cpl = Cpl::findOrFail($id);
        $cpl->delete();

        Alert::success('Success', 'Data CPL Berhasil Dihapus');

        return redirect()->back();
    }
}
