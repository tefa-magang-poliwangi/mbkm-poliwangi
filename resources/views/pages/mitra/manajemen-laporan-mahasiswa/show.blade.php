@extends('layouts.base-admin')

@section('title')
<title>Manajemen Logbook Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 col-sm-6">
                                    <h5 class="text-theme">
                                        {{ $pelamar_magang->mahasiswa->nama }} | {{ $pelamar_magang->lowongan->nama }}
                                    </h5>
                                </div>
                            </div>

                            <!-- Menampilkan tabel logbooks -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless rounded" id="table-1">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-center text-white">No</th>
                                                    <th class="text-center text-white">Tanggal</th>
                                                    <th class="text-center text-white">Kegiatan</th>
                                                    <th class="text-center text-white">Bukti</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                    @foreach ($logbook as $data)
                                                    <tr>
                                                        <td class="text-center">{{$no}}</td>
                                                        <td class="text-center">{{$data->tanggal}}</td>
                                                        <td class="text-center">{{$data->kegiatan}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('manajemen.mitra.logbook.showdetail', $data->id) }}"
                                                                class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></button>
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
