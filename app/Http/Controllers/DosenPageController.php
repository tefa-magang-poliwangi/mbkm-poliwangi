<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\NilaiMagangExt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenPageController extends Controller
{
    // Halaman Dosen
    public function dashboard_dosen()
    {
        $user_id = Auth::user()->id;
        $dosen = Dosen::where('id_user', $user_id)->first();
        $prodi_id = $dosen->id_prodi;
        $nilai_magang_ext = NilaiMagangExt::where('validasi_kaprodi', 'Belum Disetujui')
            ->whereIn('id_mahasiswa', function ($query) use ($prodi_id) {
                $query->select('id')->from('mahasiswas')->where('id_prodi', $prodi_id)->whereExists(function ($query) {
                    $query->select('id')->from('peserta_kelas')->whereRaw('peserta_kelas.id_mahasiswa = mahasiswas.id'); // Menambahkan kondisi peserta_kelas
                });
            })->count();

        $data = [
            'daftar_transkrip_nilai_count' => $nilai_magang_ext,
        ];

        return view('pages.dosen.dosen-dashboard', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
