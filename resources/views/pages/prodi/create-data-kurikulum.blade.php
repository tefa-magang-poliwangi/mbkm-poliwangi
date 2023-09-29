@extends('layouts.base-mahasiswa')
@section('Kegiatan')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card card-rounded">
                        <div class="card-header d-flex">
                            <h4>Tambah Mata Kuliah ke Dalam Kurikulum</h4>
                            <button class="btn btn-theme-four ml-auto">Kembali</button>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('daftar.matkul.kurikulum.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="create_semester" class="form-label">Semester</label>
                                    <select
                                        class="form-control @error('create_semester')
                                        is-invalid
                                    @enderror"
                                        id="create_semester" name="create_semester">
                                        <option>Semester</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                    @error('create_semester')
                                        <div id="create_semester" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="create_kurikulum" class="form-label">Pilih Kurikulum</label>
                                    <select
                                        class="form-control @error('create_kurikulum')
                                        is-invalid
                                    @enderror"
                                        id="create_kurikulum" name="create_kurikulum">
                                        <option value="">Kurikulum</option>
                                        @foreach ($kurikulum as $dataKurikulum)
                                            <option value="{{ $dataKurikulum->id }}">{{ $dataKurikulum->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('create_kurikulum')
                                        <div id="create_kurikulum" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="create_matkul" class="form-label">Pilih Mata Kuliah</label>
                                    <select
                                        class="form-control @error('create_matkul')
                                        is-invalid
                                    @enderror"
                                        id="create_matkul" name="create_matkul">
                                        <option value="">Mata Kuliah</option>
                                        @foreach ($matkul as $dataMatkul)
                                            <option value="{{ $dataMatkul->id }}">{{ $dataMatkul->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('create_matkul')
                                        <div id="create_matkul" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary mr-1" type="submit">Tambah Mata Kuliah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
