@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Peserta Magang External | MBKM Poliwangi</title>
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
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start text-theme">Manajemen Peserta {{ $magang_ext->name }}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <div class="ml-auto">
                                    {{-- Button Import Peserta Magang External --}}
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#importDataUserDosen" title="Impot Peserta Magang External">
                                        <i class="fa-solid fa-upload"></i>
                                    </button>

                                    <a href="{{ route('manajemen.peserta.magang.ext.create', $id_magang_ext) }}"
                                        class="btn btn-primary ml-auto">
                                        <i class="fa-solid fa-plus"></i> &ensp; Tambah Peserta
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Import Peserta Magang External -->
                        <div class="modal fade" id="importDataUserDosen" tabindex="-1" role="dialog"
                            aria-labelledby="uploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-theme" id="uploadModalLabel">Import Peserta Magang
                                            External</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk Unggah File Excel -->
                                        <form action="{{ route('import.data.peserta.km') }}" method="POST"
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
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Nim</th>
                                                <th class="text-center text-white">Nama</th>
                                                <th class="text-center text-white">Angkatan</th>
                                                <th class="text-center text-white">Nama Prodi</th>
                                                <th class="text-center text-white">Lihat Nilai</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($peserta_magang_ext as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->nama }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->angkatan }}</td>
                                                    <td>{{ $data->mahasiswa->prodi->nama }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('daftar.nilai.kriteria.mahasiswa.show', $data->mahasiswa->id) }}"
                                                            class="btn btn-primary ml-auto">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.peserta.magang.ext.destroy', [$id_magang_ext, $data->id]) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
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
