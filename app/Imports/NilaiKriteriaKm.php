<?php

namespace App\Imports;

use App\Models\DetailPenilaianMagangExt;
use App\Models\MagangExt;
use App\Models\Mahasiswa;
use App\Models\PenilaianMagangExt;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class NilaiKriteriaKm implements ToCollection
{
    protected $id_magang_ext;

    public function __construct($id_magang_ext)
    {
        $this->id_magang_ext = $id_magang_ext;
    }

    public function collection(Collection $rows)
    {
        $mahasiswas = Mahasiswa::all();
        $penilaian_kriteria = PenilaianMagangExt::where('id_magang_ext', $this->id_magang_ext)->get();

        foreach ($rows as $column) {
            $nim = $column[1];
            $matchingMahasiswa = $mahasiswas->first(function ($mahasiswa) use ($nim) {
                return $mahasiswa->nim == $nim;
            });

            if ($matchingMahasiswa) {
                // Pengecekan untuk kriteria dan mahasiswa
                $cekImporData = DetailPenilaianMagangExt::where('id_penilaian_magang_ext', $penilaian_kriteria->first()->id)
                    ->where('id_mahasiswa', $matchingMahasiswa->id)
                    ->exists();

                if (!$cekImporData) {
                    // inisialisasi kolom mulai
                    $count_nilai = 2;

                    foreach ($penilaian_kriteria as $penilaian) {
                        DetailPenilaianMagangExt::create([
                            'nilai' => $column[$count_nilai],
                            'id_penilaian_magang_ext' => $penilaian->id,
                            'id_mahasiswa' => $matchingMahasiswa->id,
                        ]);

                        $count_nilai++;
                    }
                }
            }
        }
    }
}
