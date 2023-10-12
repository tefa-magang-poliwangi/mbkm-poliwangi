@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Daftar Pelamar | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="">
        <div class="row pt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Daftar Pelamar - Magang Internal</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white">Nama</th>
                                        <th class="text-white text-center">Nim</th>
                                        <th class="text-white text-center">Nama Perusahaan</th>
                                        <th class="text-white text-center">Berkas</th>
                                        <th class="text-white text-center">Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($daftar_pelamar as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nama }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                            <td class="text-center">{{ $data->lowongan->nama }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="#">Cek Kelengkapan</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-info ml-auto">
                                                    <i class="fa-solid fa-circle-check text-white"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger ml-auto">
                                                    <i class="fa-solid fa-circle-xmark"></i>
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
@endsection
