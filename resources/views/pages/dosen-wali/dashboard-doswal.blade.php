@extends('layouts.base-user')
@section('title')
    <title>Dashboard Dosen Wali | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')

<section class="container-fluid py-5">
        <div class="row py-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-2 mb-3 p-3">
                <img src="{{ asset('images/KM5') }}" alt="Nama Gambar">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-2 mb-3 p-5" data-aos="fade-up" data-aos-delay="300"> 
                <div class="p-3">
                   <a href="#" class="btn btn-theme-two p-4">
                        <i class="fa-solid fa-file-pen px-2 fa-2x"></i>
                        Kelayanakan Pendaftaran MBKM
                    </a>    
                </div>               
                <div class="p-3">
                    <a href="#" class="btn btn-theme-two p-4 ">
                        <i class="fa-solid fa-file-invoice px-2 fa-2x"></i>
                        Konversi Nilai Mata Kuliah
                    </a>    
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
