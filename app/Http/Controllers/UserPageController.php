<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function dashboard_user()
    {
        return view('pages.user.dashboard-user');
    }
}
