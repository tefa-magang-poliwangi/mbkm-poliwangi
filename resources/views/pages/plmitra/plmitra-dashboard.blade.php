@extends('layouts.base-admin')

@section('title')
    <title>Dashboard PLMitra | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div>
        <div class="container py-3">
            <div class="row">
                <div class="col mt-3">
                    <div class="card-body">
                        <h3 class="section-bg-two text-white card-rounded-sm px-3 py-4">Dashboard Mitra</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card card-rounded">
                    <div class="card-body d-flex">
                        <img src="{{ asset('assets/images/dashboardmitra.png') }}" width="85%"
                            class="img-fluid my-auto mx-auto">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="##" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Manajemen Peserta Magang</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-users-gear fa-2xl p-4 menu-card text-theme card-rounded-sm"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="##" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">LogBook</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-briefcase fa-2xl p-4 menu-card text-theme card-rounded-sm"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
