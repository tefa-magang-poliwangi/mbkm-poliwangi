<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $kurikulum = Kurikulum::query();

        if ($request->prodi) {
            $kurikulum->where('id_prodi', $request->prodi);
        }
        $data = [
            'kurikulums' => $kurikulum->get(),
            'prodi' => Prodi::all(),
            'request' => $request
        ];

        return view('pages.prodi.kurikulum.data-kurikulum', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data = [
            'kurikulum' => Kurikulum::all(),
            'prodi' => Prodi::all(),
            'action' => route('daftar.kurikulum.store'),
        ];
        return view('pages.prodi.kurikulum.form-data-kurikulum', $data);
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
            'create_nama' => ['required'],
            'create_status' => ['required'],
            'create_prodi' => ['required'],
        ]);

        Kurikulum::create([
            'nama' => $validated['create_nama'],
            'status' => $validated['create_status'],
            'id_prodi' => $validated['create_prodi'],
        ]);

        Alert::success('Success', 'Data Kurikulum Berhasil Ditambahkan' );
        return redirect()->route('daftar.kurikulum.index');
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
            'update_nama' => ['required'],
            'update_status' => ['required'],
            'update_prodi' => ['required'],
        ]);

        Kurikulum::where('id', $id)->update([
            'nama' => $validated['update_nama'],
            'status' => $validated['update_status'],
            'id_prodi' => $validated['update_prodi'],
        ]);

        Alert::success('Success', 'Data Kurikulum Berhasil Diupdate');

        return redirect()->route('daftar.kurikulum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->delete();

        Alert::success('Success', 'Data Kurikulum Berhasil Dihapus');

        return redirect()->route('daftar.kurikulum.index');
    }
}
