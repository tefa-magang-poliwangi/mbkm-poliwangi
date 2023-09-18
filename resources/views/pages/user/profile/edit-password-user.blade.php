@extends('layouts.base-user')

@section('title')
    <title>Ganti Password | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid mt-4">
        <div class="row py-3 d-flex justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <div class="px-4">
                            <div class="card-header bg-theme mb-4">
                                <h4 class="text-white">Ubah Password</h4>
                            </div>

                            <form class="needs-validation px-4" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kata Sandi Awal</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Masukkan kata sandi awal Anda.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Masukkan kata sandi baru Anda.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Konfirmasi Kata Sandi Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Konfirmasi kata sandi baru Anda.
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Simpan</button>
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
