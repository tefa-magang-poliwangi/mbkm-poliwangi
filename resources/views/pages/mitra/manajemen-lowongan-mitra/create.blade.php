@extends('layouts.base-admin')
@section('title')
    <title>Tambah Lowongan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section class="container-fluid pt-4">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card card-rounded">
                        <div class="card-header">
                            <h4>Form Manajemen Lowongan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manajemen.lowongan.mitra.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="nama">Nama</label>
                                    <input id="nama" type="text" name="nama"
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
                                    <label for="jumlah_lowongan" class="jumlah_lowongan">Jumlah Lowongan</label>
                                    <input id="jumlah_lowongan" type="text" pattern="[0-9]*" name="jumlah_lowongan"
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
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="deskripsi" type="text" name="deskripsi"
                                        class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror"
                                        name="deskripsi" placeholder="deskripsi"></textarea>
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_dibuka">Tanggal Dibuka</label>
                                    <input id="tanggal_dibuka" type="date" name="tanggal_dibuka"
                                        class="form-control @error('tanggal_dibuka')
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
                                    <label for="tanggal_ditutup">Tanggal Ditutup</label>
                                    <input id="tanggal_ditutup" type="date" name="tanggal_ditutup"
                                        class="form-control @error('tanggal_ditutup')
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
                                    <label for="tanggal_magang_dimulai">Tanggal Magang Dimulai</label>
                                    <div class="input-group">
                                        <input id="tanggal_magang_dimulai" type="date" name="tanggal_magang_dimulai"
                                            class="form-control @error('tanggal_magang_dimulai')
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
                                    <label for="tanggal_magang_berakhir">Tanggal Magang Berakhir</label>
                                    <div class="input-group">
                                        <input id="tanggal_magang_berakhir" type="date" name="tanggal_magang_berakhir"
                                            class="form-control @error('tanggal_magang_berakhir')
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
                                    <label for="id_prodi" class="form-label">Prodi</label>
                                    <select
                                        class="form-control @error('id_prodi')
                                                is-invalid
                                            @enderror"
                                        id="id_prodi" name="id_prodi">
                                        <option value="">Prodi</option>
                                        @foreach ($prodi as $dataprodi)
                                            <option value="{{ $dataprodi->id }}">{{ $dataprodi->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_prodi')
                                        <div id="id_prodi" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select
                                        class="form-control @error('status')
                                    is-invalid
                                @enderror"
                                        name="status" id="status">
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif"> Aktif </option>
                                        <option value="Tidak Aktif"> Tidak Aktif </option>
                                    </select>
                                    @error('status')
                                        <div id="status" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        {{-- </form> --}}
                        <div class="card-footer text-center">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
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

    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');
                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('cities') }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function() {
                onChangeSelect('{{ route('districts') }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })
        });
    </script>
@endsection
