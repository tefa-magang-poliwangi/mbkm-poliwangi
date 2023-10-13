@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Admin | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row pt-3">
            <div class="col-12">
                <div class="card bg-theme text-white rounded ">
                    <div class="card-body d-flex">
                        <h3 class="card-title my-auto">Dashboard Super Admin</h3>
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
                <a href="{{ route('roles.index') }}" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Manajemen Role</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-users fa-2xl p-4 menu-card text-theme card-rounded-sm"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('permissions.index') }}" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Manajemen Permission</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-address-card fa-2xl p-4 menu-card text-theme card-rounded-sm"></i>
                            </div>
                            <div class="ml-3 align-self-center text-right mt-3">
                                <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                            </div><!--end media body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('users.index') }}" class="tag-menu">
                    <div class="card card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title text-theme mb-4">Manajemen User</h5>
                            <div class="align-self-center">
                                <i class="fa-solid fa-user-gear fa-2xl p-4 menu-card text-theme card-rounded-sm"></i>
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
