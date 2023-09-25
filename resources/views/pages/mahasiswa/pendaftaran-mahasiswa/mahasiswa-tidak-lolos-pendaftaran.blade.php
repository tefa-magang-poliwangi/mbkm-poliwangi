@extends('layouts.base-user')
@section('Kegiatan')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-1">
        <div class="container py-1">
            <div class="row py-1">

                    <div class="col-12 pt-5 d-flex" data-aos="zoom-in" data-aos-delay="600">
                        <img src="{{ asset('images/kegiatan_tidak_lolos.png') }}" width="500"
                            class="img-fluid p-5 mx-auto my-auto" alt="">
                    </div>


                    <center>
                        <div class="col-6 card-footer text-center grey-color p-3 card-content card-rounded ">
                        <h2 class="text-color-black">Maaf Anda Belum Lolos</h2>
                        <p class="text-color-black">Progres Pendaftaran Program Kampus Merdeka Akan Dapat Dilihat Disini</p>
                        <button class="btn btn-theme-two">Daftar Kegiatan</button>
                    </div>
                    </center>
            </div>

        </div>

    </section>
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
