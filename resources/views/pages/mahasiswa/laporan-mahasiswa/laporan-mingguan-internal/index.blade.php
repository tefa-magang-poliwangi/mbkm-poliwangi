@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid row pt-5">
        <div class="row">
            <div class="col-sm-12">
                {{-- <div class="card rounded mb-3">
                    <div class="banner bg-primary text-white text-center rounded-top">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/visa.png') }}" class="mt-4 card-img-top" alt="...">
                        <h6 class="card-title"></h6>
                        <div class="card-text">
                            <small class="text-muted">18 Mar 2023 - 30 Jul 2023</small><br>
                            <div class="mt-2">
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Semua laporan mingguan sudah diterima</span>
                                <br>
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Laporan akhir sudah diunggah</span>
                            </div>
                            <h6 class="mt-4">Periode Kegiatan</h6>
                            <p class="text-muted">Kamu akan mengikuti kegiatan mulai tanggal 18 Maret - 30 Juli 2023</p>
                        </div>
                    </div>
                </div> --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            {{-- <div class="mt-2" style="color: orange;">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <a>Belum Dibuat</a>
                            </div> --}}
                            <div>
                                <h6 class="mt-3">Laporan Mingguan</h6>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('mahasiswa.laporan.mingguan.create') }}">
                                    <button class="btn btn-primary mt-2 text">
                                        Buat Laporan Mingguan
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <h6>List Laporan Mingguan " Mahasiswa "</h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center text-white" width="10%">No</th>
                                            <th class="text-center text-white">Tanggal Awal</th>
                                            <th class="text-center text-white">Tanggal Akhir</th>
                                            <th class="text-center text-white">Kegitan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporanMingguans as $laporan)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($laporan->tgl_mingguan_awal)->format('d-M-Y') ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($laporan->tgl_mingguan_akhir)->format('d-M-Y') ?? '-' }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($laporan->keterangan)
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $loop->index + 1 }}">
                                                            <i class="fa-solid fa-eye text-white"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($laporanMingguans->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-center">Laporan Mingguan Belum di buat.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($laporanMingguans as $index => $laporan)
        <div class="modal fade" tabindex="-1" role="dialog" id="updateModal{{ $index + 1 }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Kegiatan Laporan Mingguan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $laporan->keterangan }}</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
