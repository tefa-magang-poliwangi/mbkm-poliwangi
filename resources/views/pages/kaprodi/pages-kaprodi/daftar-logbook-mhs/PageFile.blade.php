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
                                            <td>{{ $logbook->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $logbook->kegiatan }}</td>
                                            <td>
                                                @if ($logbook->bukti)
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#buktiModal{{ $logbook->id }}">
                                                        Lihat Bukti
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="buktiModal{{ $logbook->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti
                                                                        Logbook</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Display the image or content here -->
                                                                    <img src="{{ asset('path/to/bukti/' . $logbook->bukti) }}"
                                                                        alt="Bukti Logbook">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-truncate" style="max-width:150px">
                                                {{ $logbook->komentar ? $logbook->komentar->komentar : '-' }}
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
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
