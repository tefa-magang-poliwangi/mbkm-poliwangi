<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'ukuran_max',
        'id_mitra'
    ];

    // relasi
    public function berkas_lowongan()
    {
        return $this->hasMany(BerkasLowongan::class,'id_berkaslowongan','id');
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }
}
