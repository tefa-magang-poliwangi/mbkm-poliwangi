@extends('layouts.base-admin')

@section('title')
    <title>Daftar Transkrip Nilai | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-white mt-2">
                        <h3 class="text-theme">Daftar Transkrip Nilai</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded bg-white" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-white">Nama</th>
                                        <th class="text-center text-white">NIM</th>
                                        <th class="text-white">Program Studi</th>
                                        <th class="text-center text-white">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($nilai_magang_ext as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $data->mahasiswa->nama }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                            <td>{{ $data->mahasiswa->prodi->nama }}</td>

                                            <td class="text-center">
                                                @if (
                                                    $data->mahasiswa->peserta_kelas &&
                                                        $data->mahasiswa->peserta_kelas->count() > 0 &&
                                                        $data->mahasiswa->peserta_dosen->count() > 0)
                                                    <a href="{{ route('daftar.transkrip.mahasiswa.ext.show', [$data->id_mahasiswa, $data->id_magang_ext, $data->id]) }}"
                                                        class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"
                                                            title="Siap Dikonversi"></i></a>
                                                @else
                                                    <a href="#" class="btn btn-danger ml-auto"
                                                        title="Mahasiswa Tidak Memiliki Kelas dan Dosen Wali"><i
                                                            class="fa-solid fa-eye-slash"></i></a>
                                                @endif
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
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }} "></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
