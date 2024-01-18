<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\MagangExt;
use App\Models\Periode;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MagangExternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_prodi)
    {
        $data = [
            'prodi' => Prodi::where('id', $id_prodi)->get(),
            'magang_ext' => MagangExt::where('id_prodi', $id_prodi)->get(),
            'periodes' => Periode::where('status', 'Aktif')->get(),
        ];

        return view('pages.prodi.data-magang-external.index', $data);
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
            'create_name' => ['required', 'string'],
            'create_jenis_magang' => ['required'],
            'create_id_periode' => ['required'],
            'create_id_prodi' => ['required'],
        ]);

        $magangext = new MagangExt();
        $magangext->name = $validated['create_name'];
        $magangext->jenis_magang = $validated['create_jenis_magang'];
        $magangext->id_periode = $validated['create_id_periode'];
        $magangext->id_prodi = $validated['create_id_prodi'];
        $magangext->save();

        Alert::success('Success', 'Data Magang External Berhasil Ditambahkan');

        return redirect()->route('manajemen.magang.ext.index');
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
            'update_name' => ['required', 'string'],
            'update_jenis_magang' => ['required', 'string'],
            'update_id_periode' => ['required', 'string'],
            'update_id_prodi' => ['required', 'string'],
        ]);

        MagangExt::where('id', $id)->update([
            'name' => $validated['update_name'],
            'jenis_magang' => $validated['update_jenis_magang'],
            'id_periode' => $validated['update_id_periode'],
            'id_prodi' => $validated['update_id_prodi'],
        ]);

        Alert::success('Success', 'Data Magang External Berhasil Diubah');

        return redirect()->route('manajemen.magang.ext.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magangext = MagangExt::findOrFail($id);
        $magangext->delete();

        Alert::success('Success', 'Data Magang External Berhasil Dihapus');

        return redirect()->route('manajemen.magang.ext.index');
    }
}
