@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Kurikulum | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Data Kurikulum - {{ $prodi->nama }}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Kurikulum</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" class="text-center text-white">No</th>
                                        <th class="text-center text-white">Nama Kurikulum</th>
                                        <th class="text-center text-white">Prodi</th>
                                        <th class="text-center text-white">Status</th>
                                        <th class="text-center text-white">MataKuliah</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kurikulums as $item)
                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                {{ $item->prodi->nama }}
                                            </td>
                                            <td> <span class="badge bg-primary text-white">
                                                    {{ $item->status }} </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('manajemen.matkul.kurikulum.index', $item->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-plus"></i> Matkul
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('manajemen.cpl.kurikulum.index', $item->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-search"></i> CPL
                                                </a>
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $item->id }}"><i
                                                        class="fa-solid fa-pen text-white"></i></button>
                                                <a href="{{ route('manajemen.kurikulum.destroy', $item->id) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        {{-- Modal Update --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $item->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Kurikulum</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('manajemen.kurikulum.update', $item->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="update_nama" class="form-label">Nama
                                                                    Kurikulum</label>
                                                                <input id="update_nama" placeholder="Nama kurikulum"
                                                                    type="text"
                                                                    class="form-control @error('update_nama')
                                                                    is-invalid
                                                                @enderror"
                                                                    name="update_nama" value="{{ $item->nama }}">
                                                                @error('update_nama')
                                                                    <div id="update_nama" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="update_status" class="form-label">Status</label>
                                                                <select
                                                                    class="form-control @error('update_status') is-invalid @enderror"
                                                                    id="update_status" name="update_status">
                                                                    <option value="">Pilih Status</option>
                                                                    <option value="1"
                                                                        {{ $item->status == 'Wajib' ? 'selected' : '' }}>
                                                                        Aktif
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                                                        Tidak Aktif
                                                                    </option>
                                                                </select>
                                                                @error('update_status')
                                                                    <div id="update_status" class="form-text pb-1">
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

        {{-- Modal Create --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Kurikulum Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.kurikulum.store', ['id_prodi' => $id_prodi]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_nama" class="form-label">Nama
                                    Kurikulum</label>
                                <input id="create_nama" placeholder="Nama kurikulum" type="text"
                                    class="form-control @error('create_nama')
                                 is-invalid
                             @enderror"
                                    name="create_nama">
                                @error('create_nama')
                                    <div id="create_nama" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_status" class="form-label">Status</label>
                                <select class="form-control @error('create_status') is-invalid @enderror"
                                    id="create_status" name="create_status">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                                @error('create_status')
                                    <div id="create_status" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-submit">Simpan</button>
                        </div>
                    </form>
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

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
