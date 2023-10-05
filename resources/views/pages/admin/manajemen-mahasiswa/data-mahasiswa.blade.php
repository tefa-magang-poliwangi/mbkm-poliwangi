@extends('layouts.base-admin')

@section('title')
    <title>Daftar Mahasiswa | MBKM Poliwangi</title>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Filter Prodi Mahasiswa</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('data.mahasiswa.create') }}" class="btn btn-primary ml-auto"
                                    data-toggle="modal" data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Mahasiswa</a>
                            </div>
                        </div>

                        {{-- Filter Mahasiswa --}}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-6 col-lg-4">
                                <div class="form-group">
                                    <form action="{{ route('data.mahasiswa.index') }}" method="GET">
                                        <select class="form-control select2" name="prodi" onchange="this.form.submit()">
                                            <option value="">Semua Prodi</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Prodi</th>
                                                <th>Angkatan</th>
                                                <th>Email</th>
                                                <th>No.Telp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($mahasiswas as $data)
                                                <tr>
                                                    {{--  --}}
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>{{ $data->nim }}</td>
                                                    <td>
                                                        {{ $data->nama }}
                                                    </td>
                                                    <td>
                                                        {{ $data->prodi->nama }}
                                                    </td>
                                                    <td>
                                                        {{ $data->angkatan }}
                                                    </td>
                                                    <td>
                                                        {{ $data->email }}
                                                    </td>
                                                    <td>
                                                        {{ $data->no_telp }}
                                                    </td>
                                                    <td>
                                                        <a href="#"> <i
                                                                class="fa-solid fas fa-edit text-dark"></i></a>
                                                        <a href="#"> <i
                                                                class="fa-solid fas fa-trash text-dark"></i></a>
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
@endsection
