<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagangExt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KonversiNilaiExternal extends Controller
{

    public function KonversiNilaiAngka($nilai_angka)
    {
        // penentuan nilai huruf berdasarkan nilai angka
        $nilai = $nilai_angka;

        if ($nilai >= 90 && $nilai <= 100) {
            $penilaian = 'A';
        } elseif ($nilai >= 80 && $nilai < 90) {
            $penilaian = 'AB';
        } elseif ($nilai >= 70 && $nilai < 80) {
            $penilaian = 'B';
        } elseif ($nilai >= 60 && $nilai < 70) {
            $penilaian = 'BC';
        } elseif ($nilai >= 50 && $nilai < 60) {
            $penilaian = 'C';
        } elseif ($nilai >= 40 && $nilai < 50) {
            $penilaian = 'D';
        } elseif ($nilai >= 0 && $nilai < 40) {
            $penilaian = 'E';
        }

        return $penilaian;
    }

    public function konversi_nilai_external(Request $request, $id_mahasiswa, $id_matkul, $id_nilai_magang_ext)
    {
        try {
            $validated = $request->validate([
                'nilai_angka' => ['required', 'numeric', 'between:0,100'],
                'nilai_huruf' => ['nullable'],
            ]);

            // Nonaktifkan konstrain foreign key
            Schema::disableForeignKeyConstraints();

            // Melakukan truncate pada tabel nilai_magang_exts
            DB::table('nilai_konversis')->truncate();

            // Aktifkan kembali konstrain foreign key
            Schema::enableForeignKeyConstraints();

            $penilaian = $this->KonversiNilaiAngka($validated['nilai_angka']);

            $nilai_konversi = NilaiKonversi::create([
                'nilai_angka' => $validated['nilai_angka'],
                'nilai_huruf' => $penilaian,
                'id_mahasiswa' => $id_mahasiswa,
                'id_matkul' => $id_matkul,
                'id_nilai_magang_ext' => $id_nilai_magang_ext,
            ]);

            // Jika semuanya berhasil, kembalikan respons sukses
            $response = [
                'status' => 'success',
                'message' => 'Berhasil Menambahkan Data Konversi Nilai Magang External',
                'data' => [
                    'request' => $request->toArray(),
                    'nilai_magang_ext' => $nilai_konversi->toArray(),
                ],
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan pesan kesalahan dalam format JSON
            return response()->json(['error' => $e->getMessage(), 'status' => 'error']);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'nilai_magang_ext' => NilaiMagangExt::all(),
            'mahasiswa' => Mahasiswa::all(),
            'matakuiah' => Matkul::all(),
            'nilaikonversi' => NilaiKonversi::all()
        ];

        return view('pages.dosen.kaprodi-daftar-konversi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'nilai_magang_ext' => NilaiMagangExt::where('id')->get(),
            'mahasiswa' => Mahasiswa::all(),
            'matakuiah' => Matkul::all(),
            'nilaikonversi' => NilaiKonversi::all()
        ];

        return view('pages.dosen.kaprodi-konversi-nilai', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_nilai_magang_ext)
    {
        $nilai_magang_ext = NilaiMagangExt::findOrFile($id_nilai_magang_ext);

        $validated = $request->validate([
            'nilai_angka' => ['required', 'numeric', 'between:0,100'],
            'nilai_huruf' => ['nullable'],
        ]);

        $penilaian = $this->KonversiNilaiAngka($validated['nilai_angka']);

        NilaiKonversi::create([
            'nilai_angka' => $validated['nilai_angka'],
            'nilai_huruf' => $penilaian,
            'id_mahasiswa' => $request['id_mahasiswa'],
            'id_matkul' => $request['id_matkul'],
            'id_nilai_magang_ext' => $nilai_magang_ext,
        ]);

        return redirect()->route('daftar.mahasiswa.index');

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
        //
    }
}
