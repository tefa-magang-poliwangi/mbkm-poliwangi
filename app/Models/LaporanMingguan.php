<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMingguan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'keterangan',
        'validasi_pl',
        'id_mahasiswa',
        'id_program_magang',
        'id_kompetensi_lowongan',
    ];
}
