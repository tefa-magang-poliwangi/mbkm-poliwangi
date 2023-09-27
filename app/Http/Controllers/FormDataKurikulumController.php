<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKurikulum2Controller extends Controller
{
    public function form_data_kurikulum()
    {
        return view('pages.prodi.form-data-kurikulum');
    }
}
