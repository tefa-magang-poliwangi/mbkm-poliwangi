<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendampingLapangMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_dosen',
        'id_mahasiswa',
        'id_pl_mitra',
        'id_lowongan',
    ];
}
