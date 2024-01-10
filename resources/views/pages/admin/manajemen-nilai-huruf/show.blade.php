@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Detail Nilai Huruf | MBKM Poliwangi</title>
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
                                <h5 class="justify-start my-auto text-theme">Manajemen Detail Nilai Huruf -
                                    {{ $profil_nilai_huruf->nama }}</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal">
                                    <i class="fa-solid fa-plus"></i>
                                    &ensp; Tambah Acuan Nilai
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Nilai Huruf</th>
                                                <th class="text-center text-white">Batas Atas</th>
                                                <th class="text-center text-white">Batas Bawah</th>
                                                <th class="text-center text-white" width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($detail_nilai_huruf as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->nilai_huruf }}</td>
                                                    <td class="text-center">{{ $data->batas_atas }}</td>
                                                    <td class="text-center">{{ $data->batas_bawah }}</td>
                                                    <td class="text-center" width="15%">
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $data->id }}"><i
                                                                class="fa-solid fa-pen"></i></button>
                                                        <a href="{{ route('manajemen.detail.nilai.huruf.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="updateModal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Acuan Nilai</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('manajemen.detail.nilai.huruf.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_batas_atas">Nilai Batas Atas</label>
                                                                        <input type="number" id="update_batas_atas"
                                                                            name="update_batas_atas"
                                                                            class="form-control  @error('update_batas_atas') is-invalid @enderror"
                                                                            placeholder="0 - 100" min="0"
                                                                            max="100" value="{{ $data->batas_atas }}">
                                                                        @error('update_batas_atas')
                                                                            <div id="update_batas_atas" class="form-text">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_batas_bawah">Nilai Batas
                                                                            Bawah</label>
                                                                        <input type="number" id="update_batas_bawah"
                                                                            name="update_batas_bawah"
                                                                            class="form-control  @error('update_batas_bawah') is-invalid @enderror"
                                                                            placeholder="0 - 100" min="0"
                                                                            max="100"
                                                                            value="{{ $data->batas_bawah }}">
                                                                        @error('update_batas_bawah')
                                                                            <div id="update_batas_bawah" class="form-text">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_nilai_huruf">Nilai
                                                                            Huruf</label>
                                                                        <input type="text" id="update_nilai_huruf"
                                                                            name="update_nilai_huruf"
                                                                            class="form-control  @error('update_nilai_huruf') is-invalid @enderror"
                                                                            placeholder="Nilai huruf"
                                                                            value="{{ $data->nilai_huruf }}">
                                                                        @error('update_nilai_huruf')
                                                                            <div id="update_nilai_huruf" class="form-text">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="d-flex justify-content-around">
                                                                        <div class="ml-auto">
                                                                            <button type="button" class="btn btn-cancel"
                                                                                data-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-submit">Simpan</button>
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

                        {{-- Modal Tambah Detail Nilai Huruf --}}
                        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Acuan Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form
                                        action="{{ route('manajemen.detail.nilai.huruf.store', $profil_nilai_huruf->id) }}"
                                        method="POST">
                                        @csrf

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="form-label" for="create_batas_atas">Nilai Batas Atas</label>
                                                <input type="number" id="create_batas_atas" name="create_batas_atas"
                                                    class="form-control  @error('create_batas_atas') is-invalid @enderror"
                                                    placeholder="0 - 100" min="0" max="100">
                                                @error('create_batas_atas')
                                                    <div id="create_batas_atas" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="create_batas_bawah">Nilai Batas
                                                    Bawah</label>
                                                <input type="number" id="create_batas_bawah" name="create_batas_bawah"
                                                    class="form-control  @error('create_batas_bawah') is-invalid @enderror"
                                                    placeholder="0 - 100" min="0" max="100">
                                                @error('create_batas_bawah')
                                                    <div id="create_batas_bawah" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="create_nilai_huruf">Nilai Huruf</label>
                                                <input type="text" id="create_nilai_huruf" name="create_nilai_huruf"
                                                    class="form-control  @error('create_nilai_huruf') is-invalid @enderror"
                                                    placeholder="Nilai huruf">
                                                @error('create_nilai_huruf')
                                                    <div id="create_nilai_huruf" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-around">
                                                <div class="ml-auto">
                                                    <button type="button" class="btn btn-cancel"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
