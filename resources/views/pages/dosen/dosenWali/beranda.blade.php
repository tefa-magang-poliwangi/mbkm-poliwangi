@extends('layouts.base-client')

@section('title')
    <title>Dashboard Mitra | MBKM Poliwangi</title>
@endsection

@section('content')

<section class="container-fluid py-5">
        <div class="row py-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-2 mb-3 p-3">
                <img src="{{ asset('images/spinner.svg') }}" alt="Nama Gambar">
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