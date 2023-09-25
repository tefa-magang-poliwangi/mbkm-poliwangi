<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mitra extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'kota',
        'provinsi',
        'website',
        'narahubung',
        'email',
        'foto',
        'status',
        'username',
        'password',
        'id_sektor_industri',
        'id_kategori',
    ];

    // relasi
    public function sektor_industri()
    {
        return $this->belongsTo(SektorIndustri::class, 'id_sektor_industri', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }

    public function pl_mitra()
    {
        return $this->hasMany(PlMitra::class);
    }
}
