<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraPageController extends Controller
{
    public function dashboard_mitra()
    {
        return view('pages.mitra.dashboard-mitra');
    }
}
