<?php

namespace App\Imports;

use App\Models\Dosen;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class DosenImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Dosen([

    //             'nama' => $row[0],
    //             'email' => $row[1],
    //             'no_telp'=> $row[2],
    //             'id_prodi'=> $row[3],
    //             'id_user' => $row[4],

    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Dosen::create([
                'nama' => $row[0],
                'email' => $row[1],
                'no_telp' => $row[2],
                'id_prodi' => $row[3],
                'id_user' => $row[4],
            ]);
        }
    }
}
