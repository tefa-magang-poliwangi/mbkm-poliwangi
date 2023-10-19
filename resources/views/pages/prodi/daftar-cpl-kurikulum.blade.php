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
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen CPL : {{ $kurikulum->nama }}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp; Tambah
                                        CPL Kurikulum</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white text-center">Kode CPL</th>
                                        <th class="text-white text-center">Deskripsi</th>
                                        <th class="text-white text-center">Jenis CPL</th>
                                        <th class="text-white text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($cpl as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->kode_cpl }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td class="text-center">{{ $data->jenis_cpl }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <a href="{{ route('manajemen.cpl.kurikulum.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto">
                                                    <i class="fa-solid fas fa-trash "></i>
                                                </a>
                                            </td>
                                        </tr>

                                        {{-- Modal Update Periode --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-theme">Edit CPL Kurikulum</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('manajemen.cpl.kurikulum.update', [$data->id, $id_kurikulum]) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_kode_cpl" class="form-label">Kode
                                                                    CPL</label>
                                                                <input id="update_kode_cpl" type="text"
                                                                    class="form-control @error('update_kode_cpl')
                                                                    is-invalid
                                                                    @enderror"
                                                                    name="update_kode_cpl" value="{{ $data->kode_cpl }}"
                                                                    placeholder="Kode cpl">
                                                                @error('update_kode_cpl')
                                                                    <div id="update_kode_cpl" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="update_jenis_cpl" class="form-label">Jenis
                                                                    CPL</label>
                                                                <input id="update_jenis_cpl" type="text"
                                                                    class="form-control @error('update_jenis_cpl')
                                                                    is-invalid
                                                                     @enderror"
                                                                    name="update_jenis_cpl" value="{{ $data->jenis_cpl }}"
                                                                    placeholder="Jenis cpl">
                                                                @error('update_jenis_cpl')
                                                                    <div id="update_jenis_cpl" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="update_deskripsi"
                                                                    class="form-label">Deskripsi</label>
                                                                <textarea name="update_deskripsi" id="update_deskripsi" cols="30" rows="10"
                                                                    class="form-control @error('update_deskripsi') is-invalid @enderror" placeholder="Deskripsi cpl">{{ $data->deskripsi }}</textarea>
                                                                @error('update_deskripsi')
                                                                    <div id="update_deskripsi" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="row">
                                                                <div class="col d-flex">
                                                                    <div class="ml-auto">
                                                                        <button type="button" class="btn btn-cancel"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>

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
    </section>

    {{-- Modal Tambah Periode --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-theme">Tambah CPL Kurikulum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('manajemen.cpl.kurikulum.store', $id_kurikulum) }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_kode_cpl" class="form-label">Kode CPL</label>
                            <input id="create_kode_cpl" type="text"
                                class="form-control @error('create_kode_cpl')
                                is-invalid
                            @enderror"
                                name="create_kode_cpl" placeholder="Kode cpl">
                            @error('create_kode_cpl')
                                <div id="create_kode_cpl" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_jenis_cpl" class="form-label">Jenis CPL</label>
                            <input id="create_jenis_cpl" type="text"
                                class="form-control @error('create_jenis_cpl') is-invalid @enderror"
                                name="create_jenis_cpl" placeholder="Jenis cpl">
                            @error('create_jenis_cpl')
                                <div id="create_jenis_cpl" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="create_deskripsi" id="create_deskripsi" cols="30" rows="10"
                                class="form-control @error('create_deskripsi') is-invalid @enderror" placeholder="Deskripsi cpl"></textarea>
                            @error('create_deskripsi')
                                <div id="create_deskripsi" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col d-flex">
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
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
