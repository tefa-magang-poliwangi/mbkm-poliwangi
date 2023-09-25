@extends('layouts.base-auth')

@section('title')
    <title>Sign In Mitra | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="section">
        <div class="container mt-5 py-4">
            <div class="row d-flex justify-content-center margin-buttom">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 d-flex">
                    <img src="{{ asset('assets/images/logo-support.png') }}" alt="logo"
                        class="img-fluid mx-auto my-auto px-3" width="300">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary card-hover rounded">
                        <div class="card-body">
                            <div class="pb-3 pt-1">
                                <h6 class=" text-theme">Hai, Selamat Datang</h6>
                                <small class="text-muted">Login sebagai mitra</small>
                            </div>

                            <form action="{{ route('do.login.mitra') }}" method="POST" class="needs-validation">
                                @csrf

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        tabindex="1" placeholder="Username akun">
                                    @error('username')
                                        <div id="username" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            tabindex="2" placeholder="Password akun">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"
                                                onclick="togglePasswordVisibility()">
                                                <i id="togglePassword" class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div id="password" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-login-page btn-lg btn-block" tabindex="4">
                                        Sign in
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <small class="mx-auto">
                                            <a href="{{ route('landing.page') }}">Kembali ke Landing Page</a>
                                        </small>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-3 d-flex">
                            <a href="{{ route('login.mahasiswa.page') }}" class="menu-none-decoration">
                                <div class="card card-hover text-center p-3 mx-auto card-login-option">
                                    <i class="fa-solid fa-chalkboard-user fa-lg text-theme" title="Mahasiswa"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex">
                            <a href="{{ route('login.dosen.page') }}" class="menu-none-decoration">
                                <div class="card card-hover text-center p-3 mx-auto card-login-option">
                                    <i class="fas fa-graduation-cap fa-lg text-theme" title="Dosen"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex">
                            <a href="{{ route('login.mitra.page') }}" class="menu-none-decoration">
                                <div class="card card-hover text-center p-3 mx-auto card-login-option bg-theme">
                                    <i class="fa-regular fa-handshake fa-lg text-white  " title="Mitra"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row py-1">
                        <div class="col text-center d-flex">
                            <span class="mx-auto my-auto">
                                Copyright &copy; MBKM Poliwangi {{ now()->year }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Tampilkan password
                toggleButton.classList.remove('fa-eye-slash');
                toggleButton.classList.add('fa-eye');
            } else {
                passwordField.type = "password"; // Sembunyikan password
                toggleButton.classList.remove('fa-eye');
                toggleButton.classList.add('fa-eye-slash');
            }
        }
    </script>
@endsection
