@extends('layouts.base-user')
@section('title')
    <title>Beranda MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <section>
            <div class="col text-start d-flex text-uppercase">
                <div class="px-2">
                    <i class="fa-solid fa-file-invoice fa-3x"></i>
                </div>
                <div>
                    <h3>Konversi Nilai</h3>
                    <h6>Rini Maulida</h6>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <iframe src="{{ asset('doc/contoh.pdf') }}" width="100%" height="700px"></iframe>
            </div>
            <div class="col">
                <div class="table-responsive d-flex flex-column">

                    <div>
                        <table class="table table-hover table-borderless text-uppercase" style="background-color: #EEEEEE;">
                            <thead style="background-color: #063762; color: white;">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>Kode</th>
                                    <th>Mata kuliah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>Rpl45347</td>
                                    <td>
                                        Basis Data
                                    </td>
                                    <td>
                                        <button class="btn btn-transparent" data-toggle="modal"
                                            data-target="#tambahNilaiModal"><i
                                                class="fa-solid fa-file-pen text-dark"></i></button>
                                    </td>
                                </tr>
                            </tbody>                           
                        </table>
                    </div>
                    <div class="contaner-fluid">
                        <div class="row">
                            <div class="col-md-">
                                <button type="button" class="btn text-white"
                                                                            style="background-color: #063762; padding: 1% 30%"
                                                                            data-dismiss="modal">Cetak</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn text-white"
                                                                            style="background-color: #063762; padding: 1% 30%"
                                                                            data-dismiss="modal">Cetak</button>                                 
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            {{-- modal content --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="tambahNilaiModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0"
                        style="background-color: #e2e2e2;color: #19203F; font-weight: bold;">
                        <div class="modal-header p-1 border-bottom border-dark">
                            <h5 class="modal-title px-3" style="font-weight: bold">TAMBAH NILAI INDEX PRESTASI SEMESTER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-borderless table-striped text-uppercase"
                                style="background-color: #EEEEEE;">
                                <tbody>
                                    <tr>
                                        <td class="form-group">
                                            <label for="nilai">Nilai</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="Number" class="form-control border-0 bg-transparent"
                                                id="nilai">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-group">
                                            <label for="bobot">Bobot</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control border-0 bg-transparent"
                                                id="bobot">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer bg-whitesmoke border-top d-flex">
                            <div class="justify-content-start p-4">
                                <button type="button" class="btn text-white" style="background-color: #19203F;"
                                    data-dismiss="modal">Tambah</button>
                                <button type="button" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal content end --}}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
