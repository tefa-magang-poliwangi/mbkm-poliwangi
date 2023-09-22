@extends('layouts.base-user')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card card-custom rounded ">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard Mahasiswa</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="card rounded">
                    <img src="{{ asset('assets/images/Group 1737.jpg') }}">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card hospital-info card-hover card-rounded">
                    <div class="card-body">
                        <h5 class="header-title mt-0 mb-5">Laporan Harian</h5>
                        <div class="media">
                            <div class="data-icon align-self-center">
                                <i class="fa-solid fa-address-card text-warning"></i>
                            </div>
                            <div class="media-body ml-3 mt-5 align-self-center text-right">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>

            <div class="col-lg-4">
                <div class="card hospital-info card-hover card-rounded">
                    <div class="card-body">
                        <h5 class="header-title mt-0 mb-5">Laporan Mingguan</h5>
                        <div class="media">
                            <div class="data-icon align-self-center">
                                <i class="fa-solid fa-address-card text-purple"></i>
                            </div>
                            <div class="media-body ml-3 mt-5 align-self-center text-right">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>

            <div class="col-lg-4">
                <div class="card hospital-info card-hover card-rounded">
                    <div class="card-body">
                        <h5 class="header-title mt-0 mb-5">Laporan Akhir</h5>
                        <div class="media">
                            <div class="data-icon align-self-center">
                                <i class="fa-solid fa-address-card text-primary"></i>
                            </div>
                            <div class="media-body ml-3 mt-5 align-self-center text-right">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>
    </section>
@endsection
