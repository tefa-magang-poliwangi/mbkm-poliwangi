@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Berkas Lowongan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Berkas Lowongan</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Berkas Lowongan
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white" width="10%">No</th>
                                                <th class="text-center text-white">Nama </th>
                                                <th class="text-center text-white">Ukuran </th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($berkaslowongan as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->ukuran_max }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}"><i
                                                                class="fa-solid fa-pen text-white"></i>
                                                        </button>
                                                        <a href="{{ route('manajemen.berkas-lowongan.mitra.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Ubah Periode --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Berkas Lowongan</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form
                                                                action="{{ route('manajemen.berkas-lowongan.mitra.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="id_lowongan"
                                                                            class="form-label">Lowongan</label>
                                                                        <input id="id_lowongan" type="text"
                                                                            class="form-control @error('id_lowongan') is-invalid @enderror"
                                                                            name="id_lowongan" placeholder="Nama Berkas"
                                                                            value="{{ $data->id_lowongan }}">
                                                                        @error('id_lowongan')
                                                                            <div id="id_lowongan" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="id_berkas"
                                                                            class="form-label">Berkas</label>
                                                                        <input id="id_berkas" type="number"
                                                                            class="form-control @error('id_berkas') is-invalid @enderror"
                                                                            name="id_berkas" placeholder="Nama lengkap"
                                                                            value="{{ $data->id_berkas }}">
                                                                        @error('id_berkas')
                                                                            <div id="id_berkas" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col d-flex">
                                                                            <div class="ml-auto">
                                                                                <button type="button"
                                                                                    class="btn btn-cancel"
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
            </div>
        </div>

    </section>

    {{-- Modal Tambah Berkas Lowongan --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berkas lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('manajemen.berkas-lowongan.mitra.store', $id_mitra) }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_lowongan" class="form-label">Lowongan</label>
                            <select
                                class="form-control @error('id_lowongan')
                                        is-invalid
                                    @enderror"
                                id="id_lowongan" name="id_lowongan">
                                <option value="">Lowongan</option>
                                @foreach ($lowongan as $datalowongan)
                                    <option value="{{ $datalowongan->id }}">{{ $datalowongan->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_lowongan')
                                <div id="id_lowongan" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_berkas" class="form-label">Berkas</label>
                            <select
                                class="form-control @error('id_berkas')
                                        is-invalid
                                    @enderror"
                                id="id_berkas" name="id_berkas">
                                <option value="">Berkas</option>
                                @foreach ($berkas as $databerkas)
                                    <option value="{{ $databerkas->id }}">{{ $databerkas->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_berkas')
                                <div id="id_berkas" class="form-text text-danger">
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
