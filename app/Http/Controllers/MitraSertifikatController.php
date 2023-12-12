<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Models\Mitra;
use App\Models\Periode;
use App\Models\TranskripMitra;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
    public function create($id_user)
    {
        // dd('helloword');
        if (Auth::user()->id != $id_user) {
            return redirect()->back();
        }

        $user_mahasiswa = User::findOrFail($id_user)->mahasiswa;
        $mahasiswa = Mahasiswa::findOrFail($user_mahasiswa->first()->id);
        $data = [
            'mahasiswa' => $mahasiswa,
        ];

        return view('pages.mahasiswa.laporan-mahasiswa.laporan-akhir-internal.index', $data);
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

        $saveData = [];

        $periode_aktif = Periode::where('status', 'Aktif')->first();
        $pelamarMagang = PelamarMagang::where('id', $id_pelamar_magang)->first();
        $nimMahasiswa = $pelamarMagang->mahasiswa->nim;

        $fileNameSertifikat = 'sertifikat_' . $nimMahasiswa . '.' . $request->file_sertifikat->getClientOriginalExtension();
        $fileNameTranskrip = 'transkrip_' . $nimMahasiswa . '.' . $request->file_transkrip->getClientOriginalExtension();

        if ($request->hasFile('file_sertifikat') && $request->hasFile('file_transkrip')) {
            if ($pelamarMagang->file_sertifikat) {
                Storage::delete('public/sertifikat/' . $pelamarMagang->file_sertifikat);
            }

            if ($pelamarMagang->file_transkrip) {
                Storage::delete('public/transkrip/' . $pelamarMagang->file_transkrip);
            }

            // Save the new files
            $saveData['file_sertifikat'] = $request->file_sertifikat->storeAs('public/sertifikat', $fileNameSertifikat);
            $saveData['file_transkrip'] = $request->file_transkrip->storeAs('public/transkrip', $fileNameTranskrip);
        }

        TranskripMitra::create([
            'id_pelamar_magang' => $id_pelamar_magang,
            'id_periode' => $periode_aktif->id,
            'file_sertifikat' => $fileNameSertifikat,
            'file_transkrip' => $fileNameTranskrip,
            'evaluasi' => $request->input('evaluasi'),
        ]);

        Alert::success('Success', 'Sertifikat dan Transkrip Berhasil Diupload');
        return redirect()->back();
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
            'transkrip' => TranskripMitra::findOrFail($id_transkrip),
        ];

        return view('pages.mitra.manajemen-sertifikat-mitra.show-detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {

        $mahasiswa = User::select('transkrip_mitras.id AS id_transkrip')->join('mahasiswas', 'mahasiswas.id_user', 'users.id')
            ->join('pelamar_magangs', 'pelamar_magangs.id_mahasiswa', 'mahasiswas.id')
            ->join('transkrip_mitras', 'transkrip_mitras.id_pelamar_magang', 'pelamar_magangs.id')
            ->where('users.id', $id_user)
            ->first();

        $validated = $request->validate([
            'file_laporan_akhir' => ['required', 'mimes:pdf', 'max:10240'],
        ]);

        $saveData = [];

        if ($request->hasFile('file_laporan_akhir')) {
            $uploadedFile = $request->file('file_laporan_akhir');

            // Generate a unique name for the file
            $fileName = md5(uniqid()) . '.' . $uploadedFile->getClientOriginalExtension();

            // Store the file with the generated name
            $saveData['file_laporan_akhir'] = $uploadedFile->storeAs('public/laporan-akhir', $fileName);
        }
        TranskripMitra::where('id', $mahasiswa->id_transkrip)->update([
            'file_laporan_akhir' => $saveData['file_laporan_akhir'],
        ]);
        Alert::success('Success', 'Berkas transkrip berhasil di unggah');

        return redirect()->route('upload.laporan.akhir.mahasiswa.int.create', $id_user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transkrip)
    {
        $transkrip = TranskripMitra::findOrFail($id_transkrip);

        Storage::delete([$transkrip->file_sertifikat, $transkrip->file_transkrip]);

        $transkrip->delete();

        Alert::success('Success', 'Sertifikat dan Transkrip berhasil dihapus');
        return redirect()->back();
    }
}