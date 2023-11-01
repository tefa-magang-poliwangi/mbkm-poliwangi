@extends('layouts.base-admin')

@section('title')
    <title>Profil PL Mitra | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card card-hover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 d-flex">
                                <div class="mx-auto my-auto text-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-1.png') }}" alt="Foto Profil"
                                        class="img-fluid rounded-circle">
                                </div>
                            </div>
                            <div class="col-8 d-flex">
                                <div class="my-auto mx-auto">
                                    <h5>{{ $plmitra->nama }}</h5>
                                    <span>{{ $plmitra->nama }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card card-hover">
                    <div class="card-body">

                        <div class="card-header bg-theme">
                            <span class="text-white fw-medium">Edit Profil</span>
                        </div>

                        <div class="px-3 pt-4">
                            <form action="{{ route('manajemen.profil.plmitra.update', $plmitra->id) }}" method="post">
                                @method('put')
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="nama" name="nama"
                                            class="form-control  @error('nama') is-invalid @enderror"
                                            placeholder="Nama lengkap" value="{{ $plmitra->nama }}">
                                        @error('nama')
                                            <div id="nama" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="no_telp">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="no_telp" name="no_telp"
                                            class="form-control  @error('no_telp') is-invalid @enderror"
                                            placeholder="No telepon" pattern="[0-9]*" value="{{ $plmitra->no_telp }}">
                                        @error('no_telp')
                                            <div id="no_telp" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="email" name="email"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="Alamat email" value="{{ $plmitra->email }}">
                                        @error('email')
                                            <div id="email" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="password">Password Baru</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password baru">
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="password_confirmation">Konfirmasi
                                        Password</label>
                                    <div class="col-sm-9">
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
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <button class="btn btn-primary ml-auto">Simpan</button>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
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
