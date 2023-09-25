<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function do_logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('landing.page');
    }
}
