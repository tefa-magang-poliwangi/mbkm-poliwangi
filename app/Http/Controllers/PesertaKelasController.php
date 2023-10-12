<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\PesertaKelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'peserta_kelas' => PesertaKelas::where('id_kelas', $id_kelas)->get(),
        ];

        return view('pages.admin.manajemen-peserta-kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $prodi_kelas = $kelas->id_prodi;

        $mahasiswas = Mahasiswa::where('id_prodi', $prodi_kelas)->whereDoesntHave('peserta_kelas')->get();

        $data = [
            'id_kelas' => $id_kelas,
            'mahasiswas' => $mahasiswas,
        ];

        return view('pages.admin.manajemen-peserta-kelas.create', $data);
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
            'mahasiswas' => ['required', 'array', 'min:1'],
        ]);

        $id_kelas = $request->id_kelas;
        $mahasiswa_convert = collect($validated['mahasiswas']);
        $check_id_mahasiswa = $mahasiswa_convert->except('_token');

        if ($check_id_mahasiswa) {
            foreach ($check_id_mahasiswa as $mahasiswaId) {
                PesertaKelas::create([
                    'id_kelas' => $id_kelas,
                    'id_mahasiswa' => $mahasiswaId,
                ]);
            }
        }

        Alert::success('Success', 'Peserta Kelas Berhasil Ditambahkan');

        return redirect()->route('peserta.kelas.index', $id_kelas);
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
    public function destroy($id_kelas, $id)
    {
        $peserta_kelas = PesertaKelas::findOrFail($id);
        $peserta_kelas->delete();

        Alert::success('Success', 'Peserta Kelas Berhasil Dihapus');

        return redirect()->route('peserta.kelas.index', $id_kelas);
    }
}