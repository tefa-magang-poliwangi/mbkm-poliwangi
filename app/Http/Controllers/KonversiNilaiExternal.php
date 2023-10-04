<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\MatkulKurikulum;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagangExt;
use App\Models\Periode;
use App\Models\PesertaKelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KonversiNilaiExternal extends Controller
{

    public function KonversiNilaiAngka($nilai_angka)
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

    public function KonversiAngkaMutu($nilai_angka)
    {
        // Penentuan nilai huruf berdasarkan nilai angka
        $nilai = $nilai_angka;
        $angka_mutu = 0; // Default angka mutu jika tidak ada kriteria yang memenuhi

        if ($nilai >= 81 && $nilai <= 100) {
            $angka_mutu = 4;
        } elseif ($nilai >= 71 && $nilai < 81) {
            $angka_mutu = 3.5;
        } elseif ($nilai >= 66 && $nilai < 71) {
            $angka_mutu = 3;
        } elseif ($nilai >= 61 && $nilai < 66) {
            $angka_mutu = 2.5;
        } elseif ($nilai >= 56 && $nilai < 61) {
            $angka_mutu = 2;
        } elseif ($nilai >= 41 && $nilai < 56) {
            $angka_mutu = 1.5;
        } elseif ($nilai >= 0 && $nilai < 41) {
            $angka_mutu = 1;
        }

        return $angka_mutu;
    }

    public function konversi_nilai_external(Request $request, $id_mahasiswa, $id_nilai_magang_ext)
    {
        $data = [];

        try {
            $matkuls = $request->all();
            $array_key_matkuls = array_keys($matkuls);

            foreach ($array_key_matkuls as $array_key) {
                if ($array_key != '_token' && $matkuls[$array_key] != null) {
                    $data['id_matkul'] = $array_key;
                    $data['nilai_angka'] = $matkuls[$array_key];
                    $data['nilai_huruf'] = $this->KonversiNilaiAngka($matkuls[$array_key]);
                    $data['angka_mutu'] = $this->KonversiAngkaMutu($matkuls[$array_key]);

                    // dd($data['angka_mutu']);

                    // Ambil objek matakuliah berdasarkan kunci (ID matakuliah)
                    $matakuliah = Matkul::find($array_key);

                    if ($matakuliah) {
                        // Gunakan properti 'sks' dari objek matakuliah
                        $data['kredit'] = $matakuliah->sks;
                        $data['mutu'] = $data['angka_mutu'] * $data['kredit'];
                    }

                    $data['id_mahasiswa'] = $id_mahasiswa;
                    $data['id_nilai_magang_ext'] = $id_nilai_magang_ext;
                    NilaiKonversi::create($data);
                }
            }

            Alert::success('Success', 'Nilai konversi berhasil ditambahkan');

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
        $prodi_id = Dosen::Where('id_user', Auth::user()->id)->first()->id_prodi;
        $nilai_magang_ext = NilaiMagangExt::whereIn('id_mahasiswa', array_values(Mahasiswa::select('id')->where('id_prodi', $prodi_id)->get()->toArray()))->get();

        $data = [
            'nilai_magang_ext' => $nilai_magang_ext,
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

        Alert::success('Success', 'Nilai konversi berhasil dihapus');

        return redirect()->route('daftar.mahasiswa.transkrip.index', $nilai->id_nilai_magang_ext);
    }
}
