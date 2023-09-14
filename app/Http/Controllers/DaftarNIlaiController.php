<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormMitraController extends Controller
{
    public function daftar_nilai()
    {
        return view('pages.form-uploud.daftar-nilai');
    }
}
