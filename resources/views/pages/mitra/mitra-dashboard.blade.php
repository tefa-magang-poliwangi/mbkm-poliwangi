@extends('layouts.base-admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h3 class="section-bg-two text-white card-rounded px-3 py-2">Dashboard Mitra</h3>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="card-body">
                        <img src="{{ asset('images/image 3.png') }}">
                    </div>
                </div>
                <div class="col-md-6 py-5">
                    <div class="d-grid gap-5">
                        <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Lowongan
                            <i class="fas fa-search" style="font-size: 2em;"></i>
                        </button>
                        <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Pendamping Lapang
                            <i class="fas fa-user" style="font-size: 2em;"></i>
                        </button>
                        <button class="btn btn-theme-two px-5 py-4 fw-medium" type="button">Penilaian Mahasiswa Akhir
                            <i class="fas fa-book" style="font-size: 2em;"></i>
                        </button>
                    </div>
                </div>
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
