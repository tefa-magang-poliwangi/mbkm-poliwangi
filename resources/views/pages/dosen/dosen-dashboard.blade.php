@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Dosen | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="h3 text-white"
                style="background-color: #213555; border-radius: 10px; padding:10px; align-items: center;">
                Dashboard Dosen
            </div>
            <div class="col-md-6">

                <div class="card-body">

                    <img class="mt-4" src="{{ asset('images/dsdosbim.png') }}" style="width:480px;">
                </div>
            </div>
            <div class="col-md-6 py-5 mt-9"
                style="background-image: url('path/to/your/banner-image.jpg'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                <div class="d-grid gap-5">
                    <button class="btn btn-light text-dark px-5 py-4 fw-medium" type="button" style="font-size: 20px;">
                        <div class="text-left">
                            LAPORAN HARIAN
                        </div>
                        <div class="text-left">
                            <i class="far fa-file-alt" style="font-size: 2em;"></i>
                        </div>
                    </button>

                    <button class="btn btn-light text-dark px-5 py-4 fw-medium" type="button" style="font-size: 20px;">
                        <div class="text-left">
                            LAPORAN MINGGUAN
                        </div>
                        <div class="text-left">
                            <i class="far fa-file-alt" style="font-size: 2em;"></i>
                        </div>
                    </button>

                    <button class="btn btn-light text-dark px-5 py-4 fw-medium" type="button" style="font-size: 20px;">
                        <div class="text-left">
                            LAPORAN AKHIR
                        </div>
                        <div class="text-left">
                            <i class="far fa-file-alt" style="font-size: 2em;"></i>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
