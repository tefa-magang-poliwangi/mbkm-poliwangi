@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Kriteria Magang External | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Kriteria Penilaian {{ $magang_ext->name }}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    {{-- Import Data Kriteria --}}
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#importDataKriteria" title="Impot Data Kriteria">
                                        <i class="fa-solid fa-upload"></i>
                                    </button>

                                    {{-- Import Nilai Kriteria Mahasiswa --}}
                                    {{-- <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#importNilaiKriteria" title="Impot Nilai Kriteria">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </button> --}}

                                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                        <i class="fa-solid fa-plus"></i> &ensp; Tambah Kriteria
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Import Data Kriteria --}}
                        <div class="modal fade" id="importDataKriteria" tabindex="-1" role="dialog"
                            aria-labelledby="uploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-theme" id="uploadModalLabel">Import Data Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk Unggah File Excel -->
                                        <form action="{{ route('import.data.kriteria.magang.ext') }}" method="POST"
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

                        <!-- Modal Import Nilai Kriteria Mahasiswa -->
                        {{-- <div class="modal fade" id="importNilaiKriteria" tabindex="-1" role="dialog"
                            aria-labelledby="uploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-theme" id="uploadModalLabel">Import Nilai Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk Unggah File Excel -->
                                        <form action="{{ route('import.data.nilai.kriteria.km') }}" method="POST"
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
                        </div> --}}

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th width="10%" class="text-center text-white">No</th>
                                                <th class="text-center text-white">Kriteria Penilaian</th>
                                                <th width="10%" class="text-center text-white">Edit</th>
                                                <th width="10%" class="text-center text-white">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($kriteria as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->penilaian }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.kriteria.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fa-solid fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update Kriteria --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-theme">Edit Kriteria Penilaian
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form
                                                                action="{{ route('manajemen.kriteria.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="update_kriteria"
                                                                            class="form-label">Kriteria Penilaian</label>
                                                                        <input id="update_kriteria" type="text"
                                                                            class="form-control @error('update_kriteria') is-invalid @enderror"
                                                                            name="update_kriteria"
                                                                            placeholder="Nama kriteria"
                                                                            value="{{ $data->penilaian }}">
                                                                        @error('update_kriteria')
                                                                            <div id="update_kriteria"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" class="btn btn-cancel"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-submit">Submit</button>
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

        {{-- Modal Tambah Kriteria --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-theme">Tambah Kriteria Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.kriteria.store', $id_magang_ext) }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_kriteria" class="form-label">Kriteria Penilaian</label>
                                <input id="create_kriteria" type="text"
                                    class="form-control @error('create_kriteria') is-invalid @enderror"
                                    name="create_kriteria" placeholder="Nama kriteria">
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
    </section>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
