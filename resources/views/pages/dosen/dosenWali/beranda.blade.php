@extends('layouts.base-mitra')

@section('title')
    <title>Dashboard Mitra | MBKM Poliwangi</title>
@endsection

@section('content')
<section class="container-fluid section-bg-one py-3">
    <div class="container py-2">
        <div class="row py-2">

        </div>
    </div>
</section>

<section class="container-fluid py-5">
        <div class="row py-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-2 mb-3 p-3">
                <img src="{{ asset('images/mitra-main.png') }}" width="900" class="img-fluid p-6 mx-auto my-auto" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5 order-2 order-md-2 mb-3 p-3" data-aos="fade-up" data-aos-delay="300">
                <h1 class="fw-bold text-dark">MBKM POLIWANGI</h1>
                
                
                <div class="mt-5">
                    <a href="#" class="btn btn-theme-two px-5 py-3">
                        Cari Lowongan
                    </a>
                </div>
            </div>
        </div>
</section>
@endsection