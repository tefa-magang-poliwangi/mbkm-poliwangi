@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Daftar Pelamar | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="">
<<<<<<< HEAD
        <div class="row py-5">
=======
        <div class="row pt-3">
>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
<<<<<<< HEAD
                                <h5 class="justify-start my-auto text-theme">Daftar Mahasiswa Pelamar</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <div class="ml-auto">
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#createModal"><i class="fa-solid fa-plus"></i> &ensp; Tambah
                                        </button>
                                </div>
=======
                                <h5 class="justify-start my-auto text-theme">Manajemen Daftar Pelamar - Magang Internal</h5>
>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white" width="10%">No</th>
<<<<<<< HEAD
                                        <th class="text-white text-center" width="10%">Nama</th>
                                        <th class="text-white text-center" width="10%">NIM</th>
                                        <th class="text-white text-center" width="10%">Nama Lowongan</th>
                                        <th class="text-white text-center" width="10%">Melihat Berkas</th>
                                        <th class="text-white text-center" width="10%">Pendamping Lapang</th>
                                        <th class="text-white text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
=======
                                        <th class="text-white">Nama</th>
                                        <th class="text-white text-center">Nim</th>
                                        <th class="text-white text-center">Nama Perusahaan</th>
                                        <th class="text-white text-center">Berkas</th>
                                        <th class="text-white text-center">Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                                <tbody>
                                    @foreach ($daftar_pelamar as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nama }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                            <td class="text-center">{{ $data->lowongan->nama }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="#">Cek Kelengkapan</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-info ml-auto">
                                                    <i class="fa-solid fa-circle-check text-white"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger ml-auto">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>

>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Tambah Periode --}}
    {{-- <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Admin Prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('daftar-pelamar.mitra.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_mahasiswa" class="form-label">Nama</label>
                            <select
                                class="form-control @error('create_mahasiswa')
                                        is-invalid
                                    @enderror"
                                id="create_mahasiswa" name="create_mahasiswa">
                                <option value="">Nama</option>
                                @foreach ($mahasiswa as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('create_mahasiswa')
                                <div id="create_mahasiswa" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="create_lowongan" class="form-label">Lowongan</label>
                            <select
                                class="form-control @error('create_lowongan')
                                        is-invalid
                                    @enderror"
                                id="create_lowongan" name="create_lowongan">
                                <option value="">Prodi</option>
                                @foreach ($lowongan as $datalowongan)
                                    <option value="{{ $datalowongan->id }}">{{ $datalowongan->nama }}</option>
                                @endforeach
                            </select>
                            @error('create_lowongan')
                                <div id="create_lowongan" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div> --}}
                    {{-- </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<<<<<<< HEAD

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
=======
>>>>>>> 5a0095ff9c3a74622d90986c3e17b4d2d6f13514
@endsection
