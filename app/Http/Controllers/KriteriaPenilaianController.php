<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaianMagangExt;
use App\Models\MagangExt;
use App\Models\Mahasiswa;
use App\Models\PenilaianMagangExt;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaPenilaianController extends Controller
{

    public function index_nilai_mahasiswa_mhs_ext($id_magang_ext)
    {
        $data = [
            'kriteria_magang_ext' => PenilaianMagangExt::where('id_magang_ext', $id_magang_ext)->get(),
        ];

        return view('pages.mahasiswa.transkrip-nilai-mahasiswa.mahasiswa-input-nilai', $data);
    }

    public function input_nilai_mahasiswa_mhs_ext(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first(); // Menggunakan first() untuk mendapatkan satu objek

        // Mendapatkan data nilai dari request
        $nilaiInput = $request->input('nilai');

        // Melakukan loop untuk menyimpan setiap nilai
        foreach ($nilaiInput as $kriteriaId => $nilai) {
            DetailPenilaianMagangExt::create([
                'nilai' => $nilai,
                'id_penilaian_magang_ext' => $kriteriaId,
                'id_mahasiswa' => $mahasiswa->id,
            ]);
        }

        Alert::success('Success', 'Input Nilai Berhasil di Simpan');

        return redirect()->route('upload-transkrip-mahasiswa.create', $id_user);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kriteria = PenilaianMagangExt::query();
        if ($request->magang_ext) {
            $kriteria->where('id_magang_ext', $request->magang_ext);
        }

        $data = [
            'magangext' => MagangExt::all(),
            'kriteria' => $kriteria->get(),
            'request' => $request
        ];

        return view('pages.admin.manajemen-kriteria.index', $data);
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
        $validated = $request->validate([
            'create_perusahaan' => ['required'],
            'create_kriteria' => ['required']
        ]);

        PenilaianMagangExt::create([
            'id_magang_ext' => $validated['create_perusahaan'],
            'penilaian' => $validated['create_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil Ditambahkan');
        return redirect()->route('kriteria.penilaian.index');
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
        $validated = $request->validate([
            'update_perusahaan' => ['required'],
            'update_kriteria' => ['required']
        ]);

        PenilaianMagangExt::where('id', $id)->update([
            'id_magang_ext' => $validated['update_perusahaan'],
            'penilaian' => $validated['update_kriteria'],
        ]);

        Alert::success('Success', 'Kriteria Penilaian Berhasil DiUpdate');
        return redirect()->route('kriteria.penilaian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = PenilaianMagangExt::findOrFail($id);
        $kriteria->delete();


        Alert::success('Success', 'Kriteria Penilaia Berhasil Dihapus');

        return redirect()->route('kriteria.penilaian.index');
    }
}
