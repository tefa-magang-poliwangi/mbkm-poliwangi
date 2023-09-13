<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kegiatan',
        'waktu_mulai',
        'waktu_akhir',
        'posisi_mahasiswa',
        'validasi_kaprodi',
        'id_lowongan',
        'id_pl_mitra',
    ];
}
