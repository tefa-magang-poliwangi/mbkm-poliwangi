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
        'username',
        'password',
        'id_sektor_industri',
        'id_kategori',
    ];
}
