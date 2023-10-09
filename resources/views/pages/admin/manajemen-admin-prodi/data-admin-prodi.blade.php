@extends('layouts.base-admin')
@section('title')
    <title>Daftar Admin | Politeknik Negeri Banyuwangi</title>
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
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Data Admin</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp; Tambah
                                        Admin Prodi</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white text-center" width="10%">Nama</th>
                                        <th class="text-white text-center" width="10%">Username</th>
                                        <th class="text-white text-center" width="10%">Program Studi</th>
                                        <th class="text-white text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($admins as $data)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no }}
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                {{ $data->user->username }}
                                            </td>
                                            <td>
                                                {{ $data->prodi->nama }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('data.admin.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash "></i></a>
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
