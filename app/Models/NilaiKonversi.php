<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKonversi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai_angka',
        'nilai_huruf',
        'validasi_kaprodi',
        'id_mahasiswa',
        'id_matkul',
        'id_lowongan',
        'id_nilai_magang_ext',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function nilai_magang_ext()
    {
        return $this->belongsTo(NilaiMagangExt::class, 'id_nilai_magang_ext', 'id');
    }
}
