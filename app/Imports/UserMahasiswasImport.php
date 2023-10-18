<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserMahasiswasImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $column) {
            $user = User::create([
                'name' => $column[0],
                'email' => $column[1],
                'username' => $column[2],
                'password' => bcrypt($column[3]),
            ]);

            $user->assignRole('mahasiswa');
        }
    }
}
