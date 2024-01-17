<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminJurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'id_jurusan',
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
}
