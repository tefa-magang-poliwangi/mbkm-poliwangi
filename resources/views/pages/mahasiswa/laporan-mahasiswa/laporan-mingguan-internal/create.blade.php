@extends('layouts.base-admin')

@section('title')
    <title>Laporan Mingguan | MBKM Poliwangi</title>

    @livewireStyles
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    {{-- Datedropper JS --}}
    <script src="{{ asset('js-datedropper/datedropper-javascript.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
@endsection

@section('content')
    <div class="container-fluid row py-6">
        <div class="col-12 py-5">
            <div class="card">
                <div class="card-body">
                    {{-- Form --}}
                    <form action="{{ route('mahasiswa.laporan.mingguan.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input id="waktu_mulai" data-dd-opt-custom-class="dd-theme-bootstrap" type="text"
                                    name="waktu_mulai" class="form-control date-input bg-white">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="waktu_akhir">Waktu Akhir</label>
                                <input id="waktu_akhir" data-dd-opt-custom-class="dd-theme-bootstrap" type="text"
                                    name="waktu_akhir" class="form-control date-input bg-white">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="exampleFormControlTextarea1" name="keterangan" class="form-control" style="width: 100%; height: 300px;"
                                placeholder="Tips: ceritakan kegiatanmu tanpa menginformasikan data yang bersifat rahasia"></textarea>
                        </div>
                        {{-- livewire Laporan Mingguan --}}
                        @livewire('laporan-mingguan')
                        {{-- livewire Laporan Mingguan END --}}
                        <div class="text-center py-3">
                            <button type="submit" class="btn btn-theme-two">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                    {{-- Form End --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    {{-- Bootstrap Datepicker JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize datepicker
            $('.daterange-cus').daterangepicker();
        });
    </script>

    <script>
        dateDropper({
            selector: '.date-input',
            expandedDefault: true,
            expandable: true,
            overlay: true,
            showArrowsOnHover: true,
            autoFill: false
        });
    </script>
@endsection
