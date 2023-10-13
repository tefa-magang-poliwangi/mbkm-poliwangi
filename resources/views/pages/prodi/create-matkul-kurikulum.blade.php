@extends('layouts.base-admin')

@section('title')
    <title>Tambah Matkul Kurikulum | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row d-flex justify-content-center pt-4">
            <div class="col-12">
                <div class="card card-rounded-sm">
                    <div class="card-header d-flex">
                        <h4 class="mb-3">Tambah Mata Kuliah ke Dalam Kurikulum</h4>
                        <button class="btn btn-danger ml-auto mb-3" onclick="goBack()">Kembali</button>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('manajemen.matkul.kurikulum.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="create_semester" class="form-label">Semester</label>
                                <select class="form-control @error('create_semester') is-invalid @enderror"
                                    id="create_semester" name="create_semester">
                                    <option value="">Pilih Semester</option>
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
                                <select class="form-control @error('create_kurikulum') is-invalid @enderror"
                                    id="create_kurikulum" name="create_kurikulum">
                                    <option value="">Pilih Kurikulum</option>
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
                                <select class="form-control @error('create_matkul') is-invalid @enderror" id="create_matkul"
                                    name="create_matkul">
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach ($matkul as $dataMatkul)
                                        <option value="{{ $dataMatkul->id }}">{{ $dataMatkul->nama }}</option>
                                    @endforeach
                                </select>
                                @error('create_matkul')
                                    <div id="create_matkul" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mr-auto" type="submit">Tambah Mata Kuliah</button>
                        </form>
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

    {{-- JS Back --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
