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
                                <label for="nama_perusahaan" class="nama_perusahaan">Nama Perusahaan</label>
                                <input id="nama_perusahaan" type="text" name="nama_perusahaan"
                                    class="form-control @error('nama_perusahaan')
                                        is-invalid
                                    @enderror"
                                    name="nama_perusahaan">
                                @error('nama_perusahaan')
                                    <div id="nama_perusahaan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat_perusahaan" class="alamat_perusahaan">Alamat</label>
                                <input id="alamat_perusahaan" type="text" name="alamat_perusahaan"
                                    class="form-control @error('alamat_perusahaan')
                                        is-invalid
                                    @enderror"
                                    name="alamat_perusahaan">
                                @error('alamat_perusahaan')
                                    <div id="alamat_perusahaan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @php
                                    $provinces = new App\Http\Controllers\DependantDropdownController();
                                    $provinces = $provinces->provinces();
                                @endphp
                                <label>Provinsi</label>
                                <select class="form-control select2" name="provinces" id="provinces" required>
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->name ?? '' }}">{{ $item->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @php
                                    $cities = new App\Http\Controllers\DependantDropdownController();
                                    $cities = $cities->cities();
                                @endphp
                                <label>Kota</label>
                                <select class="form-control select2" name="cities" id="cities" required>
                                    <option>Pilih Kota</option>
                                    @foreach ($cities as $item)
                                        <option value="{{ $item->name ?? '' }}">{{ $item->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="website" class="website">Link Website</label>
                                <input id="website" type="text" name="website"
                                    class="form-control @error('website')
                                        is-invalid
                                    @enderror"
                                    name="website">
                                @error('website')
                                    <div id="website" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telephone</label>
                                <input id="no_telp" type="text" name="no_telp"
                                    class="form-control @error('no_telp')
                                        is-invalid
                                    @enderror"
                                    name="no_telp">
                                @error('no_telp')
                                    <div id="no_telp" class="form-text text-danger">
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
                                    name="email">
                                @error('email')
                                    <div id="email" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input id="file" type="file" name="file"
                                    class="form-control @error('file')
                                    is-invalid
                                @enderror"
                                    name="file">
                                @error('file')
                                    <div id="file" class="form-text text-danger">
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
