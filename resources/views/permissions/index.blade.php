@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Permission | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="">
        {{-- <div class="row py-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h2>Daftar Permission</h2>
                    <div class="lead">
                        Manajemen Permission.
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add
                            permissions</a>
                    </div>

                    <div class="mt-2">
                        @include('layouts.partials.messages')
                    </div>

                    <table class="table table-striped table-responsive mt-3">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" width="15%" class="text-white">Name</th>
                                <th scope="col" class="text-white">Guard</th>
                                <th scope="col" colspan="3" width="1%" class="text-white"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td><a href="{{ route('permissions.edit', $permission->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['permissions.destroy', $permission->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        <div class="row py-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>Daftar Permission</h2>
                            <div class="lead">
                                Manajemen Permission.
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add
                                    permissions</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col" width="10%" class="text-white">No</th>
                                        <th scope="col" class="text-white">Name</th>
                                        <th scope="col" width="10%" class="text-white text-center">Guard</th>
                                        <th scope="col" width="10%" class="text-white">Ubah</th>
                                        <th scope="col" width="10%" class="text-white">Hapus</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td class="text-center">{{ $permission->guard_name }}</td>
                                            <td><a href="{{ route('permissions.edit', $permission->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['permissions.destroy', $permission->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
