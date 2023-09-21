<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorIndustri extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
    ];

    // relasi
    public function mitra()
    {
        return $this->hasMany(Mitra::class);
    }

    public function sektor_lowongan()
    {
        return $this->hasMany(SektorLowongan::class);
    }
}
