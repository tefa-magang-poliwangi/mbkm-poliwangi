<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranskipNilaiController extends Controller
{
    public function form_uploud_transkip()
    {
        return view('pages.form-uploud.form-uploud-transkip');
    }
}
