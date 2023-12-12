<?php

namespace App\Http\Livewire;

use App\Models\KompetensiLowongan;
use App\Models\Mahasiswa;
use App\Models\PelamarMagang;
use App\Models\ProgramMagang;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporanMingguan extends Component
{
    public $selectedProgramMagang;

    public function render()
    {
        $id_user = Auth::user()->id;
        $mahasiswa = Mahasiswa::where('id_user', $id_user)->first();
        $pelamar_magang = PelamarMagang::where('id_mahasiswa', $mahasiswa->id)->first();
        $programMagangs = ProgramMagang::where('validasi_kaprodi', 'Setuju')->where('id_lowongan', $pelamar_magang->id_lowongan)->get();
        $kompetensiLowongans = $this->getFilteredKompetensiLowongans();

        return view('livewire.laporan-mingguan', [
            'programMagangs' => $programMagangs,
            'kompetensiLowongans' => $kompetensiLowongans,
        ]);
    }

    public function getFilteredKompetensiLowongans()
    {
        if ($this->selectedProgramMagang) {
            $kompetensiLowongans = KompetensiLowongan::where('id_lowongan', $this->selectedProgramMagang)->get();
        } else {
            $kompetensiLowongans = collect();
        }

        return $kompetensiLowongans;
    }
}
