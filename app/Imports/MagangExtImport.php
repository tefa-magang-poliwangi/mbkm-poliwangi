<?php

namespace App\Imports;

use App\Models\MagangExt;
use App\Models\Periode;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MagangExtImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $periode_aktif = Periode::where('status', 'Aktif')->first();

        foreach ($rows as $column) {
            $name = $column[7];

            // Cek apakah entri dengan nama yang sama sudah ada dalam periode aktif
            $existingEntry = MagangExt::where('name', $name)
                ->where('id_periode', $periode_aktif->id)
                ->first();

            if (!$existingEntry) {
                MagangExt::create([
                    'name' => $name,
                    'id_periode' => $periode_aktif->id,
                ]);
            }
        }
    }
}
