<?php

namespace App\Http\Controllers\PLMitra;

use Illuminate\Http\Request;
use App\Models\ProgramMagang;
use App\Http\Controllers\Controller;

class ProgramMagangPLController extends Controller
{
    public function index()
    {
        $programMagangs = ProgramMagang::all();
        return view('pages.plmitra.layouts.program-magang.index', compact('programMagangs'));
    }
}
