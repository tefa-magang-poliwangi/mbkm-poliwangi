@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Kriteria | MBKM Poliwangi</title>
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
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card border-0">
<<<<<<< HEAD
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-6">
                            <h5 class="justify-start">Kriteria Penilaian {{ $magang_ext->name }}</h5>

                        </div>
                        <div class="col-6 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
=======
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Filter Kriteria Penilaian</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                    <i class="fa-solid fa-plus"></i> &ensp; Tambah
>>>>>>> 9ae5f2b49019a891ed9d1707298ae62bcddd5326
                                    Kriteria</button>
                            </div>
                        </div>

<<<<<<< HEAD
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
                                        <th>Kriteria Penilaian</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->penilaian }}</td>
                                            <td> <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}"><i
                                                        class="fa-solid fa-pen"></i></button>
                                            </td>
                                            <td> <a href="{{ route('kriteria.penilaian.delete', [$id_magang_ext, $data->id]) }}"
                                                    class="btn btn-danger ml-auto"> <i
                                                        class="fa-solid fas fa-trash"></i></a></td>
                                        </tr>
=======
                        {{-- Filter Kriteria Magang Mahasiswa --}}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-6 col-lg-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <form action="{{ route('kriteria.penilaian.index') }}" method="GET">
                                            <select class="form-control select2" name="magang_ext"
                                                onchange="this.form.submit()">
                                                <option value="">Semua Perusahaan</option>
                                                @foreach ($magangext as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $request->magang_ext ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
>>>>>>> 9ae5f2b49019a891ed9d1707298ae62bcddd5326

                            <div class="row mt-5 bg-info">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-center text-white">No</th>
                                                    <th class="text-white">Nama Perusahaan</th>
                                                    <th class="text-white">Kriteria Penilaian</th>
                                                    <th class="text-center text-white">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp

                                                @foreach ($kriteria as $data)
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td>{{ $data->magang_ext->name }}</td>
                                                        <td>{{ $data->penilaian }}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-info ml-auto"
                                                                data-toggle="modal"
                                                                data-target="#updateModal{{ $data->id }}"><i
                                                                    class="fa-solid fa-pen text-white"></i>
                                                            </button>
                                                            <a href="{{ route('kriteria.penilaian.delete', $data->id) }}"
                                                                class="btn btn-danger ml-auto">
                                                                <i class="fa-solid fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    {{-- Modal Update --}}
                                                    <div class="modal fade" tabindex="-1" role="dialog"
                                                        id="updateModal{{ $data->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah data kriteria</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('kriteria.penilaian.update', $data->id) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="update_perusahaan"
                                                                                class="form-label">Perusahaan Magang
                                                                                External</label>
                                                                            <select
                                                                                class="form-control @error('update_perusahaan') is-invalid @enderror"
                                                                                id="update_perusahaan"
                                                                                name="update_perusahaan">
                                                                                <option value="">Pilih Perusahaan
                                                                                </option>
                                                                                @foreach ($magangext as $dataMagangext)
                                                                                    <option
                                                                                        value="{{ $dataMagangext->id }}"
                                                                                        {{ $data->id_magang_ext == $dataMagangext->id ? 'selected' : '' }}>
                                                                                        {{ $dataMagangext->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('update_perusahaan')
                                                                                <div id="update_perusahaan"
                                                                                    class="form-text text-danger">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="update_kriteria"
                                                                                class="form-label">Kriteria
                                                                                Penilaian</label>
                                                                            <input id="update_kriteria" type="text"
                                                                                class="form-control @error('update_kriteria') is-invalid @enderror"
                                                                                name="update_kriteria"
                                                                                value="{{ $data->penilaian }}"
                                                                                placeholder="Nama kriteria penialian">
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
                                                                            class="btn btn-submit">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

<<<<<<< HEAD
                                                        <div class="modal-body">
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
=======
                                                    @php
                                                        $no++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
>>>>>>> 9ae5f2b49019a891ed9d1707298ae62bcddd5326

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Kriteria Penilaian --}}
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
                                <label for="create_perusahaan" class="form-label">Perusahaan Magang External</label>
                                <select class="form-control @error('create_perusahaan') is-invalid @enderror"
                                    id="create_perusahaan" name="create_perusahaan">
                                    <option value="">Pilih Perusahaan</option>
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
                                    class="form-control @error('create_kriteria') is-invalid @enderror"
                                    name="create_kriteria" placeholder="Nama kriteria penialian">
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
<<<<<<< HEAD
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
                <form action="{{ route('kriteria.penilaian.store', $id_magang_ext) }}" method="POST">
                    @csrf
                    <div class="modal-body">
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
=======
    </section>
>>>>>>> 9ae5f2b49019a891ed9d1707298ae62bcddd5326
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
