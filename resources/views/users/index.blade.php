@extends('layouts.base-admin')

@section('title')
    <title>Manajemen User | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen User</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm ml-auto">Add new
                                    user</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col" width="1%" class="text-white">#</th>
                                        <th scope="col" width="20%" class="text-white">Nama Permission</th>
                                        <th scope="col" width="20%" class="text-white">Email</th>
                                        <th scope="col" width="10%" class="text-white text-center">Username</th>
                                        <th scope="col" width="10%" class="text-white text-center">Roles</th>
                                        <th scope="col" width="1%" class="text-white text-center">Lihat</th>
                                        <th scope="col" width="1%" class="text-white text-center">Ubah</th>
                                        <th scope="col" width="1%" class="text-white text-center">Hapus</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->username }}</td>
                                            <td class="text-center">
                                                @foreach ($user->roles as $role)
                                                    <span class="badge bg-primary text-white">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center"><a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-warning btn-sm">Show</a></td>
                                            <td class="text-center"><a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                            </td>
                                            <td class="text-center">
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
