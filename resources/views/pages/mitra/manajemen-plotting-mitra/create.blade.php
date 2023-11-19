@extends('layouts.base-admin')

@section('title')
    <title>Tambah Peserta | MBKM Poliwangi</title>
@endsection

@section('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-2">
                                <h5 class="justify-start">Tambah Peserta </h5>
                            </div>
                        </div>

                        {{-- Form Checklist Peserta Kelas --}}
                        <form action="{{ route('manajemen.plotting.mitra.store') }}" method="POST">
                            @csrf
                            @error('mahasiswas')
                                <div id="berkas" class="text-danger py-1">
                                    *pilih minimal satu mahasiswa
                                </div>
                            @else
                                <small>(Mohon Pilih Minimal Satu Mahasiswa)</small>
                            @enderror

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-center text-white">#</th>
                                                    <th class="text-center text-white">Nim</th>
                                                    <th class="text-center text-white">Nama</th>
                                                    <th class="text-center text-white">Angkatan</th>
                                                    <th class="text-center text-white">Prodi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                    @foreach($mahasiswaData as $mahasiswa)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="mahasiswas[]" value="{{ $mahasiswa->nim }}"  id="{{ $mahasiswa->id }}"
                                                            >
                                                        </td>
                                                        <td class="text-center">{{ $mahasiswa->mahasiswa->nim }}</td>
                                                        <td class="text-center">{{ $mahasiswa->mahasiswa->nama }}</td>
                                                        <td class="text-center">{{ $mahasiswa->mahasiswa->angkatan }}</td>
                                                        <td class="text-center">{{ $mahasiswa->mahasiswa->prodi->nama }}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-start mt-3">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <button type="submit" class="btn btn-primary mr-auto my-auto">
                                        Tambah
                                    </button>
                                    <a href="{{ route('manajemen.plotting.mitra.index') }}"
                                        class="btn btn-cancel">Back</a>
                                </div>
                            </div>
                        </form>
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
