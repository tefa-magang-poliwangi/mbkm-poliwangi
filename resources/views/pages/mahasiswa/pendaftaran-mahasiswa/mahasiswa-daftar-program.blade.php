@extends('layouts.base-guest')

@section('title')
    <title>Daftar Lowongan {{ $mitra->nama }} | MBKM Poliwangi</title>

    @livewireStyles
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    @if ($mitra == null)
        <section>
            <div class="container py-4">
                <div class="row pt-5 my-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex pb-3" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('assets/images/mitra-none.svg') }}" width="700"
                            class="img-fluid p-5 mx-auto my-auto" alt="">
                    </div>
                    <h1 class="justify-start my-auto text-theme fw-x-bold text-center pb-3" data-aos="zoom-in"
                        data-aos-delay="300">
                        Mohon maaf, Belum ada Mitra untuk Saat ini.
                    </h1>
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container">
                <div class="row pt-5">
                    <div class="col-md-12 my-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5" data-aos="fade-right"
                                data-aos-delay="100">
                                <a type="button" class="tag-menu text-theme" onclick="goBack()">
                                    <span><i class="fa-solid fa-chevron-left"></i> &ensp; Kembali</span>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex mb-3 mt-4" data-aos="fade-up"
                                data-aos-delay="300">
                                <h1 class="justify-start my-auto text-theme fw-x-bold">Daftar Lowongan -
                                    {{ $mitra->nama }}</h1>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between mt-2">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8 mb-3" data-aos="zoom-in" data-aos-delay="600">
                                <div class="form-group">
                                    <label for="selectMitra" class="form-label fw-medium">Filter Lowongan Perusahaan</label>
                                    <select class="form-control select2" id="selectMitra" onchange="goToMitra()">
                                        <option value="">Pilih Nama Perusahaan</option>
                                        @foreach ($mitras as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $mitra->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Detail Lowongan Livewire --}}
        @livewire('lowongan-detail', ['id_mitra' => $mitra->id])
    @endif
@endsection

@section('script')
    @livewireScripts

    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    {{-- Script Submit Mitra Search by Dropdown --}}
    <script>
        function goToMitra() {
            var selectedMitra = document.getElementById('selectMitra').value;
            if (selectedMitra) {
                window.location.href = "{{ route('daftar.lowongan.program') }}/" + selectedMitra;
            }
        }
    </script>

    {{-- JS Back Button --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
