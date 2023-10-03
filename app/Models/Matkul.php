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
        'id_prodi'
    ];

    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function matkul_kurikulum()
    {
        return $this->hasMany(MatkulKurikulum::class);
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class);
    }
}
