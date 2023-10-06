@extends('layouts.base-admin')
@section('title')
    <title>Daftar Admin | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 5%">
        <div class="d-flex justify-content-between">
            <strong class="h5 text-theme">Data Admin</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 mb-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-4">
                            <h4 class="fw-bold">Program Studi</h4>
                            <div class="form-group">
                                <form action="{{ route('data.admin.index') }}" method="GET">
                                    <select class="form-control select2" name="prodi" onchange="this.form.submit()">
                                        <option value="">Semua Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-8 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Admin Prodi</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Program Studi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $data)
                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                {{ $data->user->username }}
                                            </td>
                                            <td>
                                                {{ $data->prodi->nama }}
                                            </td>
                                            <td>
                                               <a href="{{ route('data.admin.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash text-dark"></i></a>
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
    </div>


    {{-- Modal Tambah Periode --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Admin Prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('data.admin.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_user" class="form-label">User</label>
                            <select
                                class="form-control @error('create_user')
                                        is-invalid
                                    @enderror"
                                id="create_user" name="create_user">
                                <option value="">User</option>
                                @foreach ($users as $datauser)
                                    <option value="{{ $datauser->id }}">{{ $datauser->name }}</option>
                                @endforeach
                            </select>
                            @error('create_user')
                                <div id="create_user" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_prodi" class="form-label">Prodi</label>
                            <select
                                class="form-control @error('create_prodi')
                                        is-invalid
                                    @enderror"
                                id="create_prodi" name="create_prodi">
                                <option value="">Prodi</option>
                                @foreach ($prodi as $dataprodi)
                                    <option value="{{ $dataprodi->id }}">{{ $dataprodi->nama }}</option>
                                @endforeach
                            </select>
                            @error('create_prodi')
                                <div id="create_prodi" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
