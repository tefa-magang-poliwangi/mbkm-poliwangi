@extends('layouts.base-admin')

@section('title')
<title>Ketercapaian CPL | MBKM Poliwangi</title>
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
                            <h5 class="justify-start my-auto text-theme">Ketercapaian CPL Mahasiswa
                            </h5>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" width="1%" class="text-white">No</th>
                                    <th scope="col" width="20%" class="text-white">Kegiatan</th>
                                    <th scope="col" width="20%" class="text-white text-center">Ketercapaian CPL</th>
                                    <th scope="col" width="20%" class="text-white text-center">Select CPL</th>
                                </tr>
                            </thead>
                            @php
                            $no = 1;
                            @endphp

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($logbooks as $logbook)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td class="text-truncate" style="max-width: 150px;">{{ $logbook->kegiatan }}</td>
                                    <td class="text-center">
                                        @foreach ($logbook->cpls as $cpl)
                                        {{ $cpl->kode_cpl }} - {{ $cpl->jenis_cpl }}<br>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#pilihCPLModal{{ $logbook->id }}">
                                            Update CPL
                                        </button>
                                        <input type="hidden" name="logbook_id" value="{{ $logbook->id }}">
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

<!-- Modal Bootstrap untuk setiap logbook -->
@foreach($logbooks as $logbook)
<div class="modal fade" id="pilihCPLModal{{ $logbook->id }}" tabindex="-1" role="dialog"
    aria-labelledby="pilihCPLModalLabel{{ $logbook->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihCPLModalLabel{{ $logbook->id }}">Ketercapaian CPL Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add a form element for data submission -->
                <form action="{{ route('daftarcpl.update', ['id' => $logbook->id]) }}" method="POST">
                    @csrf
                    <div class="list-group">
                        @foreach ($cpls as $cpl)
                        <div class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cpl_ids[]" value="{{ $cpl->id }}"
                                    id="cpl{{ $cpl->id }}"
                                    {{ in_array($cpl->id, $logbook->cpls->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="cpl{{ $cpl->id }}">
                                    {{ $cpl->kode_cpl }} - {{ $cpl->jenis_cpl }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- Change the button type to submit the form -->
                        <button type="submit" class="btn btn-primary">Simpan Pilihan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach


@endsection



@section('script')
{{-- Datatable JS --}}
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection