@extends('layouts.base-admin')

@section('title')
<title>Daftar Konversi CPL Mahasiswa| MBKM Poliwangi</title>
@endsection

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section>
    <div class="row pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <h5 class="justify-start my-auto text-theme">Daftar Ketercapaian CPL Mahasiswa</h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" width="1%" class="text-white ">No</th>
                                    <th scope="col" width="20%" class="text-white text-center">NIM</th>
                                    <th scope="col" width="20%" class="text-white text-center">Nama Mahasiswa</th>
                                    <th scope="col" width="20%" class="text-white text-center">Lowongan</th>
                                    <th scope="col" width="20%" class="text-white text-center">Dosen PL</th>
                                    <th scope="col" width="20%" class="text-white text-center">Lihat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($pelamarMagangs as $pelamarMagang)
                                @if ($pelamarMagang->status_diterima == 'Aktif')
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $pelamarMagang->mahasiswa->nim }}</td>
                                    <td>{{ $pelamarMagang->mahasiswa->nama }}</td>
                                    <td>{{ $pelamarMagang->lowongan->nama }}</td>
                                    <td>
                                        {{ $pelamarMagang->nama_dosen }}
                                    </td>
                                    <td class="text-center"><a href="{{ route('daftarcpl.edit', $pelamarMagang->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye mr-2"></i>View</a></td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endif
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