@extends('layouts.base-client')
@section('title')
    <title>Beranda MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <section>
            <div class="col text-start">
                <i class="fa-solid fa-file-invoice fa-3x"></i>
                <h2>Konversi Nilai</h2>
                <h6>Rini Maulida</h6>
            </div>
        </section>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <iframe src="{{ asset('doc/contoh.pdf') }}" width="100%" height="700px"></iframe>
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless text-uppercase" style="background-color: #EEEEEE;">
                        <thead style="background-color: #063762; color: white;">
                            <tr>
                                <th class="text-center">
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
                                <td>Aida Andinar Maulidiana</td>
                                <td>
                                    362055401012
                                </td>
                                <td>
                                    <a href="#" class="btn btn-transparent"><i
                                            class="fa-solid fa-file-pen text-dark"></i></a>
                                    <a href="#" class="btn btn-transparent"><i
                                            class="fa-solid fa-trash-can text-danger"></i></a>
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
                                    <a href="#" class="btn btn-transparent"><i
                                            class="fa-solid fa-file-pen text-dark"></i></a>
                                    <a href="#" class="btn btn-transparent"><i
                                            class="fa-solid fa-trash-can text-danger"></i></a>
                                </td>
                            </tr>                                                                                                                
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
