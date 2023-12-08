<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use App\Models\Dosen;
use App\Models\DosenPL;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Http\Controllers\Controller;

class LapakhirDPLController extends Controller
{
    public function index()
    {
        $dosen = Dosen::where('id_user', auth()->id())->first();
        $dosenPl = DosenPL::where('id_dosen', $dosen->id)->first();

        if (!$dosenPl) {
            // Handle the case where DosenPL is not found for the authenticated user
            abort(404, 'DosenPL not found for the authenticated user.');
        }


        $id_dosen_pl = $dosenPl->id;
        // dd($id_dosen_pl);

        $pelamarMagangsDiterima = PelamarMagang::select('dosens.nama AS nama_dosen', 'pelamar_magangs.*')
            ->join('pendamping_lapang_mahasiswas AS plm', 'plm.id_pelamar_magang', 'pelamar_magangs.id')
            ->join('dosen_p_l_s AS dpl', 'dpl.id', 'plm.id_dosen_pl')
            ->join('dosens', 'dosens.id', 'dpl.id_dosen')
            ->where('status_diterima', 'Aktif')
            ->where('plm.id_dosen_pl', $id_dosen_pl)
            ->whereHas('pendampingLapangMahasiswa.dosen_pl', function ($query) use ($id_dosen_pl) {
                $query->where('id', $id_dosen_pl);
            })
            ->get();

        return view('dosen.pages-dpl.laporan-akhir.index', [
            'pelamarMagangs' => $pelamarMagangsDiterima,

        ]);
    }

    public function show($id_pelamar_magang)
    {
        $pelamarMagang = PelamarMagang::with(['mahasiswa', 'lowongan', 'pendampingLapangMahasiswa.dosen_pl.dosen'])
            ->findOrFail($id_pelamar_magang);

        $user = $pelamarMagang->mahasiswa->user;
        $mahasiswa = $pelamarMagang->mahasiswa;

        $logbooks = Logbook::where('id_mahasiswa', $mahasiswa->id)->get();
        $laporanAkhirs = LaporanAkhir::where('id_mahasiswa', $mahasiswa->id)->with('lowongan', 'transkripMitra')->get();
        return view('dosen.pages-dpl.laporan-akhir.show', compact('user', 'logbooks', 'laporanAkhirs'));
    }

    public function showFile($filename)
    {
        $filePath = storage_path("app/public/laporan_akhirs/$filename");

        // Cek apakah file ada
        if (!file_exists($filePath)) {
            abort(404);
        }

        $fileContents = file_get_contents($filePath);

        return response()->make($fileContents, 200, [
            'Content-Type' => 'application/pdf', // Sesuaikan dengan tipe file yang diinginkan
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}
