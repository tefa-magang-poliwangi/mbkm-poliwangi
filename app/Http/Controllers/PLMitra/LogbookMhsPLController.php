<?php

namespace App\Http\Controllers\PLMitra;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use Illuminate\Http\Request;

class LogbookMhsPLController extends Controller
{
    public function index()
    {
        // Mendapatkan semua logbook
        $logbooks = Logbook::all();

        return view('pages.plmitra.layouts.logbook-mhs.index', compact('logbooks'));
    }

    public function show($id)
    {
        // Mendapatkan detail logbook
        $logbook = Logbook::findOrFail($id);

        return view('pages.plmitra.layouts.logbook-mhs.show', compact('logbook'));
    }
}
