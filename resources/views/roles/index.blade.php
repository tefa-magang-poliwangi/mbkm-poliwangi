@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Role | MBKM Poliwangi</title>
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
        <div class="row py-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h1>Roles</h1>
                            <div class="lead">
                                Manajemen Role.
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add
                                    role</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white">Nama Role</th>
                                        <th class="text-white text-center" width="1%">Lihat</th>
                                        <th class="text-white text-center" width="1%">Edit</th>
                                        <th class="text-white text-center" width="1%">Hapus</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('roles.show', $role->id) }}">Show</a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
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
