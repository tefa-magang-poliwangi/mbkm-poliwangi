@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Program Magang | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 5%">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Berkas Lowongan - {{$lowongan->nama}}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ Route('manajemen.berkas-lowongan.mitra.create', $id_lowongan) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Berkas Lowongan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Berkas</th>
                                        <th class="text-center text-white" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($berkaslowongan as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->berkas->nama}}</td>
                                            <td>
                                                {{-- <a href="{{ route('manajemen.berkas-lowongan.mitra.edit', [$id_lowongan, $data->id]) }}"
                                                    class="btn btn-info ml-auto">
                                                    <i class="fa-solid fa-pen text-white"></i>
                                                </a> --}}
                                                <a href="{{ route('manajemen.berkas-lowongan.mitra.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto">
                                                    <i class="fas fa-trash"></i>
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
