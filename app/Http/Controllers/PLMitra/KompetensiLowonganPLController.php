<?php

namespace App\Http\Controllers\PLMitra;

use Illuminate\Http\Request;
use App\Models\KompetensiLowongan;
use App\Http\Controllers\Controller;

class KompetensiLowonganPLController extends Controller
{
    public function index()
    {
        $kompetensiLowongans = KompetensiLowongan::with('lowongan')->get();
        return view('pages.plmitra.layouts.kompetensi-lowongan.index', compact('kompetensiLowongans'));
    }
}
