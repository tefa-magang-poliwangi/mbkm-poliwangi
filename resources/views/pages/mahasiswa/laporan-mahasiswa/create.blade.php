@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
<div class="container-fluid row py-6">
    <div class="col-12 py-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bagaimana kegiatanmu hari ini?</h4>
                <div class="form-group">
                    <textarea id="exampleFormControlTextarea1" style="width:100%; height: 300px;" placeholder="Tips: ceritakan kegiatanmu tanpa menginformasikan data yang bersifat rahasia"></textarea>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
