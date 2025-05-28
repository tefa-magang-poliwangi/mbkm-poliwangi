<?php

namespace App\Imports;

use App\Models\AdminJurusan;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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

            // Lewati baris jika salah satu kolom penting kosong
            if (empty($column[0]) || empty($column[1]) || empty($column[2]) || empty($column[3]) || empty($column[4])) {
                Log::warning("Baris dilewati karena data kosong: " . json_encode($column));
                continue;
            }
            $jurusanName = $column[4];
            $matchingJurusan = $jurusans->first(function ($jurusans) use ($jurusanName) {
                return $jurusans->nama_jurusan == $jurusanName;
            });

            // dd($column[0], $column[1], $column[2], $column[3]);

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
