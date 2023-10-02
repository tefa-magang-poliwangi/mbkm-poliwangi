<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\MatkulKurikulum;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagangExt;
use App\Models\Periode;
use App\Models\PesertaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KonversiNilaiExternal extends Controller
{

    public function KonversiNilaiAngka($nilai_angka)
    {
        // penentuan nilai huruf berdasarkan nilai angka
        $nilai = $nilai_angka;
        $penilaian = 'e';
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

    public function konversi_nilai_external(Request $request, $id_mahasiswa, $id_nilai_magang_ext)
    {


        $data = [];
        try {

            $matkuls = $request->all();
            $array_key_matkuls = array_keys($matkuls);
            //dd($array_key_matkuls);
            foreach ($array_key_matkuls as $array_key) {
                if ($array_key != '_token' && $matkuls[$array_key] != null) {
                    $data['id_matkul'] = $array_key;
                    $data['nilai_angka'] = $matkuls[$array_key];
                    $data['nilai_huruf'] = $this->KonversiNilaiAngka($matkuls[$array_key]);
                    $data['id_mahasiswa'] = $id_mahasiswa;
                    $data['id_nilai_magang_ext'] = $id_nilai_magang_ext;
                    NilaiKonversi::create($data);
                }
            }

            return redirect()->route('daftar.mahasiswa.transkrip.index', $id_nilai_magang_ext);
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
        $periode = Periode::where('status', 'Aktif')->first();

        $data = [
            'nilai_magang_ext' => NilaiMagangExt::where('id_periode', $periode->id)->get(),
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
    public function show($id_nilai_magang_ext)
    {
        $nilai_external = NilaiMagangExt::findOrFail($id_nilai_magang_ext);
        $nilai_external->mahasiswa->id;
        $periode = Periode::where('status', 'Aktif')->first();
        $kurikulum = Kurikulum::where('id_prodi', $nilai_external->mahasiswa->id_prodi)
            ->where('status', 'Aktif')->first();

        $mahasiswa_aktif = PesertaKelas::where('id_mahasiswa', $nilai_external->mahasiswa->id)->orderBy('id')->first();
        $semester = (2 * $mahasiswa_aktif->kelas->tingkat_kelas) - ($periode->semester % 2);

        $data = [
            'matakuliah' => MatkulKurikulum::where('id_kurikulum', $kurikulum->id)->where('semester', $semester)->get(),
            'nilai_konversi' => NilaiKonversi::where('id_nilai_magang_ext', $id_nilai_magang_ext)->get(),
            'nilai_magang_ext' => NilaiMagangExt::findOrFail($id_nilai_magang_ext),
            'nilai_konversi' => NilaiKonversi::where('id_nilai_magang_ext', $id_nilai_magang_ext)->get(),

        ];
        return view('pages.dosen.kaprodi-konversi-nilai', $data);
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

        $nilai = NilaiKonversi::findOrFail($id);
        $nilai->delete();

        return redirect()->route('daftar.mahasiswa.transkrip.index', $nilai->id_nilai_magang_ext);
    }
}
