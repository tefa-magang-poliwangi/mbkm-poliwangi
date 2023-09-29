@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Role | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded">
                    <h1>Roles</h1>
                    <div class="lead">
                        Manajemen Role.
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
                    </div>

                    <div class="mt-2">
                        @include('layouts.partials.messages')
                    </div>

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="text-center" width="1%">No</th>
                            <th>Name</th>
                            <th class="text-center" width="3%" colspan="3">Action</th>
                        </tr>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </table>

                    <div class="d-flex">
                        {!! $roles->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
