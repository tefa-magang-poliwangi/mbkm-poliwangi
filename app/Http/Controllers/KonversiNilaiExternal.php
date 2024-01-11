<?php

namespace App\Http\Controllers;

use App\Models\DetailAngkaMutu;
use App\Models\DetailNilaiHuruf;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\DosenWali;
use App\Models\MatkulKurikulum;
use App\Models\NilaiKonversi;
use App\Models\NilaiMagangExt;
use App\Models\Periode;
use App\Models\PesertaKelas;
use App\Models\ProfilAngkaMutu;
use App\Models\ProfilNilaiHuruf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KonversiNilaiExternal extends Controller
{
    public function KonversiNilaiHuruf($nilai_angka, $detailNilaiHuruf)
    {
        // Penentuan nilai huruf berdasarkan nilai angka
        $nilai = $nilai_angka;
        $penilaian = 'E'; // Default penilaian jika tidak ada kriteria yang memenuhi

        foreach ($detailNilaiHuruf as $detail) {
            if ($nilai >= $detail->batas_bawah && $nilai <= $detail->batas_atas) {
                $penilaian = $detail->nilai_huruf;
                break; // Keluar dari loop setelah menemukan kriteria yang sesuai
            }
        }

        return $penilaian;
    }

    public function KonversiAngkaMutu($nilai_angka, $detailAngkaMutu)
    {
        // Penentuan nilai angka mutu berdasarkan nilai angka
        $nilai = $nilai_angka;
        $angka_mutu = 0; // Default angka mutu jika tidak ada kriteria yang memenuhi

        foreach ($detailAngkaMutu as $detail) {
            if ($nilai >= $detail->batas_bawah && $nilai <= $detail->batas_atas) {
                $angka_mutu = $detail->angka_mutu;
                break; // Keluar dari loop setelah menemukan kriteria yang sesuai
            }
        }

        return $angka_mutu;
    }

    public function konversi_nilai_external(Request $request, $id_mahasiswa, $id_nilai_magang_ext)
    {
        $data = [];

        try {
            $matkuls = $request->all();
            $array_key_matkuls = array_keys($matkuls);

            // mengambil data nilai huruf
            $profil_nilai_huruf_aktif = ProfilNilaiHuruf::where('status', 'Aktif')->first();
            $detail_nilai_huruf = DetailNilaiHuruf::where('id_profil_nilai_huruf', $profil_nilai_huruf_aktif->id)->get();

            // mengambil data angka mutu
            $profil_angka_mutu_aktif = ProfilAngkaMutu::where('status', 'Aktif')->first();
            $detail_angka_mutu = DetailAngkaMutu::where('id_profil_angka_mutu', $profil_angka_mutu_aktif->id)->get();

            foreach ($array_key_matkuls as $array_key) {
                if ($array_key != '_token' && $matkuls[$array_key] != null) {
                    $data['id_matkul'] = $array_key;
                    $data['nilai_angka'] = $matkuls[$array_key];
                    $data['nilai_huruf'] = $this->KonversiNilaiHuruf($matkuls[$array_key], $detail_nilai_huruf);
                    $data['angka_mutu'] = $this->KonversiAngkaMutu($matkuls[$array_key], $detail_angka_mutu);

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

            return redirect()->back();
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
        $prodi_id = Dosen::where('id_user', Auth::user()->id)->first()->id_prodi;
        $dosen = Dosen::where('id_user', Auth::user()->id)->first();
        $id_dosen_wali = DosenWali::where('id_dosen', $dosen->id)->first();

        $nilai_magang_ext = NilaiMagangExt::whereIn('id_mahasiswa', array_values(Mahasiswa::select('id')->where('id_prodi', $prodi_id)->get()->toArray()))
            ->whereHas('mahasiswa.peserta_dosen', function ($query) use ($id_dosen_wali) {
                $query->where('id_dosen_wali', $id_dosen_wali->id);
            })
            ->get();


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
    public function show($id_mahasiswa, $id_magang_ext, $id_nilai_magang_ext)
    {
        $profil_nilai_huruf_aktif = ProfilNilaiHuruf::where('status', 'Aktif')->first();
        $nilai_external = NilaiMagangExt::findOrFail($id_nilai_magang_ext);
        $nilai_external->mahasiswa->id;
        $periode = Periode::where('status', 'Aktif')->first();
        $kurikulum = Kurikulum::where('id_prodi', $nilai_external->mahasiswa->id_prodi)
            ->where('status', 'Aktif')->first();

        $mahasiswa_aktif = PesertaKelas::where('id_mahasiswa', $nilai_external->mahasiswa->id)->orderBy('id')->first();
        $semester = (2 * $mahasiswa_aktif->kelas->tingkat_kelas) - ($periode->semester % 2);

        $data_nilai = DB::table('detail_penilaian_magang_exts as dpm')
            ->join('penilaian_magang_exts as pme', 'dpm.id_penilaian_magang_ext', '=', 'pme.id')
            ->join('magang_exts as mge', 'pme.id_magang_ext', '=', 'mge.id')
            ->where('pme.id_magang_ext', '=', $id_magang_ext)
            ->where('dpm.id_mahasiswa', '=', $id_mahasiswa)
            ->select('dpm.nilai', 'dpm.id', 'pme.penilaian', 'pme.id_magang_ext', 'mge.name')->orderBy('pme.penilaian', 'asc')
            ->get();

        $data = [
            'matakuliah' => MatkulKurikulum::where('id_kurikulum', $kurikulum->id)->where('semester', $semester)->get(),
            'nilai_magang_ext' => NilaiMagangExt::findOrFail($id_nilai_magang_ext),
            'nilai_konversi' => NilaiKonversi::where('id_nilai_magang_ext', $id_nilai_magang_ext)->get(),
            'nilai_kriteria_mhs' => $data_nilai,
            'nilai_huruf' => DetailNilaiHuruf::where('id_profil_nilai_huruf', $profil_nilai_huruf_aktif->id)->get(),
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

        return redirect()->back();
    }
}
