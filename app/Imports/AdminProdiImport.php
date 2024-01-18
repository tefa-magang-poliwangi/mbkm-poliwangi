<?php

namespace App\Imports;

use App\Models\AdminJurusan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AdminProdiImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $prodis = Prodi::all();

        foreach ($rows as $column) {
            $prodiName = $column[4];
            $matchingProdi = $prodis->first(function ($prodi) use ($prodiName) {
                return $prodi->nama == $prodiName;
            });

            $user_admin = User::create([
                'name' => $column[0],
                'email' => $column[1],
                'username' => $column[2],
                'password' => bcrypt($column[3]),
            ]);

            $user_admin->assignRole('admin-prodi');

            AdminJurusan::create([
                'id_user' => $user_admin->id,
                'id_prodi' => $matchingProdi->id,
            ]);
        }
    }
}
