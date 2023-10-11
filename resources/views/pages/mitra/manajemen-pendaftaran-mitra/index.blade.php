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
            <strong class="h3">Data Mitra</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-4">
                            <h4 class="fw-bold">Program Studi</h4>
                        </div>
                        <div class="col-8 d-flex">
                            <div class="ml-auto">
                                {{-- <button class="btn btn-theme-four">Kembali</button> --}}
                                <a href="{{ route('formulir.mitra.create') }}" class="btn btn-theme fa-plus">Tambah</a>
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
                                        <th>Nama Perusahaan</th>
                                        <th>Sektor Industri</th>
                                        <th>Kategori</th>
                                        <th>Kota</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formmitra as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->sektor_industri->nama }}</td>
                                            <td>{{ $data->kategori->nama }}</td>
                                            <td>{{ $data->kota }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                <a href="{{ route('formulir.mitra.edit', $data->id) }}"
                                                    class="btn btn-info ml-auto"><i class="fa-solid fa-pen"></i></a>
                                                <a href="{{ route('formulir.mitra.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fas fa-trash"></i></a>
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
