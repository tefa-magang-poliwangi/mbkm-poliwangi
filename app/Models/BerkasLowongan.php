<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasLowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_lowongan',
        'id_berkas',
    ];

    // relasi
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function berkas()
    {
        return $this->belongsTo(Berkas::class, 'id_berkas', 'id');
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }
}
