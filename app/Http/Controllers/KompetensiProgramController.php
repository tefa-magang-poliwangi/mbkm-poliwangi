<?php

namespace App\Http\Controllers;

use App\Models\KompetensiLowongan;
use App\Models\KompetensiProgram;
use App\Models\Mitra;
use App\Models\ProgramMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class KompetensiProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_program_magang)
    {
        $data = [
            'id_program_magang' => $id_program_magang,
            'kompetensi_program' => KompetensiProgram::where('id_program_magang', $id_program_magang)->get(),
            'program_magang' => ProgramMagang::findOrFail($id_program_magang),
        ];



        return view('pages.mitra.manajemen-kompetensi-program.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_program_magang)
    {
        $user = Auth::user();
        $mitra = Mitra::where('id_user', $user->id)->first();

        $selectkompetensiprogram = KompetensiProgram::where('id_program_magang', $id_program_magang)
            ->pluck('id_kompetensi_lowongan')
            ->toArray();

        $data = [
            'kompetensi_program' => KompetensiProgram::all(),
            'kompetensi_lowongan' => KompetensiLowongan::all(),
            'program_magang' => $selectkompetensiprogram,
            'id_program_magang' => $id_program_magang,
        ];

        return view('pages.mitra.manajemen-kompetensi-program.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_program_magang)
    {
        $validated = $request->validate([
            'kompetensi' => [
                'required',
                Rule::unique('kompetensi_programs', 'id_kompetensi_lowongan')->where('id_program_magang', $id_program_magang),
            ],
        ]);

        if (isset($validated['kompetensi'])) {
            $id_kompetensi = $validated['kompetensi'];

            foreach ($id_kompetensi as $kompetensiId) {
                KompetensiProgram::create([
                    'id_program_magang' => $id_program_magang,
                    'id_kompetensi_lowongan' => $kompetensiId,
                ]);
            }
        }

    Alert::success('Sukses', 'Kompetensi Program Berhasil Ditambahkan');

    return redirect()->route('manajemen.kompetensi.program.index', $id_program_magang);
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
        $KompetensiProgram = KompetensiProgram::findOrFail($id);
        $KompetensiProgram->delete();

        Alert::success('Success', 'Berkas Lowongan Berhasil Dihapus');

        return redirect()->back();
    }
}
