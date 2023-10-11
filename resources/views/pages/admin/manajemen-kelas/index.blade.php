@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Kelas | MBKM Poliwangi</title>
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
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start my-auto">Manajemen Kelas</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createModal"><i
                                        class="fa-solid fa-plus"></i> &ensp; Tambah
                                    Kelas</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Tingkat</th>
                                                <th class="text-center text-white">Pararel</th>
                                                <th class="text-center text-white">Prodi</th>
                                                <th class="text-center text-white">Semester</th>
                                                <th class="text-center text-white">Tahun</th>
                                                <th class="text-center text-white">Status</th>
                                                <th class="text-center text-white">Lihat</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($kelas as $data)
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->tingkat_kelas }}</td>
                                                    <td class="text-center">{{ $data->abjad_kelas }}</td>
                                                    <td>{{ $data->prodi->nama }}</td>
                                                    <td class="text-center">{{ $data->periode->semester }}</td>
                                                    <td class="text-center">{{ $data->periode->tahun }}</td>
                                                    <td class="text-center">{{ $data->periode->status }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('peserta.kelas.index', $data->id) }}"
                                                            class="btn btn-primary ml-auto"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info ml-auto"
                                                            data-toggle="modal" data-target="#updateModal"><i
                                                                class="fa-solid fa-pen"></i></button>
                                                        <a href="{{ route('manajemen.kelas.destroy', $data->id) }}"
                                                            class="btn btn-danger ml-auto"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit data kelas</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('manajemen.kelas.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_tingkat_kelas">Tingkat Kelas</label>
                                                                        <select
                                                                            class="form-control @error('update_tingkat_kelas') is-invalid @enderror"
                                                                            id="update_tingkat_kelas"
                                                                            name="update_tingkat_kelas">
                                                                            <option value="">Pilih Tingkat Kelas
                                                                            </option>
                                                                            <option value="1"
                                                                                {{ $data->tingkat_kelas == '1' ? 'selected' : '' }}>
                                                                                1</option>
                                                                            <option value="2"
                                                                                {{ $data->tingkat_kelas == '2' ? 'selected' : '' }}>
                                                                                2</option>
                                                                            <option value="3"
                                                                                {{ $data->tingkat_kelas == '3' ? 'selected' : '' }}>
                                                                                3</option>
                                                                            <option value="4"
                                                                                {{ $data->tingkat_kelas == '4' ? 'selected' : '' }}>
                                                                                4</option>
                                                                        </select>
                                                                        @error('update_tingkat_kelas')
                                                                            <div id="update_tingkat_kelas" class="form-text">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_abjad_kelas">Pararel
                                                                            Kelas</label>
                                                                        <select
                                                                            class="form-control @error('update_abjad_kelas') is-invalid @enderror"
                                                                            id="update_abjad_kelas"
                                                                            name="update_abjad_kelas">
                                                                            <option value="">Pilih Abjad Kelas
                                                                            </option>
                                                                            <option value="A"
                                                                                {{ $data->abjad_kelas == 'A' ? 'selected' : '' }}>
                                                                                A</option>
                                                                            <option value="B"
                                                                                {{ $data->abjad_kelas == 'B' ? 'selected' : '' }}>
                                                                                B</option>
                                                                            <option value="C"
                                                                                {{ $data->abjad_kelas == 'C' ? 'selected' : '' }}>
                                                                                C</option>
                                                                            <option value="D"
                                                                                {{ $data->abjad_kelas == 'D' ? 'selected' : '' }}>
                                                                                D</option>
                                                                            <option value="E"
                                                                                {{ $data->abjad_kelas == 'E' ? 'selected' : '' }}>
                                                                                E</option>
                                                                            <option value="F"
                                                                                {{ $data->abjad_kelas == 'F' ? 'selected' : '' }}>
                                                                                F</option>
                                                                            <option value="G"
                                                                                {{ $data->abjad_kelas == 'G' ? 'selected' : '' }}>
                                                                                G</option>
                                                                            <option value="H"
                                                                                {{ $data->abjad_kelas == 'H' ? 'selected' : '' }}>
                                                                                H</option>
                                                                        </select>
                                                                        @error('update_abjad_kelas')
                                                                            <div id="update_abjad_kelas" class="form-text">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="update_id_periode">Periode</label>
                                                                        <select
                                                                            class="form-control @error('update_id_periode') is-invalid @enderror"
                                                                            id="update_id_periode"
                                                                            name="update_id_periode">
                                                                            <option value="">Pilih Periode</option>
                                                                            @foreach ($periodes as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $data->id_periode == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->semester }} -
                                                                                    {{ $item->tahun }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('update_id_periode')
                                                                            <div id="update_id_periode" class="form-text">
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

                        {{-- Modal Tambah Kelas --}}
                        <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah kelas baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('manajemen.kelas.store') }}" method="POST">
                                        @csrf

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="form-label" for="create_tingkat_kelas">Tingkat Kelas</label>
                                                <select
                                                    class="form-control @error('create_tingkat_kelas') is-invalid @enderror"
                                                    id="create_tingkat_kelas" name="create_tingkat_kelas">
                                                    <option value="">Pilih Tingkat Kelas</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                @error('create_tingkat_kelas')
                                                    <div id="create_tingkat_kelas" class="form-text">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="create_abjad_kelas">Pararel Kelas</label>
                                                <select
                                                    class="form-control @error('create_abjad_kelas') is-invalid @enderror"
                                                    id="create_abjad_kelas" name="create_abjad_kelas">
                                                    <option value="">Pilih Abjad Kelas</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                </select>
                                                @error('create_abjad_kelas')
                                                    <div id="create_abjad_kelas" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="create_id_periode">Periode</label>
                                                <select
                                                    class="form-control @error('create_id_periode') is-invalid @enderror"
                                                    id="create_id_periode" name="create_id_periode">
                                                    <option value="">Pilih Periode</option>
                                                    @foreach ($periodes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->semester }} -
                                                            {{ $item->tahun }}</option>
                                                    @endforeach
                                                </select>
                                                @error('create_id_periode')
                                                    <div id="create_id_periode" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="modal-footer bg-whitesmoke br">
                                            <button type="button" class="btn btn-cancel"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-submit">Submit</button>
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
