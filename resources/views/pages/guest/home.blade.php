@extends('layouts.base-client')
@section('title')
    <title>Beranda MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid section-bg-two py-5">
        <div class="container py-2">
            <div class="row py-2">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-1 mb-3 p-3" data-aos="fade-up"
                    data-aos-delay="300">
                    <h1 class="fw-bold text-white">MBKM POLIWANGI</h1>
                    <p class="fw-medium text-justify mt-4 text-white">
                        Selamat Datang di Website MBKM Politeknik Negeri Banyuwangi

                        Kampus Merdeka adalah cara terbaik berkuliah.
                        Dapatkan kemerdekaan untuk membentuk masa depan yang sesuai dengan aspirasi kariermu.
                        Pilihlah tempat magang yang sesuai dengan matakuliah yang kamu ambil dan dapatkan pengalaman yang
                        lebih disini.
                    </p>

                    <div class="mt-5">
                        <a href="#" class="btn btn-theme-three px-5 py-3">
                            Cari Lowongan
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-2 d-flex" data-aos="zoom-in"
                    data-aos-delay="600">
                    <img src="{{ asset('images/homepage.png') }}" width="500" class="img-fluid p-5 mx-auto my-auto"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid section-bg-one py-5">
        <div class="container py-5">
            <div class="row d-flex pt-5">
                <div class="dropdown">
                    <h3 class="fw-bold mt-3 text-white">MBKM POLITEKNIK NEGERI BANYUWANGI</h3>
                    <button class="btn btn-theme-two dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Teknologi</a></li>
                        <li><a class="dropdown-item" href="#">Pertanian</a></li>
                        <li><a class="dropdown-item" href="#">Perhotelan</a></li>
                    </ul>
                </div>
            </div>

            <div class="row py-5 d-flex justify-content-around">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" alt="">
                            </div>
                            <h5 class="card-title"><strong>PT. KAI</strong></h5>
                            <p class="card-text">Riset kolaboratif bersama perusahaan ternama melalui magang disini.</p>
                            <p class="card-text">Pendaftaran: Telah dibuka pada 11 September - selesai.</p>
                            <a href="#" class="btn btn-theme-two">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" alt="">
                            </div>
                            <h5 class="card-title"><strong>PT. KAI</strong></h5>
                            <p class="card-text">Riset kolaboratif bersama perusahaan ternama melalui magang disini.</p>
                            <p class="card-text">Pendaftaran: Telah dibuka pada 11 September - selesai.</p>
                            <a href="#" class="btn btn-theme-two">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" alt="">
                            </div>
                            <h5 class="card-title"><strong>PT. KAI</strong></h5>
                            <p class="card-text">Riset kolaboratif bersama perusahaan ternama melalui magang disini.</p>
                            <p class="card-text">Pendaftaran: Telah dibuka pada 11 September - selesai.</p>
                            <a href="#" class="btn btn-theme-two">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/PT.KAI.jpg') }}" class="image-fluid" alt="">
                            </div>
                            <h5 class="card-title"><strong>PT. KAI</strong></h5>
                            <p class="card-text">Riset kolaboratif bersama perusahaan ternama melalui magang disini.</p>
                            <p class="card-text">Pendaftaran: Telah dibuka pada 11 September - selesai.</p>
                            <a href="#" class="btn btn-theme-two">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-5">
                <div class="col">
                    <center>
                        <a href="#" class="btn btn-theme-two"> Lihat Selengkapnya</a>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid section-bg-one py-3">
        <div class="container py-2">
            <div class="row py-2">


            </div>
        </div>
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
