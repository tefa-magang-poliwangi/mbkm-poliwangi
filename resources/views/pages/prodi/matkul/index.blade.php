@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Matakuliah | MBKM Poliwangi</title>
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
                                <h5 class="justify-start my-auto text-theme">Data Matakuliah</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#importMatakuliah"
                                        title="Import Data Matakuliah"><i class="fa-solid fa-upload"></i>
                                    </button>

                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp; Tambah Data
                                        Matakuliah</button>
                                </div>
                            </div>
                        </div>

                        {{-- Import Data Matakuliah --}}
                        <div class="modal fade" id="importMatakuliah" tabindex="-1" role="dialog"
                            aria-labelledby="uploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-theme" id="uploadModalLabel">Import Data Matakuliah
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk Unggah File Excel -->
                                        <form action="{{ route('import.data.matakuliah') }}" method="POST"
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

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-white text-center">No</th>
                                                <th class="text-white text-center">Kode Mata Kuliah</th>
                                                <th class="text-white">Nama Mata Kuliah</th>
                                                <th class="text-white text-center">Bobot MK</th>
                                                <th class="text-white">Prodi</th>
                                                <th class="text-white text-center">Edit</th>
                                                <th class="text-white text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($matakuliah as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->kode_matakuliah }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->sks }} SKS</td>
                                                    <td>{{ $data->prodi->nama }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info text-white"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}">
                                                            <i class="fa-solid fa-pen text-white"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.matakuliah.destroy', $data->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Mata Kuliah</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('manajemen.matakuliah.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="update_matkul" class="form-label">Nama
                                                                            Mata
                                                                            Kuliah</label>
                                                                        <input id="update_matkul" type="text"
                                                                            class="form-control @error('update_matkul') is-invalid @enderror"
                                                                            name="update_matkul">
                                                                        @error('update_matkul')
                                                                            <div id="update_matkul"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="update_kode_matkul"
                                                                            class="form-label">Kode Mata
                                                                            Kuliah</label>
                                                                        <input id="update_kode_matkul" type="text"
                                                                            class="form-control @error('update_kode_matkul') is-invalid @enderror"
                                                                            name="update_kode_matkul"
                                                                            value="{{ $data->kode_matakuliah }}">
                                                                        @error('update_kode_matkul')
                                                                            <div id="update_kode_matkul"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="update_sks" class="form-label">Jumlah
                                                                            SKS</label>
                                                                        <input id="update_sks" type="number"
                                                                            class="form-control @error('update_sks') is-invalid @enderror"
                                                                            name="update_sks"
                                                                            value="{{ $data->sks }}">
                                                                        @error('update_sks')
                                                                            <div id="update_sks"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" class="btn btn-cancel"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-submit">Simpan</button>
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

        {{-- Modal create --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.matakuliah.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_matkul" class="form-label">Nama
                                    Mata
                                    Kuliah</label>
                                <input id="create_matkul" type="text"
                                    class="form-control @error('create_matkul') is-invalid @enderror"
                                    name="create_matkul">
                                @error('create_matkul')
                                    <div id="create_matkul" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create_kode_matkul" class="form-label">Kode Mata
                                    Kuliah</label>
                                <input id="create_kode_matkul" type="text"
                                    class="form-control @error('create_kode_matkul') is-invalid @enderror"
                                    name="create_kode_matkul">
                                @error('create_kode_matkul')
                                    <div id="create_kode_matkul" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create_sks" class="form-label">Jumlah
                                    SKS</label>
                                <input id="create_sks" type="number"
                                    class="form-control @error('create_sks') is-invalid @enderror" name="create_sks">
                                @error('create_sks')
                                    <div id="create_sks" class="form-text text-danger">
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
