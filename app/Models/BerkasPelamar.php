<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file',
        'id_mahasiswa',
        'id_lowongan',
        'id_berkas_lowongan',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function berkas_lowongan()
    {
        return $this->belongsTo(BerkasLowongan::class, 'id_berkas_lowongan', 'id');
    }
}
