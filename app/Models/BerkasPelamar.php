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
        'id_pelamar_magang',
        'id_berkas',
    ];

    // relasi
    public function pelamar_magang()
    {
        return $this->belongsTo(PelamarMagang::class, 'id_pelamar_magang', 'id');
    }

    public function berkas()
    {
        return $this->belongsTo(Berkas::class, 'id_berkas', 'id');
    }
}
