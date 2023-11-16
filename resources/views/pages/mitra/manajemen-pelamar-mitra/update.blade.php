@extends('layouts.base-admin')

@section('title')
    <title>Form Ubah Mitra Magang Internal | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Mitra - Magang Internal</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manajemen.mitra.update', $mitra->id) }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="update_nama" class="form-label">Nama Perusahaan</label>
                                <input id="update_nama" type="text"
                                    class="form-control @error('update_nama') is-invalid @enderror" name="update_nama"
                                    value="{{ $mitra->nama }}">
                                @error('update_nama')
                                    <div id="update_nama" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_sektor_industri" class="form-label">Sektor Industri</label>
                                <select class="form-control @error('update_sektor_industri') is-invalid @enderror"
                                    id="update_sektor_industri" name="update_sektor_industri">
                                    <option value="">Pilih Sektor Industri</option>
                                    @foreach ($sektor_industri as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $mitra->id_sektor_industri == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('update_sektor_industri')
                                    <div id="update_sektor_industri" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_kategori" class="form-label">Kategori</label>
                                <select class="form-control @error('update_kategori') is-invalid @enderror"
                                    id="update_kategori" name="update_kategori">
                                    <option value="">Pilih Sektor Industri</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $mitra->id_kategori == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('update_kategori')
                                    <div id="update_kategori" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_alamat" class="form-label">Alamat</label>
                                <input id="update_alamat" type="text"
                                    class="form-control @error('update_alamat') is-invalid @enderror" name="update_alamat"
                                    value="{{ $mitra->alamat }}">
                                @error('update_alamat')
                                    <div id="update_alamat" class="form-text text-danger">
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
                                        <option value="{{ $item->name }}"
                                            {{ $mitra->provinsi == $item->name ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
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
                                        <option value="{{ $item->name }}"
                                            {{ $mitra->kota == $item->name ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cities')
                                    <div id="cities" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_link_website" class="form-label">Link Website</label>
                                <input id="update_link_website" type="text"
                                    class="form-control @error('update_link_website') is-invalid @enderror"
                                    name="update_link_website" value="{{ $mitra->website }}">
                                @error('update_link_website')
                                    <div id="update_link_website" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_no_telephone" class="form-label">No Telephone</label>
                                <input id="update_no_telephone" type="text"
                                    class="form-control @error('update_no_telephone') is-invalid @enderror"
                                    name="update_no_telephone" value="{{ $mitra->narahubung }}">
                                @error('update_no_telephone')
                                    <div id="update_no_telephone" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_email" class="form-label">Email</label>
                                <input id="update_email" type="text"
                                    class="form-control @error('update_email') is-invalid @enderror" name="update_email"
                                    value="{{ $mitra->email }}">
                                @error('update_email')
                                    <div id="update_email" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" {{ $mitra->password }}>
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
                                        placeholder="Konfirmasi password baru" {{ $mitra->password_confirmation }}>
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
                                <label for="update_status" class="form-label">Status</label>
                                <select class="form-control @error('update_status') is-invalid @enderror"
                                    id="update_status" name="update_status">
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif" {{ $mitra->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Tidak Aktif" {{ $mitra->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                                @error('update_status')
                                    <div id="update_status" class="form-text pb-1 text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi">{{ $mitra->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div id="deskripsi" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
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
