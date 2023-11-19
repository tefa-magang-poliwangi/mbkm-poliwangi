@extends('layouts.base-admin')

@section('title')
    <title>Tambah Mahasiswa | MBKM Poliwangi</title>
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
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-2">
                                <h5 class="justify-start text-theme">Tambah Mahasiswa</h5>
                            </div>
                        </div>

                        {{-- Form Checklist Peserta Dosen --}}
                        <form action="{{ route('manajemen.pelamar.magang.store', $id_dosen_pl) }}" method="POST">

                            @csrf

                            @error('mahasiswas')
                                <div id="berkas" class="text-danger py-1">
                                    *pilih minimal satu Mahasiswa
                                </div>
                            @else
                                <small>(Mohon Pilih Minimal Satu Mahasiswa)</small>
                            @enderror

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center text-white">#</th>
                                                    <th class="text-center text-white">NIM</th>
                                                    <th class="text-center text-white">Nama</th>
                                                    <th class="text-center text-white">Nama Prodi</th>
                                                    <th class="text-center text-white">Perusahaan Magang</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp

                                                @foreach ($pelamar_magang as $data)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="mahasiswas[]" id="{{ $data->id }}"
                                                                value="{{ $data->id }}">
                                                        </td>
                                                        <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                                        <td class="text-center">{{ $data->mahasiswa->nama }}</td>
                                                        <td class="text-center">{{ $data->mahasiswa->prodi->nama }}</td>
                                                        <td class="text-center">{{ $data->lowongan->nama }} -
                                                            {{ $data->lowongan->mitra->nama }}</td>
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

                            <div class="row d-flex justify-content-start mt-3">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <button type="submit" class="btn btn-primary mr-auto my-auto">
                                        Tambah
                                    </button>
                                    <a href="{{ route('manajemen.dosen.pl.show', $id_dosen_pl) }}"
                                        class="btn btn-cancel">Back</a>
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
