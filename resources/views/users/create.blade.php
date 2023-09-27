@extends('layouts.base-admin')

@section('title')
    <title>Tambah User | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded">
                    <h1>Add new user</h1>
                    <div class="lead">
                        Tambah User Baru.
                    </div>

                    <div class="container mt-4">
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" id="name"
                                    name="name" placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}" type="email" class="form-control" id="email"
                                    name="email" placeholder="Email address" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input value="{{ old('username') }}" type="text" class="form-control" id="username"
                                    name="username" placeholder="Username" required>
                                @if ($errors->has('username'))
                                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Save user</button>
                            <a href="{{ route('users.index') }}" class="btn bg-white">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
