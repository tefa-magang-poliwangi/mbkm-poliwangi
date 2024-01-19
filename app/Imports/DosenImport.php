<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Jurusan;
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
        $jurusans = Jurusan::all();

        foreach ($rows as $column) {
            $jurusanName = $column[3];
            $matchingJurusan = $jurusans->first(function ($jurusan) use ($jurusanName) {
                return $jurusan->nama_jurusan == $jurusanName;
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
                'id_registrasi_dosen' => $column[6], // feeder id
                'id_jurusan' => $matchingJurusan->id,
                'id_user' => $user_dosen->id,
            ]);
        }
    }
}
