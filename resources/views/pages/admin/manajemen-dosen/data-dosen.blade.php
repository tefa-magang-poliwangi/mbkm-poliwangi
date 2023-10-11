@extends('layouts.base-admin')

@section('title')
<title>Daftar Dosen | Politeknik Negeri Banyuwangi</title>
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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <h5 class="justify-start my-auto text-theme">Filter Prodi Dosen</h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#uploadModal"><i
                                    class="fa-solid fa-plus"></i> &ensp; Import</button>
                            <a href="{{ route('data.dosen.create') }}" class="btn btn-primary ml-2">
                                <i class="fa-solid fa-plus"></i> &ensp;
                                Tambah Dosen
                            </a>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog"
                        aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel">Unggah File Excel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk Unggah File Excel -->
                                    <form action="{{ route('data.dosen.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="excelFile">Pilih File Excel</label>
                                            <input type="file" class="form-control-file" id="excelFile"
                                                name="excelFile">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Unggah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Filter Prodi Dosen --}}
                    <div class="row">
                        <div class="col-12 col-sm-12 col-6 col-lg-4">
                            <div class="form-group">
                                <form action="{{ route('data.dosen.index') }}" method="GET">
                                    <select class="form-control select2" name="prodi" onchange="this.form.submit()">
                                        <option value="">Semua Prodi</option>
                                        @foreach ($prodi as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $request->prodi ? 'selected' :
                                            '' }}>
                                            {{ $item->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center text-white" class="text-center text-white">No</th>
                                            <th class="text-center text-white">Nama Dosen</th>
                                            <th class="text-center text-white">No. Telp</th>
                                            <th class="text-center text-white">Program Studi</th>
                                            <th class="text-center text-white">Ubah</th>
                                            <th class="text-center text-white">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($dosens as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->no_telp }}</td>
                                            <td>{{ $data->prodi->nama }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('data.dosen.edit', $data->id) }}"
                                                    class="btn btn-primary ml-auto">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('data.dosen.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
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