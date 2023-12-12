<div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="id_program_magang">Pilih Program Magang</label>
                <div>
                    @foreach ($programMagangs as $programMagang)
                        <div class="form-check">
                            <input wire:click="getFilteredKompetensiLowongans" wire:model="selectedProgramMagang"
                                class="form-check-input" type="radio" value="{{ $programMagang->id }}"
                                id="programMagang{{ $programMagang->id }}" name="id_program_magang">
                            <label class="form-check-label" for="programMagang{{ $programMagang->id }}">
                                {{ $programMagang->kegiatan }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="id_kompetensi_lowongan">Pilih Kompetensi Lowongan</label>
                <div>
                    @if ($kompetensiLowongans->count() > 0)
                        @if (!$kompetensiLowongans->isEmpty())
                            @foreach ($kompetensiLowongans as $kompetensiLowongan)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{ $kompetensiLowongan->id }}"
                                        id="kompetensiLowongan{{ $kompetensiLowongan->id }}"
                                        name="id_kompetensi_lowongan">
                                    <label class="form-check-label"
                                        for="kompetensiLowongan{{ $kompetensiLowongan->id }}">
                                        {{ $kompetensiLowongan->kompetensi_lowongan->kompetensi }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <span class="text-danger">Kompetensi program kosong</span>
                        @endif
                    @else
                        <span class="text-danger">*Mohon pilih program magang terlebih dahulu</span>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
