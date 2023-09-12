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
    ];
}
