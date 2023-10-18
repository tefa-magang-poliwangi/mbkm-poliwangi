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
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $mahasiswas = Mahasiswa::all();

        foreach ($rows as $column) {
            $nim = $column[2];
            $magang_ext = MagangExt::where('name', $column[3])->first();
            $penilaian_kriteria = PenilaianMagangExt::where('id_magang_ext', $magang_ext->id)->get();

            // mengambil data mahasiswa
            $matchingMahasiswa = $mahasiswas->first(function ($mahasiswa) use ($nim) {
                return $mahasiswa->nim == $nim;
            });

            // jumlah kolom
            $count_nilai = 8;

            // Loop sebanyak penilaian kriteria yang sesuai
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
