<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_program_magang',
        'id_kompetensi_lowongan',
    ];
}
