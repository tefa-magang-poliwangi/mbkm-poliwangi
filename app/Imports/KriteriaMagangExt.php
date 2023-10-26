<?php

namespace App\Imports;

use App\Models\MagangExt;
use App\Models\PenilaianMagangExt;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class KriteriaMagangExt implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $column) {
            $nama_kriteria = $column[1];
            $id_magang_ext = MagangExt::where('name', $column[0])->value('id');

            PenilaianMagangExt::create([
                'penilaian' => $nama_kriteria,
                'id_magang_ext' => $id_magang_ext,
            ]);
        }
    }
}
