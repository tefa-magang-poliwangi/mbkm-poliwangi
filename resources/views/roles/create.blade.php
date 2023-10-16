@extends('layouts.base-admin')

@section('title')
    <title>Tambah Role Baru | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="bg-white p-4 rounded">
                    <h1>Add new role</h1>
                    <div class="lead">
                        Tambah role baru dan memberikan permission.
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

                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" id="name"
                                    name="name" placeholder="Name" required>
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
                                                value="{{ $permission->name }}" class='permission'>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
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
