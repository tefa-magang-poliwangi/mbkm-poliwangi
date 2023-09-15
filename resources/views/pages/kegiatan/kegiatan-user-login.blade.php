@extends('layouts.base-user')
@section('Kegiatan')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
<section class="container-fluid py-5">
        <div class="container py-5">
            <div class="row py-5">

                <div class='col-6'>
                    <div class="card-body">
                    <div class="chocolat-parent">
                      <a href="assets/img/example-image.jpg" class="chocolat-image" title="Just an example">
                        <div data-crop-image="400" id="btn-floating">
                          <img alt="image" src="{{ asset('images/contoh.png') }}" class="img-fluid">
                          <button class="btn "><i class="fas fa-download"></i>&ensp;Rincian Kegiatan</button>
                        </div>
                      </a>
                    </div>
                </div>
                </div>

                <div class='col-6'>
                    <center>
                        <div class="card-footer text-center grey-color p-3 card-content card-rounded">
                        <h2>Belum Ada Lamaran</h2>
                        <p>Progres Pendaftaran Program Kampus Merdeka Akan Dapat Dilihat Disini</p>
                        <div class="card-header-action">
                      <a href="#" class="btn btn-theme-two">Lihat Nilai Akhir</a>
                      <a href="#" class="btn btn-theme-two">Download Sertifikat</a>
                    </div>
                    </div>
                    </center>
                </div>

                <div class='col-6'>
                    <center>
                        <div class="card-footer text-center grey-color p-3 card-content card-rounded">
                        <h2>Laporan Harian</h2>
                        <p>Lengkapi laporan harianmu disini, pastikan laporan selesai sesuai jadwal.</p>
                        <div class="card-header-action">
                      <a href="#" class="btn btn-theme-two">Masuk</a>
                    </div>
                    </div>
                    </center>
                </div>
                <div class='col-6'>
                    <center>
                        <div class="card-footer text-center grey-color p-3 card-content card-rounded">
                        <h2>Laporan Mingguan</h2>
                        <p>Lengkapi laporan akhir disini, pastikan laporan selesai sesuai jadwal.</p>
                        <div class="card-header-action">
                      <a href="#" class="btn btn-theme-two">Masuk</a>
                    </div>
                    </div>
                    </center>
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
