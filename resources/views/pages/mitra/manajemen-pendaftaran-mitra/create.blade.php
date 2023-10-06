@extends('layouts.base-admin')
@section('Form Mitra')
    <title>Form Mitra MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card card-rounded">
                        <div class="card-header">
                            <h4>Form Mitra</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('formulir.mitra.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="nama">Nama Perusahaan</label>
                                    <input id="nama" type="text" name="nama"
                                        class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                        name="nama" placeholder="Nama Perusahaan">
                                    @error('nama')
                                        <div id="nama" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="id_sektor_industri">Sektor Industri</label>
                                    <select class="form-control @error('id_sektor_industri') is-invalid @enderror"
                                        id="id_sektor_industri" name="id_sektor_industri">
                                        <option value="">Pilih Sektor Industri</option>
                                        @foreach ($sektor_industri as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_sektor_industri')
                                        <div id="id_sektor_industri" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="id_kategori">Kategori</label>
                                    <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori"
                                        name="id_kategori">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <div id="id_kategori" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="alamat">Alamat</label>
                                    <input id="alamat" type="text" name="alamat"
                                        class="form-control @error('alamat')
                                        is-invalid
                                    @enderror"
                                        name="alamat" placeholder="Alamat">
                                    @error('alamat')
                                        <div id="alamat" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    @php
                                        $provinces = new App\Http\Controllers\DependantDropdownController();
                                        $provinces = $provinces->provinces();
                                    @endphp
                                    <label>Provinsi</label>
                                    <select
                                        class="form-control select2 @error('provinces')
                                    is-invalid
                                @enderror"
                                        name="provinces" id="provinces" required>
                                        <option>Pilih Provinsi</option>
                                        @foreach ($provinces as $item)
                                            <option value="{{ $item->name ?? '' }}">{{ $item->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinces')
                                        <div id="provinces" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    @php
                                        $cities = new App\Http\Controllers\DependantDropdownController();
                                        $cities = $cities->cities();
                                    @endphp
                                    <label>Kota</label>
                                    <select
                                        class="form-control select2 @error('cities')
                                    is-invalid
                                @enderror"
                                        name="cities" id="cities" required>
                                        <option>Pilih Kota</option>
                                        @foreach ($cities as $item)
                                            <option value="{{ $item->name ?? '' }}">{{ $item->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('cities')
                                        <div id="cities" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website" class="website">Link Website</label>
                                    <input id="website" type="text" name="website"
                                        class="form-control @error('website')
                                        is-invalid
                                    @enderror"
                                        name="website" placeholder="Link Website">
                                    @error('website')
                                        <div id="website" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="narahubung">No Telephone</label>
                                    <input id="narahubung" type="text" name="narahubung"
                                        class="form-control @error('narahubung')
                                        is-invalid
                                    @enderror"
                                        name="narahubung" placeholder="No Telephone">
                                    @error('narahubung')
                                        <div id="narahubung" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email"
                                        class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                        name="email" placeholder="Email">
                                    @error('email')
                                        <div id="email" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="text" name="password"
                                            class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                            name="password" placeholder="password">
                                    </div>
                                    @error('password')
                                        <div id="password" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Konfirmasi</label>
                                    <div class="input-group">
                                        <input id="password_confirmation" type="text" name="password_confirmation"
                                            class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror"
                                            name="password_confirmation" placeholder="Password Konfirmasi">
                                    </div>
                                    @error('password_confirmation')
                                        <div id="password_confirmation" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="foto">Foto Perusahaan
                                        <span class="text-primary">
                                            *(wajib, png,jpeg,jpg, max: 1Mb)
                                        </span>
                                    </label>
                                    <input id="foto" type="file" name="foto"
                                        class="form-control @error('foto')
                                    is-invalid
                                @enderror"
                                        name="foto">
                                    @error('foto')
                                        <div id="foto" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select
                                        class="form-control select2 @error('status')
                                    is-invalid
                                @enderror"
                                        name="status" id="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif" selected> Aktif </option>
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
