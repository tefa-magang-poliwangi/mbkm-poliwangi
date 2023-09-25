@extends('layouts.base-mahasiswa')

@section('title')
    <title>Profil User | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="section">
        <div class="section-body">

            <div class="row mt-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex">
                                    <div class="mx-auto my-auto text-center">
                                        <img src="{{ asset('images/aida.jpg') }}" alt="Foto Profil"
                                            class="img-fluid rounded-circle">
                                    </div>
                                </div>
                                <div class="col-8 d-flex">
                                    <div class="my-auto mx-auto">
                                        <h5>Aida Andinar Maulidiana</h5>
                                        <span>Teknologi Rekayasa Perangkat Lunak</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card card-hover">
                        <div class="card-body">

                            <div class="card-header bg-theme">
                                <h4 class="text-white">Edit Profil</h4>
                            </div>

                            <div class="px-3 pt-4">
                                <form method="post" class="needs-validation" novalidate="">
                                    <div class="">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="email">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    required="" placeholder="Alamat email baru" value="aida@gmail.com">
                                                <div class="invalid-feedback">
                                                    Oh no! Email is invalid.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="no_telp">No. Telp</label>
                                            <div class="col-sm-9">
                                                <input type="number" id="no_telp" name="no_telp" class="form-control"
                                                    placeholder="Nomor telepon baru" value="081234567890">
                                                <div class="valid-feedback">
                                                    Good job!
                                                </div>
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
