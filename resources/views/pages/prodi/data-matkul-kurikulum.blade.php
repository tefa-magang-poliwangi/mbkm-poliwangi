@extends('layouts.base-admin')
@section('title')
    <title>Data Kurikulum | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Data Kurikulum Mata Kuliah</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('daftar.matkul.kurikulum.create') }}" class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah
                                </a>
                            </div>
                        </div>

                        {{-- Filter Prodi Dosen --}}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-6 col-lg-4">
                                <div class="form-group">
                                    <form action="{{ route('daftar.matkul.kurikulum.index') }}" method="GET">
                                        <select class="form-control select2" name="prodi" onchange="this.form.submit()">
                                            <option value="">Semua Prodi</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    @php
                                        $no = 1;
                                    @endphp
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white" class="text-center text-white">No</th>
                                                <th class="text-center text-white">Kode MK</th>
                                                <th class="text-center text-white">Nama Mata Kuliah</th>
                                                <th class="text-center text-white">Kurikulum</th>
                                                <th class="text-center text-white">Bobot MK</th>
                                                <th class="text-center text-white">Semester</th>
                                                <th class="text-center text-white">Status</th>
                                                <th class="text-center text-white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($matkulkurikulum as $data)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $data->matkul->kode_matakuliah }}</td>
                                                    <td>{{ $data->matkul->nama }}</td>
                                                    <td>{{ $data->kurikulum->nama }}</td>
                                                    <td>{{ $data->matkul->sks }} SKS</td>
                                                    <td>{{ $data->semester }}</td>
                                                    <td> <span class="badge bg-primary text-white">Wajib</span>
                                                    </td>
                                                    <td> <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                            data-target="#updateModal{{$data->id}}"><i class="fa-solid fa-pen"></i></button>
                                                        <a href="{{ route('daftar.matkul.kurikulum.delete', $data->id) }}"
                                                            class="btn btn-danger ml-auto"> <i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" tabindex="-1" role="dialog" id="updateModal{{$data->id}}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit data Matkul Kurikulum</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('daftar.matkul.kurikulum.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="update_semester"
                                                                            class="form-label">Semester</label>
                                                                        <select
                                                                            class="form-control @error('update_semester')
                                                                        is-invalid
                                                                    @enderror"
                                                                            id="update_semester" name="update_semester">
                                                                            <option>Semester</option>
                                                                            <option value="5"
                                                                                {{ $data->semester == '5' ? 'selected' : '' }}>
                                                                                5
                                                                            </option>
                                                                            <option value="6"
                                                                                {{ $data->semester == '6' ? 'selected' : '' }}>
                                                                                6
                                                                            </option>
                                                                            <option value="7"
                                                                                {{ $data->semester == '7' ? 'selected' : '' }}>
                                                                                7
                                                                            </option>
                                                                        </select>
                                                                        @error('update_semester')
                                                                            <div id="update_semester" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="update_kurikulum" class="form-label">Pilih
                                                                            Kurikulum</label>
                                                                        <select
                                                                            class="form-control @error('update_kurikulum')
                                                                        is-invalid
                                                                    @enderror"
                                                                            id="update_kurikulum" name="update_kurikulum">
                                                                            <option value="">Kurikulum</option>
                                                                            @foreach ($kurikulum as $dataKurikulum)
                                                                                <option value="{{ $dataKurikulum->id }}"
                                                                                    {{ $data->id_kurikulum == $dataKurikulum->id ? 'selected' : '' }}>
                                                                                    {{ $dataKurikulum->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('update_kurikulum')
                                                                            <div id="update_kurikulum" class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="update_matkul" class="form-label">Pilih Mata
                                                                            Kuliah</label>
                                                                        <select
                                                                            class="form-control @error('update_matkul')
                                                                        is-invalid
                                                                    @enderror"
                                                                            id="update_matkul" name="update_matkul">
                                                                            <option value="">Mata Kuliah</option>
                                                                            @foreach ($matkul as $dataMatkul)
                                                                                <option value="{{ $dataMatkul->id }}" {{ $data->id_matkul == $dataMatkul->id ? 'selected' : '' }}>
                                                                                    {{ $dataMatkul->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('update_matkul')
                                                                            <div id="update_matkul" class="form-text text-danger">
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

    <!-- JS Libraies -->
    {{-- <script src="{{ asset('assets/modules/datatables/datatables.min.js') }} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/jquery-ui/jquery-ui.min.js')}} "></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script> --}}
@endsection
