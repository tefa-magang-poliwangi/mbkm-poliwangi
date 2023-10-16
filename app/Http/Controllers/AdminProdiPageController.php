<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AdminProdiPageController extends Controller
{
    public function dashboard_adminprodi()
    {
        return view('pages.admin.admin-prodi-dashboard');
    }
}