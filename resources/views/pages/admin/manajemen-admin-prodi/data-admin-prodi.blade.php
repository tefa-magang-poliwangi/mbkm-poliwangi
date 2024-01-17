@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Admin Jurusan | MBKM Poliwangi</title>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Admin Jurusan</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#importAdminProdi"
                                        title="Import Data User Admin Jurusan"><i class="fa-solid fa-cloud-arrow-up"></i>
                                    </button>

                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp; Tambah
                                        Admin Jurusan</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Import Data User Admin Jurusan -->
                        <div class="modal fade" id="importAdminProdi" tabindex="-1" role="dialog"
                            aria-labelledby="uploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-theme" id="uploadModalLabel">Import Data User Admin
                                            Prodi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk Unggah File Excel -->
                                        <form action="{{ route('import.data.user.admin.prodi') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="file">Pilih File Excel</label>
                                                <input type="file" class="form-control-file" id="file"
                                                    name="file">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Unggah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white text-center">Nama</th>
                                        <th class="text-white text-center">Username</th>
                                        <th class="text-white text-center">Jurusan</th>
                                        <th class="text-white text-center">Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($admins as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->user->name }}</td>
                                            <td class="text-center">{{ $data->user->username }}</td>
                                            <td>{{ $data->jurusan->nama_jurusan }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.admin.prodi.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto">
                                                    <i class="fa-solid fas fa-trash "></i>
                                                </a>
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
                    <h5 class="modal-title">Tambah Admin Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manajemen.admin.prodi.store') }}" method="POST">
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
                                @foreach ($user_option as $datauser)
                                    <option value="{{ $datauser->id }}">{{ $datauser->name }}</option>
                                @endforeach
                            </select>
                            @error('create_user')
                                <div id="create_user" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_jurusan" class="form-label">Jurusan</label>
                            <select
                                class="form-control @error('create_jurusan')
                                        is-invalid
                                    @enderror"
                                id="create_jurusan" name="create_jurusan">
                                <option value="">Jurusan</option>
                                @foreach ($jurusan as $datajurusan)
                                    <option value="{{ $datajurusan->id }}">{{ $datajurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('create_jurusan')
                                <div id="create_jurusan" class="form-text text-danger">
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
