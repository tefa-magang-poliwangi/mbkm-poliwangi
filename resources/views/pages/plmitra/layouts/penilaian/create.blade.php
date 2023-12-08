@extends('layouts.base-admin')

@section('title')
    <title>Penilai Mitra | MBKM Poliwangi</title>
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
    <section class="my-5">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card card-border card-rounded-sm me-auto">
                        <div class="card-body">
                            <form action="{{ route('penilaian.store') }}" method="post">
                                @csrf <!-- Tambahkan ini untuk melindungi formulir dari serangan CSRF -->

                                <div class="table-responsive">
                                    <input type="text" name="mahasiswa_id" class="d-none" value="{{ $mahasiswa->id }}">
                                    <table class="table table-hover table-bordered text-white bg-white">
                                        <thead class="bg-theme text-white">
                                            <tr class="text-white-header">
                                                <th class="text-white text-center">Nama</th>
                                                <th width="30%" class="text-white text-center">Nilai</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($kompetensi_Lowongans as $kompetensilowongan)
                                                <tr>
                                                    <td class="mb-3">
                                                        {{ $kompetensilowongan->kompetensi }}
                                                        <input type="hidden" name="program[]"
                                                            value="{{ $kompetensilowongan->id_kompetensi_program }}">
                                                    </td>
                                                    <td class="mb-3">
                                                        <input type="number" class="form-control" name="nilai[]"
                                                            min="0" max="100" step="1">
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('penilaian.create', ['id_mahasiswa' => $id_mahasiswa]) }}"
                                            class="btn btn-danger btn-block">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card card-border card-rounded-sm me-auto">
                        <div class="card-body">
                            <form action="{{ route('penilaian.update') }}" method="post">
                                <input type="text" value="{{ $mahasiswa->id }}" name="mahasiswa_id" class="d-none">
                                @csrf <!-- Tambahkan ini untuk melindungi formulir dari serangan CSRF -->
                                @method('PUT')
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered text-white bg-white">
                                        <thead class="bg-theme text-white">
                                            <tr class="text-white-header">
                                                <th class="text-white text-center">No</th>
                                                <th class="text-white text-center">Program</th>
                                                <th width="30%" class="text-white text-center">Nilai</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($nilaiMagangs as $nilaiMagang)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="mb-3">
                                                        {{ $nilaiMagang->kompetensi_program->kompetensi_lowongan->kompetensi }}
                                                            <input type="hidden" name="nilaimagang_id[]"
                                                            value="{{ $nilaiMagang->id }}">
                                                            <input type="hidden" name="program[]"
                                                            value="{{ $nilaiMagang->kompetensi_program->kompetensi_lowongan->id }}">
                                                    </td>
                                                    <td class="mb-3">
                                                        <input type="number" class="form-control" name="nilai[]"
                                                            min="0" max="100" step="1"  value="{{$nilaiMagang->nilai_angka}}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block">Update Nilai</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('penilaian.create', ['id_mahasiswa' => $id_mahasiswa]) }}"
                                            class="btn btn-danger btn-block">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 ms-auto">
                    <div class="card card-rounded-sm card-hover d-flex flex-column">
                        <div class="card-body">
                            <span class="fw-bold">Petunjuk Rentang Pengisian Nilai : </span><br>
                            <!-- Tabel Rentang Nilai -->
                            <div class="table-responsive mt-2">
                                <table class="table table-hover text-white bg-white table-bordered">
                                    <thead class="bg-theme text-white">
                                        <tr class="text-white-header">
                                            <th class="text-white text-center">No</th>
                                            <th class="text-white text-center">Rentang Nilai Angka</th>
                                            <th class="text-white text-center">Nilai Huruf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi Tabel Rentang Nilai -->
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">81 - 100</td>
                                            <td class="text-center">A</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">71 - 80</td>
                                            <td class="text-center">AB</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">66 - 70</td>
                                            <td class="text-center">B</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-center">61 - 65</td>
                                            <td class="text-center">BC</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-center">56 - 60</td>
                                            <td class="text-center">C</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="text-center">41 - 55</td>
                                            <td class="text-center">D</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="text-center">0 - 40</td>
                                            <td class="text-center">E</td>
                                        </tr>
                                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="accordion-nilai-kriteria">
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                data-target="#panel-1" aria-expanded="true">
                                <h4>Daftar Nilai</h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-1"
                                data-parent="#accordion-nilai-kriteria">
                                <div class="card card-border card-rounded-sm card-hover my-auto">
                                    <div class="card-body">
                                        <h5 class="header-title text-theme mb-3">Nilai Mitra</h5>

                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th class="text-white text-center">No</th>
                                                        <th class="text-white text-center">Program</th>
                                                        <th class="text-white text-center">Nilai Angka</th>
                                                        <th class="text-white text-center">Nilai Huruf</th>
                                                        <th class="text-white text-center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($nilaiMagangs as $nilaiMagang)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                {{ $nilaiMagang->kompetensi_program->kompetensi_lowongan->kompetensi }}
                                                            </td>
                                                            <td class="text-center">{{ $nilaiMagang->nilai_angka }}</td>
                                                            <td class="text-center">{{ $nilaiMagang->nilai_huruf }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('penilaian.destroy', ['id_nilaimagang' => $nilaiMagang->id]) }}"
                                                                    class="btn btn-danger ml-auto"><i
                                                                        class="fa-solid fa-trash"></i></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
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
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables pada tabel pertama jika memiliki data
            if ($('#table-1 tbody tr').length > 0) {
                $('#table-1').DataTable();
            }

            // Inisialisasi DataTables pada tabel kedua jika memiliki data
            if ($('#table-2 tbody tr').length > 0) {
                $('#table-2').DataTable();
            }
        });
    </script>
@endsection
