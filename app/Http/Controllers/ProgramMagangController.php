<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramMagang;
use App\Models\PLMitra;
use App\Models\Lowongan;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_lowongan)
    {
        $data = [
            'programmagang' => ProgramMagang::where('id_lowongan', $id_lowongan)->get(),
            'id_lowongan' => $id_lowongan,
            'lowongan' => Lowongan::findOrFail($id_lowongan),
        ];

        return view('pages.mitra.manajemen-program-magang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_lowongan)
    {
        $user = Auth::user();
        $mitra = Mitra::where('id_user', $user->id)->first();
        $plmitra = PLMitra::where('id_mitra', $mitra->id)->get();

        $data = [
            'programmagang' => ProgramMagang::all(),
            'plmitra' => $plmitra,
            'lowongan' => Lowongan::where('id', $id_lowongan)->get(),
            'id_lowongan' => $id_lowongan,
        ];

        return view('pages.mitra.manajemen-program-magang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_lowongan)
    {
        $validated = $request->validate([
            'kegiatan' => ['required', 'string'],
            'waktu_mulai' => ['required'],
            'waktu_akhir' => ['required'],
            'posisi_mahasiswa' => ['required', 'string'],
            'id_pl_mitra' => ['required'],
        ]);

        ProgramMagang::create([
            'kegiatan' => $validated['kegiatan'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_akhir' => $validated['waktu_akhir'],
            'posisi_mahasiswa' => $validated['posisi_mahasiswa'],
            'id_lowongan' => $id_lowongan,
            'id_pl_mitra' => $validated['id_pl_mitra'],
        ]);

        Alert::success('Succsess', 'Data Program Magang Berhasil Ditambahkan');

        return redirect()->route('manajemen.program.magang.index', $id_lowongan);
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
    public function edit($id_lowongan, $id_program_magang)
    {
        $user = Auth::user();
        $mitra = Mitra::where('id_user', $user->id)->first();

        $lowongan = Lowongan::where('id_mitra', $mitra->id)->get();
        $plmitra = PLMitra::where('id_mitra', $mitra->id)->get();

        $data = [
            'programmagang' =>  ProgramMagang::findOrFail($id_program_magang),
            'plmitra' => $plmitra,
            'lowongan' => $lowongan,
            'id_lowongan' => $id_lowongan,
        ];

        return view('pages.mitra.manajemen-program-magang.form-update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_lowongan, $id_program_magang)
    {
        $validated = $request->validate([
            'kegiatan' => ['required', 'string'],
            'waktu_mulai' => ['required'],
            'waktu_akhir' => ['required'],
            'posisi_mahasiswa' => ['required', 'string'],
            'id_pl_mitra' => ['required'],
        ]);

        ProgramMagang::where('id', $id_program_magang)->update([
            'kegiatan' => $validated['kegiatan'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_akhir' => $validated['waktu_akhir'],
            'posisi_mahasiswa' => $validated['posisi_mahasiswa'],
            'id_pl_mitra' => $validated['id_pl_mitra'],
        ]);

        Alert::success('Success', 'Program Magang Berhasil Diupdate');

        return redirect()->route('manajemen.program.magang.index', $id_lowongan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programmagang = ProgramMagang::findOrFail($id);
        $programmagang->delete();

        Alert::success('Succsess', 'Data Program Magang Berhasil Dihapus');

        return redirect()->back();
    }
}
