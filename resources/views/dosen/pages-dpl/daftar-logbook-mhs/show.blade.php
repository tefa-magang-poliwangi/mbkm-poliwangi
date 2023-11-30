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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <h5 class="justify-start my-auto text-theme">{{ $user->name }} - Logbook</h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" width="1%" class="text-white">No</th>
                                    <th scope="col" class="text-white">Tanggal</th>
                                    <th scope="col" class="text-white">Kegiatan</th>
                                    <th scope="col" class="text-white">Bukti</th>
                                    <th scope="col" class="text-white">Komentar</th>
                                    <th scope="col" class="text-white">Edit Komentar</th>
                                </tr>
                            </thead>
                            @php
                            $no = 1;
                            @endphp

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach ($logbooks as $logbook)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $logbook->created_at->format('d F Y') }}</td>
                                    <td class="text-truncate" style="max-width: 150px;">{{ $logbook->kegiatan }}</td>
                                    <td>
                                        @if($logbook->bukti)
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#viewBuktiModal{{ $loop->iteration }}">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="viewBuktiModal{{ $loop->iteration }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewBuktiModalLabel{{ $loop->iteration }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="viewBuktiModalLabel{{ $loop->iteration }}">Lihat Bukti
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('path/to/bukti/' . $logbook->bukti) }}"
                                                            class="img-fluid" alt="Bukti Logbook">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        -
                                        @endif
                                    </td>

                                    <td class="text-truncate" style="max-width: 150px;">
                                        {{ $logbook->komentar ? $logbook->komentar->komentar : '-' }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#komentarModal{{ $logbook->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
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
</section>

@foreach ($logbooks as $logbook)
<!-- Modal untuk komentar -->
<div class="modal fade" id="komentarModal{{ $logbook->id }}" tabindex="-1" role="dialog"
    aria-labelledby="komentarModalLabel{{ $logbook->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komentarModalLabel{{ $logbook->id }}">Tambah Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ $logbook->komentar ? $logbook->komentar->komentar : '-' }}</p>
                <!-- Form komentar -->
                <form action="{{ route('dosen-pembimbing.Komentar.Update', ['id' => $logbook->komentar->id]) }}"
                    method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="komentar">Komentar:</label>
                        <textarea class="form-control" id="komentar" name="komentar"
                            rows="3">{{ $logbook->komentar ? $logbook->komentar->komentar : '-' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan Komentar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')
{{-- Datata

ble JS --}}
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection