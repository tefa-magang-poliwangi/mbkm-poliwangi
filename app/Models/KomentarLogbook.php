<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarLogbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'komentar',
        'tanggal',
        'nilai',
        'id_pendamping_lapang_mahasiswa',
        'id_logbook',
    ];

    // relasi
    public function pendamping_lapang_mahasiswa()
    {
        return $this->belongsTo(PendampingLapangMahasiswa::class, 'id_pendamping_lapang_mahasiswa', 'id');
    }

    public function logbook()
    {
        return $this->belongsTo(Logbook::class, 'id_logbook', 'id');
    }
}
