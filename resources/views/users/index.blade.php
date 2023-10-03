@extends('layouts.base-admin')

@section('title')
    <title>Manajemen User | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h1>Users</h1>
                    <div class="lead">
                        Manajemen User.
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a>
                    </div>

                    <div class="mt-2">
                        @include('layouts.partials.messages')
                    </div>

                    <table class="table table-striped table-responsive">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" width="1%" class="text-white">#</th>
                                <th scope="col" width="15%" class="text-white">Name</th>
                                <th scope="col" class="text-white">Email</th>
                                <th scope="col" width="10%" class="text-white">Username</th>
                                <th scope="col" width="10%" class="text-white">Roles</th>
                                <th scope="col" width="1%" colspan="3" class="text-white"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary text-white">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ route('users.show', $user->id) }}"
                                            class="btn btn-warning btn-sm">Show</a></td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $users->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
