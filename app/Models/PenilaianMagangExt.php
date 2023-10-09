<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'penilaian',
        'id_magang_ext',
    ];

    // relasi
    public function magang_ext()
    {
        return $this->belongsTo(MagangExt::class, 'id_magang_ext', 'id');
    }

    public function detail_penilaian_magang_ext()
    {
        return $this->hasMany(DetailPenilaianMagangExt::class);
    }

    // Fungsi pengecekan apakah ID ada di tabel DetailPenilaianMagangExt
    public function isDetailPenilaianMagangExt($id_penilaian_magang_ext, $id_mahasiswa)
    {
        // Mencari data DetailPenilaianMagangExt berdasarkan id_penilaian_magang_ext dan id_mahasiswa
        $detailPenilaianMagangExt = DetailPenilaianMagangExt::where('id_penilaian_magang_ext', $id_penilaian_magang_ext)
            ->where('id_mahasiswa', $id_mahasiswa)
            ->first();

        // Jika data ditemukan, kembalikan objek DetailPenilaianMagangExt, jika tidak, kembalikan false
        return $detailPenilaianMagangExt ?? false;
    }
}
