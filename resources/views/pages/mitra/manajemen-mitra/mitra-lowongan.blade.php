@extends('layouts.base-admin')
@section('title')
    <title>Profile MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>MAGANG KERJA INDUSTRI</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <b>Note!</b> Pastikan data lowongan yang dimasukkan benar .
                            </div>
                            <div class="form-group">
                                <label>Nama Lowongan</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Buka</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Tutup</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Cansel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @endsection
