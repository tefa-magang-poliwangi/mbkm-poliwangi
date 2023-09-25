<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page()
    {
        return view('pages.landing-page');
    }
}
