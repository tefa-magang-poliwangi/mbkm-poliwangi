<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register_mahasiswa()
    {
        return view('pages.auth.register-mahasiswa');
    }
}
