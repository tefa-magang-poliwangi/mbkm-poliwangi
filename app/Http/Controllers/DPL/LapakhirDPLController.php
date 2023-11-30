<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LapakhirDPLController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'mahasiswa');
        })->get();

        return view('pages.dosen.pages-dpl.laporan-akhir.index', compact('users'));
    }

    public function show($id_user)
    {
        $user = User::findOrFail($id_user);
        $mahasiswa = Mahasiswa::where('id_user', $id_user)->first();
        // dd($user->mahasiswa->id);
        $logbooks = Logbook::where('id_mahasiswa', $mahasiswa->id)->get();
        $laporanAkhirs = LaporanAkhir::where('id_mahasiswa', $mahasiswa->id)->with('lowongan', 'kelas')->get();
        //dd($laporanAkhirs); // Cek data sebelum ditampilkan
        return view('pages.dosen.pages-dpl.laporan-akhir.show', compact('user', 'logbooks', 'laporanAkhirs'));
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
