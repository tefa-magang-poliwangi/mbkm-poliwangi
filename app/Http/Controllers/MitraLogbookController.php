<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\PelamarMagang;
use App\Models\PendampingLapangMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraLogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Mitra::where('id_user', Auth::user()->id)->first();

        // Mendapatkan tanggal sekarang
        $currentDay = now();

        // Mendapatkan data logbook untuk tanggal sekarang
        $logbook = Logbook::where('tanggal', $currentDay->format('Y-m-d'))->get();

        // Mendapatkan data mahasiswa sesuai kebutuhan
        $mahasiswas = Mahasiswa::select('lowongans.nama AS nama_lowongan', 'mahasiswas.*', 'pl_mitras.nama AS nama_pl')
            ->join('pelamar_magangs', 'pelamar_magangs.id_mahasiswa', '=', 'mahasiswas.id')
            ->where('pelamar_magangs.status_diterima', '=', 'Diterima')
            ->join('lowongans', 'lowongans.id', 'pelamar_magangs.id_lowongan')
            ->join('pendamping_lapang_mahasiswas AS plm', 'plm.id_pelamar_magang', 'pelamar_magangs.id')
            ->join('pl_mitras', 'pl_mitras.id', 'plm.id_pl_mitra')
            ->where('lowongans.id_mitra', $mitra->id)
            ->get();

        // Kemudian meneruskan variabel ke view
        return view('pages.mitra.manajemen-logbook-mahasiswa.index', [
            'currentDay' => $currentDay,
            'logbook' => $logbook,
            'mahasiswas' => $mahasiswas,
        ]);
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
        // Tampilkan logbook untuk tanggal tertentu
        $logbook = Logbook::where('tanggal', $id)->get();

        return view('pages.mitra.manajemen-logbook-mahasiswa.show', ['logbook' => $logbook]);
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
    public function update()
    {
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
