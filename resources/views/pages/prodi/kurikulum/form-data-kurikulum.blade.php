@extends('layouts.base-mahasiswa')

@section('Kegiatan')
    <title>Kegiatan MBKM | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Kurikulum Kuliah</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('daftar.kurikulum.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="create_nama" class="form-label">Nama Kurikulum</label>
                            <input id="create_nama" type="text"
                                class="form-control @error('create_nama')
                                is-invalid
                            @enderror"
                                name="create_nama">
                            @error('create_nama')
                                <div id="create_nama" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_prodi" class="form-label">Pilih Prodi / Jurusan</label>
                            <select
                                class="form-control @error('create_prodi')
                                is-invalid
                            @enderror"
                                id="create_prodi" name="create_prodi">
                                <option value="">Pilih prodi</option>
                                @foreach ($prodi as $dataprodi)
                                    <option value="{{ $dataprodi->id }}">{{ $dataprodi->nama }}</option>
                                @endforeach
                            </select>
                            @error('create_prodi')
                                <div id="create_prodi" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="create_status" class="form-label">Status</label>
                            <select class="form-control @error('create_status') is-invalid @enderror" id="create_status"
                                name="create_status">
                                <option value="">Pilih Status</option>
                                <option value="1">Wajib</option>
                                <option value="2">Tidak Wajib</option>
                            </select>
                            @error('create_status')
                                <div id="create_status" class="form-text pb-1">
                                    {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Tambah Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
