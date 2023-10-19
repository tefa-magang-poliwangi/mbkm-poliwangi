<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramMagang;
use App\Models\PLMitra;
use App\Models\Lowongan;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'programmagang' => ProgramMagang::all(),
            'plmitra' => PLMitra::all(),
            'lowongan' => Lowongan::all(),
        ];
        return view('pages.mitra.manajemen-program-magang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'programmagang' => ProgramMagang::all(),
            'plmitra' => PLMitra::all(),
            'lowongan' => Lowongan::all(),
        ];

        return view('pages.mitra.manajemen-program-magang.create', $data);
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
            'kegiatan' => ['required', 'string'],
            'waktu_mulai' => ['required'],
            'waktu_akhir' => ['required'],
            'posisi_mahasiswa' => ['required','string'],
            'id_lowongan' => ['required'],
            'id_pl_mitra' => ['required']
        ]);

        ProgramMagang::create([
            'kegiatan' => $validated['kegiatan'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_akhir' => $validated['waktu_akhir'],
            'posisi_mahasiswa' => $validated['posisi_mahasiswa'],
            'id_lowongan' => $validated['id_lowongan'],
            'id_pl_mitra' => $validated['id_pl_mitra'],
        ]);

        Alert::success('Succsess', 'Data Program Magang Berhasil Ditambahkan');

        return redirect()->route('manajemen.program.magang.index');

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
            $data = [
                'programmagang' => ProgramMagang::findOrFail($id),
                'plmitra' => PLMitra::all(),
                'lowongan' => Lowongan::all(),
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kegiatan' => ['required', 'string'],
            'waktu_mulai' => ['required'],
            'waktu_akhir' => ['required'],
            'posisi_mahasiswa' => ['required','string'],
            'id_lowongan' => ['required'],
            'id_pl_mitra' => ['required']
        ]);

        ProgramMagang::where('id', $id)->update([
            'kegiatan' => $validated['kegiatan'],
            'waktu_mulai' => $validated['waktu_mulai'],
            'waktu_akhir' => $validated['waktu_akhir'],
            'posisi_mahasiswa' => $validated['posisi_mahasiswa'],
            'id_lowongan' => $validated['id_lowongan'],
            'id_pl_mitra' => $validated['id_pl_mitra'],
        ]);

        Alert::success('Success', 'Program Magang Berhasil Diupdate');

        return redirect()->route('manajemen.program.magang.index');
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

        return redirect()->back();
    }
}
