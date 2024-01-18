<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\PesertaDosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_prodi($id_dosen_wali)
    {
        $dosen_wali = DosenWali::findOrFail($id_dosen_wali);
        $jurusan_id = $dosen_wali->dosen->id_jurusan;
        $data = [
            'id_dosen_wali' => $id_dosen_wali,
            'dosen_wali' => $dosen_wali,
            'prodis' => Prodi::where('id_jurusan', $jurusan_id)->get(),
        ];

        return view('pages.admin.Manajemen-dosen-wali.daftar-prodi', $data);
    }

    public function index($id_dosen_wali, $id_prodi)
    {
        $dosen_wali = DosenWali::findOrFail($id_dosen_wali);

        // Assuming you have a relationship between DosenWali and Mahasiswa through id_prodi
        $mahasiswas = Mahasiswa::where('id_prodi', $id_prodi)->get();

        $data = [
            'prodi' => Prodi::findOrFail($id_prodi),
            'id_prodi' => $id_prodi,
            'dosen_wali' => $dosen_wali,
            'id_dosen_wali' => $id_dosen_wali,
            'peserta_dosen' => PesertaDosen::where('id_dosen_wali', $id_dosen_wali)->get(),
            'mahasiswas' => $mahasiswas,
        ];

        return view('pages.admin.Manajemen-dosen-wali.data-peserta-dosen', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_dosen_wali, $id_prodi)
    {
        $dosen_wali = DosenWali::findOrFail($id_dosen_wali);

        $mahasiswas = Mahasiswa::where('id_prodi', $id_prodi)
            ->whereDoesntHave('peserta_dosen', function ($query) use ($id_dosen_wali) {
                $query->where('id_dosen_wali', $id_dosen_wali);
            })
            ->get();

        $data = [
            'id_prodi' => $id_prodi,
            'id_dosen_wali' => $id_dosen_wali,
            'mahasiswas' => $mahasiswas,
        ];


        return view('pages.admin.Manajemen-dosen-wali.form-peserta-dosen', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_dosen_wali, $id_prodi)
    {
        $validated = $request->validate([
            'mahasiswas' => ['required', 'array', 'min:1'],
        ]);

        $mahasiswa_convert = collect($validated['mahasiswas']);
        $check_id_mahasiswa = $mahasiswa_convert->except('_token');

        if ($check_id_mahasiswa) {
            foreach ($check_id_mahasiswa as $mahasiswaId) {
                PesertaDosen::create([
                    'id_dosen_wali' => $id_dosen_wali,
                    'id_mahasiswa' => $mahasiswaId,
                ]);
            }
        }

        Alert::success('Success', 'Peserta Dosen Berhasil Ditambahkan');

        return redirect()->route('manajemen.peserta.dosen.index', [$id_dosen_wali, $id_prodi]);
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
        $peserta_dosen = PesertaDosen::findOrFail($id);
        $peserta_dosen->delete();

        Alert::success('Success', 'Peserta Dosen Berhasil Dihapus');

        return redirect()->back();
    }
}
