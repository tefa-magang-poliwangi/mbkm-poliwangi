@extends('layouts.base-admin')
@section('title')
    <title>Manajemen Peserta Magang External | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <div class="d-flex justify-content-between">
            <strong class="h3">Data Magang External</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-6">
                            <div class="dropdown d-inline mr-2">
                                <h6>Daftar Data Magang External</h6>
                            </div>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-theme-four">Kembali</button>
                                <button class="btn btn-theme fa-plus" data-toggle="modal"
                                    data-target="#tambahdataMagangext">Tambah</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body  py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kriteria Penilaian</th>
                                        <th>Lihat Peserta</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($magangext as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->name }}</td>

                                            <td>
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#kriteriaModal"><i class="fa-solid fa-eye"></i></button>
                                            </td>

                                            <td>
                                                <a href="{{ route('peserta.magang_ext.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></a>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal"><i class="fa-solid fa-pen"></i></button>
                                                <a href="{{ route('data.magangext.delete', $data->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
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


     {{-- Modal kriteria kurikulum --}}
     <div class="modal fade" tabindex="-1" role="dialog" id="kriteriaModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kriteria Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update_nama" class="form-label">Nama
                                        MBKM</label>
                                    <input id="update_nama" type="text"
                                        class="form-control @error('update_nama')
                                        is-invalid
                                    @enderror"
                                        name="update_nama">
                                    @error('update_nama')
                                        <div id="update_nama" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>Aspek Penilaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="d-flex">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox"
                                                         name="create_berkas[]">
                                                    <label class="form-check-label">Perencanaan Kegiatan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox"
                                                         name="create_berkas[]">
                                                    <label class="form-check-label">Pelaksanaan dan Hasil Kegiatan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <div class="form-check my-auto">
                                                    <input class="form-check-input" type="checkbox"
                                                         name="create_berkas[]">
                                                    <label class="form-check-label">Pelaporan Kegiatan</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-cancel"
                            data-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div> {{-- modall content --}}
        </div> {{-- modall dialog --}}
    </div> {{-- modal --}}

    {{-- modall create --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahdataMagangext">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Magang External</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('data.magangext.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_name">Nama</label>
                            <input type="text" class="form-control @error('create_name') is-invalid @enderror"
                                id="create_name" name="create_name"
                                placeholder="Masukkan Data Tempat Magang External">
                            @error('create_name')
                                <div id="create_name" class="form-text pb-1">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-cancel"
                            data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
