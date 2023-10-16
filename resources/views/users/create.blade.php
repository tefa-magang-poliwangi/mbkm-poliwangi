@extends('layouts.base-admin')

@section('title')
    <title>Tambah User | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h1>Add new user</h1>
                    <div class="lead">
                        Tambah User Baru.
                    </div>

                    <div class="container mt-4">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    placeholder="Name">
                                @error('name')
                                    <div id="name" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}" type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Email address">
                                @error('email')
                                    <div id="email" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input value="{{ old('username') }}" type="text"
                                    class="form-control @error('username') is-invalid @enderror" id="username"
                                    name="username" placeholder="Username">
                                @error('username')
                                    <div id="username" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password akun">
                                @error('password')
                                    <div id="password" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Password
                                    Confirmation</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" value=""
                                    placeholder="Konfirmasi Password Baru">
                                @error('password_confirmation')
                                    <div id="password_confirmation" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('users.index') }}" class="btn btn-cancel">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
