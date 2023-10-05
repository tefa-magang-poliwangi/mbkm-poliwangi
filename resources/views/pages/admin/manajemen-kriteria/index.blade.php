@extends('layouts.base-admin')
@section('title')
    <title>Manajemen Kriteria | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 5%">
        <div class="d-flex justify-content-between">
            <strong class="h3">Data Kriteria Penilaian</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-6">
                            <h6>Kriteria Penilaian</h6>
                            <div class="form-group">
                                <form action="{{ route('kriteria.penilaian.index') }}" method="GET">
                                    <select class="form-control select2" name="magang_ext" onchange="this.form.submit()">
                                        <option value="">Semua Perusahaan</option>
                                        @foreach ($magangext as $item)
                                            <option value="{{ $item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Kriteria</button>
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
                                        <th>Nama Perusahaan</th>
                                        <th>Kriteria Penilaian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->magang_ext->name }}</td>
                                            <td>{{ $data->penilaian }}</td>
                                            <td> <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}"><i
                                                        class="fa-solid fa-pen"></i></button>
                                                <a href="{{ route('kriteria.penilaian.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash text-dark"></i></a>
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
                                                    <form action="{{ route('kriteria.penilaian.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_perusahaan" class="form-label">Pilih
                                                                    Perusahaan</label>
                                                                <select
                                                                    class="form-control @error('update_perusahaan')
                                                                is-invalid
                                                            @enderror"
                                                                    id="update_perusahaan" name="update_perusahaan">
                                                                    <option value="">Perusahaan</option>
                                                                    @foreach ($magangext as $dataMagangext)
                                                                        <option value="{{ $dataMagangext->id }}"
                                                                            {{ $data->id_magang_ext == $dataMagangext->id ? 'selected' : '' }}>
                                                                            {{ $dataMagangext->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('update_perusahaan')
                                                                    <div id="update_perusahaan" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_kriteria" class="form-label">Kriteria
                                                                    Penilaian</label>
                                                                <input id="update_kriteria" type="text"
                                                                    class="form-control @error('update_kriteria')
                                                                is-invalid
                                                            @enderror"
                                                                    name="update_kriteria" value="{{ $data->penilaian }}">
                                                                @error('update_kriteria')
                                                                    <div id="update_kriteria" class="form-text text-danger">
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
                    <h5 class="modal-title">Tambah Kriteria Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kriteria.penilaian.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_perusahaan" class="form-label">Pilih Perusahaan</label>
                            <select
                                class="form-control @error('create_perusahaan')
                                is-invalid
                            @enderror"
                                id="create_perusahaan" name="create_perusahaan">
                                <option value="">Perusahaan</option>
                                @foreach ($magangext as $dataMagangext)
                                    <option value="{{ $dataMagangext->id }}">{{ $dataMagangext->name }}</option>
                                @endforeach
                            </select>
                            @error('create_perusahaan')
                                <div id="create_perusahaan" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="create_kriteria" class="form-label">Kriteria Penilaian</label>
                            <input id="create_kriteria" type="text"
                                class="form-control @error('create_kriteria')
                                is-invalid
                            @enderror"
                                name="create_kriteria">
                            @error('create_kriteria')
                                <div id="create_kriteria" class="form-text text-danger">
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
