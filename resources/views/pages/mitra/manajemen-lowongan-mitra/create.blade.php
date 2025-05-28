@extends('layouts.base-admin')

@section('title')
    <title>Tambah Lowongan | MBKM Poliwangi </title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">

    {{-- Datedroppper JS --}}
    <script src="{{ asset('js-datedropper/datedropper-javascript.js') }}"></script>
@endsection

@section('content')
    <section class="container-fluid pt-4">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <a href="{{ route('manajemen.lowongan.mitra.index') }}" class="btn btn-primary ml-auto mb-3">
                                    <i class="fa-solid fa-backward"></i> &ensp;
                                    Kembali
                                </a>
                    <div class="card card-rounded-sm">
                        <div class="card-header">
                            <h4>Form Manajemen Lowongan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manajemen.lowongan.mitra.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="nama">Nama <span class="text-danger">*</span></label>
                                    <input id="nama" type="text" name="nama" value="{{ old('nama') }}"
                                        class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                        name="nama" placeholder="Nama">
                                    @error('nama')
                                        <div id="nama" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_lowongan" class="jumlah_lowongan">Jumlah Lowongan <span class="text-danger">*</span></label>
                                    <input id="jumlah_lowongan" type="text" pattern="[0-9]*" name="jumlah_lowongan" value="{{ old('jumlah_lowongan') }}"
                                        class="form-control @error('jumlah_lowongan')
                                        is-invalid
                                    @enderror"
                                        name="jumlah_lowongan" placeholder="Jumlah Lowongan">
                                    @error('jumlah_lowongan')
                                        <div id="jumlah_lowongan" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea id="deskripsi" type="text" name="deskripsi"
                                        class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror"
                                        name="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_dibuka">Tanggal Dibuka <span class="text-danger">*</span></label>
                                    <input id="tanggal_dibuka" type="text" data-dd-opt-custom-class="dd-theme-bootstrap" value="{{ old('tanggal_dibuka') }}"
                                        name="tanggal_dibuka"
                                        class="form-control date-input bg-white @error('tanggal_dibuka')
                                        is-invalid
                                    @enderror"
                                        name="tanggal_dibuka" placeholder="Tanggal Dibuka">
                                    @error('tanggal_dibuka')
                                        <div id="tanggal_dibuka" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_ditutup">Tanggal Ditutup <span class="text-danger">*</span></label>
                                    <input id="tanggal_ditutup" type="text" data-dd-opt-custom-class="dd-theme-bootstrap" value="{{ old('tanggal_ditutup') }}"
                                        name="tanggal_ditutup"
                                        class="form-control date-input bg-white @error('tanggal_ditutup')
                                    is-invalid
                                @enderror"
                                        name="tanggal_ditutup" placeholder="Tanggal Ditutup">
                                    @error('tanggal_ditutup')
                                        <div id="tanggal_ditutup" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_magang_dimulai">Tanggal Magang Dimulai <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="tanggal_magang_dimulai" type="text" value="{{ old('tanggal_magang_dimulai') }}"
                                            data-dd-opt-custom-class="dd-theme-bootstrap" name="tanggal_magang_dimulai"
                                            class="form-control date-input bg-white @error('tanggal_magang_dimulai')
                                    is-invalid
                                @enderror"
                                            name="tanggal_magang_dimulai" placeholder="Tanggal Magang Dimulai">
                                    </div>
                                    @error('tanggal_magang_dimulai')
                                        <div id="tanggal_magang_dimulai" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_magang_berakhir">Tanggal Magang Berakhir <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="tanggal_magang_berakhir" type="text" value="{{ old('tanggal_magang_berakhir') }}"
                                            data-dd-opt-custom-class="dd-theme-bootstrap" name="tanggal_magang_berakhir"
                                            class="form-control date-input bg-white @error('tanggal_magang_berakhir')
                                    is-invalid
                                @enderror"
                                            name="tanggal_magang_berakhir" placeholder="Tanggal Magang Berakhir">
                                    </div>
                                    @error('tanggal_magang_berakhir')
                                        <div id="tanggal_magang_berakhir" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
                                    <select
                                        class="form-control @error('id_prodi')
                                                is-invalid
                                            @enderror"
                                        id="id_prodi" name="id_prodi">
                                        <option value="">Pilih Prodi</option>
                                        @foreach ($prodi as $dataprodi)
                                            <option value="{{ $dataprodi->id }}" {{ old('id_prodi') == $dataprodi->id ? 'selected' : '' }}>{{ $dataprodi->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_prodi')
                                        <div id="id_prodi" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select
                                        class="form-control @error('status')
                                    is-invalid
                                @enderror"
                                        name="status" id="status">
                                        <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Pilih Status</option>
                                        <option value="Aktif"> Aktif </option>
                                        <option value="Tidak Aktif"> Tidak Aktif </option>
                                    </select>
                                    @error('status')
                                        <div id="status" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Tambah Lowongan
                                    </button>
                                </div>
                            </form>
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

    {{-- Inisiasi datedroppper --}}
    <script>
        dateDropper({
            selector: '.date-input',
            expandedDefault: true,
            expandable: true,
            overlay: true,
            showArrowsOnHover: true,
            autoFill: false
        });
    </script>
@endsection
