@extends('layouts.base-admin')

@section('title')
    <title>Kompetensi Lowongan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Kompetensi Lowongan</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                        <i class="fa-solid fa-plus"></i> &ensp; Tambah Kompetensi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-hover table-borderless rounded" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Kompetensi</th>
                                        <th class="text-center text-white">Edit</th>
                                        <th class="text-center text-white">Hapus</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($komptensi_lowongan as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->kompetensi }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.kompetensi.lowongan.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        {{-- Modal Update kompetensi --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-theme">Edit Kompetensi Lowongan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form
                                                        action="{{ route('manajemen.kompetensi.lowongan.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_kompetensi" class="form-label">Kompetensi
                                                                    Lowongan</label>
                                                                <input id="update_kompetensi" type="text"
                                                                    class="form-control @error('update_kompetensi') is-invalid @enderror"
                                                                    name="update_kompetensi" placeholder="Nama kriteria"
                                                                    value="{{ $data->kompetensi }}">
                                                                @error('update_kompetensi')
                                                                    <div id="update_kompetensi" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-cancel"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-submit">Submit</button>
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

    {{-- Modal Tambah Kriteria --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-theme">Tambah Kompetensi Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manajemen.kompetensi.lowongan.store', $id_lowongan) }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_kompetensi" class="form-label">Kompetensi Lowongan</label>
                            <input id="create_kompetensi" type="text"
                                class="form-control @error('create_kompetensi') is-invalid @enderror"
                                name="create_kompetensi" placeholder="Tambah Kompetensi">
                            @error('create_kompetensi')
                                <div id="create_kompetensi" class="form-text text-danger">
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
