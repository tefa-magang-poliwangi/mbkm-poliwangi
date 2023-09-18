@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Admin | ULT Poliwangi</title>
@endsection

@php
    function formatBilangan($bilangan)
    {
        return number_format((float) $bilangan, 2, '.', '');
    }
    
    function formatJumlah($jumlah)
    {
        return number_format((float) $jumlah, 0, ',', '.');
    }
@endphp

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard Admin</h4>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->

                <div class="row justify-content-around">
                    <div class="col-lg-12">
                        <div class="card profile-card card-hover card-rounded">
                            <div class="card-body pb-3">
                                <div class="media p-2 align-items-center">
                                    <div class="">
                                        <img src="{{ asset('images/auth-login.png') }}" width="80" alt="user"
                                            class="rounded-circle thumb-xl">
                                    </div>

                                    <div class="media-body ml-3 align-self-center">
                                        <h5 class="pro-title">Unit Layanan Terpadu - Politeknik Negeri Banyuwangi</h5>
                                        <p class="mb-2 text-muted">&commat;{{ Auth()->user()->name }}</p>
                                        <ul class="list-inline list-unstyled profile-socials mb-0">
                                            <li class="list-inline-item">
                                                @php
                                                    $formattedNumber = number_format($ratarata_skor, 2);
                                                @endphp
                                                <a href="#" class="">
                                                    <i class="fa-solid fa-star bg-soft-warning"></i>
                                                    &ensp;{{ formatBilangan($ratarata_skor) }} Average
                                                    Rating
                                                </a>
                                            </li>
                                            <span> | &ensp; </span>
                                            <li class="list-inline-item">
                                                <a href="#" class="">
                                                    <i class="fa-solid fa-face-smile-beam bg-soft-purple"></i>
                                                    &ensp;{{ formatJumlah($pengulas_count) }}
                                                    Pengulas
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->

                    <div class="col-lg-8">
                        <div class="card hospital-info card-hover card-rounded">
                            <div class="card-body">
                                <img src="{{ asset('images/dashboard-ilustration.jpg') }}" class="img-fluid" alt="">
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!-- end col-->

                    <div class="col-lg-4">
                        @if (Auth()->user()->divisi->nama_divisi == 'Unit Layanan Terpadu')
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('admin.permohonan.index') }}">
                                        <div class="card hospital-info card-hover card-rounded">
                                            <div class="card-body">
                                                <h4 class="header-title mt-0 mb-3">Daftar Permohonan</h4>
                                                <div class="media">
                                                    <div class="data-icon align-self-center">
                                                        <i class="fa-solid fa-file-circle-plus text-danger"></i>
                                                    </div>
                                                    <div class="media-body ml-3 align-self-center text-right">
                                                        <h3 class="mt-0">{{ $daftar_permohonan_count }}</h3>
                                                        <span
                                                            class="text-muted mb-0 text-nowrap">{{ Auth()->user()->divisi->nama_divisi }}</span>
                                                    </div><!--end media body-->
                                                </div>
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </a>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('admin.pengajuan.index') }}">
                                    <div class="card hospital-info card-hover card-rounded">
                                        <div class="card-body">
                                            <h4 class="header-title mt-0 mb-3">Manajemen Pengajuan</h4>
                                            <div class="media">
                                                <div class="data-icon align-self-center">
                                                    <i class="fa-solid fa-file-pen text-pink"></i>
                                                </div>
                                                <div class="media-body ml-3 align-self-center text-right">
                                                    <h3 class="mt-0">{{ $manajemen_pengajuan_count }}</h3>
                                                    <span
                                                        class="text-muted mb-0 text-nowrap">{{ Auth()->user()->divisi->nama_divisi }}</span>
                                                </div><!--end media body-->
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </a>
                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('admin.pengajuan.selesai.index') }}">
                                    <div class="card hospital-info card-hover card-rounded">
                                        <div class="card-body">
                                            <h4 class="header-title mt-0 mb-3">Daftar Pengajuan Selesai</h4>
                                            <div class="media">
                                                <div class="data-icon align-self-center">
                                                    <i class="fa-solid fa-file-circle-check text-success"></i>
                                                </div>
                                                <div class="media-body ml-3 align-self-center text-right">
                                                    <h3 class="mt-0">{{ $pengajuan_selesai_count }}</h3>
                                                    <span
                                                        class="text-muted mb-0 text-nowrap">{{ Auth()->user()->divisi->nama_divisi }}</span>
                                                </div><!--end media body-->
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </a>
                            </div><!-- end col-->
                        </div>

                        {{-- @if (Auth()->user()->divisi->nama_divisi == 'Unit Layanan Terpadu') --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('admin.saran.index') }}">
                                    <div class="card hospital-info card-hover card-rounded">
                                        <div class="card-body">
                                            <h4 class="header-title mt-0 mb-3">Daftar Ulasan dan Skor</h4>
                                            <div class="media">
                                                <div class="data-icon align-self-center">
                                                    <i class="fa-solid fa-face-smile-beam text-warning"></i>
                                                </div>
                                                <div class="media-body ml-3 align-self-center text-right">
                                                    <h3 class="mt-0">{{ $ulasan_count }}</h3>
                                                    <span
                                                        class="text-muted mb-0 text-nowrap">{{ Auth()->user()->divisi->nama_divisi }}</span>
                                                </div><!--end media body-->
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </a>
                            </div><!-- end col-->
                        </div>
                        {{-- @endif --}}

                    </div><!-- end col-->
                </div>

                <div class="row">
                    {{-- for divisi ult --}}
                    @if (Auth()->user()->divisi->nama_divisi == 'Unit Layanan Terpadu')
                        <div class="col-lg-12 mb-2">
                            <h4>Kelola Unit & Layanan</h4>
                        </div>

                        <div class="col-lg-4">
                            <a href="{{ route('admin.divisi.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Divisi</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-users-rectangle text-warning"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $divisi_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.user.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen User</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-user-plus text-primary"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $admin_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.admin.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Admin</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fas fa-user-group rounded-circle text-success"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $admin_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.prodi.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Prodi</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fas fa-graduation-cap rounded-circle text-danger"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $prodi_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan
                                                    Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.layanan.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Layanan</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-hands-holding text-info"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $layanan_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.berkas.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Berkas</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fas fa-folder rounded-circle text-blue"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $berkas_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->
                    @endif


                </div><!--end row-->

                <div class="row">
                    {{-- for divisi ult --}}
                    @if (Auth()->user()->divisi->nama_divisi == 'Unit Layanan Terpadu')
                        <div class="col-lg-12 mb-2">
                            <h4>Kelola Ulasan</h4>
                        </div>

                        <div class="col-lg-4">
                            <a href="{{ route('admin.pertanyaan.survei.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Kelompok Pertanyaan</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-clipboard-question text-purple"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $pertanyaan_survei_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.pertanyaan.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Pertanyaan</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-circle-question text-salmon"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $pertanyaan_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->

                        <div class="col-lg-4">
                            <a href="{{ route('admin.survei.index') }}">
                                <div class="card hospital-info card-hover card-rounded">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Manajemen Survei</h4>
                                        <div class="media">
                                            <div class="data-icon align-self-center">
                                                <i class="fa-solid fa-square-poll-vertical text-night"></i>
                                            </div>
                                            <div class="media-body ml-3 align-self-center text-right">
                                                <h3 class="mt-0">{{ $survei_count }}</h3>
                                                <span class="text-muted mb-0 text-nowrap">Unit Layanan Terpadu</span>
                                            </div><!--end media body-->
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </a>
                        </div><!-- end col-->
                    @endif

                </div><!--end row-->
            </div>
        </div>
    </div>
    <!-- Page-Title -->
@endsection
