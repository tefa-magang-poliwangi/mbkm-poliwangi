@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Wadir | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card card-custom rounded ">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard Wadir</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="card card-rounded">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/Group 1737.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <a href="{{ route('akademik.daftar.prodi') }}" class="menu-none-decoration text-theme">
                    <div class="card hospital-info card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="mt-0 mb-5">Daftar Nilai Mahasiswa </h5>
                            <div class="media">
                                <div class="data-icon align-self-center">
                                    <i class="fa-solid fa-users fa-2xl"></i>
                                </div>
                                <div class="media-body ml-3 mt-5 align-self-center text-right">
                                    <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                                </div><!--end media body-->
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

        </div>
    </section>
@endsection
