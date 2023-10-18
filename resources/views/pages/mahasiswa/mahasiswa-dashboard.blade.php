@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card card-custom rounded ">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard Mahasiswa</h3>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-rounded d-flex">
                    <div class="card-body mx-auto my-auto">
                        <img src="{{ asset('assets/images/Group 1737.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Laporan Harian</h5>
                            <div class="align-self-center">
                                <i class="fa-regular fa-file-lines fa-2xl p-4 menu-card card-rounded-sm text-primary"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Laporan Mingguan</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-file-invoice fa-2xl p-4 menu-card card-rounded-sm text-primary"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Laporan Akhir</h5>
                            <div class="align-self-center">
                                <i
                                    class="fa-solid fa-file-circle-check fa-2xl p-4 menu-card card-rounded-sm text-primary"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>
        </div>
    </section>
@endsection
