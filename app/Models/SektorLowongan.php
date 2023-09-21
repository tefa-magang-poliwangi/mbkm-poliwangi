<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorLowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_sektor_industri',
        'id_lowongan',
    ];

    // relasi
    public function sektor_industri()
    {
        return $this->belongsTo(SektorIndustri::class, 'id_sektor_industri', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }
}
