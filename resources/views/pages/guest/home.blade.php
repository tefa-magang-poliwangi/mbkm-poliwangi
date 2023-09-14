@extends('layouts.base-client')

@section('title')
    <title>Selamat Datang di MBKM Poliwangi | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section class="container-fluid section-bg-primary py-5 mt-5">
        <div class="container py-4">
            <div class="row py-2">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-1 mb-3 p-3" data-aos="fade-up"
                    data-aos-delay="300">
                    <h1 class="fw-bold text-white">MBKM POLIWANGI</h1>
                    <p class="fw-medium text-justify mt-4 text-white">
                        Selamat Datang di Website MBKM Politeknik Negeri Banyuwangi.

                        Website ini dirancang untuk mendukung Program MBKM dengan
                        menyediakan lowongan magang di Perusahaan terbaik bagi Mahasiswa Poliwangi.
                        Pilihlah tempat magang yang sesuai dengan matakuliah yang kamu ambil
                        dan bentuk masa depan yang sesuai dengan aspirasi kariermu. VOKASI BISA!!!
                    </p>

                    <div class="mt-5">
                        <a href="#searchPerusahaan" class="btn btn-theme-warning px-5 py-3 fw-medium">
                            Cari Perusahaan &ensp; <i class="fa-solid fa-magnifying-glass"></i>
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

    <section id="searchPerusahaan" class="container-fluid section-bg-one py-5">
        <div class="container py-5">

            <div class="row d-flex justify-content-start pt-5">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <h4 class="fw-bold text-white mb-3">Kategori Perusahaan</h4>
                    <div class="form-group">
                        <select class="form-control select2">
                            <option value="">Pilih Kategori</option>
                            <option>Teknologi Informasi</option>
                            <option>Perkantoran</option>
                            <option>Pariwisata</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row pt-5 d-flex justify-content-around" id="container">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" width="150 " alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" width="150 " alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" width="150 " alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/KM2.png') }}" class="image-fluid" width="150 " alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                {{-- showmore item --}}
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item hidden">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/PT.KAI.jpg') }}" class="image-fluid" width="150 "
                                    alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item hidden">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/PT.KAI.jpg') }}" class="image-fluid" width="150 "
                                    alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item hidden">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/PT.KAI.jpg') }}" class="image-fluid" width="150 "
                                    alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item hidden">
                    <div class="card p-3 card-hover shadow card-rounded">
                        <div class="card-body text-center">
                            <div class="mx-auto">
                                <img src="{{ asset('images/PT.KAI.jpg') }}" class="image-fluid" width="150 "
                                    alt="">
                            </div>
                            <p class="text-justify fw-regular pt-3 pb-5">
                                Riset kolaboratif bersama perusahaan ternama melalui magang disini.
                            </p>
                            <a href="#" class="btn btn-detail shadow px-3 py-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="row py-5">
                    <div class="col">
                        <center>
                            <button type="button" id="showMore" class="btn btn-theme-two px-5 py-3">
                                Lihat Perusahaan Lainnya &ensp;
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                        </center>
                    </div>
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
                    <p class="text-white mb-1">2. Harus berstatus Mahasiswa Aktif. Jika mahasiswa lulus sebelum kegiatan
                        berakhir maka dianggap mengundurkan diri.</p>
                    <p class="text-white mb-1">3. Harus sesuai dengan jurusan yang sedang diambil untuk memudahkan proses
                        konversi.</p>


                    <div class="row py-3">
                        <div class="col">
                            <center>
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
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    <script>
        // Ambil elemen-elemen yang dibutuhkan
        const container = document.getElementById('container');
        const showMoreButton = document.getElementById('showMore');
        let clickCount = 0; // Untuk melacak berapa kali tombol diklik

        // Fungsi untuk menampilkan elemen-elemen tersembunyi
        function showHiddenItems() {
            const hiddenItems = container.querySelectorAll('.hidden');
            hiddenItems.forEach((item, index) => {
                if (index >= clickCount * 4 && index < (clickCount + 1) * 4) {
                    item.style.display = 'block';
                    item.classList.remove('hidden');
                }
            });

            clickCount++; // Tingkatkan hitungan setiap kali tombol diklik

            // Sembunyikan tombol "Lihat Selengkapnya" jika semua item sudah ditampilkan
            if (clickCount * 4 >= hiddenItems.length) {
                showMoreButton.style.display = 'none';
            }
        }

        // Tambahkan event listener pada tombol "Lihat Selengkapnya"
        showMoreButton.addEventListener('click', showHiddenItems);
    </script>
@endsection
