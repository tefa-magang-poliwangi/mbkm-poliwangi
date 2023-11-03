@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Program Magang | MBKM Poliwangi</title>
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
    <div class="container-fluid" style="padding-top: 5%">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Program Magang - {{$lowongan->nama}}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ Route('manajemen.program.magang.create', $id_lowongan) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Program Magang
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
                                        <th class="text-center text-white">Kegiatan Perusahaan</th>
                                        <th class="text-center text-white">Waktu Mulai</th>
                                        <th class="text-center text-white">Waktu Akhir</th>
                                        <th class="text-center text-white">Posisi Mahasiswa</th>
                                        <th class="text-center text-white">Pendamping Lapang</th>
                                        <th class="text-center text-white" width="15%">Status</th>
                                        <th class="text-center text-white" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($programmagang as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->kegiatan }}</td>
                                            <td class="text-center">{{ dateConversion($data->waktu_mulai) }}</td>
                                            <td class="text-center">{{ dateConversion($data->waktu_akhir) }}</td>
                                            <td class="text-center">{{ $data->posisi_mahasiswa }}</td>
                                            <td class="text-center">{{ $data->pl_mitra->nama }}</td>
                                            <td class="text-center">
                                                @if ($data->validasi_kaprodi == 'Belum Disetujui')
                                                    <div class="btn btn-warning">
                                                        Blm Disetujui
                                                    </div>
                                                @elseif($data->validasi_kaprodi == 'Tidak Setuju')
                                                    <div class="btn btn-danger">
                                                        Tidak Setuju
                                                    </div>
                                                @elseif($data->validasi_kaprodi == 'Setuju')
                                                    <div class="btn btn-success">
                                                        Disetujui
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('manajemen.program.magang.edit', [$id_lowongan, $data->id]) }}"
                                                    class="btn btn-info ml-auto">
                                                    <i class="fa-solid fa-pen text-white"></i>
                                                </a>
                                                <a href="{{ route('manajemen.program.magang.destroy', $data->id) }}"
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
