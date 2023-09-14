@extends('layouts.base-user')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-5">
        <div class="container py-5">
            <div class="row row-1 pt-5">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">
                            Uploud Transkip Nilai Mahasiswa
                        </h4>
                    </div>
                </div>
            </div>

            <div class="row pt-2 d-flex justify-content-arround">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <h4 class="header-title mt-1 mb-3">Transkip Nilai</h4>
                            <div class="nav flex-column">
                                <a class="nav-link active">
                                    <i class="mr-3 text-warning d-inline-block">
                                    </i>
                                    <div class="d-inline-block align-self-center ">
                                        <h5 class="m-0">
                                            Tambah Transkip Nilai
                                        </h5>
                                    </div>
                                </a>
                                <a class="nav-link active">
                                    <i class="mr-3 text-warning d-inline-block">
                                    </i>
                                    <div class="d-inline-block align-self-center">
                                        <h5 class="m-2">
                                            Daftar Transkip Nilai
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body py-4">
                            <h4 class="header-title mt-0 mb-3">Transkip Nilai</h4>

                            <label class="form-label">
                                File Transkip
                                <span class="text-primary">
                                    *(wajib, pdf only)
                                </span>
                            </label>

                            <div class="nav flex-column">
                                <div id="drop-area">
                                    <a class="nav-link active">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" placeholder="Choose file to upload"
                                                aria-label="Choose file to upload" aria-describedby="button-addon2"
                                                id="fileInput">
                                        </div>
                                    </a>

                                </div>

                                <script>
                                    const dropArea = document.getElementById('drop-area');
                                    const fileInput = document.getElementById('fileInput');

                                    dropArea.addEventListener('dragover', (e) => {
                                        e.preventDefault();
                                        dropArea.classList.add('active');
                                    });

                                    dropArea.addEventListener('dragleave', () => {
                                        dropArea.classList.remove('active');
                                    });

                                    dropArea.addEventListener('drop', (e) => {
                                        e.preventDefault();
                                        dropArea.classList.remove('active');
                                        const files = e.dataTransfer.files;
                                        handleFiles(files);
                                    });

                                    fileInput.addEventListener('change', () => {
                                        const files = fileInput.files;
                                        handleFiles(files);
                                    });

                                    function handleFiles(files) {
                                        // Kirim file ke server dengan Ajax atau selesaikan logika Anda di sini
                                    }
                                </script>

                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </section>

    {{-- <div class="col-lg-9">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div> --}}
@endsection
