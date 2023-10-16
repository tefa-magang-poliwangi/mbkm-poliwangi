<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_mahasiswa',
        'id_dosen_wali',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function dosen_wali()
    {
        return $this->belongsTo(DosenWali::class, 'id_dosen_wali', 'id');
    }
}