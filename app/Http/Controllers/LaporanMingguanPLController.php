<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanMingguan;
use App\Models\PlMitra;

class LaporanMingguanPLController extends Controller
{
    public function index()
    {
        // Get all the weekly reports for PL Mitra validation
        $laporanMingguans = LaporanMingguan::all();

        return view('pages.plmitra.layouts.laporan-mingguan.index', compact('laporanMingguans'));
    }

    public function show($id)
    {
        // Get a specific weekly report for PL Mitra validation
        $laporanMingguan = LaporanMingguan::findOrFail($id);

        // Check if the PL Mitra is authorized to view this report
        $this->authorize('view', $laporanMingguan);

        return view('pages.plmitra.layouts.laporan-mingguan.show', compact('laporanMingguan'));
    }

    public function validateReport($id)
    {
        // Get a specific weekly report for PL Mitra validation
        $laporanMingguan = LaporanMingguan::findOrFail($id);

        // Validate the report (you can add your validation logic here)

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Weekly report validated successfully.');
    }
}
