@extends('layouts.base-admin')

@section('title')
    <title>Upload Transkrip Nilai Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="">
        <div class="row pt-5">
            <h4 class="text-theme mb-4"></h4>

            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card card-border card-rounded-sm card-hover">
                    <div class="card-body pb-4  ">
                        <h6 class="mb-3">Menu manajemen sertifikat detail</h6>

                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#sertifikat" role="tab">1. Lihat Sertifikat</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#transkip-dokumen" role="tab">2. Lihat Transkrip Nilai</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#laporan-akhir" role="tab">3. Lihat Laporan Akhir</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#evaluasi" role="tab">4. Lihat hasil Evaluasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-8">
                <div class="tab-content" id="nav-tabContent">
                    {{-- Form Upload Transkrip --}}
                    <div class="tab-pane fade show active card card-border card-rounded-sm card-hover" id="sertifikat"
                        role="tabpanel" aria-labelledby="list-home-list">
                        <iframe src="{{ Storage::url('sertifikat/' . $transkrip->file_sertifikat) }}" width="100%"
                            height="600px"></iframe>
                    </div>
                    <div class="tab-pane fade show card card-border card-rounded-sm card-hover" id="transkip-dokumen"
                        role="tabpanel" aria-labelledby="list-home-list">
                        <iframe src="{{ Storage::url('transkrip/' . $transkrip->file_transkrip) }}" width="100%"
                            height="600px"></iframe>
                    </div>
                    <div class="tab-pane fade show card card-border card-rounded-sm card-hover" id="laporan-akhir"
                        role="tabpanel" aria-labelledby="list-home-list">
                        <iframe src="{{ Storage::url( $transkrip->file_laporan_akhir) }}" width="100%"
                            height="600px"></iframe>
                    </div>
                    <div class="tab-pane fade pt-0" id="evaluasi" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="card">
                            <div class="card-header">
                                <h4>Evaluasi Mahasiswa Magang </h4>
                            </div>
                            <div class="card-body">
                                <p>{{ $transkrip->evaluasi }}</p>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                By "Mentor"
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
