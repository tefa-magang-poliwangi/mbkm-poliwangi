@extends('layouts.base-admin')

@section('title')
    <title>Detail Role | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded">
                    <h1>{{ ucfirst($role->name) }} Role</h1>
                    <div class="lead">

                    </div>

                    <div class="container mt-4">

                        <h6 class="mb-3">Akses Permission</h6>

                        <table class="table table-striped table-responsive">
                            <thead>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="1%">Guard</th>
                            </thead>

                            @foreach ($rolePermissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                <div class="mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('roles.index') }}" class="btn bg-white">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
