@extends('layouts.base-user')
@section('Rincian Kegiatan')
    <title>Rincian Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="container py-5">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body py-2">
                            <div class="card-header">
                            <h4>Rincian Kegiatan Mahasiswa MBKM Internal</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>

                            <div class="table-responsive">
                                                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>NIM</th>
                                                <th>Program Studi</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>362055401099</td>
                                                <td>TRPL</td>
                                                <td>
                                                    <a href="#"
                                                            class="mr-2" data-toggle="modal" data-animation="bounce"
                                                            data-target="#"><i
                                                            class="fas fa-eye font-16"></i></a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>John</td>
                                                <td>362055401098</td>
                                                <td>TRPL</td>
                                                <td>
                                                    <a href="#"
                                                            class="mr-2" data-toggle="modal" data-animation="bounce"
                                                            data-target="#"><i
                                                            class="fas fa-eye font-16"></i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /tableresponsive-->
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
