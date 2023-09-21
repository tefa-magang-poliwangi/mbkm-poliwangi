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

    // relasi
    public function program_magang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program_magang', 'id');
    }

    public function kompetensi_lowongan()
    {
        return $this->belongsTo(KompetensiLowongan::class, 'id_kompetensi_lowongan', 'id');
    }
}
