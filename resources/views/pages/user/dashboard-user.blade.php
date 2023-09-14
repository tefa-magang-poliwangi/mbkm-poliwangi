@extends('layouts.base-user')
@section('title')
    <title>Beranda MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')

<section class="container-fluid section-bg-one py-3">
    <div class="container py-3">
        <div class="row d-flex pt-5">
            <div class="dropdown">
                <h3 class="fw-bold mt-3 text-white">PERUSAHAAN UNGGULAN</h3>
                <button class="btn btn-theme-two dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="col"> <center>
                <a href="#" class="btn btn-theme-two"> Lihat Selengkapnya</a>
            </center>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid section-bg-two py-5">
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-12 mb-3 p-3" data-aos="fade-up"data-aos-delay="300">
                <h1 class="fw-bold text-white">APA SAJA SYARAT KEIKUTSERTAAN MAGANG INTERNAL DI POLIWANGI?</h1>
                <p class="fw-medium text-justify mt-4 text-white">
                    Berikut adalah persyaratan umum untuk mengikuti program diatas.
                </p>
                
                <div class="card">
                    <h5 class="card-header">Jenjang D3, S1 atau Vokasi</h5>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Minimal IPK</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td><i class="text-danger"></i>Bisnis dan Informatika</td>
                            <td>Semester 3, 5, dan 7</td>
                            <td>3.00 dari skala 4.00</td>
                        </tr>
                        <tr>
                            <td><i class="text-info"></i>Bisnis dan Pariwisata</td>
                            <td>Semester 3 dan 5</td>
                            <td>3.00 dari skala 4.00</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

                
                <p class="fw-medium text-justify mt-4 text-white">
                    <strong>Catatan lain:</strong>
                </p>
                <p class="text-white mb-1">1. Mahasiswa hanya dapat mengikuti 1 kegiatan magang per periode.</p>
                <p class="text-white mb-1">2. Harus berstatus Mahasiswa Aktif. Jika mahasiswa lulus sebelum kegiatan berakhir maka dianggap mengundurkan diri.</p>
                <p class="text-white mb-1">3. Harus sesuai dengan jurusan yang sedang diambil untuk memudahkan proses konversi.</p>


                <div class="row py-3">
                    <div class="col"> <center>
                        <a href="#" class="btn btn-theme-three"> Lihat Lowongan lainnya</a>
                    </center>
                    </div>
                </div>
            </div>
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
