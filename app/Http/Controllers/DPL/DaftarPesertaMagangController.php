<?php

namespace App\Http\Controllers\DPL;

use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Http\Controllers\Controller;

class DaftarPesertaMagangController extends Controller
{
    public function index()
    {
        $pelamarMagangsDiterima = PelamarMagang::with(['mahasiswa', 'lowongan', 'pendampingLapangMahasiswa.dosen_pl.dosen'])
            ->where('status_diterima', 'Aktif')
            ->get();

        $pelamarMagangsTidakAktif = PelamarMagang::with(['mahasiswa', 'lowongan', 'pendampingLapangMahasiswa.dosen_pl.dosen'])
            ->where('status_diterima', 'Tidak Aktif')
            ->get();

        return view('pages.dosen.pages-dpl.daftar-peserta-magang.index', [
            'pelamarMagangs' => $pelamarMagangsDiterima,
            'pelamarMagangsTidakAktif' => $pelamarMagangsTidakAktif,
        ]);
    }
}
