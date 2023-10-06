@extends('layouts.base-admin')
@section('title')
    <title>Data Periode | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 5%">
        <div class="d-flex justify-content-between">
            <strong class="h3">Data Periode</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-6">
                            <h6>Data Periode</h6>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="ml-auto">
                                <button type="button" class="btn btn-cancel" data-dismiss="modal">Kembali</button>
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Periode</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Semester</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periode as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->semester }}</td>
                                            <td>{{ $data->tahun }}</td>
                                            <td> <span class="badge bg-primary text-white">
                                                    {{ $data->status }} </span>
                                            </td>
                                            <td> <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}"><i
                                                        class="fa-solid fa-pen"></i></button>
                                                <a href="{{ route('data.periode.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        {{-- Modal Update --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Periode</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('data.periode.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_semester"
                                                                    class="form-label">Semester</label>
                                                                <input id="update_semester" type="number"
                                                                    class="form-control @error('update_semester')
                                                                        is-invalid
                                                                         @enderror"
                                                                    name="update_semester" value="{{ $data->semester }}">
                                                                @error('update_semester')
                                                                    <div id="update_semester" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_tahun" class="form-label">Tahun</label>
                                                                <input id="update_tahun" type="text"
                                                                    class="form-control @error('update_tahun')
                                                                        is-invalid
                                                                    @enderror"
                                                                    name="update_tahun" value="{{ $data->tahun }}">
                                                                @error('update_tahun')
                                                                    <div id="update_tahun" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_status" class="form-label">Status</label>
                                                                <select
                                                                    class="form-control @error('update_status') is-invalid @enderror"
                                                                    id="update_status" name="update_status">
                                                                    <option value="">Pilih Status</option>
                                                                    <option value="Aktif"
                                                                        {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                                                                        Aktif</option>
                                                                    <option value="Tidak Aktif"
                                                                        {{ $data->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                                                        Tidak Aktif</option>
                                                                </select>
                                                                @error('update_status')
                                                                    <div id="update_status" class="form-text pb-1 text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-cancel"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
                    <h5 class="modal-title">Tambah Periode baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('data.periode.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_semester" class="form-label">Semester</label>
                            <input id="create_semester" type="number"
                                class="form-control @error('create_semester')
                                is-invalid
                            @enderror"
                                name="create_semester">
                            @error('create_semester')
                                <div id="create_semester" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="create_tahun" class="form-label">Tahun</label>
                            <input id="create_tahun" type="text"
                                class="form-control @error('create_tahun')
                                is-invalid
                            @enderror"
                                name="create_tahun">
                            @error('create_tahun')
                                <div id="create_tahun" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="create_status" class="form-label">Status</label>
                            <select class="form-control @error('create_status') is-invalid @enderror" id="create_status"
                                name="create_status">
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('create_status')
                                <div id="create_status" class="form-text pb-1 text-danger">
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
