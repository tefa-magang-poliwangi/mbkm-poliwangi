<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraLowonganController extends Controller
{
    public function lowongan_mitra()
    {
        return view('pages.form-mitra.form-mitra');
    }
}
