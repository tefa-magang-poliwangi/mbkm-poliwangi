<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaianMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai',
        'id_penilaian_magang_ext',
    ];

    // relasi
    public function penilaian_magang_ext()
    {
        return $this->belongsTo(PenilaianMagangExt::class, 'id_penilaian_magang_ext', 'id');
    }
}
