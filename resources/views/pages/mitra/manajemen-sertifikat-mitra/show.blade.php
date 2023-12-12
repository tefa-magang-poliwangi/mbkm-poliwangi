@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Plotting PL Mitra ke Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-4">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Manajemen Sertifikat | {{ $lowongan->nama }}
                                </h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white">No</th>
                                                <th class="text-center text-white">Nama Mahasisiwa</th>
                                                <th class="text-center text-white">Action</th>
                                                <th class="text-center text-white">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($mahasiswas as $data)
                                                {{-- @foreach ($transkrip_mitras as $transkrip) --}}
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $data->nama }}</td>
                                                    <td class="text-center">
                                                        @if ($data->id_transkrip !== null)
                                                            <a href="{{ route('manajemen.sertifikat.mitra.showdetail', ['id_transkrip' => $data->id_transkrip ?? 0]) }}"
                                                                class="btn btn-info ml-auto" title="Lihat File">
                                                                <i class="fa-solid fa-eye"></i> Lihat
                                                            </a>
                                                        @else
                                                            <button class="btn btn-warning ml-auto" data-toggle="modal"
                                                                data-target="#uploadmodal{{ $data->id_pelamar }}">
                                                                <i class="fa-solid fa-upload"></i> Upload
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- Tombol Delete -->
                                                        <form
                                                            action="{{ route('manajemen.sertifikat.mitra.destroy', ['id_transkrip' => $data->id_transkrip ?? 0]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus transkrip ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                                {{-- @endforeach --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex mt-3">
                            <a href="{{ route('manajemen.sertifikat.mitra.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Evaluasi -->
        @foreach ($transkrip_mitra as $item)
            @if ($item->pelamar_magang->mahasiswa->where('id', $data->id))
                <!-- Modal for Text -->
                <div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="textModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Transkrip</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <!-- Modal Lihat file Sertifikat -->
        @foreach ($mahasiswas as $data)
            <div class="modal fade" tabindex="-1" role="dialog" id="viewSertifikatModal{{ $data->id }}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Lihat File Sertifikat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <embed src="{{ asset('mitra_sertifikat/') }}" type="application/pdf" width="100%"
                                height="600px" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal Lihat file Transkrip -->
        @foreach ($mahasiswas as $data)
            <div class="modal fade" tabindex="-1" role="dialog" id="viewTranskripModal{{ $data->id }}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Lihat File Transkrip</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <embed src="{{ asset('mitra_sertifikat/') }}" type="application/pdf" width="100%"
                                height="600px" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal upload Mitra -->
        @foreach ($pelamar_magang as $data)
            <div class="modal fade" tabindex="-1" role="dialog" id="uploadmodal{{ $data->id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Sertifikat dan Transkrip</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('manajemen.sertifikat.mitra.store', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="fileSertifikat">Upload Sertifikat</label>
                                    <input type="file"
                                        class="form-control @error('file_sertifikat')
                                        is-invalid
                                    @enderror"
                                        name="file_sertifikat" id="file_sertifikat" accept=".pdf">
                                    @error('file_sertifikat')
                                        <div id="file_sertifikat" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fileTranskrip">Upload Transkrip</label>
                                    <input type="file"
                                        class="form-control @error('file_transkrip')
                                        is-invalid
                                    @enderror"
                                        name="file_transkrip" id="file_transkrip" accept=".pdf">
                                    @error('file_transkrip')
                                        <div id="file_transkrip" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="evaluasi">Evaluasi Mitra</label>
                                    <textarea
                                        class="form-control @error('evaluasi')
                                        is-invalid
                                    @enderror"
                                        name="evaluasi" id="evaluasi" rows="8"></textarea>
                                    @error('evaluasi')
                                        <div id="evaluasi" class="form-text text-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col d-flex">
                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-cancel"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
