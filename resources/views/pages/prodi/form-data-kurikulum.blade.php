@extends('layouts.base-mahasiswa')
@section('Kegiatan')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
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
                    <form method="POST">
                        <div class="form-group">
                            <label class="form-label">Nama Kurikulum</label>
                            <select class="form-control">
                                <option value="" disabled selected>Pilih kurikulum</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pilih Prodi / Jurusan</label>
                            <select class="form-control">
                                <option value="" disabled selected>Pilih prodi</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pilih Tahun Ajaran</label>
                            <select class="form-control">
                                <option value="" disabled selected>Pilih tahun</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Jumlah SKS Total</label>
                            <input id="number" type="number" class="form-control" name="number">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Jumlah SKS Wajib</label>
                                <input id="number" type="number" class="form-control" name="number">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="email">Jumlah SKS Pilihan</label>
                                <input id="number" type="number" class="form-control" name="number">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <select class="form-control">
                                <option value="" disabled selected>Keterangan</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <textarea class="form-control"></textarea>
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
