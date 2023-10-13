@extends('layouts.base-admin')

@section('title')
    <title>Tambah Matakuliah | MBKM Poliwangi</title>
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
                        <h4>Tambah Matakuliah</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('manajemen.matakuliah.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="create_matkul" class="form-label">Nama</label>
                                <input id="create_matkul" type="text"
                                    class="form-control @error('create_matkul') is-invalid @enderror" name="create_matkul"
                                    placeholder="Nama matakuliah">
                                @error('create_matkul')
                                    <div id="create_matkul" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_kode_matkul" class="form-label">Kode</label>
                                <input id="create_kode_matkul" type="text"
                                    class="form-control @error('create_kode_matkul') is-invalid @enderror"
                                    name="create_kode_matkul" placeholder="Kode matakuliah">
                                @error('create_kode_matkul')
                                    <div id="create_kode_matkul" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="create_sks" class="form-label">Jumlah Sks</label>
                                <input id="create_sks" type="number"
                                    class="form-control @error('create_sks') is-invalid @enderror" name="create_sks"
                                    placeholder="Jumlah sks">
                                @error('create_sks')
                                    <div id="create_sks" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Tambah Matakuliah
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
