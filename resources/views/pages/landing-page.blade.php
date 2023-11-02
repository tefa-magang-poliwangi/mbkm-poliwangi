@extends('layouts.base-guest')

@section('title')
    <title>Selamat Datang | MBKM Poliwangi</title>
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
                        <a href="#searchPerusahaan" class="btn btn-theme-warning px-3 py-3 fw-medium">
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
        {{-- Filter Perusahaan --}}
        <div class="container py-5">
            <div class="row d-flex justify-content-start pt-5">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-3">
                    <h4 class="fw-bold text-white mb-3">Cari Perusahaan</h4>
                    <div class="form-group">
                        <select class="form-control select2" id="selectMitra" onchange="goToMitra()">
                            <option value="">Pilih Nama Perusahaan</option>
                            @foreach ($mitras_all as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row pt-5 d-flex justify-content-around" id="container">
                @foreach ($mitras as $item)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item">
                        <div class="card card-height p-3 card-hover shadow card-rounded" title="{{ $item->nama }}">
                            <div class="card-body text-center">
                                <div class="mx-auto pb-3">
                                    <img src="{{ $item->foto ? Storage::url($item->foto) : asset('assets/images/Kampus-Merdeka-01-768x403.png') }}"
                                        class="image-fluid" width="100" alt="">
                                </div>
                                <h4 class="fw-bold limit-text-title" title="{{ $item->nama }}">{{ $item->nama }}</h4>
                                <p class="text-justify fw-regular pt-2 limit-description" title="{{ $item->deskripsi }}">
                                    {{ $item->deskripsi }}
                                </p>
                                <a href="{{ route('daftar.lowongan.program', ['id_mitra' => $item->id]) }}"
                                    class="btn btn-detail shadow px-4 py-2">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- showmore item --}}
                @foreach ($show_more_mitras as $item)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-5 item hidden">
                        <div class="card card-height p-3 card-hover shadow card-rounded" title="{{ $item->nama }}">
                            <div class="card-body text-center">
                                <div class="mx-auto pb-3">
                                    <img src="{{ $item->foto ? Storage::url($item->foto) : asset('assets/images/Kampus-Merdeka-01-768x403.png') }}"
                                        class="image-fluid" width="100" alt="">
                                </div>
                                <h4 class="fw-bold limit-text-title" title="{{ $item->nama }}">{{ $item->nama }}</h4>
                                <p class="text-justify fw-regular pt-2 limit-description" title="{{ $item->deskripsi }}">
                                    {{ $item->deskripsi }}
                                </p>
                                <a href="#" class="btn btn-detail shadow px-4 py-2">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (!$show_more_mitras->isEmpty())
                    <div class="row py-5">
                        <div class="col">
                            <center>
                                <button type="button" id="showMore" class="btn btn-theme-two px-3 py-3">
                                    Lihat Perusahaan Lainnya &ensp;
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                            </center>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="persyaratan" class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row pt-4">
                <div class="col-12 mb-3 p-3" data-aos="fade-up"data-aos-delay="300">
                    <h2 class="fw-x-bold text-theme">Apa saja syarat yang diperlukan untuk Magang Internal?</h2>

                    <div class="card mt-5">
                        <div class="card-header p-3 header-theme">
                            <h6 class="card-title">
                                <i class="fa-solid fa-list-ul"></i> &ensp; Tabel Daftar Persyaratan Mengikuti Kegiatan
                                Magang Internal
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap p-2">
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
                                            <td>Semester 3, 5, atau 7</td>
                                            <td>3.00 dari skala 4.00</td>
                                        </tr>
                                        <tr>
                                            <td><i class="text-info"></i>Bisnis dan Pariwisata</td>
                                            <td>Semester 3 atau 5</td>
                                            <td>3.00 dari skala 4.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 d-flex  order-2 order-md-1 mb-3">
                            <div class="card card-hover mx-auto my-auto">
                                <div class="card-body p-5">
                                    <p class="fw-medium text-justify text-theme">
                                        <strong>Catatan lain:</strong>
                                    </p>
                                    <ol>
                                        <li>
                                            Mahasiswa hanya dapat mengikuti 1 kegiatan magang per
                                            periode.
                                        </li>
                                        <li>
                                            Harus berstatus Mahasiswa Aktif. Jika mahasiswa lulus
                                            sebelum
                                            kegiatan
                                            berakhir maka dianggap mengundurkan diri.
                                        </li>
                                        <li>
                                            Harus sesuai dengan jurusan yang sedang diambil untuk
                                            memudahkan
                                            proses
                                            konversi.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end order-1 order-md-2 mb-3">
                            <img src="{{ asset('images/note-ilustration.png') }}" class="mx-auto img-fluid p-5"
                                alt="">
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

    {{-- Script Submit Mitra Search by Dropdown --}}
    <script>
        function goToMitra() {
            var selectedMitra = document.getElementById('selectMitra').value;
            if (selectedMitra) {
                window.location.href = "{{ route('daftar.lowongan.program') }}/" + selectedMitra;
            }
        }
    </script>

    {{-- Script Show More --}}
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
