@extends('layouts.base-admin')
@section('title')
    <title>Tambah Lowongan | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Lowongan</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('data.lowongan-mitra.create') }}" class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Lowongan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white">Jumlah Lowongan</th>
                                        <th class="text-center text-white">Tanggal Buka</th>
                                        <th class="text-center text-white">Tanggal Tutup</th>
                                        <th class="text-center text-white">Tanggal Magang Dimulai</th>
                                        <th class="text-center text-white">Tanggal Magang Berakhir</th>
                                        <th class="text-center text-white">Status</th>
                                        <th class="text-center text-white">Deskripsi</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowongan as $data)
                                        <tr>
                                            <td class="text-center text-white">{{ $no }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->jumlah_lowongan }}</td>
                                            <td>{{ $data->tanggal_dibuka }}</td>
                                            <td>{{ $data->tanggal_ditutup }}</td>
                                            <td>{{ $data->tanggal_magang_dimulai }}</td>
                                            <td>{{ $data->tanggal_magang_berakhir }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info ml-auto"><i
                                                        class="fa-solid fa-pen"></i></a>
                                                <a href="#" class="btn btn-danger ml-auto"><i
                                                        class="fas fa-trash"></i></a>
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
