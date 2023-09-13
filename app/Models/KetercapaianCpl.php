<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetercapaianCpl extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_mahasiswa',
        'id_program_magang',
        'id_cpl',
    ];
}
