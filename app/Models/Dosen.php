<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'username',
        'password',
        'prodi',
        'no_telp',
    ];

    // relasi
    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }
}
