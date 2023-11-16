<?php

namespace App\Http\Livewire;

use App\Models\Lowongan;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\PelamarMagang;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LowonganDetail extends Component
{
    public $lowonganId;
    public $idMitra;
    public $mitra;
    public $lowongan_mitra;
    public $detailLowongan;
    public $lowongan;
    public $permohonan;

    public function mount($id_mitra)
    {
        $this->idMitra = $id_mitra;

        // Simpan $mitra sebagai properti
        $this->mitra = Mitra::findOrFail($id_mitra);
    }

    public function showLowonganDetail($lowonganId)
    {
        $this->lowonganId = $lowonganId;
    }

    public function render()
    {
        // Pastikan $this->mitra sudah diatur
        if (!$this->mitra) {
            return view('livewire.lowongan-detail');
        }

        // Ambil data lowongan mitra
        $this->lowongan_mitra = Lowongan::where('id_mitra', $this->mitra->id)
            ->where('status', 'Aktif')
            ->with('berkas_lowongan')
            ->get();

        // Pastikan $this->lowonganId diatur dengan benar
        if ($this->lowonganId) {
            // Ambil data detail lowongan berdasarkan $this->lowonganId
            $this->detailLowongan = Lowongan::findOrFail($this->lowonganId);
        }

        // Set $lowongan dengan nilai $this->detailLowongan
        $this->lowongan = $this->detailLowongan;

        // Dapatkan data lowongan untuk mitra yang dipilih
        $mahasiswa = null;
        $lowonganQuery = Lowongan::where('id_mitra', $this->mitra->id)->where('status', 'Aktif');

        // Periksa apakah pengguna adalah mahasiswa
        if (Auth::check() && Auth::user()->hasRole('mahasiswa')) {
            $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
            // Filter data lowongan berdasarkan id_prodi mahasiswa
            $lowonganQuery->where('id_prodi', $mahasiswa->id_prodi);
        }

        $this->permohonan = $mahasiswa ? PelamarMagang::where('id_mahasiswa', $mahasiswa->id)->latest('created_at')->first() : null;

        $data = [
            'lowongan_mitra' => $this->lowongan_mitra,
            'lowongan' => $this->lowongan,
            'permohonan' => $this->permohonan,
        ];

        return view('livewire.lowongan-detail', ['data' => $data]);
    }
}
