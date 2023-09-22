@extends('layouts.base-auth')

@section('title')
    <title>Login Mahasisa | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center margin-buttom">
                <div class="col-lg-10 d-flex">
                    <img src="{{ asset('assets/images/logo-support.png') }}" alt="logo" class="mx-auto my-auto"
                        width="300">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary card-hover rounded">
                        <div class="card-header d-flex">
                            <h4 class="mx-auto">Login</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('do.login') }}" method="POST" class="needs-validation">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        tabindex="1">
                                    @error('email')
                                        <div id="email" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2">
                                    @error('password')
                                        <div id="password" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-theme btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <small class="mx-auto">
                                            <a href="{{ route('landing.page') }}">Kembali ke halaman Landing Page</a>
                                        </small>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-graduation-cap fa-lg"></i>
                                <p>Mahasiswa</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fa-solid fa-chalkboard-user fa-lg"></i>
                                <p>Dosen</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fa-regular fa-handshake fa-lg"></i>
                                <p>Mitra</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <div class="simple-footer">
                                Copyright &copy; MBKM Poliwangi {{ now()->year }}
                            </div>
                        </div>
                    </div>

                </div>
    </section>
@endsection
