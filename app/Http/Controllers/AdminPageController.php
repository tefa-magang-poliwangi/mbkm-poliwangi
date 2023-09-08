<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard_admin()
    {
        return view('pages.admin.dashboard-admin');
    }
}
