<?php

namespace App\Http\Controllers;

use App\Models\KompetensiLowongan;
use App\Models\KompetensiProgram;
use App\Models\LaporanMingguan;
use App\Models\Mahasiswa;
use App\Models\PelamarMagang;
use App\Models\ProgramMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaLaporanMingguanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswaId = auth()->user()->mahasiswa->first()->id;

        $laporanMingguans = LaporanMingguan::where('id_mahasiswa', $mahasiswaId)
            ->select('keterangan', 'tgl_mingguan_awal', 'tgl_mingguan_akhir')
            ->get();

        return view('pages.mahasiswa.laporan-mahasiswa.laporan-mingguan-internal.index', ['laporanMingguans' => $laporanMingguans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.mahasiswa.laporan-mahasiswa.laporan-mingguan-internal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
            'keterangan' => 'required',
        ]);

        $mahasiswaId = Auth::user()->mahasiswa->first()->id;
        $kompetensiProgram = KompetensiProgram::findOrFail($request->id_kompetensi_lowongan);

        // dd($kompetensiProgram);
        $laporanMingguan = LaporanMingguan::create([
            'tgl_mingguan_awal' => $request->waktu_mulai,
            'tgl_mingguan_akhir' => $request->waktu_akhir,
            'keterangan' => $request->keterangan,
            'id_mahasiswa' => $mahasiswaId,
            'id_program_magang' => $request->id_program_magang,
            'id_kompetensi_lowongan' => $kompetensiProgram->id_kompetensi_lowongan,
            'validasi_pl' => 'Aktif',
        ]);

        Alert::success('Success', 'Laporan Mingguan berhasil di Simpan');
        return redirect()->route('mahasiswa.laporan.mingguan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
