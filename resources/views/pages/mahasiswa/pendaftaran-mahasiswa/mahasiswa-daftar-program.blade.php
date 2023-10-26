@extends('layouts.base-guest')
@section('title')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row py-5">
                <div class="col-md-12 my-4">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex mb-3 mt-5">
                            <h5 class="justify-start my-auto text-theme">Daftar Perusahaan Magang Internal</h5>
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <select class="form-control select2">
                                                <option value="">Pilihan Sektor Industri</option>
                                                <option value="">Makanan</option>
                                                <option>Teknologi</option>
                                                <option>pariwisata</option>
                                                <option>Ternak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <select class="form-control select2">
                                                <option value="">Pilihan Lokasi</option>
                                                <option value="">Banyuwangi</option>
                                                <option>Jember</option>
                                                <option>Ponorogo</option>
                                                <option>Bondowoso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <select class="form-control select2">
                                                <option value="">Pilihan Perusahaan</option>
                                                <option value="">Indomilk</option>
                                                <option>Biznet</option>
                                                <option>Pertamina</option>
                                                <option>Kampus Merdeka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <a href="#cari lowongan" class="btn btn-primary btn-block">
                                            <i class="fa-solid fa-search"></i> &ensp; Cari Lowongan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mx-auto d-flex align-items-center">
                                <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                    width="150" alt="">
                            </div>
                            <div class="text-justify py-3">
                                <h6>PT. Supra Primatama Nusantara</h6>
                                <p>Kota Surabaya</p>
                                <p>
                                    Biznet Home adalah layanan internet ultra cepat dan TV interaktif dengan
                                    kualitas resolusi 4K terbaik di Indonesia untuk perumahan dan apartemen
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="ruler-program ">
                            <div class="row mt-3">
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mx-3 my-3">
                                                <div class="card-body text-center">
                                                    <div class="mx-auto d-flex align-items-center">
                                                        <img src="{{ asset('images/logo-mitra/biznet.png') }}"
                                                            class="img-fluid" width="150" alt="">
                                                    </div>
                                                    <div class="text-justify py-1">
                                                        <h5>Frontend Developer</h5>
                                                        <h6>PT. Supra Primatama Nusantara</h6>
                                                        <p>Kota Surabaya</p>
                                                        <p class="text-danger mt-1">Pelamar</p>
                                                    </div>
                                                    <div class="text-justify mt-1">
                                                        <ul>
                                                            <li>Durasi magang <p>16 Sep - 29 Des 2023 (3 Bulan)</p>
                                                            </li>
                                                            <li>Penutupan <p class="text-danger">13 September 2023
                                                                </p>
                                                            </li>
                                                            <li>Pengumuman <p>15 September 2023</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <hr>
                                                    <div class="list-group px-1" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active"
                                                            id="list-home-list" data-toggle="list" href="#test1"
                                                            role="tab">Detail</a>
                                                        <a class="list-group-item list-group-item-action"
                                                            id="list-profile-list" data-toggle="list" href="#test2"
                                                            role="tab">Frontend</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mx-3 my-3">
                                                <div class="card-body text-center">
                                                    <div class="mx-auto d-flex align-items-center">
                                                        <img src="{{ asset('images/logo-mitra/biznet.png') }}"
                                                            class="img-fluid" width="150" alt="">
                                                    </div>
                                                    <div class="text-justify py-1">
                                                        <h5>Frontend Developer</h5>
                                                        <h6>PT. Supra Primatama Nusantara</h6>
                                                        <p>Kota Surabaya</p>
                                                        <p class="text-danger mt-1">Pelamar</p>
                                                    </div>
                                                    <div class="text-justify mt-1">
                                                        <ul>
                                                            <li>Durasi magang <p>16 Sep - 29 Des 2023 (3 Bulan)</p>
                                                            </li>
                                                            <li>Penutupan <p class="text-danger">13 September 2023
                                                                </p>
                                                            </li>
                                                            <li>Pengumuman <p>15 September 2023</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <hr>
                                                    <div class="list-group px-1" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active"
                                                            id="list-home-list" data-toggle="list" href="#test1"
                                                            role="tab">Detail</a>
                                                        <a class="list-group-item list-group-item-action"
                                                            id="list-profile-list" data-toggle="list"
                                                            href="#test2" role="tab">Frontend</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 ">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active card card-border card-rounded-sm card-hover"
                            id="test1" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="card-body my-2 mx-5">
                                <div class="mx-auto d-flex">
                                    <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                        width="150" alt="">
                                </div>
                                <div class="text-justify py-3">
                                    <h6>PT. Supra Primatama Nusantara</h6>
                                    <p>Kota Surabaya</p>
                                </div>
                                <div class="text-justify">
                                    <p class="mb-2">Kerja dari kantor</p>
                                    <small>Kegiatan ini akan dilaksanakan di kantor penugasan Anda melamar</small>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Jenjang Pendidikan</p>
                                    <small>Kamu akan mendapatkan sertifikat</small>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Tanggal Penting</p>
                                    <small>Kamu akan mendapatkan sertifikat</small>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Rincian Lowongan</p>
                                    <small>Melakukan kegiatan manajemen kearsipan meliputi pengklasifikasian,
                                        pencatatan,
                                        pengendalian dan pendistribusian, penyimpanan, pemeliharaan, pengawasan,
                                        pemindahan,
                                        dan pemusnahan arsip.Melakukan kegiatan manajemen kearsipan meliputi
                                        pengklasifikasian,
                                        pencatatan, pengendalian dan pendistribusian, penyimpanan, pemeliharaan,
                                        pengawasan,
                                        pemindahan,
                                        dan pemusnahan arsip.</small>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Tentang Perusahaan</p>
                                    <small>Ruko Pakis, Jl. Letjen S Parman No.1, Sumberrejo,
                                        Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68419</small>
                                </div>


                            </div>
                        </div>

                        <div class="tab-pane fade card card-border card-rounded-sm card-hover" id="test2"
                            role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="card-body my-2 mx-5">
                                <div class="mx-auto d-flex">
                                    <img src="{{ asset('images/logo-mitra/biznet.png') }}" class="image-fluid"
                                        width="150" alt="">
                                </div>
                                <div class="text-justify py-3">
                                    <h6>PT. Supra Primatama Nusantara</h6>
                                    <p>Kota Surabaya</p>
                                    <small class="text-danger">Pelamar</small>
                                </div>

                                <div class="text-justify">
                                    <p class="mb-2">Sertifikat</p>
                                    <p>kerja dari kantor</p>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Rincian Kegiatan</p>
                                    <p>Amoeba Management</p>
                                    <small>Proyek tersebut bertujuan untuk membangun sistem berupa platfrom
                                        yang dibangun secara modular (microservices) sehingga dapat memudahkan
                                        pengimplementasia platform kedepan sesuai dengan karakteriskik
                                        customer.</small>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Kriteria Peserta</p>
                                    <ol>
                                        <li>
                                            Min Sem 5 - Final Sem diutamakan dari jurusan yang relevan dengan roles
                                        </li>
                                        <li>
                                            Communicative & collaborative
                                        </li>
                                        <li>
                                            Berpengalaman dalam organisasi diutamakan
                                        </li>
                                        <li>
                                            Passionate, love to learn, & perseverance
                                        </li>
                                        <li>
                                            Jujur, teliti, responsible, transparan
                                        </li>
                                        <li>
                                            Dapat bekerja dibawah tekanan (fun yet productive & commit)
                                        </li>
                                    </ol>
                                </div>
                                <div class="py-2">
                                    <a href="#cari lowongan" class="btn btn-primary">
                                        Daftar Magang
                                    </a>
                                </div>
                                <hr>
                                <div class="text-justify">
                                    <p class="mb-2">Tentang Perusahaan</p>
                                    <small>Ruko Pakis, Jl. Letjen S Parman No.1, Sumberrejo,
                                        Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68419</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
