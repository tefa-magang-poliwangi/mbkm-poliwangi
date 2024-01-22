<?php

namespace App\Imports;

use App\Models\AdminJurusan;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AdminJurusanImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $jurusans = Jurusan::all();

        foreach ($rows as $column) {
            $jurusanName = $column[4];
            $matchingJurusan = $jurusans->first(function ($jurusans) use ($jurusanName) {
                return $jurusans->nama_jurusan == $jurusanName;
            });

            $user_admin = User::create([
                'name' => $column[0],
                'email' => $column[1],
                'username' => $column[2],
                'password' => bcrypt($column[3]),
            ]);

            $user_admin->assignRole('admin-jurusan');

            AdminJurusan::create([
                'id_user' => $user_admin->id,
                'id_jurusan' => $matchingJurusan->id,
            ]);
        }
    }
}
