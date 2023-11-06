@extends('layouts.base-admin')

@section('title')
    <title>Update Program Magang MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Program Magang</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manajemen.berkas-lowongan.mitra.update', [$id_lowongan, $berkaslowongan->id]) }}"
                            method="POST">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="id_lowongan" class="form-label">Lowongan</label>
                                <select class="form-control @error('id_lowongan') is-invalid @enderror" id="id_lowongan"
                                    name="id_lowongan">
                                    <option value="">Pilih Lowongan</option>
                                    @foreach ($lowongan as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $berkaslowongan->id_lowongan == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_lowongan')
                                    <div id="id_lowongan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_berkas" class="form-label">Berkas</label>
                                <select class="form-control @error('id_berkas') is-invalid @enderror" id="id_berkas"
                                    name="id_berkas">
                                    <option value="">Pilih Lowongan</option>
                                    @foreach ($berkas as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $berkaslowongan->id_berkas == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_berkas')
                                    <div id="id_berkas" class="form-text text-danger">
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
