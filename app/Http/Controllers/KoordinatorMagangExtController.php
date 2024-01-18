<?php

namespace App\Http\Controllers;

use App\Models\JenisProgram;
use App\Models\MagangExt;
use App\Models\Prodi;
use App\Models\Periode;
use Illuminate\Http\Request;

class KoordinatorMagangExtController extends Controller
{
    public function index()
    {
                return view('pages.koordinator.koordinator-dashboard');
    }

    public function show()
    {
        $data = [
            'jenis_program' => JenisProgram::all(),
            'prodi' => Prodi::all()
        ];

        return view('pages.koordinator.daftar-program', $data);
    }

    public function daftar_prodi($id_jenis_program)
    {
        $data = [
            'prodis' => Prodi::all(),
            'jenis_program' => JenisProgram::findOrFail($id_jenis_program)
        ];

        return view('pages.koordinator.daftar-prodi', $data);
    }
}
