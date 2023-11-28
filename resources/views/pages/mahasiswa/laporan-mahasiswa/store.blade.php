@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/modules/dropzonejs/dropzone.css">
@endsection

@section('content')
<div class="container-fluid row py-6">
    <div class="col-12 py-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Akhir</h4>
                <form action="#" class="dropzone mb-3" id="mydropzone">
                    <div class="dz-default dz-message">
                        <span>Drop file here to upload</span>
                    </div>
                </form>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" aria-describedby="button-addon2" id="file_image" name="file_image">
                </div>
                <div class="text-center py-3">
                    <button class="btn btn-theme-two">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="assets/js/page/components-multiple-upload.js"></script>
    <!-- Sertakan skrip Dropzone.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        var myDropzone = new Dropzone("#mydropzone", {
            url: "/upload",  // Ganti dengan URL endpoint untuk mengelola upload file
            paramName: "file", // Ganti dengan nama parameter yang akan digunakan pada server
            maxFilesize: 5, // Batasan ukuran file (dalam megabyte)
            acceptedFiles: ".pdf, .doc, .docx", // Jenis file yang diterima
            dictDefaultMessage: "Seret file di sini atau klik untuk memilih file", // Pesan default
        });
        // Event ketika file diupload
        myDropzone.on("success", function (file, response) {
            // Proses setelah file diupload sukses
            console.log(response);
        });
    });
</script>

@endsection