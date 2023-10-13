<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\Periode;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MagangExternalController extends Controller
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
            'magang_ext' => MagangExt::all(),
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
            'create_id_periode' => ['required'],
        ]);

        $magangext = new MagangExt();
        $magangext->name = $validated['create_name'];
        $magangext->id_periode = $validated['create_id_periode'];
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
            'update_id_periode' => ['required', 'string'],
        ]);

        MagangExt::where('id', $id)->update([
            'name' => $validated['update_name'],
            'id_periode' => $validated['update_id_periode'],
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
