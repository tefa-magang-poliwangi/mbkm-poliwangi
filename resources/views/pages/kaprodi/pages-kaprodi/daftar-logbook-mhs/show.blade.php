@extends('layouts.base-admin')

@section('title')
    <title>Lihat Logbook Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Mahasiswa Dosen Pembimbing Lapang

                                </h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">NIM</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white">Pendamping Lapang</th>
                                        <th class="text-center text-white">Perusahaan Magang</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pendamping_lapang as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $item->pelamar_magang->mahasiswa->nim }}</td>
                                            <td class="text-center">{{ $item->pelamar_magang->mahasiswa->nama }}</td>
                                            <td class="text-center">
                                                @if (!empty($item->id_pl_mitra))
                                                    {{ $item->pl_mitra->nama }} {{-- Ganti 'nama' sesuai dengan kolom yang sesuai --}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $item->pelamar_magang->lowongan->nama }} -
                                                {{ $item->pelamar_magang->lowongan->mitra->nama }}</td>
                                            <td class="text-center"> <a
                                                    href="{{ route('kaprodi.logbookmhs.PageFile', $item->pelamar_magang->id) }}"
                                                    class="btn btn-info">
                                                    <i class="fa-solid fa-eye"></i> Show
                                                </a></td>
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
