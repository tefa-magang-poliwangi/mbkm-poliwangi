@extends('layouts.base-admin')

@section('title')
    <title>Cek Kelengkapan Berkas | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="pt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-title">
                        <h5 class="my-auto ml-4 mt-4 text-theme">Detail Permohonan Magang</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="my-auto ml-4 mt-1 text-theme">Data Pemohon</h5>
                            <table class="table table-borderless table-hover">
                                <tr>
                                    <td scope="row">Nama</td>
                                    <td scope="row">{{ $pelamar_magang->mahasiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Mitra</td>
                                    <td scope="row">{{ $pelamar_magang->lowongan->mitra->nama }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Lowongan</td>
                                    <td scope="row">{{ $pelamar_magang->lowongan->nama }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Status</td>
                                    <td scope="row">{{ $pelamar_magang->status_diterima }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <h5 class="my-auto ml-4 mt-1 text-theme">Daftar berkas</h5>
                            <table class="table table-borderless table-hover">
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($berkas_lowongan as $item)
                                    <tr>
                                        <td class="text-center" scope="row">{{ $no }}</td>
                                        <td>{{ $item->berkas->nama }}</td>
                                        <td class="text-center">
                                            @if ($all_berkas->contains('id', $item->berkas->id))
                                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                                            @else
                                                <i class="fa-solid fa-circle-check text-success"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            @php
                                $count = 1;
                            @endphp

                            @foreach ($all_berkas as $item)
                                @if ($count == 1)
                                    {{-- Card file pertama --}}
                                    <div class="accordion">
                                        <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                            data-target="#panel-body-{{ $count }}" aria-expanded="true">
                                            <h4>{{ $item->berkas->nama }}</h4>
                                        </div>
                                        <div class="accordion-body collapse show" id="panel-body-{{ $count }}"
                                            data-parent="#accordion">
                                            <iframe src="{{ Storage::url($item->file) }}" width="100%"
                                                height="700px"></iframe>
                                        </div>
                                    </div>
                                @else
                                    {{-- Card file kedua dst --}}
                                    <div class="accordion">
                                        <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                            data-target="#panel-body-{{ $count }}">
                                            <h4>{{ $item->berkas->nama }}</h4>
                                        </div>
                                        <div class="accordion-body collapse" id="panel-body-{{ $count }}"
                                            data-parent="#accordion">
                                            <iframe src="{{ Storage::url($item->file) }}" width="100%"
                                                height="700px"></iframe>
                                        </div>
                                    </div>
                                @endif

                                @php
                                    $count++;
                                @endphp
                            @endforeach
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
