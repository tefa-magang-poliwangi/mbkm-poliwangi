<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
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
        'deskripsi',
        'id_user',
        'id_sektor_industri',
        'id_kategori',
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

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

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }
}
