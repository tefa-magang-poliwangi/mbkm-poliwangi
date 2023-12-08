<!-- resources/views/pages/plmitra/layouts/laporan-mingguan/index.blade.php -->

@extends('layouts.base-admin')

@section('title')
    <title>Laporan Akhir Mahasiswa | MBKM Poliwangi</title>
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
                                <h5 class="justify-start my-auto text-theme">Laporan Mingguan Mahasiswa</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded" id="table-2">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">ID</th>
                                        <th class="text-center text-white">Keterangan</th>
                                        <th class="text-center text-white">Status Validasi</th>
                                        <th class="text-center text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporanMingguans as $laporan)
                                        <tr>
                                            <td>{{ $laporan->id }}</td>
                                            <td>{{ $laporan->keterangan }}</td>
                                            <td>
                                                @if ($laporan->validasi_pl)
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-warning">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('laporan-mingguan.show', $laporan->id) }}"
                                                    class="btn btn-info">Detail</a>
                                                <!-- Form for validation -->
                                                <form action="{{ route('laporan-mingguan.validate', $laporan->id) }}"
                                                    method="post" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Validate</button>
                                                </form>
                                            </td>
                                        </tr>
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
