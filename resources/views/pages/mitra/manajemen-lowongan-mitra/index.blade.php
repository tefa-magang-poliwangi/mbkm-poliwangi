@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Lowongan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@php
    function dateConversion($date)
    {
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
    }
@endphp

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Lowongan</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('manajemen.lowongan.mitra.create') }}" class="btn btn-primary ml-auto">
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
                                        <th class="text-center text-white">Program Magang</th>
                                        <th class="text-center text-white">Berkas Lowongan</th>
                                        <th class="text-center text-white">Status</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($lowongans as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->jumlah_lowongan }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.program.magang.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.berkas-lowongan.mitra.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-primary text-white">{{ $data->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ Route('manajemen.lowongan.mitra.edit', $data->id) }}"
                                                    class="btn btn-info ml-auto"><i
                                                        class="fa-solid fa-pen text-white"></i></a>
                                                <a href="{{ Route('manajemen.lowongan.mitra.destroy', $data->id) }}"
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
