@extends('layouts.base-admin')

@section('title')
    <title>Daftar Mahasiswa Hasil Konversi Nilai | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white border-0">
                        <strong class="h4">Hasil Transkrip Nilai (Aida Andinar)</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Kode</th>
                                        <th>Mata Kuliah</th>
                                        <th>HM</th>
                                        <th>AM</th>
                                        <th>K</th>
                                        <th>M</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>RPL25042
                                        <td>
                                            Proyek Aplikasi Lanjut
                                        </td>
                                        <td>
                                            A
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            8
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>RPL25042
                                        <td>
                                            Pengujian Perangkat Lunak
                                        </td>
                                        <td>
                                            AB
                                        </td>
                                        <td>
                                            3.5
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            7
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="ml-auto">
                    <a href="/dashboard-dosen/daftar-konversi" class="btn btn-theme">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }} "></script>
    {{-- <script src="{{ asset ('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/jquery-ui/jquery-ui.min.js')}} "></script> --}}

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
