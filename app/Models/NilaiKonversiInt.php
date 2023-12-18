<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKonversiInt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai_angka',
        'nilai_huruf',
        'angka_mutu',
        'kredit',
        'mutu',
        'id_matkul',
        'id_pelamar_magang',
        'id_transkrip_mitra',
    ];

    // relasi
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }

    public function pelamar_magang()
    {
        return $this->belongsTo(PelamarMagang::class, 'id_pelamar_magang', 'id');
    }

    public function transkrip_mitra()
    {
        return $this->belongsTo(TranskripMitra::class, 'id_transkrip_mitra');
    }
}
