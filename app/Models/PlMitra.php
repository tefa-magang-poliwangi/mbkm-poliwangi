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
        'id_mitra',
        'id_user',
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id');
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }

    public function program_magang()
    {
        return $this->hasMany(ProgramMagang::class);
    }
}
