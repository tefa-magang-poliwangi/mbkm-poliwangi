@extends('layouts.base-admin')

@section('title')
    <title>Upload Laporan Akhir Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="">
        <div class="row pt-5">
            <h4 class="text-theme mb-4">Upload Laporan Akhir Mahasiswa</h4>

            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card card-border card-rounded-sm card-hover">
                    <div class="card-body pb-4  ">
                        <h5 class="mb-3">Menu Upload Laporan Akhir</h5>

                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#form-transkip" role="tab"> Formulir Upload Trankrip</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" href="#"
                                role="tab">Lihat Laporan Akhir</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active card card-border card-rounded-sm card-hover" id="form-transkip"
                        role="tabpanel" aria-labelledby="list-home-list">

                        {{-- Form Upload Transkip --}}
                        <form action="{{ route('upload.laporan.akhir.mahasiswa.int.update', Auth::user()->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Form Upload Laporan Akhir</h4>
                                <div class="flex-column">

                                    <label class="form-label" for="file_laporan_akhir">
                                        File Laporan Akhir
                                        <span class="text-primary">
                                            *(wajib, pdf, max:10Mb)
                                        </span>
                                    </label>

                                    <div id="drop-area">
                                        <a class="nav-link active">
                                            <div class="input-group mb-3">
                                                <input type="file"
                                                    class="form-control  @error('file_laporan_akhir') is-invalid @enderror"
                                                    aria-describedby="button-addon2" id="file_laporan_akhir"
                                                    name="file_laporan_akhir">
                                            </div>
                                            @error('file_laporan_akhir')
                                                <div id="file_laporan_akhir" class="form-text text-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </a>
                                    </div>

                                    {{-- @if ($transkrip_mahasiswa->isEmpty()) --}}
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary">Unggah</button>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Daftar Transkip Nilai --}}
                    <div class="tab-pane fade pt-0" id="daftar-transkip" role="tabpanel"
                        aria-labelledby="list-profile-list">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                @if ($transkrip_mahasiswa->isEmpty())
                                    <div class="card d-flex bg-primary">
                                        <h6 class="mx-auto my-auto py-4 text-white"><i
                                                class="fa-solid fa-circle-info"></i>
                                            &ensp; Silahkan tambahkan Transkrip
                                            terlebih
                                            dahulu
                                        </h6>
                                    </div>
                                @else
                                    @foreach ($transkrip_mahasiswa as $data)
                                        <div class="card card-border card-rounded-sm card-hover">
                                            <div class="card-header bg-primary text-white">
                                                <h4 class="fw-bold">{{ $data->magang_ext->name }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <span class="fw-medium my-auto">{{ $data->mahasiswa->nama }}
                                                            (Semester
                                                            {{ $data->periode->semester }} -
                                                            {{ $data->periode->tahun }})
                                                        </span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <a href="{{ Storage::url($data->file_transkrip) }}"
                                                                target="_blank"
                                                                class="btn btn-download d-md-inline">Transkrip</a>
                                                            <a href="{{ Storage::url($data->file_sertifikat) }}"
                                                                target="_blank"
                                                                class="btn btn-download d-md-inline">Serfifikat</a>
                                                            <a href="{{ Storage::url($data->file_laporan_akhir) }}"
                                                                target="_blank"
                                                                class="btn btn-download d-md-inline">Laporan
                                                                Akhir</a>
                                                            <a href="{{ route('upload.transkrip.mahasiswa.ext.destroy', $data->id) }}"
                                                                class="btn btn-delete">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-3 d-flex">
                                                        <a href="{{ route('nilai_kriteria.magang_ext.page', $data->magang_ext->id) }}"
                                                            class="btn btn-primary ml-auto my-auto">
                                                            Masukkan Nilai
                                                        </a>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
