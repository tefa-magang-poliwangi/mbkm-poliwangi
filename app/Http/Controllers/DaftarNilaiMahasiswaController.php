<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\NilaiKonversi;
use App\Models\Periode;
use App\Models\PesertaKelas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DaftarNilaiMahasiswaController extends Controller
{

    public function daftar_prodi()
    {
        $data = [
            'prodis' => Prodi::all(),
        ];

        return view('pages.akademik.daftar-nilai-mahasiswa.daftar-prodi', $data);
    }

    public function daftar_kelas($id_prodi)
    {
        $data = [
            'prodis' => Prodi::all(),
            'periodes' => Periode::all(),
            'kelas' => Kelas::where('id_prodi', $id_prodi)->get(),
        ];

        return view('pages.akademik.daftar-nilai-mahasiswa.daftar-kelas', $data);
    }

    public function daftar_mahasiswa($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'peserta_kelas' => PesertaKelas::where('id_kelas', $id_kelas)->get(),
        ];

        return view('pages.akademik.daftar-nilai-mahasiswa.daftar-mahasiswa-perkelas', $data);
    }

    public function daftar_nilai_mahasiswa($id_mahasiswa)
    {
        $data = [
            'nilai_transkrip' => NilaiKonversi::where('id_mahasiswa', $id_mahasiswa)->get(),
        ];

        return view('pages.akademik.daftar-nilai-mahasiswa.daftar-nilai-mahasiswa', $data);
    }

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
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
