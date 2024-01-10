<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\ProfilNilaiHuruf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ManajemenNilaiHuruf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'profil_nilai_huruf' => ProfilNilaiHuruf::orderBy('status', 'asc')->get(),
            'periodes' => Periode::all(),
        ];

        return view('pages.admin.manajemen-nilai-huruf.index', $data);
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
            'nama' => ['required', Rule::unique('profil_nilai_hurufs', 'nama')],
            'status' => ['required'],
            'periode' => ['required'],
        ]);

        if ($validated['status'] == 'Aktif') {
            // Ubah seluruh data profil menjadi tidak aktif
            ProfilNilaiHuruf::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
        }

        ProfilNilaiHuruf::create([
            'nama' => $validated['nama'],
            'status' => $validated['status'],
            'id_periode' => $validated['periode'],
        ]);

        Alert::success('Success', 'Profil Nilai Huruf Berhasil Ditambahkan');

        return redirect()->route('manajemen.nilai.huruf.index');
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
        $profil_nilai_huruf = ProfilNilaiHuruf::findOrFail($id);

        if ($profil_nilai_huruf->status == 'Tidak Aktif') {
            // menonaktifkan profil yang aktif sebelumnya
            ProfilNilaiHuruf::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);

            ProfilNilaiHuruf::where('id', $id)->update([
                'status' => 'Aktif',
            ]);

            Alert::success('Success', 'Profil Nilai Huruf Berhasil Dihidupkan');
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
