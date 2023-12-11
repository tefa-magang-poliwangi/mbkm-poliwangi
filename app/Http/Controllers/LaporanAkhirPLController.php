<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TranskripMitra;

class LaporanAkhirPLController extends Controller
{
    public function index()
    {
        // Assuming you are using Laravel Auth and PL Mitra is authenticated
        $pelamarMagang = auth()->user()->pelamar_magang;

        if ($pelamarMagang) {
            $transkripMitras = TranskripMitra::whereHas('pelamar_magang', function ($query) use ($pelamarMagang) {
                    $query->where('perusahaan_id', $pelamarMagang->perusahaan_id);
                })
                ->get();

            return view('pages.plmitra.layouts.laporan-akhir.index', compact('transkripMitras'));
        } else {
            // Handle when pelamar_magang is null
            return view('pages.plmitra.layouts.laporan-akhir.index', ['transkripMitras' => []]);
        }
    }

    public function show($id)
    {
        // Assuming you are using Laravel Auth and PL Mitra is authenticated
        $transkripMitra = TranskripMitra::whereHas('pelamar_magang', function ($query) {
                $query->where('perusahaan_id', auth()->user()->pelamar_magang->perusahaan_id);
            })
            ->findOrFail($id);

        return view('pages.plmitra.layouts.laporan-akhir.show', compact('transkripMitra'));
    }

    // Other methods...
}
