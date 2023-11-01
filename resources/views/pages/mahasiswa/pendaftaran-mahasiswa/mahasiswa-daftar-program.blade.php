@extends('layouts.base-guest')

@section('title')
    <title>Daftar Lowongan {{ $mitra->nama }} | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@php
    function dateConversion($date)
    {
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
    }
@endphp

@section('content')
    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-12 my-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5">
                            <a type="button" class="tag-menu text-theme" onclick="goBack()">
                                <span><i class="fa-solid fa-chevron-left"></i> &ensp; Kembali</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex mb-3 mt-4">
                            <h1 class="justify-start my-auto text-theme fw-x-bold">Daftar Lowongan -
                                {{ $mitra->nama }}</h1>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between mt-2">
                        <div class="col-10 col-sm-10 col-md-10 col-lg-11 mb-3">
                            <div class="input-group">
                                <select class="form-control select2">
                                    <option value="">Pilih Nama Perusahaan</option>
                                    @foreach ($mitras as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-1 mb-3 d-flex">
                            <div class="input-group-append mx-auto my-auto">
                                <button type="button" class="btn btn-search">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-theme fw-bold">Daftar Lowongan Mitra</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <div>
                            <div class="card ca rd-hover card-border p-3">
                                <div class="card-body text-center">
                                    <div class="mx-auto d-flex align-items-center">
                                        <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                            width="150" alt="">
                                    </div>

                                    <div class="text-justify mt-3">
                                        <h6 class="fw-bold">{{ $mitra->nama }}</h6>
                                        <span>{{ $mitra->kota }}</span>
                                        @if ($mitra->deskripsi == null || $mitra->deskripsi == '')
                                            <p class="mt-2"><i>Deskripsi belum ditambahkan</i></p>
                                        @else
                                            <p class="mt-2">{{ $mitra->deskripsi }}</p>
                                        @endif

                                        <div class="row d-flex mt-4">
                                            <a class="btn btn-theme mx-auto"
                                                onclick="showContent('list-home')">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Daftar Lowongan Mitra --}}
                        <div class="ruler-program mt-4">
                            @if ($lowongan_mitra->count() > 0)
                                @foreach ($lowongan_mitra as $data)
                                    <div class="card card-border p-3 mb-4">
                                        <div class="card-body text-center">
                                            <div class="mx-auto d-flex align-items-center">
                                                <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="img-fluid"
                                                    width="150" alt="">
                                            </div>
                                            <div class="text-justify pt-4">
                                                <h6 class="fw-bold">{{ $data->mitra->nama }}</h6>
                                                <h5>{{ $data->nama }}</h5>
                                                <p>{{ $data->mitra->kota }}</p>
                                            </div>

                                            <div class="text-justify">
                                                <ul>
                                                    <li>Kuota Lowongan : {{ $data->jumlah_lowongan }}</li>
                                                    <li>Durasi Pendaftaran :
                                                        <p>
                                                            {{ dateConversion($data->tanggal_dibuka) }} -
                                                            {{ dateConversion($data->tanggal_ditutup) }}
                                                        </p>
                                                    </li>
                                                    <li>Durasi magang :
                                                        <p>
                                                            {{ dateConversion($data->tanggal_magang_dimulai) }} -
                                                            {{ dateConversion($data->tanggal_magang_berakhir) }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="list-group px-1" id="list-tab" role="tablist">
                                                <a class="btn btn-theme mt-2 menu-none-decoration" id="list-profile-list"
                                                    data-toggle="list" href="#lowongan-{{ $data->id }}" role="tab">
                                                    Selengkapnya
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col d-flex">
                                        <div class="btn btn-theme mx-auto my-auto">Lowongan Belum Ditambahkan</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                            aria-labelledby="list-home-list">
                            <div class="card card-border p-4 mb-4">
                                <div class="card-body">
                                    <div class="mx-auto d-flex">
                                        <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                            width="150" alt="">
                                    </div>
                                    <div class="text-justify py-3">
                                        <h6 class="fw-bold">{{ $mitra->nama }}</h6>
                                        <span>{{ $mitra->kota }}</span>
                                    </div>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Deskripsi Mitra</p>
                                        @if ($mitra->deskripsi == null || $mitra->deskripsi == '')
                                            <small class="mt-2"><i>Deskripsi belum ditambahkan</i></small>
                                        @else
                                            <small class="mt-2">{{ $mitra->deskripsi }}</small>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Bidang Mitra</p>
                                        <ul>
                                            <li>Kategori : {{ $mitra->kategori->nama }}</li>
                                            <li>Sektor Industri : {{ $mitra->sektor_industri->nama }}</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Kontak Mitra</p>
                                        <ul>
                                            <li>Email : {{ $mitra->email }}</li>
                                            <li>Website : {{ $mitra->website }}</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Tentang Perusahaan</p>
                                        <small>
                                            Alamat : {{ $mitra->alamat }}, {{ $mitra->kota }} - {{ $mitra->provinsi }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Detail Lowongan --}}
                        @foreach ($lowongan_mitra as $data)
                            <div class="tab-pane fade" id="lowongan-{{ $data->id }}" role="tabpanel"
                                aria-labelledby="list-profile-list">

                                <div class="card card-border card-rounded-sm card-hover">
                                    <div class="card-body my-2 mx-5">
                                        <div class="mx-auto d-flex">
                                            <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                                width="150" alt="">
                                        </div>

                                        <div class="text-justify mt-3">
                                            <h6 class="fw-bold">{{ $data->nama }}</h6>
                                            <p>{{ $data->mitra->kota }}</p>
                                        </div>

                                        <div class="text-justify">
                                            <p class="mb-2 fw-bold">Berkas Pendaftaran</p>
                                            @if ($data->berkas_lowongan->count() > 0)
                                                <ol>
                                                    @foreach ($data->berkas_lowongan as $item)
                                                        <li>{{ $item->berkas->nama }}</li>
                                                    @endforeach
                                                </ol>
                                            @else
                                                <span><i>Berkas lowongan belum ditambahkan.</i></span>
                                            @endif
                                        </div>

                                        <div class="pt-2 pb-3">
                                            <a href="#" class="btn btn-theme">
                                                Daftar Magang
                                            </a>
                                        </div>
                                        <hr>

                                        <div class="text-justify">
                                            <p class="mb-2 fw-bold">Tentang Perusahaan</p>
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-8 mb-2 d-flex">
                                                    <div>
                                                        <small>
                                                            <i class="fa-solid fa-location-dot text-theme"></i> &ensp;
                                                            {{ $data->mitra->alamat }}, {{ $data->mitra->kota }} -
                                                            {{ $data->mitra->provinsi }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2 d-flex">
                                                    <div class="mx-auto">
                                                        <small>
                                                            <i class="fa-solid fa-earth-americas text-theme"></i> &ensp;
                                                            {{ $data->mitra->website }}
                                                        </small>
                                                        <br>
                                                        <small>
                                                            <i class="fa-solid fa-people-group text-theme"></i> &ensp;
                                                            {{ $data->jumlah_lowongan }} - Kuota Pelamar
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    {{-- JS Card Detail Mitra --}}
    <script>
        function showContent(tabId) {
            $('.tab-pane').removeClass('show active');
            $('#' + tabId).addClass('show active');
        }
    </script>

    {{-- JS Back Button --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
