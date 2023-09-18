<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKaprodiController extends Controller
{
    public function dashboard_kaprodi()
    {
        return view('pages.form-mitra.form-mitra');
    }
}
