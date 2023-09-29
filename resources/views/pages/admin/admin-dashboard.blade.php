@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Admin | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card card-custom rounded ">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard Super Admin</h3>
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
                <a href="{{ route('roles.index') }}">
                    <div class="card hospital-info card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title mt-0 mb-5">Management Role</h5>
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

            <div class="col-lg-4">
                <a href="{{ route('permissions.index') }}">
                    <div class="card hospital-info card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title mt-0 mb-5">Management Permission</h5>
                            <div class="media">
                                <div class="data-icon align-self-center">
                                    <i class="fa-solid fa-address-card fa-2xl"></i>
                                </div>
                                <div class="media-body ml-3 mt-5 align-self-center text-right">
                                    <span class="text-muted mb-0 text-nowrap">MBKM Poliwangi</span>
                                </div><!--end media body-->
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </a>
            </div>

            <div class="col-lg-4">
                <a href="{{ route('users.index') }}">
                    <div class="card hospital-info card-hover card-rounded">
                        <div class="card-body">
                            <h5 class="header-title mt-0 mb-5">Management User</h5>
                            <div class="media">
                                <div class="data-icon align-self-center">
                                    <i class="fa-solid fa-user-gear fa-2xl"></i>
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
