<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'prodi',
        'no_telp',
        'id_user'
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }
}