<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\ProfilAngkaMutu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ManajemenAngkaMutu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'profil_angka_mutu' => ProfilAngkaMutu::orderBy('status', 'asc')->get(),
            'periodes' => Periode::all(),
        ];

        return view('pages.admin.manajemen-angka-mutu.index', $data);
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
            'nama' => ['required', Rule::unique('profil_angka_mutus', 'nama')],
            'status' => ['required'],
            'periode' => ['required'],
        ]);

        if ($validated['status'] == 'Aktif') {
            // Ubah seluruh data profil menjadi tidak aktif
            ProfilAngkaMutu::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
        }

        ProfilAngkaMutu::create([
            'nama' => $validated['nama'],
            'status' => $validated['status'],
            'id_periode' => $validated['periode'],
        ]);

        Alert::success('Success', 'Profil Angka Mutu Berhasil Ditambahkan');

        return redirect()->route('manajemen.angka.mutu.index');
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
    public function update($id)
    {
        $profil_nilai_huruf = ProfilAngkaMutu::findOrFail($id);

        if ($profil_nilai_huruf->status == 'Tidak Aktif') {
            // menonaktifkan profil yang aktif sebelumnya
            ProfilAngkaMutu::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);

            ProfilAngkaMutu::where('id', $id)->update([
                'status' => 'Aktif',
            ]);

            Alert::success('Success', 'Profil Angka Mutu Berhasil Dihidupkan');
        } elseif ($profil_nilai_huruf->status == 'Aktif') {
            Alert::error('Oops', 'Profil Sudah Aktif');

            return redirect()->back();
        }

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
        //
    }
}
