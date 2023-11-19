<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\DosenPL;
use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\PelamarMagang;
use App\Models\PendampingLapangMahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelamarMagangController extends Controller
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
    public function create($id_dosen_pl)
    {
        // $id_user = Auth()->user()->id;
        $dosen_pl = DosenPL::where('id', $id_dosen_pl)->first();

        $data = [
            'pelamar_magang' => PelamarMagang::where('status_diterima', 'Diterima')
                ->whereDoesntHave('pendamping_lapang_mahasiswa')
                ->get(),
            'pendamping_lapang' => PendampingLapangMahasiswa::where('id_dosen_pl', $dosen_pl->id_dosen)->first(),
            'id_dosen_pl' => $id_dosen_pl
        ];

        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.form-pelamar-magang', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_dosen_pl)
    {
        $id_lowongan = null;
        $id_pl_mitra = null;
        $validated = $request->validate([
            'mahasiswas' => ['required', 'array', 'min:1'],
        ]);

        $mahasiswa_convert = collect($validated['mahasiswas']);

        foreach ($mahasiswa_convert as $mahasiswaId) {
            PendampingLapangMahasiswa::create([
                'id_dosen_pl' => $id_dosen_pl,
                'id_pelamar_magang' => $mahasiswaId,
                'id_pl_mitra' => $id_pl_mitra, // Sesuaikan dengan id_pl_mitra yang sesuai
                'id_lowongan' => $id_lowongan, // Sesuaikan dengan id_lowongan yang sesuai
            ]);
        }

        Alert::success('Success', 'Data Mahasiswa Magang Berhasil Ditambahkan ');

        return redirect()->route('manajemen.dosen.pl.show', $id_dosen_pl);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dosen_pl, $id)
    {
        $peserta_magang = PendampingLapangMahasiswa::findOrFail($id);
        $peserta_magang->delete();

        Alert::success('Success', 'Data Mahasiswa Magang Berhasil Dihapus');

        return redirect()->route('manajemen.dosen.pl.show', $id_dosen_pl);
    }
}
