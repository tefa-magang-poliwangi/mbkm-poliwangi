<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class form_upload extends Controller
{
    public function form_aploud()
    {
        return view('pages.user.transkrip-nilai.form-upload-transkrip-user');
    }
}
