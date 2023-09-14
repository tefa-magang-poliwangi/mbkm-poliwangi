<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormMitraController extends Controller
{
    public function form_mitra()
    {
        return view('pages.form-uploud.form-uploud-transkip');
    }
}
