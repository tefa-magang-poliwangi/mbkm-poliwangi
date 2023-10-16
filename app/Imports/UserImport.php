<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new User([
    //         'name'      => $row[0],
    //         'email'     => $row[1],
    //         'username'  => $row[2],
    //         'password'  => Hash::make($row[3]),
    //     ]);
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            User::create([
                'name' => $row[0],
                'email'     => $row[1],
                'username'  => $row[2],
                'password'  => Hash::make($row[3]),
            ]);
        }
    }
}
