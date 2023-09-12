<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarLogbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'komentar',
        'tanggal',
        'nilai',
        'id_logbook',
        'id_pl_mahasiswa',
    ];
}
