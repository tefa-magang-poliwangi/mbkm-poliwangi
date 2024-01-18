<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagangExt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidasiNilaiKaprodiExt extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $dosen = Dosen::where('id_user', $user_id)->first();
        $kaprodi = Kaprodi::where('id_dosen', $dosen->id)->first();
        $prodi_id = $kaprodi->id_prodi;

        $nilai_magang_ext = NilaiMagangExt::where('validasi_kaprodi', 'Belum Disetujui')
            ->whereIn('id_mahasiswa', function ($query) use ($prodi_id) {
                $query->select('id')->from('mahasiswas')->where('id_prodi', $prodi_id)->whereExists(function ($query) {
                    $query->select('id')->from('peserta_kelas')->whereRaw('peserta_kelas.id_mahasiswa = mahasiswas.id'); // Menambahkan kondisi peserta_kelas
                });
            })->get();

        $data = [
            'transkrip_nilai_mhs' => $nilai_magang_ext,
        ];

        return view('pages.kaprodi.validasi-ext.kaprodi-daftar-transkrip-mahasiswa-ext', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $dosen = Dosen::where('id_user', $user_id)->first();
        $kaprodi = Kaprodi::where('id_dosen', $dosen->id)->first();
        $prodi_id = $kaprodi->id_prodi;

        $nilai_magang_ext = NilaiMagangExt::where('validasi_kaprodi', 'Setuju')->whereIn('id_mahasiswa', array_values(Mahasiswa::select('id')->where('id_prodi', $prodi_id)->get()->toArray()))->get();

        $data = [
            'transkrip_nilai_mhs' => $nilai_magang_ext,
        ];

        return view('pages.kaprodi.validasi-ext.kaprodi-daftar-transkrip-disetujui-ext', $data);
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
            'transkrip_mhs' => NilaiMagangExt::findOrFail($id),
            'nilai_transkrip_mhs' => NilaiKonversi::where('id_nilai_magang_ext', $id)->get(),
        ];

        return view('pages.kaprodi.validasi-ext.kaprodi-validasi-nilai-konversi-ext', $data);
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

    public function validate_transkrip($id)
    {
        NilaiMagangExt::where('id', $id)->update([
            'validasi_kaprodi' => 'Setuju',
        ]);

        Alert::success('Success', 'Nilai Transkrip Berhasil Disetujui');

        return redirect()->route('kaprodi.daftar.transkrip.ext.index');
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
        $nilai_konversi = NilaiKonversi::findOrFail($id);

        $validated = $request->validate([
            'nilai_angka' => ['required']
        ]);

        $new_nilai_huruf = $this->KonversiNilaiAngka($validated['nilai_angka']);
        $new_angka_mutu = $this->KonversiAngkaMutu($validated['nilai_angka']);

        NilaiKonversi::where('id', $id)->update([
            'nilai_angka' => $validated['nilai_angka'],
            'nilai_huruf' => $new_nilai_huruf,
            'angka_mutu' => $new_angka_mutu,
            'mutu' => $new_angka_mutu * $nilai_konversi->kredit,
        ]);

        Alert::success('Success', 'Nilai Berhasil Diubah');

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
        //
    }
}
