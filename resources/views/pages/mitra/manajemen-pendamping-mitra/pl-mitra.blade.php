@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Pendamping Lapang | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Pendamping Lapang</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah PL Mitra
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white" width="10%">No</th>
                                                <th class="text-center text-white">Nama</th>
                                                <th class="text-center text-white">No Telepon</th>
                                                <th class="text-center text-white">E-Mail</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($plmitra as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->no_telp }}</td>
                                                    <td class="text-center">{{ $data->email }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}"><i
                                                                class="fa-solid fa-pen text-white"></i>
                                                        </button>
                                                        <a href="{{ route('manajemen.pendamping.lapang.mitra.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Ubah Periode --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah PL Mitra</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form action="{{ route('manajemen.pendamping.lapang.mitra.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="update_nama"
                                                                            class="form-label">Nama</label>
                                                                        <input id="update_nama" type="text"
                                                                            class="form-control @error('update_nama') is-invalid @enderror"
                                                                            name="update_nama" placeholder="Nama lengkap"
                                                                            value="{{ $data->nama }}">
                                                                        @error('update_nama')
                                                                            <div id="update_nama" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="update_email"
                                                                            class="form-label">Email</label>
                                                                        <input id="update_email" type="email"
                                                                            class="form-control @error('update_email') is-invalid @enderror"
                                                                            name="update_email" placeholder="Alamat email"
                                                                            value="{{ $data->email }}">
                                                                        @error('update_email')
                                                                            <div id="update_email"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="update_no_telp" class="form-label">No
                                                                            Telp</label>
                                                                        <input id="update_no_telp" type="text"
                                                                            class="form-control @error('update_no_telp') is-invalid @enderror"
                                                                            name="update_no_telp"
                                                                            placeholder="Nomor telepon / nomor wa"
                                                                            value="{{ $data->no_telp }}" pattern="[0-9]*">
                                                                        @error('update_no_telp')
                                                                            <div id="update_no_telp"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- <div class="form-group">
                                                                        <label for="update_id_mitra"
                                                                            class="form-label">Mitra</label>
                                                                        <select
                                                                            class="form-control @error('update_id_mitra') is-invalid @enderror"
                                                                            id="update_id_mitra" name="update_id_mitra">
                                                                            <option value="">Pilih Mitra</option>
                                                                            @foreach ($mitra as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $data->id_mitra == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->nama }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('update_id_mitra')
                                                                            <div id="update_id_mitra"
                                                                                class="form-text pb-1 text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div> --}}

                                                                    <div class="form-group">
                                                                        <label for="update_password"
                                                                            class="control-label">Ubah Password</label>
                                                                        <div class="input-group mb-3">
                                                                            <input id="update_password" type="password"
                                                                                class="form-control @error('update_password') is-invalid @enderror"
                                                                                name="update_password" tabindex="2"
                                                                                placeholder="Password baru">
                                                                        </div>
                                                                        @error('update_password')
                                                                            <div id="update_password"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="update_password_confirmation"
                                                                            class="control-label">Konfirmasi
                                                                            Password</label>
                                                                        <div class="input-group mb-3">
                                                                            <input id="update_password_confirmation"
                                                                                type="password"
                                                                                class="form-control @error('update_password_confirmation') is-invalid @enderror"
                                                                                name="update_password_confirmation"
                                                                                tabindex="2"
                                                                                placeholder="Konfirmasi password baru">
                                                                        </div>
                                                                        @error('update_password_confirmation')
                                                                            <div id="update_password_confirmation"
                                                                                class="form-text text-danger">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
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

    {{-- Modal Tambah PL Mitra --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah PL Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('manajemen.pendamping.lapang.mitra.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_nama" class="form-label">Nama</label>
                            <input id="create_nama" type="text"
                                class="form-control @error('create_nama') is-invalid @enderror" name="create_nama"
                                placeholder="Nama lengkap">
                            @error('create_nama')
                                <div id="create_nama" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_email" class="form-label">Email</label>
                            <input id="create_email" type="email"
                                class="form-control @error('create_email') is-invalid @enderror" name="create_email"
                                placeholder="Alamat email">
                            @error('create_email')
                                <div id="create_email" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_no_telp" class="form-label">No Telp</label>
                            <input id="create_no_telp" type="text"
                                class="form-control @error('create_no_telp') is-invalid @enderror" name="create_no_telp"
                                placeholder="Nomor telepon / nomor wa" pattern="[0-9]*">
                            @error('create_no_telp')
                                <div id="create_no_telp" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="create_id_mitra" class="form-label">Mitra</label>
                            <select class="form-control @error('create_id_mitra') is-invalid @enderror"
                                id="create_id_mitra" name="create_id_mitra">
                                <option value="">Pilih Mitra</option>
                                @foreach ($mitra as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('create_id_mitra')
                                <div id="create_id_mitra" class="form-text pb-1 text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="create_password" class="control-label">Password</label>
                            <div class="input-group mb-3">
                                <input id="create_password" type="password"
                                    class="form-control @error('create_password') is-invalid @enderror"
                                    name="create_password" tabindex="2" placeholder="Password">
                            </div>
                            @error('create_password')
                                <div id="create_password" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_password_confirmation" class="control-label">Konfirmasi Password</label>
                            <div class="input-group mb-3">
                                <input id="create_password_confirmation" type="password"
                                    class="form-control @error('create_password_confirmation') is-invalid @enderror"
                                    name="create_password_confirmation" tabindex="2" placeholder="Konfirmasi password">
                            </div>
                            @error('create_password_confirmation')
                                <div id="create_password_confirmation" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col d-flex">
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
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
