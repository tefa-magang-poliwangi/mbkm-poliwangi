@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Program Magang | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
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
                                <h5 class="justify-start my-auto text-theme">Daftar Laporan Akhir Mahasiswa</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded" id="table-2">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Nama Mahasiswa</th>
                                        <th class="text-center text-white">Tanggal Submit</th>
                                        <th class="text-center text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($transkripMitras as $index => $transkripMitra)
                                        <tr>
                                            <td class="text-center text-white">{{ $index + 1 }}</td>
                                            <td class="text-center text-white">
                                                {{ $transkripMitra->pelamar_magang->nama_mahasiswa }}</td>
                                            <td class="text-center text-white">
                                                {{ $transkripMitra->created_at->format('Y-m-d') }}</td>
                                            <td class="text-center text-white">
                                                <a href="{{ route('laporan-akhir.show', $transkripMitra->id) }}"
                                                    class="btn btn-primary">Detail</a>
                                                {{-- Tambahkan tindakan lain jika diperlukan --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    @php
                                        $no++;
                                    @endphp
                                </tbody>
                            </table>
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
