<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswasImport implements ToCollection
{
    /**
     * @param Collection $collection
     */

    public function collection(Collection $rows)
    {
        $users = User::all();
        $prodis = Prodi::all();

        foreach ($rows as $column) {
            $nim = $column[0];

            $matchingUser = $users->first(function ($user) use ($nim) {
                return $user->username == $nim;
            });

            if ($matchingUser) {
                $prodiName = $column[5]; // Misalnya, Anda ingin mencocokkan prodi pada kolom ke-5
                $matchingProdi = $prodis->first(function ($prodi) use ($prodiName) {
                    return $prodi->nama == $prodiName; // Sesuaikan dengan nama kolom prodi di tabel Prodi
                });

                if ($matchingProdi) {
                    Mahasiswa::create([
                        'nim' => $nim,
                        'nama' => $column[1],
                        'angkatan' => $column[2],
                        'email' => $column[3],
                        'no_telp' => $column[4],
                        'id_prodi' => $matchingProdi->id,
                        'id_user' => $matchingUser->id,
                    ]);
                }
            }
        }
    }
}
