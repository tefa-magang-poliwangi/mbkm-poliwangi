<?php

namespace App\Http\Controllers;

use App\Models\KompetensiLowongan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KompetensiLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_lowongan)
    {
        $data = [
            'id_lowongan' => $id_lowongan,
            'komptensi_lowongan' => KompetensiLowongan::where('id_lowongan', $id_lowongan)->get(),
            'lowongan' => Lowongan::findOrFail($id_lowongan),
        ];
        return view('pages.plmitra.layouts.kompetensi-lowongan.index', $data);
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
    public function store(Request $request, $id_lowongan)
    {
        $validated = $request->validate([
            'create_kompetensi' => ['required']
        ]);

        KompetensiLowongan::create([
            'id_lowongan' => $id_lowongan,
            'kompetensi' => $validated['create_kompetensi'],
        ]);

        Alert::success('Success', 'kompetensi Lowongan Berhasil Ditambahkan');

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
        $validated = $request->validate([
            'update_kompetensi' => ['required']
        ]);

        KompetensiLowongan::where('id', $id)->update([
            'kompetensi' => $validated['update_kompetensi'],
        ]);

        Alert::success('Success', 'Kompetensi Lowongan Berhasil Diubah');
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
        $kompetensi = KompetensiLowongan::findOrFail($id);
        $kompetensi->delete();

        Alert::success('Success', 'Kompetensi Lowongan Berhasil Dihapus');

        return redirect()->back();
    }
}
