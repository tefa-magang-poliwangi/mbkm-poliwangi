<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    // relasi
    public function nilai_magang_ext()
    {
        return $this->hasMany(NilaiMagangExt::class);
    }
}
