<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskripMitra extends Model
{
    use HasFactory;

    protected $table = 'transkrip_mitras';

    protected $fillable = [
        'id_pelamar_magang',
        'id_periode',
        'file_transkrip',
        'file_sertifikat',
        'file_laporan_akhir',
        'evaluasi',
    ];

    public function pelamar_magang()
    {
        return $this->belongsTo(PelamarMagang::class, 'id_pelamar_magang', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }
}
