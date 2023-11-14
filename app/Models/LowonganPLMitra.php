<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPLMitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'status',
        'id_mitra',
        'id_prodi'
    ];

    // relasi
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function program_magang()
    {
        return $this->hasMany(ProgramMagang::class);
    }


    public function kompetensi_lowongan()
    {
        return $this->hasMany(KompetensiLowongan::class);
    }

}
