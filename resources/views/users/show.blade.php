@extends('layouts.base-admin')

@section('title')
    <title>Detail User | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h1>Show user</h1>
                    <div class="lead">
                        Lihat Detail User.
                    </div>

                    <div class="container mt-4">
                        <div>
                            Name: {{ $user->name }}
                        </div>
                        <div>
                            Email: {{ $user->email }}
                        </div>
                        <div>
                            Username: {{ $user->username }}
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
