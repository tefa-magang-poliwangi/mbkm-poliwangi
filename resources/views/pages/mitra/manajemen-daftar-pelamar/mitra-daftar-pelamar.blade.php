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
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Pelamar Magang</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('manajemen.pelamar.mitra.diterima') }}"
                                    class="btn btn-primary btn-sm ml-auto px-2 py-1">
                                    Daftar Pelamar Disetujui
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
                                        <th class="text-white text-center">Nama</th>
                                        <th class="text-white text-center">Nim</th>
                                        <th class="text-white text-center">Nama Lowongan</th>
                                        <th class="text-white text-center">Berkas</th>
                                        <th class="text-white text-center">Terima</th>
                                        <th class="text-white text-center">Tolak</th>
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
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('manajemen.pelamar.mitra.show', $data->id) }}">
                                                    Cek Kelengkapan
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                {{-- accept button --}}
                                                <form action="{{ route('manajemen.pelamar.mitra.accept', $data->id) }}"
                                                    method="POST">
                                                    @method('put')
                                                    @csrf

                                                    <button type="submit" class="btn btn-info ml-auto"
                                                        title="Terima Permohonan">
                                                        <i class="fa-solid fa-circle-check text-white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                {{-- decline button --}}
                                                <a type="button"
                                                    href="{{ route('manajemen.pelamar.mitra.decline', $data->id) }}"
                                                    class="btn btn btn-danger ml-auto"
                                                    title="Tolak dan Hapus Berkas Permohonan">
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
