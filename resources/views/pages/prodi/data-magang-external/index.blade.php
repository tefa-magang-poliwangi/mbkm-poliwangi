@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Magang External | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start my-auto">Manajemen Magang External</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal"
                                    data-target="#tambahdataMagangext"><i class="fa-solid fa-plus"></i> &ensp; Tambah Magang
                                    Ext</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body  py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white">Periode</th>
                                        <th class="text-center text-white">Kriteria Penilaian</th>
                                        <th class="text-center text-white">Lihat Peserta</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($magang_ext as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td class="text-center">Semester {{ $data->periode->semester }}
                                                ({{ $data->periode->tahun }})
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('manajemen.kriteria.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></button>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('manajemen.peserta.magang.ext.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></a>
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateMagangext{{ $data->id }}"><i
                                                        class="fa-solid fa-pen text-white"></i></button>
                                                <a href="{{ route('manajemen.magang.ext.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        {{-- modall update --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateMagangext{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-theme">Tambah Data Magang External</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('manajemen.magang.ext.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_name">Nama</label>
                                                                <input type="text"
                                                                    class="form-control @error('update_name') is-invalid @enderror"
                                                                    id="update_name" name="update_name"
                                                                    value="{{ $data->name }}"
                                                                    placeholder="Masukkan Nama Tempat Magang External">
                                                                @error('update_name')
                                                                    <div id="update_name" class="form-text text-danger pb-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="update_id_periode">Periode</label>
                                                                <select
                                                                    class="form-control @error('update_id_periode') is-invalid @enderror"
                                                                    id="update_id_periode" name="update_id_periode">
                                                                    <option value="">Pilih Periode</option>
                                                                    @foreach ($periodes as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == $data->id_periode ? 'selected' : '' }}>
                                                                            {{ $item->semester % 2 ? 'Semester Genap' : 'Semester Ganjil' }}
                                                                            ({{ $item->tahun }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('update_id_periode')
                                                                    <div id="update_id_periode" class="form-text text-danger">
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

        {{-- modal create --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="tambahdataMagangext">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Magang External</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.magang.ext.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_name">Nama</label>
                                <input type="text" class="form-control @error('create_name') is-invalid @enderror"
                                    id="create_name" name="create_name"
                                    placeholder="Masukkan Data Tempat Magang External">
                                @error('create_name')
                                    <div id="create_name" class="form-text text-danger pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="create_id_periode">Periode</label>
                                <select class="form-control @error('create_id_periode') is-invalid @enderror"
                                    id="create_id_periode" name="create_id_periode">
                                    <option value="">Pilih Periode</option>
                                    @foreach ($periodes as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->semester % 2 ? 'Semester Genap' : 'Semester Ganjil' }}
                                            ({{ $item->tahun }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('create_id_periode')
                                    <div id="create_id_periode" class="form-text text-danger">{{ $message }}</div>
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
