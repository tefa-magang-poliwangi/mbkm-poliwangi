<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlMitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'no_telp',
        'email',
        'username',
        'password',
        'id_mitra',
    ];
}
