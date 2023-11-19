@extends('layouts.base-admin')

@section('title')
    <title>
        Manajemen Plotting Mitra | MBKM Poliwangi</title>
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
                                <h5 class="justify-start text-theme">Manajemen Peserta Magang </h5>
                            </div>
                            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <a href="{{ route('manajemen.plotting.mitra.create', $id_pl_mitra) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp; Tambah Mahasiswa
                                </a>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Nim</th>
                                                <th class="text-center text-white">Nama</th>
                                                <th class="text-center text-white">Prodi</th>
                                                <th class="text-center text-white">Lowongan</th>
                                                <th class="text-center text-white">Pendamping Lapang</th>
                                                <th class="text-center text-white">Dosen Pembimbing</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($pendamping_lapang as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->pelamar_magang->mahasiswa->nim }}</td>
                                                    <td class="text-center">{{ $data->pelamar_magang->mahasiswa->nama }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->pelamar_magang->mahasiswa->prodi->nama }}</td>
                                                    <td class="text-center">{{ $data->pelamar_magang->lowongan->nama }}</td>
                                                    <td class="text-center">
                                                        @if (!empty($data->id_pl_mitra))
                                                            {{ $data->pl_mitra->nama }} {{-- Ganti 'nama' sesuai dengan kolom yang sesuai --}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $data->dosen_pl->dosen->nama }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info text-white"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}">
                                                            <i class="fa-solid fa-pen text-white"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                {{-- Modal Update --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Pendamping Lapang Mitra</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('manajemen.plotting.mitra.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <div class="modal-body">

                                                                    {{-- <div class="form-group">
                                                                        <label for="pelamar_magang" class="form-label">Nama
                                                                            Mahasiswa</label>
                                                                        <input type="text"
                                                                            class="form-control @error('pelamar_magang') is-invalid @enderror"
                                                                            value="{{ $data->pelamar_magang->mahasiswa->nama }}"
                                                                            disabled>
                                                                        @error('pelamar_magang')
                                                                            <div id="pelamar_magang"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div> --}}
                                                                    <div class="form-group">
                                                                        <label for="id_pl_mitra"
                                                                            class="form-label">Pembimbing Lapang</label>
                                                                        <select
                                                                            class="form-control @error('id_pl_mitra')
                                                                                    is-invalid
                                                                                @enderror"
                                                                            id="id_pl_mitra" name="id_pl_mitra">
                                                                            <option value="">Pembimbing Lapang
                                                                            </option>
                                                                            @foreach ($pl_mitra as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    @if (old('id_pl_mitra', $data->id_pl_mitra) == $item->id) selected @endif>
                                                                                    {{ $item->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('id_pl_mitra')
                                                                            <div id="id_pl_mitra" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" class="btn btn-cancel"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-submit">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
