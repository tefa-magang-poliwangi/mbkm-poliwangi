@extends('layouts.base-auth')

@section('title')
    <title>Sign Up Akun Dosen | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ asset('assets/images/logo-support.png') }}" alt="logo"
                            class="img-fluid mx-auto my-auto px-3" width="300">
                    </div>

                    <div class="card card-primary card-hover">
                        <div class="card-body">
                            <div class="pb-3 pt-1">
                                <h6 class=" text-theme">Hai, Selamat Datang</h6>
                                <small class="text-muted">Daftarkan akun <span class="text-primary fw-bold">Dosen</span>
                                    kamu</small>
                            </div>

                            <form method="POST" action="{{ route('do.register.dosen') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama lengkap">
                                    @error('nama')
                                        <div id="nama" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Alamat email">
                                    @error('email')
                                        <div id="email" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="id_prodi">Prodi</label>
                                    <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi"
                                        name="id_prodi">
                                        <option value="">Pilih Prodi</option>
                                        @foreach ($prodis as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_prodi')
                                        <div id="id_prodi" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">No. HP</label>
                                    <input id="no_telp" type="text"
                                        class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                        pattern="[0-9]*" placeholder="Nomor telepon / nomor whatsapp">
                                    @error('no_telp')
                                        <div id="no_telp" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <div id="password" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="control-label">Password
                                        Confirmation</label>
                                    <div class="input-group">
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" placeholder="Konfirmasi password">
                                    </div>
                                    @error('password_confirmation')
                                        <div id="password_confirmation" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex mb-4">
                                    <small class="ml-auto">
                                        <span>Sudah punya akun?</span>
                                        <a href="{{ route('login.page') }}">Sign in</a>
                                    </small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Sign up
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
                    <div class="simple-footer">
                        Copyright &copy; MBKM Poliwangi {{ now()->year }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
