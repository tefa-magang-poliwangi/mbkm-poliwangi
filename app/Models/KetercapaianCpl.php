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

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function program_magang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program_magang', 'id');
    }

    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl', 'id');
    }
}
