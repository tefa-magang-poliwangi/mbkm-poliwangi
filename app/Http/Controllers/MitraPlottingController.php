<?php

namespace App\Http\Controllers;

use App\Models\PlMitra;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PelamarMagang;
use App\Models\MahasiswaMagang;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PendampingLapangMahasiswa;

class MitraPlottingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pl_mitra' => PlMitra::all(),
            'pendamping_lapang' => PendampingLapangMahasiswa::all(),
        ];


        return view('pages.mitra.manajemen-plotting-mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pl_mitra)
    {
        $mahasiswaData = PelamarMagang::where('status_diterima', 'Diterima')->whereDoesntHave('pendamping_lapang_mahasiswa')->get();

        $mahasiswaMagangData = MahasiswaMagang::all();

        return view('pages.mitra.manajemen-plotting-mitra.create', compact('mahasiswaData', 'mahasiswaMagangData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        // dd($request);
        $validated = $request->validate([
            'mahasiswas' => ['required', 'array', 'min:1'],
        ]);

        $id_dosen_pl = $request->id_dosen_pl;
        $id_pl_mitra = $request->id_pl_mitra;
        $id_lowongan = $request->id_lowongan;
        $mahasiswa_convert = collect($validated['mahasiswas']);
        $check_id_mahasiswa = $mahasiswa_convert->except('_token');

        if ($check_id_mahasiswa) {
            foreach ($check_id_mahasiswa as $mahasiswaId) {
                PendampingLapangMahasiswa::create([
                    'id_dosen_pl' => $id_dosen_pl,
                    'id_lowongan' => $id_lowongan,
                    'id_pl_mitra' => $id_pl_mitra,
                    'id_pelamar_magang' => $mahasiswaId,
                ]);
            }
        }
        return view('pages.mitra.manajemen-plotting-mitra.show', $id_pl_mitra);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pl_mitra)
    {
        $mahasiswaData = Mahasiswa::all();

        $data = [
            'mahasiswaData' => $mahasiswaData,
            'mahasiswaMagangData' => MahasiswaMagang::all(),
            'pendamping_lapang' => PendampingLapangMahasiswa::all(),
            'id_pl_mitra' => $id_pl_mitra
        ];

        return view('pages.mitra.manajemen-plotting-mitra.show', $data);
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
            'id_pl_mitra' => 'required',
        ]);

        PendampingLapangMahasiswa::where('id', $id)->update([
            'id_pl_mitra' => $validated['id_pl_mitra'],
        ]);

        Alert::success('Success', 'Berhasil Menambahkan Pembimbing Lapang');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_lowongan = PendampingLapangMahasiswa::findOrFail($id);
        $id_lowongan->delete();

        Alert::success('Success', ' Berhasil Dihapus');

        return redirect()->back();
    }
}
