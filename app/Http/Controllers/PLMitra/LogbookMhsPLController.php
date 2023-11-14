<?php

namespace App\Http\Controllers\PLMitra;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use Illuminate\Http\Request;

class LogbookMhsPLController extends Controller
{
    public function index()
    {
        $data = [
            'logbook' => Logbook::all(),
            
        ];
        return view('pages.plmitra.layouts.logbook-mhs.index', $data);
    }
}
