<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoordinatorMagangExtController extends Controller
{
    public function index()
    {
        return view('pages.koordinator.koordinator-dashboard');
    }
}