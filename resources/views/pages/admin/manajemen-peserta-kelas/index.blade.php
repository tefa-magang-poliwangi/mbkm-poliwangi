@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Peserta Kelas | MBKM Poliwangi</title>
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
                                <h5 class="justify-start text-theme">Manajemen Peserta Kelas</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <a href="{{ route('manajemen.peserta.kelas.create', $id_kelas) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp; Tambah Peserta Kelas
                                </a>
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
                                                <th class="text-center text-white">Semester</th>
                                                <th class="text-center text-white">Angkatan</th>
                                                <th class="text-center text-white">Nama Prodi</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($peserta_kelas as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->nama }}</td>
                                                    <td class="text-center">{{ $data->kelas->periode->semester }}</td>
                                                    <td class="text-center">{{ $data->mahasiswa->angkatan }}</td>
                                                    <td>{{ $data->kelas->prodi->nama }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.peserta.kelas.destroy', [$id_kelas, $data->id]) }}"
                                                            class="btn btn-danger ml-auto"><i
                                                                class="fa-solid fa-trash"></i></a>
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
