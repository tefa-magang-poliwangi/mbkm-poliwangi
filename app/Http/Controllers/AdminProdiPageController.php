<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProdiPageController extends Controller
{
    public function dashboard_adminprodi()
    {
        return view('pages.admin.adminProdi-dashboard');
    }
}
