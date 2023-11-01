<?php

namespace App\Imports;

use App\Models\PesertaMagangExt;
use App\Models\MagangExt;
use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PesertaKmImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $mahasiswas = Mahasiswa::all();
        $magang_ext = MagangExt::all();

        foreach ($rows as $column) {
            $nim = $column[1];
            $nama_magang_ext = $column[2];

            $matchingMahasiswa = $mahasiswas->first(function ($mahasiswa) use ($nim) {
                return $mahasiswa->nim == $nim;
            });

            $matchingMagangExt = $magang_ext->first(function ($magang_ext) use ($nama_magang_ext) {
                return $magang_ext->name == $nama_magang_ext;
            });

            PesertaMagangExt::create([
                'id_mahasiswa' => $matchingMahasiswa->id,
                'id_magang_ext' => $matchingMagangExt->id,
            ]);
        }
    }
}
