<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_cpl',
        'deskripsi',
        'jenis_cpl',
        'id_kurikulum',
    ];

    // relasi
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id');
    }

    public function ketercapaian_cpl()
    {
        return $this->hasMany(KetercapaianCpl::class);
    }

    public function logbooks()
    {
        return $this->belongsToMany(Logbook::class, 'cpl_maps','id_cpl','id_logbook');
    }
}
