<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaprodiController extends Controller
{
    //

    public function index(){

        $prodi_id = Dosen::Where('id_user',Auth::user()->id)->first()->id_prodi;
        $datas =[
            'dosens' => Dosen::Where('id_prodi',$prodi_id)->get(),
            'prodi' => Prodi::Where('id',$prodi_id)->first(),
        ];

        return view('pages.dosen.daftar-dosen-wali',$datas);
    }
}
