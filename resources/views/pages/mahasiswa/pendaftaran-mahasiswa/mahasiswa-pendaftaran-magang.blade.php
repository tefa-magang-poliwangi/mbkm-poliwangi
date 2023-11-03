@extends('layouts.base-guest')
@section('title')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid pt-4">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-10 py-5">
                    <div class="card-body">
                        <h4>Daftar Pelamar</h4>
                    </div>
                    <div class="py-3">
                        <div class="custom-file form-group container-file input-file">
                            <h6>Curriculum Vitae</h6>
                            <input type="file" id="myFile" name="filename" class="form-control">
                        </div>
                        <div class="custom-file form-group container-file input-file">
                            <h6>Transkrip Nilai</h6>
                            <input type="file" id="myFile" name="filename" class="form-control">
                        </div>
                        <div class="custom-file form-group container-file input-file">
                            <h6>KTP</h6>
                            <input type="file" id="myFile" name="filename" class="form-control">
                        </div>
                        <div class="custom-file form-group container-file input-file">
                            <h6>Sertifikat Pengalaman Organisasi</h6>
                            <input type="file" id="myFile" name="filename" class="form-control">
                        </div>
                        <div class="custom-file form-group container-file input-file">
                            <h6>Dokumen Tambahan</h6>
                            <input type="file" id="myFile" name="filename" class="form-control">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
