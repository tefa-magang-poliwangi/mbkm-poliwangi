@extends('layouts.base-mahasiswa')

@section('title')
    <title>Transkrip Nilai Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="pt-4">
            <h4 class="text-theme">Upload Transkrip Nilai Mahasiswa</h4>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card card-border card-rounded-sm card-hover">
                    <div class="card-body pb-4  ">
                        <h5 class="mb-3">Menu Transkrip Nilai</h5>

                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#form-transkip" role="tab">Formulir Upload Trankrip</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#daftar-transkip" role="tab">Daftar Transkrip Nilai</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#hasil-transkip" role="tab">Hasil Transkrip Nilai</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-8">
                {{-- Form Upload Transkip --}}
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active card card-border card-rounded-sm card-hover" id="form-transkip"
                        role="tabpanel" aria-labelledby="list-home-list">
                        <form action="{{ route('upload.transkrip.mahasiswa.store', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Transkrip Nilai</h4>

                                <label class="form-label">
                                    File Transkip
                                    <span class="text-primary">
                                        *(wajib, pdf only)
                                    </span>
                                </label>

                                <div class="flex-column">
                                    <div id="drop-area">
                                        <a class="nav-link active">
                                            <div class="input-group mb-3">
                                                <input type="file"
                                                    class="form-control  @error('file') is-invalid @enderror"
                                                    placeholder="Choose file to upload" aria-label="Choose file to upload"
                                                    aria-describedby="button-addon2" id="file" name="file">
                                            </div>
                                            @error('file')
                                                <div id="file" class="form-text text-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Magang Eksternal</label>
                                        <select
                                            class="form-control @error('magang_eksternal')
                                            is-invalid
                                        @enderror"
                                            id="magang_eksternal" name="magang_eksternal">
                                            <option value="">Pilih Perusahaan</option>
                                            @foreach ($magangext as $datamagang)
                                                <option value="{{ $datamagang->id }}">{{ $datamagang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('magang_eksternal')
                                        <div id="magang_eksternal" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label class="form-label">Periode</label>
                                        <select
                                            class="form-control @error('periode')
                                            is-invalid
                                        @enderror"
                                            id="periode" name="periode">
                                            <option value="">Periode</option>
                                            @foreach ($periode as $dataperiode)
                                                <option value="{{ $dataperiode->id }}">{{ $dataperiode->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('periode')
                                        <div id="periode" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror

                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Daftar Transkip Nilai --}}
                    <div class="tab-pane fade pt-0" id="daftar-transkip" role="tabpanel"
                        aria-labelledby="list-profile-list">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                @if ($nilaimagangext->isEmpty())
                                    <span>Transkrip Nilai Belum Ditambahkan</span>
                                @else
                                    @foreach ($nilaimagangext as $data)
                                    <div class="row">
                                        <div class="card card-border card-rounded-sm card-hover">
                                            <div class="card-body">
                                                <div class="file-box" title="pendaftaran">
                                                    <div class="row">
                                                        <div class="col-6 d-flex">
                                                            <a href="#" class="mr-auto my-auto">
                                                                <i
                                                                    class="fa-regular fa-trash-can text-size text-danger"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6 d-flex">
                                                            <a href="{{ Storage::url($data->file) }}" target="_blank"
                                                                class="ml-auto my-auto">
                                                                <i class="fa-solid fa-download text-size text-success"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="text-center py-3">
                                                        <i class="far fa-file-pdf text-primary fs-transkrip"></i>
                                                        <h6 class="text-truncate">
                                                            Transkrip Nilai.pdf
                                                        </h6>
                                                        <small class="text-muted">-
                                                            <br>
                                                            10 MB
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>

                    {{-- Hasil Transkip Nilai --}}
                    <div class="tab-pane fade pt-0" id="hasil-transkip" role="tabpanel"
                        aria-labelledby="list-profile-list">
                        <div class="card card-border card-rounded-sm card-hover">
                            <div class="card-body">
                                <h5 class="header-title mt-0 mb-3">Transkrip Nilai Mata Kuliah : {{ $mahasiswa->nama }}
                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless rounded" id="table-2"
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
                                                    7
                                                </td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
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
@endsection
