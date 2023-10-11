<?php

namespace App\Imports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dosen([

                'nama' => $row[0],
                'email' => $row[1],
                'no_telp'=> $row[2],
                'id_prodi'=> $row[3],
                'id_user' => $row[4],

        ]);
    }
}
