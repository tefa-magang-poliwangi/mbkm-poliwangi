@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Perwalian | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Mahasiswa Dosen Wali
                                    ({{ $dosen_wali->dosen->nama }}) {{ $prodi->nama }}
                                </h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('manajemen.peserta.dosen.create', [$id_dosen_wali, $id_prodi]) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Mahasiswa
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">NIM</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white">Prodi</th>
                                        <th class="text-center text-white">Angkatan</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peserta_dosen as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no }}
                                            </td>
                                            <td>
                                                {{ $item->mahasiswa->nim }}
                                            </td>
                                            <td>
                                                {{ $item->mahasiswa->nama }}
                                            </td>
                                            <td>
                                                {{ $item->mahasiswa->prodi->nama }}
                                            </td>
                                            <td>{{ $item->mahasiswa->angkatan }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.peserta.dosen.destroy', $item->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
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
