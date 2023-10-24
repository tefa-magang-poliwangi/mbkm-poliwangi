<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class);
    }

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }

    public function admin_prodi()
    {
        return $this->hasMany(AdminProdi::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }
}