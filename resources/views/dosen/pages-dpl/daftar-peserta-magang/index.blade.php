@extends('layouts.base-admin')

@section('title')
<title>Daftar Peserta Magang| MBKM Poliwangi</title>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <h5 class="justify-start my-auto text-theme">Daftar Peserta Magang</h5>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="float-right">
                        <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                            data-target="#modalPesertaTidakDiterima">
                            Peserta Tidak Diterima
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" width="1%" class="text-white ">No</th>
                                    <th scope="col" width="20%" class="text-white text-center">Nama Mahasiswa</th>
                                    <th scope="col" width="20%" class="text-white text-center">Status</th>
                                    <th scope="col" width="20%" class="text-white text-center">Lowongan</th>
                                    <th scope="col" width="20%" class="text-white text-center">Dosen PL</th>
                                    <th scope="col" width="20%" class="text-white text-center">Dosen PL</th>
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
                                    <td>{{ $pelamarMagang->mahasiswa->nama }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success">{{ $pelamarMagang->status_diterima }}</span>
                                    </td>
                                    <td>{{ $pelamarMagang->lowongan->nama }}</td>
                                    <td>
                                        {{ $pelamarMagang->pendampingLapangMahasiswa->dosen_pl->dosen->nama }}
                                    </td>
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


<!-- Modal Peserta Tidak Diterima -->
<div class="modal fade" id="modalPesertaTidakDiterima" tabindex="-1" role="dialog"
    aria-labelledby="modalPesertaTidakDiterimaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPesertaTidakDiterimaLabel">Peserta Tidak Diterima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover w-100">
                        <thead class="thead-dark bg-primary">
                            <tr>
                                <th scope="col" class="text-white">No</th>
                                <th scope="col" class="text-white">Nama Mahasiswa</th>
                                <th scope="col" class="text-white">Status</th>
                                <th scope="col" class="text-white">Lowongan</th>
                                <th scope="col" class="text-white">Dosen PL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelamarMagangsTidakAktif as $pelamarMagang)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pelamarMagang->mahasiswa->nama }}</td>
                                <td>
                                    <span class="badge badge-danger">{{ $pelamarMagang->status_diterima }}</span>
                                </td>
                                <td>{{ $pelamarMagang->lowongan->nama }}</td>
                                <td>{{ $pelamarMagang->pendampingLapangMahasiswa->dosen_pl->dosen->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- Tambahan tombol lainnya jika diperlukan -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- Datatable JS --}}
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src
="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection