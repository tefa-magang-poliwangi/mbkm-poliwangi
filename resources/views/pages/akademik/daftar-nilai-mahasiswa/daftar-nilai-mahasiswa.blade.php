@extends('layouts.base-admin')

@section('title')
    <title>Daftar Nilai Transkrip Mahasiswa | MBKM Poliwangi</title>
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
                        <form method="POST" action="https://sit.poliwangi.ac.id/api/v1/nilai-mahasiswa">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                    <h5 class="justify-start text-theme">Daftar Nilai Transkrip Mahasiswa</h5>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                    <button class="btn btn-primary ml-auto " type="submit">
                                        <i class="fa-solid fa-rotate"></i> &ensp; Sinkron Ke SIT
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <input type="hidden" value="{{ $nrp }}" name="data[nim]">
                                        <input type="hidden" value="{{ $periode_aktif->tahun }}" name="data[tahun]">
                                        <input type="hidden" value="{{ $semester }}" name="data[sem]">

                                        <table class="table table-striped" id="table-1">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-center text-white">No</th>
                                                    <th class="text-center text-white">Kode</th>
                                                    <th class="text-center text-white">Nama Matakuliah</th>
                                                    <th class="text-center text-white">Nilai Angka</th>
                                                    <th class="text-center text-white">Nilai Huruf</th>
                                                    <th class="text-center text-white">Angka Mutu</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp

                                                @foreach ($nilai_transkrip as $data)
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $data->matkul->kode_matakuliah }}<input
                                                                type="hidden" value="{{ $data->matkul->kode_matakuliah }}"
                                                                name="data[kode_matkul]"></td>
                                                        <td class="text-center">{{ $data->matkul->nama }}</td>
                                                        <td class="text-center">{{ $data->nilai_angka }}<input
                                                                type="hidden" value="{{ $data->nilai_angka }}"
                                                                name="data[na]"></td>
                                                        <td class="text-center">{{ $data->nilai_huruf }}</td>
                                                        <td class="text-center">{{ $data->angka_mutu }}</td>

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
                        </form>
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
