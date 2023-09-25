@extends('layouts.base-admin')


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
                <div class="card hospital-info card-hover card-rounded">
                    <div class="card-body">
                        <h5 class="header-title mt-0 mb-5">Management Role</h5>
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
                        <h5 class="header-title mt-0 mb-5">Management Permission</h5>
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
                        <h5 class="header-title mt-0 mb-5">Management User</h5>
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
