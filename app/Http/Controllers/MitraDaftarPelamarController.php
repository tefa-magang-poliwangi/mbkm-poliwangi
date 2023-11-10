<?php

namespace App\Http\Controllers;

use App\Models\BerkasLowongan;
use App\Models\BerkasPelamar;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\PelamarMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MitraDaftarPelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $mitra = Mitra::where('id_user', $user_id)->first();

        $pelamarmagang = PelamarMagang::where('status_diterima', 'Menunggu')
            ->whereIn('id_lowongan', function ($query) use ($mitra) {
                $query->select('id')
                    ->from('lowongans')
                    ->where('id_mitra', $mitra->id);
            })
            ->get();

        $data = [
            'daftar_pelamar' => $pelamarmagang,
        ];

        return view('pages.mitra.manajemen-daftar-pelamar.mitra-daftar-pelamar', $data);
    }


    public function accept_submission($id_pelamar_magang)
    {
        PelamarMagang::where('id', $id_pelamar_magang)->update([
            'status_diterima' => 'Diterima',
        ]);

        Alert::success('Success', 'Pelamar Magang Berhasil Diterima');

        return redirect()->back();
    }

    public function decline_submission($id_pelamar_magang)
    {
        $all_berkas = BerkasPelamar::where('id_pelamar_magang', $id_pelamar_magang)->get();

        PelamarMagang::where('id', $id_pelamar_magang)->update([
            'status_diterima' => 'Ditolak',
        ]);

        foreach ($all_berkas as $berkas) {
            // Mengecek apakah file ada dan menghapusnya
            if ($berkas->file) {
                Storage::delete($berkas->file);
            }
            // Menghapus entri berkas dari database
            $berkas->delete();
        }

        Alert::success('Success', 'Pelamar Magang Berhasil Ditolak');

        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $mitra = Mitra::where('id_user', $user_id)->first();

        $daftar_pelamar = PelamarMagang::where('status_diterima', 'Diterima')
            ->whereIn('id_lowongan', function ($query) use ($mitra) {
                $query->select('id')
                    ->from('lowongans')
                    ->where('id_mitra', $mitra->id);
            })
            ->get();

        $data = [
            'daftar_pelamar' => $daftar_pelamar,
        ];

        return view('pages.mitra.manajemen-daftar-pelamar.mitra-daftar-pelamar-diterima', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'create_mahasiswa' => ['required'],
            'create_lowongan' => ['required'],
        ]);

        MitraDaftarPelamarController::create([
            'id_mahasiswa' => $validated['create_mahasiswa'],
            'id_lowongan' => $validated['create_lowongan']
        ]);

        Alert::success('Success', 'Data Admin Prodi Berhasil Ditambahkan');

        return redirect()->route('manajemen.pelamar.mitra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pelamar_magang)
    {
        $user_id = auth()->user()->id;
        $mitra = Mitra::where('id_user', $user_id)->first();

        // Mengambil data pelamar magang berdasarkan id_pelamar_magang
        $pelamarMagang = PelamarMagang::find($id_pelamar_magang);

        // Memeriksa apakah data pelamar magang ditemukan
        if ($pelamarMagang) {
            $id_lowongan = $pelamarMagang->id_lowongan;
            $lowongan = Lowongan::find($id_lowongan);

            // Memeriksa apakah mitra yang sedang login adalah mitra yang memiliki lowongan yang sesuai
            if ($lowongan && $lowongan->id_mitra == $mitra->id) {
                // Memeriksa status diterima pelamar magang
                if ($pelamarMagang->status_diterima == 'Ditolak') {
                    Alert::error('Invalid', 'Pelamar Magang Tidak Ditemukan');

                    // Jika status diterima 'Ditolak', arahkan pengguna ke halaman yang sesuai
                    return redirect()->route('manajemen.pelamar.mitra.index');
                }

                $data = [
                    'pelamar_magang' => $pelamarMagang,
                    'berkas_lowongan' => BerkasLowongan::where('id_lowongan', $pelamarMagang->id_lowongan)->get(),
                    'all_berkas' => BerkasPelamar::where('id_pelamar_magang', $id_pelamar_magang)->get(),
                ];

                return view('pages.admin.cek-berkas-permohonan', $data);
            }
        }

        Alert::error('Invalid', 'Pelamar Magang Tidak Ditemukan');

        // Jika tidak ditemukan atau mitra tidak sesuai, Anda bisa mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan
        return redirect()->route('manajemen.pelamar.mitra.index');
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
