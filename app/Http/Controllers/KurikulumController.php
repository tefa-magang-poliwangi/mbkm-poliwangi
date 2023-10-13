<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\Kurikulum;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;

        // Ambil daftar mahasiswa berdasarkan prodi_id
        $kurikulum = Kurikulum::where('id_prodi', $prodi_id)->get();

        $data = [
            'kurikulums' => $kurikulum,
            'prodi' => Prodi::all(),
            'request' => $request,
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
            'action' => route('manajemen.kurikulum.store'),
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
        $prodi_id = AdminProdi::where('id_user', Auth::user()->id)->first()->id_prodi;
        $validated = $request->validate([
            'create_nama' => ['required'],
            'create_status' => ['required'],
        ]);

        Kurikulum::create([
            'nama' => $validated['create_nama'],
            'status' => $validated['create_status'],
            'id_prodi' => $prodi_id,
        ]);

        Alert::success('Success', 'Data Kurikulum Berhasil Ditambahkan');

        return redirect()->route('manajemen.kurikulum.index');
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
            'update_nama' => ['required'],
            'update_status' => ['required'],

        ]);

        Kurikulum::where('id', $id)->update([
            'nama' => $validated['update_nama'],
            'status' => $validated['update_status'],
            'id_prodi' => $prodi_id,
        ]);

        Alert::success('Success', 'Data Kurikulum Berhasil Diupdate');

        return redirect()->route('manajemen.kurikulum.index');
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

        return redirect()->route('manajemen.kurikulum.index');
    }
}
