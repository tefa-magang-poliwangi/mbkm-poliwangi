<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenilaianMagangExt;
use App\Models\Mahasiswa;
use App\Models\NilaiMagangExt;
use App\Models\PenilaianMagangExt;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class InputKriteriaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_magang_ext, $id_nilai_magang_ext)
    {
        $user = User::findOrFail(Auth()->user()->id);
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();

        $data_nilai = DB::table('detail_penilaian_magang_exts as dpm')
            ->join('penilaian_magang_exts as pme', 'dpm.id_penilaian_magang_ext', '=', 'pme.id')
            ->where('pme.id_magang_ext', '=', $id_magang_ext)
            ->where('dpm.id_mahasiswa', '=', $mahasiswa->id)
            ->select('dpm.nilai', 'dpm.id', 'pme.penilaian')->orderBy('pme.penilaian', 'asc')
            ->get();

        $data = [
            'kriteria_magang_ext' => PenilaianMagangExt::where('id_magang_ext', $id_magang_ext)->orderBy('penilaian', 'asc')->get(),
            'nilai_kriteria_mhs' => $data_nilai,
            'mahasiswa' => $mahasiswa,
            'transkrip_mhs' => NilaiMagangExt::findOrFail($id_nilai_magang_ext),
        ];

        return view('pages.mahasiswa.transkrip-nilai-mahasiswa.mahasiswa-input-nilai', $data);
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
        if ($request->input('nilai') == null) {
            Alert::error('Oops', 'Input Tidak Valid');
            return redirect()->back();
        } else {
            // Mendapatkan data nilai dari request
            $nilaiInput = $request->input('nilai');
        }

        $user = User::findOrFail(Auth()->user()->id);
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first(); // Menggunakan first() untuk mendapatkan satu objek

        // Melakukan loop untuk menyimpan setiap nilai
        foreach ($nilaiInput as $kriteriaId => $nilai) {
            DetailPenilaianMagangExt::create([
                'nilai' => $nilai,
                'id_penilaian_magang_ext' => $kriteriaId,
                'id_mahasiswa' => $mahasiswa->id,
            ]);
        }

        Alert::success('Success', 'Nilai Berhasil di Simpan');

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
        $nilai_kriteria_mhs = DetailPenilaianMagangExt::findOrFail($id);
        $nilai_kriteria_mhs->delete();

        Alert::success('Success', 'Nilai Berhasil Dihapus');

        return redirect()->back();
    }
}
