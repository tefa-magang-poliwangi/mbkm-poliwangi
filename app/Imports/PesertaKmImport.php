<?php

namespace App\Imports;

use App\Models\PesertaMagangExt;
use App\Models\MagangExt;
use App\Models\Periode;
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
        $periode_aktif = Periode::where('status', 'Aktif')->first();


        foreach ($rows as $column) {
            $nim = $column[0];
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();
            $name = $column[6];

            $magang_ext = MagangExt::where('name', $name)
                ->where('id_periode', $periode_aktif->id)
                ->first();
            //dd($magang_ext);
            $existingEntry = null; // Inisialisasi ulang $existingEntry pada setiap iterasi.

            if ($mahasiswa && $magang_ext) {
                // Cek apakah entri dengan nama yang sama sudah ada dalam periode aktif
                $existingEntry = PesertaMagangExt::where('id_mahasiswa', $mahasiswa->id)
                    ->where('id_magang_ext', $magang_ext->id)
                    ->first();
            }
            if (!$existingEntry && $mahasiswa && $magang_ext) {
                PesertaMagangExt::create([
                    'id_mahasiswa' => $mahasiswa->id,
                    'id_magang_ext' => $magang_ext->id,
                ]);
            }
        }
        // $periode_aktif = Periode::where('status', 'Aktif')->first();


        // foreach ($rows as $column) {
        //     $nim = $column[0];
        //     $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        //     $name = $column[5];
        //     $magang_ext = MagangExt::where('name', $name)
        //         ->where('id_periode', $periode_aktif->id)
        //         ->first();
        //     dd($name);
        //     // Cek apakah entri dengan nama yang sama sudah ada dalam periode aktif
        //     $existingEntry = PesertaMagangExt::where('nim', $nim)
        //         ->where('id_magang_ext', $magang_ext->id)
        //         ->first();
        // };

        // if (!$existingEntry) {
        //     PesertaMagangExt::create([
        //         'id_mahasiswa' => $mahasiswa->id,
        //         'id_magang_ext' => $magang_ext->id,
        //     ]);
        // }
    }
}
