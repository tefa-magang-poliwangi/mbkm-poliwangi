@extends('layouts.base-admin')

@section('title')
    <title>Konversi Nilai | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid py-3">
        <section class="py-4">
            <div class="col text-start d-flex text-uppercase">
                <div class="px-2">
                    <i class="fa-solid fa-file-invoice fa-3x"></i>
                </div>
                <div>
                    <h4 class="text-theme">Konversi NIlai</h4>
                    <h6 class="text-theme">Rini Maulida</h6>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <iframe src="{{ asset('doc/contoh.pdf') }}" width="100%" height="700px"></iframe>
            </div>

            <div class="col">
                <div class="table-responsive d-flex flex-column">
                    <form action="" method="post">
                        @csrf

                        <div>
                            <table class="table table-hover table-borderless text-white" style="background-color: #EEEEEE;">
                                @php
                                    $no = 1;
                                @endphp
                                <thead style="background-color: #063762; color: white;">
                                    <tr class="text-white-header">
                                        <th>
                                            No
                                        </th>
                                        <th>Kode Matakuliah</th>
                                        <th>Matakuliah</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matakuiah as $data)
                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>
                                            <td>{{ $data->kode_matakuliah }}</td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                <input type="text" class="hidden" name="id_mahasiswa" value="">
                                                <input type="text" class="form-control" name="nilai_angka"
                                                    id="{{ $data->kode_matakuliah }}">
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="contaner-fluid">
                            <div class="row">
                                <div class="col-6 text-right ">
                                    <button type="submit" class="btn btn-theme btn-block">Save</button>
                                </div>
                                <div class="col-6 text-left">
                                    <button type="submit" class="btn btn-theme btn-block">cancel</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- modal content --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="tambahNilaiModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0" style="background-color: #e2e2e2;color: #19203F; font-weight: bold;">
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
                                        <input type="Number" class="form-control border-0 bg-transparent" id="nilai">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form-group">
                                        <label for="bobot">Bobot</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control border-0 bg-transparent" id="bobot">
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
