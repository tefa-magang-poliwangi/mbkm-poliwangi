@extends('layouts.base-admin')

@section('title')
    <title>Laporan Mingguan | MBKM Poliwangi</title>
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <section>
            <div class="col text-start d-flex text-uppercase align-items-center">
                <div class="px-2">
                    <i class="fa fa-edit fa-lg text-dark"></i>
                </div>

                <div>
                    <h3 class="text-dark">Daftar Laporan Mingguan Mahasiswa</h3>
                </div>
            </div>

        </section>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 text-dark">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded text-center" id="table-1"
                                style="background-color: #EEEEEE; font-weight:bold;">
                                <thead>
                                    <tr>
                                        <th class="text-dark">
                                            No
                                            <i class="fas fa-sort text-dark"></i>
                                        </th>
                                        <th class="text-dark">
                                            Nama
                                            <i class="fas fa-sort text-dark"></i>
                                        </th>
                                        <th class="text-dark">
                                            NIM
                                            <i class="fas fa-sort text-dark"></i>
                                        </th>
                                        <th class="text-dark">
                                            Nama Perusahaan
                                            <i class="fas fa-sort text-dark"></i>
                                        </th>
                                        <th class="text-dark">
                                            Action
                                            <i class="fas fa-sort text-dark"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #fff">
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>Rini Maulidia</td>
                                        <td>
                                            362055401012
                                        </td>
                                        <td>
                                            PT. Inka
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-transparent">
                                                <i class="far fa-edit text-dark"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>Rini Maulida</td>
                                        <td>
                                            362055401084
                                        </td>
                                        <td>
                                            PT. Inka
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-transparent">
                                                <i class="far fa-edit text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>Rini Maulidia</td>
                                        <td>
                                            362055401084
                                        </td>
                                        <td>
                                            PT. Inka
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-transparent">
                                                <i class="far fa-edit text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>Rini Maulidia</td>
                                        <td>
                                            362055401084
                                        </td>
                                        <td>
                                            PT. Inka
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-transparent">
                                                <i class="far fa-edit text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
