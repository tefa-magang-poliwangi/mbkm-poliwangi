<?php

namespace App\Http\Controllers\PLMitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KompetensiLowongan;
use App\Models\KompetensiProgram;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\NilaiMagang;
use App\Models\PelamarMagang;
use App\Models\Penilaian;
use App\Models\ProgramMagang;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianPLController extends Controller
{
    private function KonversiNilaiAngka($nilai_angka)
    {
        // Penentuan nilai huruf berdasarkan nilai angka
        $nilai = $nilai_angka;
        $penilaian = 'E'; // Default penilaian jika tidak ada kriteria yang memenuhi

        if ($nilai >= 81 && $nilai <= 100) {
            $penilaian = 'A';
        } elseif ($nilai >= 71 && $nilai < 81) {
            $penilaian = 'AB';
        } elseif ($nilai >= 66 && $nilai < 71) {
            $penilaian = 'B';
        } elseif ($nilai >= 61 && $nilai < 66) {
            $penilaian = 'BC';
        } elseif ($nilai >= 56 && $nilai < 61) {
            $penilaian = 'C';
        } elseif ($nilai >= 41 && $nilai < 56) {
            $penilaian = 'D';
        } elseif ($nilai >= 0 && $nilai < 41) {
            $penilaian = 'E';
        }

        return $penilaian;
    }
    /**
     * Display a listing of the resource.
     *
     *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pelamar_magang' => PelamarMagang::where('status_diterima', 'Diterima')->get(),
        ];
        return view('pages.plmitra.layouts.penilaian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_mahasiswa)
    {
        $lowongan = PelamarMagang::where('id_mahasiswa', $id_mahasiswa)->first();

        $mahasiswa = Mahasiswa::where('id', $id_mahasiswa)->first();
        $nilaiMagangs = NilaiMagang::where('id_mahasiswa', $id_mahasiswa)->get();
        $kompetensi_Lowongans = KompetensiLowongan::select('kompetensi_lowongans.*', 'kompetensi_programs.id AS id_kompetensi_program')
            ->join('kompetensi_programs', 'kompetensi_programs.id_kompetensi_lowongan', 'kompetensi_lowongans.id')
            ->where('id_lowongan', $lowongan->id_lowongan)
            ->get();

        return view('pages.plmitra.layouts.penilaian.create', ['id_mahasiswa' => $id_mahasiswa, 'mahasiswa' => $mahasiswa], compact('nilaiMagangs', 'kompetensi_Lowongans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'nilai' => 'required',
            'mahasiswa_id' => 'required',
        ]);

        $program = $request->program;
        $nilai = $request->nilai;

        foreach ($program as $key => $data) {
            if ($nilai[$key] != null) {
                NilaiMagang::create([
                    'nilai_angka' => $nilai[$key],
                    'nilai_huruf' => $this->KonversiNilaiAngka($nilai[$key]),
                    'id_mahasiswa' => $request->mahasiswa_id,
                    'id_kompetensi_program' => $data,
                    // Jika Anda memiliki kolom lain, tambahkan di sini
                ]);
            }
        }

        Alert::success('Success', 'Nilai magang berhasil ditambahkan');
        // Redirect atau lakukan sesuatu setelah menyimpan data
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiMagang  $nilaimagang
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiMagang $nilaimagang)
    {
        return view('pages.plmitra.layouts.penilaian.show', compact('nilaimagang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiMagang  $nilaimagang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiMagang $nilaimagang)
    {
        $request->validate([
            'nilaimagang_id' => 'required',
            'mahasiswa_id' => 'required',
            'nilai' => 'required'
        ]);

        // dd($request);
        foreach ($request->nilaimagang_id as $key => $value) {
            $nilaimagang
                ->where('id', $request->nilaimagang_id[$key])
                ->where('id_mahasiswa', $request->mahasiswa_id)
                ->update([
                    'nilai_angka' => $request->nilai[$key],
                    'nilai_huruf' => $this->KonversiNilaiAngka($request->nilai[$key])
                    // Jika Anda memiliki kolom lain, tambahkan di sini
                ]);
        }

        Alert::success('Success', 'Nilai magang berhasil diupdate');

        return back()->with('success', 'Nilai Magang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiMagang  $nilaimagang
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiMagang $nilaimagang, $id_nilaimagang)
    {
        $nilaimagang->findOrFail($id_nilaimagang)->delete();

        Alert::success('Success', 'Nilai magang berhasil dihapus');

        return back()->with('success', 'Nilai Magang berhasil dihapus.');
    }
}
