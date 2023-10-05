@extends('layouts.base-admin')
@section('title')
    <title>Pendamping Lapang Mitra | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 5%">
        <div class="d-flex justify-content-between">
            <strong class="h3">Pendamping Lapang Mitra</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-6">
                            <h6>Daftar Pendamping Lapang Mitra</h6>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="ml-auto">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                @php
                                    $no = 1;
                                @endphp
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Telephone</th>
                                        <th>E-Mail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plmitra as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td><a href="#"> <i class="fas fa-edit"></i></a>
                                                <a href="#"> <i class="fas fa-trash"></i></a>
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

    {{-- Modal Tambah Periode --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah PL Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('data.plmitra.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input id="nama" type="text"
                                class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                name="nama">
                            @error('nama')
                                <div id="nama" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                name="username">
                            @error('username')
                                <div id="username" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                name="email">
                            @error('email')
                                <div id="email" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input id="no_telp" type="number"
                                class="form-control @error('no_telp')
                                is-invalid
                            @enderror"
                                name="no_telp">
                            @error('no_telp')
                                <div id="no_telp" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mitra" class="form-label">Mitra</label>
                            <select class="form-control @error('mitra') is-invalid @enderror" id="mitra"
                                name="mitra">
                                <option value="">Pilih Mitra</option>
                                @foreach ($mitra as $item )
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('mitra')
                                <div id="mitra" class="form-text pb-1 text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    tabindex="2" placeholder="Password">
                            </div>
                            @error('password')
                                <div id="password" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password
                                Confirmation</label>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password-confirmation" tabindex="2" placeholder="Password Confirmation">
                            </div>
                            @error('password')
                                <div id="password" class="form-text text-danger">{{ $message }}</div>
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
