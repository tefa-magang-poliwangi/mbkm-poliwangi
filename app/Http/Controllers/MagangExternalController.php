<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\PenilaianMagangExt;
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
            'magangext' => MagangExt::all(),
        ];
        return view('pages.prodi.data-magang.index', $data);
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
        ]);

        $magangext = new MagangExt();
        $magangext->name = $validated['create_name'];
        $magangext->save();

        Alert::success('Success', 'Data Magang Berhasil Ditambahkan');

        return redirect()->route('daftar.data.magangext.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_magang_ext)
    {
        $data = [
            'id_magang_ext' => $id_magang_ext,
            'kriteria' => PenilaianMagangExt::all(),
            'magangext' => MagangExt::all(),
        ];

        return view('pages.prodi.data-magang.index', $data);
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
        ]);

        MagangExt::where('id', $id)->update([
            'name' => $validated['update_name'],
        ]);

        Alert::success('Success', 'Data Magang Berhasil DiUpdate');

        return redirect()->route('daftar.data.magangext.index');
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

        Alert::success('Success', 'Data Magang Berhasil Dihapus');

        return redirect()->route('daftar.data.magangext.index');
    }
}
