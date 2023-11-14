@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Admin Prodi | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card card-custom rounded ">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard Admin Prodi</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card rounded">
                    <img src="{{ asset('assets/images/4905784.jpg') }}">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row py-2">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.kurikulum.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Kurikulum</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $kurikulum_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.dosen.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Dosen</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $dosen_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.dosen.wali.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-check-to-slot"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Dosen Wali</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $dosen_wali_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.kelas.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Kelas</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $kelas_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.mahasiswa.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Mahasiswa</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $mahasiswa_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manajemen.magang.ext.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Magang Eksternal</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $magang_ext_count }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
