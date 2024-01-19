@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Jenis Program | MBKM Poliwangi</title>
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
                            <h1 class="text-theme">Jenis Program</h1>
                            <div class="lead d-flex text-theme">
                                Manajemen Jenis Program.
                                <button class="btn btn-primary fa-plus ml-auto" data-toggle="modal"
                                    data-target="#tambahJenisProgramModal"> Tambah Jenis Program</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-white">Jenis Program</th>
                                                <th class="text-center text-white">Edit</th>
                                                <th class="text-center text-white">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($jenis_program as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td>{{ $data->nama_program }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.jenis-program.update', $data->id) }}"
                                                            class="btn btn-primary ml-auto" data-toggle="modal"
                                                            data-target=".modalUpdate{{ $data->id }}">
                                                            <i class="fa-solid fa-pen text-white"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('manajemen.jenis-program.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update Jenis Program --}}
                                                <div class="modal fade modalUpdate{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Ubah
                                                                    Jenis Program
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>

                                                            <form
                                                                action="{{ route('manajemen.jenis-program.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_nama_program"
                                                                                    class="form-label">Nama</label>
                                                                                <input id="update_nama_program"
                                                                                    type="text"
                                                                                    class="form-control @error('update_nama_program')
                                                                                    is-invalid
                                                                                    @enderror"
                                                                                    name="update_nama_program"
                                                                                    value="{{ $data->nama_program }}"
                                                                                    placeholder="Jenis Program Baru">
                                                                                @error('update_nama_program')
                                                                                    <div id="update_nama_program"
                                                                                        class="form-text text-danger">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        {{-- feeder --}}
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="update_id_program_feeder">Id
                                                                                    Program Feeder</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('update_id_program_feeder') is-invalid @enderror"
                                                                                    id="update_id_program_feeder"
                                                                                    name="update_id_program_feeder"
                                                                                    placeholder="Masukkan Id Program Feeder"
                                                                                    value="{{ $data->id_program_feeder }}">
                                                                                @error('update_id_program_feeder')
                                                                                    <div id="update_id_program_feeder"
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
        <div class="modal fade" tabindex="-1" role="dialog" id="tambahJenisProgramModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jenis Program Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.jenis-program.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="create_nama_program">Nama Jenis Program</label>
                                <input type="text"
                                    class="form-control @error('create_nama_program') is-invalid @enderror"
                                    id="create_nama_program" name="create_nama_program"
                                    placeholder="Masukkan Nama Jenis Program">
                                @error('create_nama_program')
                                    <div id="create_nama_program" class="form-text pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            {{-- feeder --}}
                            <div class="form-group">
                                <label for="create_id_program_feeder">Id Program Feeder</label>
                                <input type="text"
                                    class="form-control @error('create_id_program_feeder') is-invalid @enderror"
                                    id="create_id_program_feeder" name="create_id_program_feeder"
                                    placeholder="Masukkan Id Program Feeder">
                                @error('create_id_program_feeder')
                                    <div id="create_id_program_feeder" class="form-text pb-1">
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
