@extends('layouts.base-admin')

@section('title')
    <title>Ubah Role | MBKM Poliwangi</title>
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
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h1>Update Role: {{ ucfirst($role->name) }}</h1>

                    <div class="lead">
                        Ubah role dan manajemen permissions.
                    </div>

                    <div class="container mt-4">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @method('patch')
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $role->name }}" type="text" class="form-control" name="name"
                                    placeholder="Name" required>
                            </div>

                            <label for="permissions" class="form-label">Assign Permissions</label>

                            <table class="table table-striped table-responsive">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="1%">Guard</th>
                                </thead>

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="permission[{{ $permission->name }}]"
                                                value="{{ $permission->name }}" class='permission'
                                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-danger">Kembali</a>
                        </form>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
