@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Nilai Huruf | MBKM Poliwangi</title>
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
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start my-auto text-theme">Manajemen Profil Nilai Huruf</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Profil Nilai Huruf
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Nama</th>
                                                <th class="text-center text-white">Status</th>
                                                <th class="text-center text-white">Tahun</th>
                                                <th class="text-center text-white">Semester</th>
                                                <th class="text-center text-white" width="15%">Aksi</th>
                                                <th class="text-center text-white" width="15%">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($profil_nilai_huruf as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->status }}</td>
                                                    <td class="text-center">{{ $data->periode->semester }}</td>
                                                    <td class="text-center">{{ $data->periode->tahun }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.detail.nilai.huruf.show', $data->id) }}"
                                                            class="btn btn-primary ml-auto" title="Lihat Acuan Nilai">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center" width="15%">
                                                        @if ($data->status == 'Aktif')
                                                            <a href="{{ route('manajemen.nilai.huruf.update', $data->id) }}"
                                                                class="btn btn-danger ml-auto" title="Matikan">
                                                                <i class="fa-solid fa-ban"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('manajemen.nilai.huruf.update', $data->id) }}"
                                                                class="btn btn-success ml-auto" title="Hidupkan">
                                                                <i class="fa-regular fa-circle-check"></i>
                                                            </a>
                                                        @endif
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

                        {{-- Modal Tambah Profil Nilai Huruf Baru --}}
                        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Profil Nilai Huruf Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('manajemen.nilai.huruf.store') }}" method="POST">
                                        @csrf

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-label" for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama"
                                                    class="form-control  @error('nama') is-invalid @enderror"
                                                    placeholder="Nama profil">
                                                @error('nama')
                                                    <div id="nama" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="status">Status</label>
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                                @error('status')
                                                    <div id="status" class="form-text">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="periode">Periode</label>
                                                <select class="form-control @error('periode') is-invalid @enderror"
                                                    id="periode" name="periode">
                                                    <option value="">Pilih Periode</option>
                                                    @foreach ($periodes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->semester }} -
                                                            {{ $item->tahun }} ({{ $item->status }})</option>
                                                    @endforeach
                                                </select>
                                                @error('periode')
                                                    <div id="periode" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-around">
                                                <div class="ml-auto">
                                                    <button type="button" class="btn btn-cancel"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
