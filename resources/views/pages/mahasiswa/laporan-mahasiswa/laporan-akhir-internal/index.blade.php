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

                </div>
            </div>
        </div>
    </section>
@endsection
