<?php

namespace App\Http\Controllers;

use App\Models\DetailNilaiHuruf;
use App\Models\ProfilNilaiHuruf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenDetailNilaiHuruf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id_profil_nilai_huruf)
    {
        $validated = $request->validate([
            'create_batas_atas' => ['required'],
            'create_batas_bawah' => ['required'],
            'create_nilai_huruf' => ['required'],
        ]);

        DetailNilaiHuruf::create([
            'batas_atas' => $validated['create_batas_atas'],
            'batas_bawah' => $validated['create_batas_bawah'],
            'nilai_huruf' => $validated['create_nilai_huruf'],
            'id_profil_nilai_huruf' => $id_profil_nilai_huruf,
        ]);

        Alert::success('Success', 'Data Nilai Huruf Berhasil Ditambahkan');

        return redirect()->route('manajemen.detail.nilai.huruf.show', $id_profil_nilai_huruf);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'profil_nilai_huruf' => ProfilNilaiHuruf::findOrFail($id),
            'detail_nilai_huruf' => DetailNilaiHuruf::where('id_profil_nilai_huruf', $id)->orderBy('nilai_huruf', 'asc')->get()
        ];

        return view('pages.admin.manajemen-nilai-huruf.show', $data);
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
            'update_batas_atas' => ['required'],
            'update_batas_bawah' => ['required'],
            'update_nilai_huruf' => ['required'],
        ]);

        DetailNilaiHuruf::where('id', $id)->update([
            'batas_atas' => $validated['update_batas_atas'],
            'batas_bawah' => $validated['update_batas_bawah'],
            'nilai_huruf' => $validated['update_nilai_huruf'],
        ]);

        Alert::success('Success', 'Data Nilai Huruf Berhasil Diubah');

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
        $detail_nilai_huruf = DetailNilaiHuruf::findOrFail($id);
        $detail_nilai_huruf->delete();

        Alert::success('Success', 'Data Nilai Huruf Berhasil Dihapus');

        return redirect()->back();
    }
}
