<?php

namespace App\Http\Controllers\DPL;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\DosenPL;
use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\NilaiMagang;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\NilaiKonversi;
use App\Models\PelamarMagang;
use App\Models\NilaiMagangExt;
use App\Models\TranskripMitra;
use App\Models\KompetensiProgram;
use App\Models\KompetensiLowongan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KonversiNilaiController extends Controller
{
    public function index()
    {
        $dosen = Dosen::where('id_user', auth()->id())->first();
        $dosenPl = DosenPL::where('id_dosen', $dosen->id)->first();

        if (!$dosenPl) {
            // Handle the case where DosenPL is not found for the authenticated user
            abort(404, 'DosenPL not found for the authenticated user.');
        }


        $id_dosen_pl = $dosenPl->id;
        // dd($id_dosen_pl);

        $pelamarMagangsDiterima = PelamarMagang::select('dosens.nama AS nama_dosen', 'pelamar_magangs.*')
            ->join('pendamping_lapang_mahasiswas AS plm', 'plm.id_pelamar_magang', 'pelamar_magangs.id')
            ->join('dosen_p_l_s AS dpl', 'dpl.id', 'plm.id_dosen_pl')
            ->join('dosens', 'dosens.id', 'dpl.id_dosen')
            ->where('status_diterima', 'Aktif')
            ->where('plm.id_dosen_pl', $id_dosen_pl)
            ->whereHas('pendampingLapangMahasiswa.dosen_pl', function ($query) use ($id_dosen_pl) {
                $query->where('id', $id_dosen_pl);
            })
            ->get();

        return view('dosen.pages-dpl.konversi-nilai.index', [
            'pelamarMagangs' => $pelamarMagangsDiterima,

        ]);
    }

    public function edit($id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);
        $user = $mahasiswa->user;
        $nilaiKonversi = NilaiKonversi::where('id_mahasiswa', $mahasiswa->id)->get();


        return view('dosen.pages-dpl.konversi-nilai.edit', compact('nilaiKonversi', 'mahasiswa', 'user'));
    }


    public function update(Request $request, $id_mahasiswa)
    {
        // Assuming you have relationships defined in your models
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);
        $laporanAkhir = LaporanAkhir::where('id_mahasiswa', $mahasiswa->id)->first();
        $user = $mahasiswa->user;

        $pelamarMagangs = PelamarMagang::with(['lowongan'])
            ->where('id_mahasiswa', $mahasiswa->id)
            ->get();
        // Assuming you have a relationship in Mahasiswa model for NilaiKonversi

        // Fetch and update NilaiKonversi data
        $nilaiKonversi = NilaiKonversi::where('id_mahasiswa', $mahasiswa->id)->get();



        foreach ($nilaiKonversi as $konversi) {
            $nilaiAngka = $request->input($konversi->matkul->id);

            // Make sure $nilaiAngka is not null before updating
            if ($nilaiAngka !== null) {
                // Perform the conversion to letter grade
                $letterGrade = $this->findLetterGrade($nilaiAngka);

                // Update the NilaiKonversi data with the letter grade
                $konversi->update([
                    'nilai_angka' => $nilaiAngka,
                    'nilai_huruf' => $letterGrade,
                ]);
            }
        }

        return view('dosen.pages-dpl.konversi-nilai.konvers-nilai', compact('mahasiswa', 'laporanAkhir', 'nilaiKonversi', 'user', 'pelamarMagangs'));
    }

    // Helper method to find the letter grade based on the numeric grade
    private function findLetterGrade($nilaiAngka)
    {
        // Your predefined grade ranges and letter grades
        $gradeRanges = [
            ['min' => 81, 'max' => 100, 'grade' => 'A'],
            ['min' => 71, 'max' => 80, 'grade' => 'AB'],
            ['min' => 66, 'max' => 70, 'grade' => 'B'],
            ['min' => 61, 'max' => 65, 'grade' => 'BC'],
            ['min' => 56, 'max' => 60, 'grade' => 'C'],
            ['min' => 41, 'max' => 55, 'grade' => 'D'],
            ['min' => 0, 'max' => 40, 'grade' => 'E'],
        ];

        // Find the corresponding letter grade based on the ranges
        foreach ($gradeRanges as $range) {
            if ($nilaiAngka >= $range['min'] && $nilaiAngka <= $range['max']) {
                return $range['grade'];
            }
        }

        // Default to 'E' if the numeric grade is not within any specified range
        return 'E';
    }

    public function updateFile(Request $request, $id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);

        // Validate and store the files
        $request->validate([
            'file_transkrip' => 'required|mimes:pdf',
            'file_sertifikat' => 'required|mimes:pdf',
            'file_laporan_akhir' => 'required|mimes:pdf',
            // Add validation for other files

            // Additional validation rules if needed
        ]);

        $mahasiswa->file_transkrip = $request->file('file_transkrip')->store('public/transcripts');
        $mahasiswa->file_sertifikat = $request->file('file_sertifikat')->store('public/certificates');
        $mahasiswa->file_laporan_akhir = $request->file('file_laporan_akhir')->store('public/reports');

        // Save other data...


        $mahasiswa->save();

        // Redirect or return a response...
    }


    public function destroy($id)
    {
        // Temukan data NilaiKonversi berdasarkan ID
        $nilaiKonversi = NilaiKonversi::findOrFail($id);

        // Lakukan penghapusan
        $nilaiKonversi->delete();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('konversinilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}