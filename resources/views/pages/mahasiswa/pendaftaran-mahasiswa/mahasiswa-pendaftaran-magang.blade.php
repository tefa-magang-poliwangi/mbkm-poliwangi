@extends('layouts.base-guest')

@section('title')
    <title>Daftar Magang Internal | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="container pt-5">
            <div class="row d-flex justify-content-center pt-3">
                <div class="col-10 pt-5">
                    <h2 class="fw-x-bold text-theme">Daftar Magang Internal - {{ $lowongan->nama }}</h2>
                    <h5 class="fw-bold text-theme">{{ $lowongan->mitra->nama }}</h5>

                    @if ($berkas_lowongan->isEmpty())
                        <div class="d-flex">
                            <img src="{{ asset('assets/images/empty-berkas.svg') }}" width="500"
                                class="img-fluid p-5 mx-auto my-auto" alt="">
                        </div>
                        <h4 class="fw-x-bold text-theme text-center pb-5 py-3">Syarat Berkas Pendaftaran Belum Ditambahkan.
                        </h4>
                    @else
                        <div class="mt-4">
                            <small class="text-danger">*wajib pdf, max 5Mb</small>
                        </div>

                        <form action="{{ route('daftar.magang.internal.store', $lowongan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Loop Berkas Lowongan --}}
                            <div class="pt-4">
                                @foreach ($berkas_lowongan as $itemForm)
                                    <div class="custom-file form-group container-file input-file">
                                        <label for="{{ $itemForm->berkas->id }}"
                                            class="form-label">{{ $itemForm->berkas->nama }}</label>
                                        <input type="file" id="{{ $itemForm->berkas->id }}"
                                            name="files[{{ $itemForm->berkas->nama }}]"
                                            berkas-id="{{ $itemForm->berkas->nama }}"
                                            class="form-control @error("files.{$itemForm->berkas->nama}") is-invalid @enderror"
                                            accept=".pdf" required>
                                        {{-- Tambahkan pesan error untuk validasi --}}
                                        @error("files.{$itemForm->berkas->nama}")
                                            <div id="name" class="form-text text-danger pb-1 pt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="pt-3">
                                    <center>
                                        <button class="btn btn-theme" type="submit">Unggah &ensp;
                                            <i class="fa-solid fa-floppy-disk"></i>
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    @endif
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

    {{-- Script untuk Mengambil ID Berkas pada Input File --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ratingInputs = document.querySelectorAll(".rating-input");

            ratingInputs.forEach(input => {
                input.addEventListener("change", function() {
                    const currentRating = this.value;
                    const surveiId = this.getAttribute("berkas-id");
                });
            });
        });
    </script>
@endsection
