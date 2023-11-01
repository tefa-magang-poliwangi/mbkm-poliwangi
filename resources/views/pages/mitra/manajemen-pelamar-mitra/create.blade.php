@extends('layouts.base-admin')

@section('title')
    <title>Form Tambah Mitra Magang Internal | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row d-flex justify-content-center pt-5">
            <div class="col-12">
                <div class="card card-rounded-sm">
                    <div class="card-header">
                        <h4>Tambah Mitra - Magang Internal</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('manajemen.mitra.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama" class="nama">Nama Perusahaan</label>
                                <input id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    placeholder="Nama Perusahaan">
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
                                <input id="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    placeholder="Alamat">
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
                                <label for="provinces">Provinsi</label>
                                <select class="form-control select2 @error('provinces') is-invalid @enderror"
                                    name="provinces" id="provinces" required>
                                    <option value="">Pilih Provinsi</option>
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
                                <label for="cities">Kota</label>
                                <select class="form-control select2 @error('cities') is-invalid @enderror" name="cities"
                                    id="cities" required>
                                    <option value="">Pilih Kota</option>
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
                                <input id="website" type="text"
                                    class="form-control @error('website') is-invalid @enderror" name="website"
                                    placeholder="Link Website">
                                @error('website')
                                    <div id="website" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="narahubung">No Telephone</label>
                                <input id="narahubung" type="text"
                                    class="form-control @error('narahubung') is-invalid @enderror" name="narahubung"
                                    placeholder="No Telephone">
                                @error('narahubung')
                                    <div id="narahubung" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email">
                                @error('email')
                                    <div id="email" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i id="togglePassword" class="fa-solid fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <div id="password" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="password_confirmation">Konfirmasi
                                    Password</label>
                                <div class="input-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Konfirmasi password baru">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i id="togglePasswordConfirmation" class="fa-solid fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <div id="password_confirmation" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif" selected>Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div id="status" class="form-text pb-1 text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" rows="4"
                                    class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                    placeholder="Deskripsi"></textarea>
                                @error('deskripsi')
                                    <div id="deskripsi" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
                        </form>
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
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            togglePasswordVisibility("password", "togglePassword");
        });

        document.getElementById("togglePasswordConfirmation").addEventListener("click", function() {
            togglePasswordVisibility("password_confirmation", "togglePasswordConfirmation");
        });

        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (passwordInput && icon) {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        }
    </script>
@endsection
