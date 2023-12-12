<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Models\LaporanMingguan;
use Illuminate\Support\Facades\Auth;

class MitraLaporanMingguanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporanMingguan = LaporanMingguan::where('id_mahasiswa', $id)->get();
        $pelamarMagang = PelamarMagang::where('id_mahasiswa', $id)->first();

        $data = [
            'laporanMingguan' => $laporanMingguan,
            'pelamarMagang' => $pelamarMagang,
        ];

        return view('pages.mitra.manajemen-laporan-mingguan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
