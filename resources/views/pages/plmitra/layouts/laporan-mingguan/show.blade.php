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
    <div class="container">
        <h1>Detail Laporan Mingguan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Keterangan</h5>
                <p class="card-text">{{ $laporanMingguan->keterangan }}</p>

                <h5 class="card-title">Status Aktif</h5>
                <p class="card-text">{{ $laporanMingguan->aktif ? 'Aktif' : 'Tidak Aktif' }}</p>

                <h5 class="card-title">ID Program Magang</h5>
                <p class="card-text">{{ $laporanMingguan->id_program_magang }}</p>

                <h5 class="card-title">ID Kompetensi Lowongan</h5>
                <p class="card-text">{{ $laporanMingguan->id_kompetensi_lowongan }}</p>

                {{-- Tambahkan informasi lain yang ingin ditampilkan --}}
            </div>
        </div>

        <a href="{{ route('pages.plmitra.layouts.laporan-mingguan.index') }}" class="btn btn-primary mt-3">Kembali</a>
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
