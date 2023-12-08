@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid row pt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded">
                    <a href="{{ route('manajemen.mitra.logbook.index') }}" class="btn btn-theme-one fw-medium mt-2"
                        style="display: flex; align-items: center;">
                        <i class="fas fa-chevron-left"></i>
                        <div class="ml-2"> Kembali</div>
                    </a>
                    <div class="card-body">
                        @php
                            $startOfWeek = now()->startOfWeek();
                            $endOfWeek = now()->endOfWeek();
                        @endphp
                        <h6 class="card-text">{{ $startOfWeek->format('d') }} - {{ $endOfWeek->format('d M Y') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @for ($dayIndex = 0; $dayIndex < 6; $dayIndex++)
                    @php
                        $currentDay = $startOfWeek->clone()->addDays($dayIndex);
                        $logbookEntries = $logbook->where('tanggal', $currentDay->format('Y-m-d'));
                    @endphp
                    <div class="card rounded mb-3">
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">{{ $currentDay->translatedFormat('l') }}</h6>
                                <h6>{{ $currentDay->format('d F Y') }}</h6>
                            </div>
                            <div class="ml-auto">
                                <div class="btn btn-theme-two" data-toggle="modal" data-target="#showmodal">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div style="margin-left: 25px; margin-right: 25px;">
                            @foreach ($logbookEntries as $entry)
                                <p>{{ $entry->kegiatan }}</p>
                            @endforeach
                        </div>
                        <hr>
                        <div class="text-center mb-3 mr-3">
                            {{-- <a href="{{ route('manajemen.mitra.logbook.create', ['date' => $currentDay->format('Y-m-d')]) }}"
                                class="btn btn-theme-two fw-medium mt-2">
                                Buat Laporan Harian
                            </a> --}}
                        </div>
                    </div>
                @endfor

            </div>
        </div>

        {{-- Modal upload Mitra --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="showmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <iframe src="{{ asset('storage/app/public/sertifikat/sertifikat_362055401024.pdf') }}"
                                width="100%" height="600px"></iframe>
                        </div>

                        <div class="row">
                            <div class="col d-flex">
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
