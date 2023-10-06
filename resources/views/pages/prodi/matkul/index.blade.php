@extends('layouts.base-admin')
@section('title')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <div class="d-flex justify-content-between">
            <strong class="h3">Data Mata Kuliah</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-4">
                            <h4 class="fw-bold">Program Studi</h4>
                            <div class="form-group">
                                <form action="{{ route('daftar.matakuliah.index') }}" method="GET">
                                    <select class="form-control select2" name="prodi" onchange="this.form.submit()">
                                        <option value="">Semua Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $request->prodi ? 'selected' : '' }}>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-8 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-theme-four">Kembali</button>
                                <a href="{{ route('daftar.matakuliah.create') }}" class="btn btn-theme fa-plus">Tambah</a>
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
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Bobot MK</th>
                                        <th>Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matakuliah as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->kode_matakuliah }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->sks }} SKS</td>
                                            <td>{{ $data->prodi->nama }}</td>
                                            <td> <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}"><i
                                                        class="fa-solid fa-pen"></i></button>
                                                <a href="{{ route('daftar.matakuliah.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"> <i class="fas fa-trash"></i></a>
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
                                                    <form action="{{ route('daftar.matakuliah.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="update_matkul" class="form-label">Nama Mata
                                                                    Kuliah</label>
                                                                <input id="update_matkul" type="text"
                                                                    class="form-control @error('update_matkul')
                                                                is-invalid
                                                            @enderror"
                                                                    name="update_matkul" value="{{ $data->nama }}">
                                                                @error('update_matkul')
                                                                    <div id="update_matkul" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_kode_matkul" class="form-label">Kode Mata
                                                                    Kuliah</label>
                                                                <input id="update_kode_matkul" type="text"
                                                                    class="form-control @error('update_kode_matkul')
                                                                is-invalid
                                                            @enderror"
                                                                    name="update_kode_matkul"
                                                                    value="{{ $data->kode_matakuliah }}">
                                                                @error('update_kode_matkul')
                                                                    <div id="update_kode_matkul" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_sks" class="form-label">Jumlah
                                                                    SKS</label>
                                                                <input id="update_sks" type="number"
                                                                    class="form-control @error('update_sks')
                                                                is-invalid
                                                            @enderror"
                                                                    name="update_sks" value="{{ $data->sks }}">
                                                                @error('update_sks')
                                                                    <div id="update_sks" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update_prodi" class="form-label">Pilih Prodi /
                                                                    Jurusan</label>
                                                                <select
                                                                    class="form-control @error('update_prodi')
                                                                    is-invalid
                                                                @enderror"
                                                                    id="update_prodi" name="update_prodi">
                                                                    <option value="">Pilih prodi</option>
                                                                    @foreach ($prodi as $dataprodi)
                                                                        <option value="{{ $dataprodi->id }}"
                                                                            {{ $data->id_prodi == $dataprodi->id ? 'selected' : '' }}>
                                                                            {{ $dataprodi->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('update_prodi')
                                                                    <div id="update_prodi" class="form-text text-danger">
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
