<?php

namespace App\Imports;

use App\Models\AdminProdi;
use App\Models\MagangExt;
use App\Models\Periode;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class MagangExtImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $id_user = Auth::user()->id;
        $user_admin = AdminProdi::where('id_user', $id_user)->first();
        $periode_aktif = Periode::where('status', 'Aktif')->first();

        foreach ($rows as $column) {
            $name = $column[0];
            $jenis_magang = $column[1];

            MagangExt::create([
                'name' => $name,
                'jenis_magang' => $jenis_magang,
                'id_periode' => $periode_aktif->id,
                'id_prodi' => $user_admin->id_prodi,
            ]);
        }
    }
}
