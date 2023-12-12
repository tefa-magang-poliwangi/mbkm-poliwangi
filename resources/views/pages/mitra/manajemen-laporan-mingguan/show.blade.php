@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Logbook Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">
                                    {{ $data['pelamarMagang']->mahasiswa->nama }} | {{ $data['pelamarMagang']->lowongan->nama }}
                                    
                                </h5>
                            </div>
                        </div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-white" width="10%">No</th>
                        <th class="text-center text-white">Tanggal Awal</th>
                        <th class="text-center text-white">Tanggal Akhir</th>
                        <th class="text-center text-white">Program Magang</th>
                        <th class="text-center text-white">Kompetensi Lowongan</th>
                        <th class="text-center text-white">Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['laporanMingguan'] as $key => $laporan)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $laporan->tgl_mingguan_awal }}</td>
                            <td class="text-center">{{ $laporan->tgl_mingguan_akhir }}</td>
                            <td class="text-center">{{ $laporan->program_magang->nama }}</td>
                            <td class="text-center">{{ $laporan->kompetensi_lowongan->nama }}</td>
                            <td class="text-center">{{ $laporan->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
