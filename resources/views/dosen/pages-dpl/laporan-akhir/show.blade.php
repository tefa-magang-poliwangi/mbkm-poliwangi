@extends('layouts.base-admin')

@section('title')
<title>Daftar Laporan Akhir Mahasiswa| MBKM Poliwangi</title>
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
                            <h5 class="justify-start my-auto text-theme">{{ $user->name }} - Laporan Akhir Mahasiswa
                            </h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" width="1%" class="text-white">No</th>
                                    <th scope="col" width="30%" class="text-white text-center">Laporan Akhir</th>
                                    <th scope="col" width="30%" class="text-white text-center">Lowongan</th>
                                    <th scope="col" width="30%" class="text-white text-center">Created</th>
                                    <th scope="col" width="30%" class="text-white text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach ($laporanAkhirs as $laporanAkhir)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td class="text-center mr-2">
                                        @if ($laporanAkhir->transkripMitra)
                                        {{ $laporanAkhir->transkripMitra->file_laporan_akhir }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $laporanAkhir->lowongan->nama }}</td>
                                    <td class="text-center">
                                        {{ $laporanAkhir->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                            data-target="#viewFileModal{{ $loop->iteration }}">
                                            <i class="fas fa-eye"></i> Lihat Laporan
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="viewFileModal{{ $loop->iteration }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewFileModalLabel{{ $loop->iteration }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="viewFileModalLabel{{ $loop->iteration }}">View File -
                                                            {{ $laporanAkhir->file }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe
                                                            src="{{ route('daftarlapakhir.showFile', $laporanAkhir->file) }}"
                                                            width="100%" height="600px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Add more columns if needed -->
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
@endsection