<?php

namespace App\Http\Controllers;

use App\Models\MagangExt;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\PesertaMagangExt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaMagangExtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_magang_ext)
    {
        $data = [
            'id_magang_ext' => $id_magang_ext,
            'peserta_magang_ext' => PesertaMagangExt::where('id_magang_ext', $id_magang_ext)->get(),
            'kelas' => Kelas::all(),
            'magang_ext' => MagangExt::findOrFail($id_magang_ext),
        ];

        return view('pages.admin.manajemen-peserta-magang-ext.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_magang_ext)
    {
        $mahasiswas = Mahasiswa::whereDoesntHave('peserta_magang_ext')->get();

        $data = [
            'id_magang_ext' => $id_magang_ext,
            'mahasiswas' => $mahasiswas,
        ];

        return view('pages.admin.manajemen-peserta-magang-ext.create', $data);
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

        $id_magang_ext = $request->id_magang_ext;
        $mahasiswa_convert = collect($validated['mahasiswas']);
        $check_id_mahasiswa = $mahasiswa_convert->except('_token');

        if ($check_id_mahasiswa) {
            foreach ($check_id_mahasiswa as $mahasiswaId) {
                PesertaMagangExt::create([
                    'id_magang_ext' => $id_magang_ext,
                    'id_mahasiswa' => $mahasiswaId,
                ]);
            }
        }

        Alert::success('Success', 'Peserta Magang Berhasil Ditambahkan');

        return redirect()->route('manajemen.peserta.magang.ext.index', $id_magang_ext);
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
    public function destroy($id_magang_ext, $id)
    {
        $peserta_magang_ext = PesertaMagangExt::findOrFail($id);
        $peserta_magang_ext->delete();

        Alert::success('Success', 'Peserta Magang Berhasil Dihapus');

        return redirect()->route('manajemen.peserta.magang.ext.index', $id_magang_ext);
    }
}
