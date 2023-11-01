<?php

namespace App\Imports;

use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MatakuliahImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $prodis = Prodi::all();

        foreach ($rows as $column) {
            $prodiName = $column[3];
            $matchingProdi = $prodis->first(function ($prodi) use ($prodiName) {
                return $prodi->nama == $prodiName;
            });

            Matkul::create([
                'nama' => $column[0],
                'kode_matakuliah' => $column[1],
                'sks' => $column[2],
                'id_prodi' => $matchingProdi->id,
            ]);
        }
    }
}
