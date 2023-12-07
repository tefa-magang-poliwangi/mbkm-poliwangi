<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagang;
use App\Models\NilaiMagangExt;
use App\Models\PelamarMagang;
use App\Models\PesertaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ValidasiNilaiKaprodi extends Controller
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
        $pelamarMagangs = PelamarMagang::with(['mahasiswa', 'prodi', 'kelas'])->where('status_diterima','Diterima')->get();

        return view('pages.kaprodi.kaprodi-daftar-transkrip-mahasiswa', ['pelamarMagangs' => $pelamarMagangs]);
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
        $prodi_id = $dosen->id_prodi;
        $nilai_magang_ext = NilaiMagangExt::where('validasi_kaprodi', 'Setuju')->whereIn('id_mahasiswa', array_values(Mahasiswa::select('id')->where('id_prodi', $prodi_id)->get()->toArray()))->get();

        $data = [
            'transkrip_nilai_mhs' => $nilai_magang_ext,
        ];

        return view('pages.kaprodi.kaprodi-daftar-transkrip-disetujui', $data);
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
    public function show($id_mahasiswa)
    {
        $semuaTervalidasi = false;
        $mahasiswa = Mahasiswa::where('id',$id_mahasiswa)->first();
        $nilaiKonversi = NilaiKonversi::where('id_mahasiswa',$id_mahasiswa)->get();
        
        foreach ($nilaiKonversi as $key => $konversi) {
            if($konversi->validasi_kaprodi !== 1){
                $semuaTervalidasi = false;
                break; // Jika satu saja tidak tervalidasi, hentikan perulangan
            } else {
                $semuaTervalidasi = true;
            }
        }

        return view('pages.kaprodi.kaprodi-validasi-nilai-konversi',['id_mahasiswa'=>$id_mahasiswa,'mahasiswa'=>$mahasiswa,'validasi'=>$semuaTervalidasi],  compact('nilaiKonversi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function validate_transkrip($id_mahasiswa)
    {
        NilaiKonversi::where('id_mahasiswa', $id_mahasiswa)->update([
            'validasi_kaprodi' => true,
        ]);

        Alert::success('Success', 'Nilai Transkrip Berhasil Disetujui');

        return redirect()->route('kaprodi.daftar.transkrip.show',['id_mahasiswa'=>$id_mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        NilaiKonversi::where('id',$request->id)->update([
            'nilai_angka'=>$request->nilai_angka,
            'nilai_huruf'=>$this->KonversiNilaiAngka($request->nilai_angka),
            'angka_mutu'=>$this->KonversiAngkaMutu($request->nilai_angka),
            'validasi_kaprodi'=>0,
        ]);
        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Nilai berhasil diperbarui.');
    }

    // app/Http/Controllers/KaprodiDaftarTranskripController.php
// public function setujuiNilai(Request $request)
// {
//     // Validasi request jika diperlukan

//     // Ambil data dari request
//     $nilaiIds = $request->input('nilai_ids');

//     // Setujui nilai berdasarkan ID
//     NilaiKonversi::whereIn('id', $nilaiIds)->update(['status_validasi' => true]);

//     // Redirect atau berikan respons sesuai kebutuhan
//     return redirect()->back()->with('success', 'Nilai berhasil disetujui.');
// }

    

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
