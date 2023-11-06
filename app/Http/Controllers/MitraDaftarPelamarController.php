<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\PelamarMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        PelamarMagang::where('id', $id_pelamar_magang)->update([
            'status_diterima' => 'Ditolak',
        ]);
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
