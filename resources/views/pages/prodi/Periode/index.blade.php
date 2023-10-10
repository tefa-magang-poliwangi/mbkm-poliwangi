@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Periode | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start my-auto">Data Periode</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Data Periode</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded bg-white" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="10%" class="text-center text-white">No</th>
                                        <th class="text-center text-white">Semester</th>
                                        <th class="text-center text-white">Tahun</th>
                                        <th class="text-center text-white">Status</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periode as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">
                                                @if ($data->semester % 2 == 0)
                                                    Genap - {{ $data->semester }}
                                                @else
                                                    Ganjil - {{ $data->semester }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data->tahun }}</td>
                                            <td class="text-center">
                                                @if ($data->status == 'Aktif')
                                                    <span class="badge bg-primary text-white">
                                                        {{ $data->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger text-white">
                                                        {{ $data->status }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}"><i
                                                        class="fa-solid fa-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- Modal Update --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Periode</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('data.periode.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_semester"
                                                                    class="form-label">Semester</label>
                                                                <select
                                                                    class="form-control @error('update_semester') is-invalid @enderror"
                                                                    id="update_semester" name="update_semester">
                                                                    <option value="">Pilih Semester</option>
                                                                    <option value="1"
                                                                        {{ $data->semester == 1 ? 'selected' : '' }}>1 -
                                                                        Ganjil</option>
                                                                    <option value="2"
                                                                        {{ $data->semester == 2 ? 'selected' : '' }}>2 -
                                                                        Genap</option>
                                                                </select>
                                                                @error('update_semester')
                                                                    <div id="update_semester"
                                                                        class="form-text pb-1 text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="update_tahun" class="form-label">Tahun</label>
                                                                <input id="update_tahun" type="number"
                                                                    class="form-control @error('update_tahun')
                                                                    is-invalid
                                                                @enderror"
                                                                    name="update_tahun" value="{{ $data->tahun }}"
                                                                    placeholder="Tahun ajaran">
                                                                @error('update_tahun')
                                                                    <div id="update_tahun" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="update_status" class="form-label">Status</label>
                                                                <select
                                                                    class="form-control @error('update_status') is-invalid @enderror"
                                                                    id="update_status" name="update_status">
                                                                    <option value="">Pilih Status</option>
                                                                    <option value="Aktif"
                                                                        {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                                                                        Aktif</option>
                                                                    <option value="Tidak Aktif"
                                                                        {{ $data->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                                                        Tidak Aktif</option>
                                                                </select>
                                                                @error('update_status')
                                                                    <div id="update_status" class="form-text pb-1 text-danger">
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

        {{-- Modal Tambah Periode --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Periode baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('data.periode.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_semester" class="form-label">Semester</label>
                                <select class="form-control @error('create_semester') is-invalid @enderror"
                                    id="create_semester" name="create_semester">
                                    <option value="">Pilih Semester</option>
                                    <option value="1">1 - Ganjil</option>
                                    <option value="2">2 - Genap</option>
                                </select>
                                @error('create_semester')
                                    <div id="create_semester" class="form-text pb-1 text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_tahun" class="form-label">Tahun</label>
                                <input id="create_tahun" type="number"
                                    class="form-control @error('create_tahun') is-invalid @enderror" name="create_tahun"
                                    placeholder="Tahun ajaran">
                                @error('create_tahun')
                                    <div id="create_tahun" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_status" class="form-label">Status</label>
                                <select class="form-control @error('create_status') is-invalid @enderror"
                                    id="create_status" name="create_status">
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                @error('create_status')
                                    <div id="create_status" class="form-text pb-1 text-danger">
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
