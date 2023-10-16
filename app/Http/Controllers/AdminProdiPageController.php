<?php

namespace App\Http\Controllers;

class AdminProdiPageController extends Controller
{
    public function dashboard_adminprodi()
    {
        return view('pages.admin.admin-prodi-dashboard');
    }
}