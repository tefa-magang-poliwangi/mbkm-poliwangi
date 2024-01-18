<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DosenImport implements ToCollection
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

            $user_dosen = User::create([
                'name' => $column[0],
                'email' => $column[1],
                'username' => $column[4],
                'password' => bcrypt($column[5]),
            ]);

            $user_dosen->assignRole('dosen');

            Dosen::create([
                'nama' => $column[0],
                'email' => $column[1],
                'no_telp' => $column[2],
                'id_registrasi_dosen' => $column[3], // feeder id
                'id_prodi' => $matchingProdi->id,
                'id_user' => $user_dosen->id,
            ]);
        }
    }
}
