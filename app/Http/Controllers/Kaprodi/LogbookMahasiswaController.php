<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\User;
use App\Models\Logbook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenPL;
use App\Models\PendampingLapangMahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

class LogbookMahasiswaController extends Controller
{
    public function index()
    {

        $prodi_id = Dosen::Where('id_user', Auth::user()->id)->first()->id_prodi;

        $datas = [
            'dosens' => Dosen::Where('id_prodi', $prodi_id)->get(),
            'prodi' => Prodi::Where('id', $prodi_id)->get(),
            'dosen_pls' => DosenPL::all(),
            'id_prodi' => $prodi_id
        ];


        return view('pages.kaprodi.pages-kaprodi.daftar-logbook-mhs.index' , $datas);
    }

    public function show($id_dosen_pl)
    {
         // Temukan DosenPL berdasarkan ID
    $dosenPL = DosenPL::findOrFail($id_dosen_pl);

    // Dapatkan data Dosen dan Prodi terkait
    $dosen = $dosenPL->dosen;
    $prodi = $dosen->prodi;

    // Dapatkan daftar Mahasiswa atau data lain yang sesuai dengan kebutuhan Anda
    $mahasiswa = $dosenPL->mahasiswa;

    // Dapatkan data pendamping lapang terkait dengan ID DosenPL
    $pendamping_lapang = PendampingLapangMahasiswa::with('pelamar_magang.mahasiswa', 'pelamar_magang.pl_mitra', 'pelamar_magang.lowongan.mitra')
        ->where('id_dosen_pl', $id_dosen_pl)
        ->get();


        return view('pages.kaprodi.pages-kaprodi.daftar-logbook-mhs.show', compact('dosen', 'prodi', 'mahasiswa',  'pendamping_lapang'));
    }

    public function PageFile($id_pelamar_magang)
    {
            // Mengganti $id_pelamar_magang menjadi $id
    $user = User::findOrFail($id_pelamar_magang);

    // Menggunakan $id_pelamar_magang pada fungsi closure
    $logbooks = Logbook::whereHas('mahasiswa', function ($query) use ($id_pelamar_magang) {
        $query->where('id_mahasiswa', $id_pelamar_magang);
    })->get();

        foreach ($logbooks as $logbook)
{
    $logbook->komentar = $logbook->komentar_logbooks->first();
}


    return view('pages.kaprodi.pages-kaprodi.daftar-logbook-mhs.PageFile', compact('user', 'logbooks'));
    }


    
    public function showFile($filename)
    {
        $filePath = storage_path("app/public/logbooks/$filename");

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