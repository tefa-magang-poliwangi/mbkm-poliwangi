@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
<section class="container-fluid row pt-5">
    <div class="row">
        <div class="col-sm-4">
            <div class="card rounded">
                <div class="banner bg-primary text-white text-center rounded-top">
                    <h4></h4>
                </div>
                <div class="card-body">
                    <img class="mt-4" src="{{ asset('images/visa.png') }}" class="card-img-top" alt="...">
                    <h6 class="card-title">MBKM Internal Poliwangi</h6>
                    <small class="card-text">Digital Transformation in The Government and Public Sector</small>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card rounded mb-3"> 
                <div class="banner bg-primary text-white text-center rounded-top">
                    <h4></h4>
                </div>
                    <div class="card-body">
                        <img src="{{ asset('images/visa.png') }}" class="mt-4 card-img-top" alt="...">
                        <h6 class="card-title">Digital Transformation in The Government and Public Sector</h6>
                        <div class="card-text">
                            <small class="text-muted">ID Kegiatan : 29030210</small>
                            <br>
                            <small class="text-muted">18 Mar 2023 - 30 Jul 2023</small><br>
                            <a href="#" class="card-link mt-3" style="text-decoration: none;">Lihat Detail</a> 
                            <div class="mt-2">
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Semua laporan mingguan sudah diterima</span>
                                <br>
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Laporan akhir sudah diunggah</span>
                            </div>
                            <h6 class="mt-4">Periode Kegiatan</h6>
                            <p class="text-muted">Kamu akan mengikuti kegiatan mulai tanggal 18 Maret - 30 Juli 2023</p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3"> 
                    <div class="card-body">
                        <div class="card-text">
                            <div class="mt-2" style="color: orange;">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <a>Belum Dibuat</a>
                            </div>
                            <div>
                            <h6 class="mt-3">Buat Laporan Mingguan</h6>
                            <p> 11- 15 Jun 2023></p>
                                <select class="text-muted" style="border: 0px">
                                    <option>Minggu Ke-1</option>
                                    <option>Minggu Ke-2</option>
                                    <option>Minggu Ke-3</option>
                                    <option>Minggu Ke-4</option>
                                    <option>Minggu Ke-5</option>
                                    <option>Minggu Ke-6</option>
                                    <option>Minggu Ke-7</option>
                                    <option>Minggu Ke-8</option>
                                    <option>Minggu Ke-9</option>
                                    <option>Minggu Ke-10</option>
                                    <option>Minggu Ke-11</option>
                                    <option>Minggu Ke-12</option>
                                </select>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('mahasiswa.laporan.harian.show') }}">
                                    <button class="btn btn-primary mt-2 text">
                                        Buat Laporan Mingguan
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3"> 
                    <div class="card-body">
                        <div class="card-text">
                            <div class="mt-2" style="color: orange;">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <a>Belum Dibuat</a>
                            </div>
                            <h6 class="mt-4">Buat Laporan Akhir</h6>
                            <p class="text-muted">Laporan akhir baru dapat dibuat setelah semua laporan sudah kami terima dengan baik</p><hr>
                            <div class="text-center">
                                <a href="{{ route('mahasiswa.laporan.akhir.store') }}" class="btn btn-primary mt-2 text">
                                        Buat Laporan Akhir
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    >
</section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
