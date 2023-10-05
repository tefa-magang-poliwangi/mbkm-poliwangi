<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'penilaian',
        'id_magang_ext',
    ];

    // relasi
    public function magang_ext()
    {
        return $this->belongsTo(MagangExt::class, 'id_magang_ext', 'id');
    }

    public function detail_penilaian_magang_ext()
    {
        return $this->hasMany(DetailPenilaianMagangExt::class);
    }
}
