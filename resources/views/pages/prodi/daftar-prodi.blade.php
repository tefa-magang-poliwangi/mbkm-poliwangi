@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Prodi | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <h1 class="text-theme">Prodi</h1>
                            <div class="lead d-flex text-theme">
                                Manajemen Prodi.
                                <button class="btn btn-primary fa-plus ml-auto" data-toggle="modal"
                                    data-target="#tambahProdiModal"> Tambah Prodi</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white" width="15%">Jenjang Pendidikan</th>
                                                <th class="text-center text-white">Program Studi</th>
                                                <th class="text-center text-white">Jurusan</th>
                                                <th class="text-center text-white">Kode Prodi</th>
                                                <th class="text-center text-white">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($prodi as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->jenjang_pendidikan }}</td>
                                                    <td class="text-center">{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->jurusan->nama_jurusan }}</td>
                                                    <td class="text-center">{{ $data->kode_prodi }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.prodi.destroy', $data->id) }}"
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
        </div>

        {{-- modall create --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="tambahProdiModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Prodi baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.prodi.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="create_nama_prodi">Nama Prodi</label>
                                <input type="text" class="form-control @error('create_nama_prodi') is-invalid @enderror"
                                    id="create_nama_prodi" name="create_nama_prodi" placeholder="Masukkan Nama Prodi">
                                @error('create_nama_prodi')
                                    <div id="create_nama_prodi" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
                                <select
                                    class="form-control @error('create_jenjang_pendidikan')
                                            is-invalid
                                        @enderror"
                                    id="create_jenjang_pendidikan" name="create_jenjang_pendidikan">
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @error('create_jenjang_pendidikan')
                                    <div id="create_jenjang_pendidikan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_kode_prodi">Kode Prodi</label>
                                <input type="text" class="form-control @error('create_kode_prodi') is-invalid @enderror"
                                    id="create_kode_prodi" name="create_kode_prodi" placeholder="Masukkan Kode Prodi">
                                @error('create_kode_prodi')
                                    <div id="create_kode_prodi" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_jurusan" class="form-label">Jurusan</label>
                                <select
                                    class="form-control @error('create_jurusan')
                                            is-invalid
                                        @enderror"
                                    id="create_jurusan" name="create_jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($jurusan as $datajurusan)
                                        <option value="{{ $datajurusan->id }}">{{ $datajurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('create_jurusan')
                                    <div id="create_jurusan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                    </form>
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
