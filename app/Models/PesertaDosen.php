<?php

namespace App\Models;

use App\Models\PesertaKelas as ModelsPesertaKelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_mahasiswa',
        'id_dosen',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function peserta_dosen()
    {
        return $this->belongsTo(PesertaDosen::class, 'id_dosen', 'id');
    }
}
