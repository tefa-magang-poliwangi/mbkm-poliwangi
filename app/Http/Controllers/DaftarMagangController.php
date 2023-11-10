<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\BerkasLowongan;
use App\Models\BerkasPelamar;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\PelamarMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_lowongan)
    {
        $mahasiswa = null;
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $permohonan = $mahasiswa ? PelamarMagang::where('id_mahasiswa', $mahasiswa->id)->latest('created_at')->first() : null;

        // Periksa status pengajuan
        if ($permohonan && $permohonan->status_diterima !== 'Ditolak') {
            Alert::error('Invalid', 'Tunggu Permohonan Anda Sebelumnya');

            return redirect()->route('landing.page');
        } else {
            $data = [
                'lowongan' => Lowongan::findOrFail($id_lowongan),
                'berkas_lowongan' => BerkasLowongan::where('id_lowongan', $id_lowongan)->with('berkas')->get(),
            ];

            return view('pages.mahasiswa.pendaftaran-mahasiswa.mahasiswa-pendaftaran-magang', $data);
        }
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
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request, $id_lowongan)
    {
        // Mengambil data berkas yang diunggah
        $files = $request->file('files');

        // Validasi untuk setiap berkas sebelum membuat data permohonan
        foreach ($files as $id_berkas => $file) {
            $request->validate([
                "files.{$id_berkas}" => 'required|mimes:pdf|max:5120', // maksimal 5 MB
            ]);
        }

        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();

        // Menambahkan data permohonan magang setelah validasi berhasil
        $permohonan = PelamarMagang::create([
            'id_mahasiswa' => $mahasiswa->id,
            'id_lowongan' => $id_lowongan,
        ]);

        foreach ($files as $nama_berkas => $file) {
            // Validasi ekstensi dan ukuran file
            $request->validate([
                "files.{$nama_berkas}" => 'required|mimes:pdf|max:5120', // maksimal 5 MB
            ]);

            $lowongan = Lowongan::findOrFail($id_lowongan);
            $berkas = Berkas::where('nama', $nama_berkas)
                ->where('id_mitra', $lowongan->id_mitra)
                ->first();

            if ($berkas) {
                // Menyimpan file ke direktori yang spesifik dalam direktori public
                $path = $file->store('public/magang-internal/berkas-permohonan-mahasiswa');

                // Menambahkan data berkas pelamar magang
                BerkasPelamar::create([
                    'file' => $path, // Menyimpan path file yang diunggah
                    'id_pelamar_magang' => $permohonan->id,
                    'id_berkas' => $berkas->id,
                ]);
            }
        }

        Alert::success('Berhasil Upload Berkas', 'Silahkan menunggu persetujuan Mitra');

        return redirect()->route('dashboard.mahasiswa.page');
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
