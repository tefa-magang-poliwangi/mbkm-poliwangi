<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Models\MahasiswaMagang;
use App\Models\Mitra;
use App\Models\Periode;
use App\Models\TranskripMitra;
use RealRashid\SweetAlert\Facades\Alert;

class MitraSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Mitra::where('id_user', Auth::user()->id)->first();
        $countPelamarMagang = PelamarMagang::where('status_diterima', 'Diterima');
        // dd($countPelamarMagang);
        $data = [
            'lowongan' => Lowongan::where('id_mitra', $mitra->id)->get(),
            'countPelamarMagang' => $countPelamarMagang,
            'pelamar_magang' => PelamarMagang::where('status_diterima', 'Diterima')->get(),

        ];

        return view('pages.mitra.manajemen-sertifikat-mitra.index', $data);
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
    public function store(Request $request, $id_pelamar_magang)
    {
        $request->validate([
            'file_sertifikat' => 'required|mimes:pdf|max:2048',
            'file_transkrip' => 'required|mimes:pdf|max:2048',
            'evaluasi' => 'required|string',
        ]);

        $periode_aktif = Periode::where('status', 'Aktif')->first();
        $pelamarMagang = PelamarMagang::where('id', $id_pelamar_magang)->first();
        $nimMahasiswa = $pelamarMagang->mahasiswa->nim;
        // dd($periode_aktif);

        $fileNameSertifikat = 'sertifikat_' . "_" . $nimMahasiswa . '.' . $request->file_sertifikat->getClientOriginalExtension();
        $fileNameTranskrip = 'transkrip_' . "_" . $nimMahasiswa . '.' . $request->file_transkrip->getClientOriginalExtension();

        // Menyimpan file sertifikat
        $fileSertifikatPath = $request->file_sertifikat->storeAs('public/sertifikat', $fileNameSertifikat);
        // Menyimpan file transkrip
        $fileTranskripPath = $request->file_transkrip->storeAs('public/transkrip', $fileNameTranskrip);
        // Menyimpan file sertifikat

        TranskripMitra::create([
            'id_pelamar_magang' => $id_pelamar_magang,
            'id_periode' => $periode_aktif->id,
            'file_sertifikat' => $fileNameSertifikat,
            'file_transkrip' => $fileNameTranskrip,
            'evaluasi' => $request->input('evaluasi'),
        ]);

        Alert::success('Success', 'Sertifikat dan Transkrip Berhasil Diupload');
        return redirect()->back();

        // return view('pages.mitra.manajemen-sertifikat-mitra.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transkrip_mitra = TranskripMitra::whereHas('pelamar_magang', function ($query) use ($id) {
            $query->where('id_lowongan', $id);
        })->get();

        $data = [
            'id_lowongan' => $id,
            'lowongan' => Lowongan::findOrFail($id),
            'pelamar_magang' => PelamarMagang::where('status_diterima', 'Diterima')->get(),
            'mahasiswas' => Mahasiswa::select('transkrip_mitras.id AS id_transkrip', 'mahasiswas.*', 'pelamar_magangs.id AS id_pelamar')
                ->leftJoin('pelamar_magangs', 'pelamar_magangs.id_mahasiswa', '=', 'mahasiswas.id')
                ->leftJoin('transkrip_mitras', 'transkrip_mitras.id_pelamar_magang', '=', 'pelamar_magangs.id')
                ->where('pelamar_magangs.status_diterima', '=', 'Diterima')
                ->where('pelamar_magangs.id_lowongan', $id)
                ->get(),
            'periode' => Periode::where('status', 'Aktif')->first(),
            'transkrip_mitra' => $transkrip_mitra,
        ];

        return view('pages.mitra.manajemen-sertifikat-mitra.show', $data);
    }

    public function showdetail($id_transkrip)
    {
        $data = [
            'transkrip' => TranskripMitra::findOrFail($id_transkrip)
        ];

        return view('pages.mitra.manajemen-sertifikat-mitra.show-detail', $data);
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
