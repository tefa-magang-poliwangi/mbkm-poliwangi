<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function form_aploud()
    {
        return view('pages.admin.manajemen-kriteria.index');
    }
}
