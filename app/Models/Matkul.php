<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'kode_matakuliah',
        'sks',
    ];

    // relasi
    public function matkul_kurikulum()
    {
        return $this->hasMany(MatkulKurikulum::class);
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class);
    }
}
