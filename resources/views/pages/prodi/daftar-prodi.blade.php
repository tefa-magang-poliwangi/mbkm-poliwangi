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
                                                <th class="text-white">Program Studi</th>
                                                <th class=" text-white">Jurusan</th>
                                                <th class="text-center text-white">Edit</th>
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
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->jurusan->nama_jurusan }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.jenis-program.update', $data->id) }}"
                                                            class="btn btn-primary ml-auto" data-toggle="modal"
                                                            data-target=".modalUpdate{{ $data->id }}">
                                                            <i class="fa-solid fa-pen text-white"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.prodi.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update Prodi --}}
                                                <div class="modal fade modalUpdate{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Ubah
                                                                    Program Studi
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>

                                                            <form action="{{ route('manajemen.prodi.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_nama_prodi"
                                                                                    class="form-label">Nama Prodi</label>
                                                                                <input id="update_nama_prodi" type="text"
                                                                                    class="form-control @error('update_nama_prodi')
                                                                                    is-invalid
                                                                                    @enderror"
                                                                                    name="update_nama_prodi"
                                                                                    value="{{ $data->nama }}"
                                                                                    placeholder="Prodi Baru">
                                                                                @error('update_nama_prodi')
                                                                                    <div id="update_nama_prodi"
                                                                                        class="form-text text-danger">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="update_jurusan"
                                                                                    class="form-label">Jurusan</label>
                                                                                <select
                                                                                    class="form-control @error('update_jurusan')
                                                                                            is-invalid
                                                                                        @enderror"
                                                                                    id="update_jurusan"
                                                                                    name="update_jurusan">
                                                                                    @foreach ($jurusan as $datajurusan)
                                                                                        <option
                                                                                            value="{{ $datajurusan->id }}"
                                                                                            {{ $data->id_jurusan == $datajurusan->id ? 'selected' : '' }}>
                                                                                            {{ $datajurusan->nama_jurusan }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('update_jurusan')
                                                                                    <div id="update_jurusan"
                                                                                        class="form-text text-danger">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col d-flex">
                                                                            <div class="ml-auto">
                                                                                <button type="button"
                                                                                    class="btn btn-cancel"
                                                                                    data-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-submit">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->


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
                                <input type="text"
                                    class="form-control @error('create_nama_prodi') is-invalid @enderror"
                                    id="create_nama_prodi" name="create_nama_prodi" placeholder="Masukkan Nama Prodi">
                                @error('create_nama_prodi')
                                    <div id="create_nama_prodi" class="form-text pb-1">
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
                                    <option value="">Jurusan</option>
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
