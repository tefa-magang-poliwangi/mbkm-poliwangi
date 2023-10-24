<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Lowongan;
use App\Models\Prodi;
use App\Models\ProgramMagang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ValidasiProgramMagangKaprodi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user_kaprodi = Dosen::where('id_user', $user_id)->first();

        $data = [
            'lowongans' => Lowongan::where('id_prodi', $user_kaprodi->id_prodi)->get(),
            'prodi' => Prodi::all(),
        ];

        return view('pages.kaprodi.kaprodi-daftar-lowongan-mitra', $data);
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
        $data = [
            'program_magangs' => ProgramMagang::where('id_lowongan', $id)->get(),
            'id_lowongan' => $id,
            'lowongan' => Lowongan::findOrFail($id),
        ];

        return view('pages.kaprodi.kaprodi-daftar-program-magang-lowongan', $data);
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

    public function validate_program_magang(Request $request, $id)
    {
        $validated = $request->validate([
            'validasi_kaprodi' => ['required', 'array', 'min:1'],
        ]);

        $validasi_kaprodi_array = $validated['validasi_kaprodi'];

        // Melakukan update program magang sesuai dengan ID
        foreach ($validasi_kaprodi_array as $id_program_magang => $new_status) {
            ProgramMagang::where('id', $id_program_magang)->update([
                'validasi_kaprodi' => $new_status,
            ]);
        }

        Alert::success('Success', 'Data Program Magang Berhasil Tersimpan');

        return redirect()->route('kaprodi.validasi.program.magang.show', $id);
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
