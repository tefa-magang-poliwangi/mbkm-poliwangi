<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProdi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'id_prodi',
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
}
