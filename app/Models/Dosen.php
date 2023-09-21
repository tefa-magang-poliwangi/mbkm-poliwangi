<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
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
