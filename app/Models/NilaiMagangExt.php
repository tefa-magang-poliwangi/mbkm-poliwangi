<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file',
        'semester',
        'id_mahasiswa',
        'id_magang_ext',
        'id_periode',
    ];
}
