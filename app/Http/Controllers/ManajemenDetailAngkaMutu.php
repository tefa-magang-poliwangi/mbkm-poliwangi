<?php

namespace App\Http\Controllers;

use App\Models\DetailAngkaMutu;
use App\Models\ProfilAngkaMutu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenDetailAngkaMutu extends Controller
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
    public function store(Request $request, $id_profil_angka_mutu)
    {
        $validated = $request->validate([
            'create_batas_atas' => ['required'],
            'create_batas_bawah' => ['required'],
            'create_angka_mutu' => ['required'],
        ]);

        DetailAngkaMutu::create([
            'batas_atas' => $validated['create_batas_atas'],
            'batas_bawah' => $validated['create_batas_bawah'],
            'angka_mutu' => $validated['create_angka_mutu'],
            'id_profil_angka_mutu' => $id_profil_angka_mutu,
        ]);

        Alert::success('Success', 'Data Angka Mutu Berhasil Ditambahkan');

        return redirect()->route('manajemen.detail.angka.mutu.show', $id_profil_angka_mutu);
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
            'profil_angka_mutu' => ProfilAngkaMutu::findOrFail($id),
            'detail_angka_mutu' => DetailAngkaMutu::where('id_profil_angka_mutu', $id)->orderBy('angka_mutu', 'desc')->get()
        ];

        return view('pages.admin.manajemen-angka-mutu.show', $data);
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
            'update_angka_mutu' => ['required'],
        ]);

        DetailAngkaMutu::where('id', $id)->update([
            'batas_atas' => $validated['update_batas_atas'],
            'batas_bawah' => $validated['update_batas_bawah'],
            'angka_mutu' => $validated['update_angka_mutu'],
        ]);

        Alert::success('Success', 'Data Angka Mutu Berhasil Diubah');

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
        $detail_angka_mutu = DetailAngkaMutu::findOrFail($id);
        $detail_angka_mutu->delete();

        Alert::success('Success', 'Data Angka Mutu Berhasil Dihapus');

        return redirect()->back();
    }
}
