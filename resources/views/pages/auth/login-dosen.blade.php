@extends('layouts.base-auth')

@section('title')
    <title>Login Dosen | MBKM Poliwangi</title>
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
                        <div class="card-header d-flex">
                            <h4 class="mx-auto text-theme">Login</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('do.login.mahasiswa') }}" method="POST" class="needs-validation">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        tabindex="1" placeholder="Alamat email">
                                    @error('email')
                                        <div id="email" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            tabindex="2" placeholder="Password akun">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i id="togglePassword" class="fa-solid fa-eye-slash"
                                                    onclick="togglePasswordVisibility()"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div id="password" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-login-page btn-lg btn-block" tabindex="4">
                                        Login
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
                            <div class="card card-hover text-center p-3 mx-auto card-login-option bg-theme">
                                <i class="fa-solid fa-chalkboard-user fa-lg text-white" title="Mahasiswa"></i>
                            </div>
                        </div>
                        <div class="col-3 d-flex">
                            <div class="card card-hover text-center text-center p-3 mx-auto card-login-option">
                                <i class="fas fa-graduation-cap fa-lg text-theme" title="Dosen"></i>
                            </div>
                        </div>
                        <div class="col-3 d-flex">
                            <div class="card card-hover text-center p-3 mx-auto card-login-option">
                                <i class="fa-regular fa-handshake fa-lg text-theme" title="Mitra"></i>
                            </div>
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
