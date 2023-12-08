@extends('layouts.base-admin')

@section('title')
<title>Konversi Nilai Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="">
    <div class="pt-5 pb-4">
        <div class="row bg-white card-rounded-sm">
            <div class="col-12 col-sm-2 col-md-2 col-lg-1 text-start d-flex text-uppercase d-lg-flex pt-2 pb-2 mt-1">
                <div class="px-3 mx-auto my-auto">
                    <i class="fa-solid fa-file-invoice fa-2x text-theme fs-50"></i>
                </div>
            </div>
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 d-flex pt-2 pb-2 mt-1">
                <div class="my-auto">
                    <h4 class="text-theme text-capitalize">KONVERSI NILAI MBKM</h4>
                    <h5 class="text-theme">{{ $user->name }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                <h4>File Transkrip</h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                <iframe src="" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                <h4>File Sertifikat</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                <iframe src="" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                <h4>File Laporan Akhir</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                <iframe src="" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-7">
            <div class="card card-rounded-sm card-hover d-flex flex-column">
                <div class="card-body">
                    <form action="{{ route('konversinilai.update', ['id_mahasiswa' => $mahasiswa->id]) }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-white bg-white">
                                <thead class="bg-theme text-white">
                                    <tr class="text-white-header">
                                        <th class="text-white text-center">No</th>
                                        <th class="text-white text-center">Kode</th>
                                        <th class="text-white text-center">Matakuliah</th>
                                        <th class="text-white text-center">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp

                                    @forelse($nilaiKonversi as $index => $konversi)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $konversi->matkul->kode_matakuliah }}</td>
                                        <td>{{ $konversi->matkul->nama }}</td>

                                        <td>
                                            <input type="text" class="form-control" name="{{ $konversi->matkul->id }}" placeholder="{{ $konversi->nilai_angka }}" pattern="[0-9]*">
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Mohon Tambahkan Nilai Konversi</td>
                                    </tr>
                                    @endforelse

                                    @php
                                    $no++;
                                    @endphp
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-6 text-right ">
                                <button type="submit" class="btn btn-primary btn-block">Konversi Sekarang</button>
                            </div>
                            <div class="col-6 text-left">
                                <button type="reset" class="btn btn-danger btn-block">Batal</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card card-border card-rounded-sm">
                <div class="card-body">
                    <span class="fw-bold">Petunjuk Rentang Pengisian Nilai : </span><br>

                    {{-- <ol>
                        <li>A (90 - 100)</li>
                        <li>AB (80 - 89)</li>
                        <li>B (70 - 79)</li>
                        <li>BC (60 - 69)</li>
                        <li>C (50 - 59)</li>
                        <li>D (40 - 49)</li>
                        <li>E (0 - 39)</li>
                    </ol> --}}

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
                            </tbody>
                        </table>
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
                        <div class="accordion-header card-border" role="button" data-toggle="collapse" data-target="#panel-1" aria-expanded="true">
                            <h4>Daftar Nilai Hasil Transkrip</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-1" data-parent="#accordion-nilai-kriteria">
                            {{-- Hasil Transkip Nilai --}}
                            <div class="card card-border card-rounded-sm card-hover my-auto">
                                <div class="card-body">
                                    <h5 class="header-title text-theme mb-3">Transkrip Nilai Hasil Konversi</h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-white text-center">No</th>
                                                    <th class="text-white text-center">Kode</th>
                                                    <th class="text-white text-center">Mata Kuliah</th>
                                                    <th class="text-white text-center">Nilai Angka</th>
                                                    <th class="text-white text-center">Nilai Huruf</th>
                                                    <th class="text-white text-center">Kredit</th>
                                                    <th class="text-white text-center">Mutu</th>
                                                    <th class="text-white text-center">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($nilaiKonversi as $index => $konversi)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $konversi->matkul->kode_matakuliah }}
                                                    </td>
                                                    <td>{{ $konversi->matkul->nama }}</td>
                                                    <td class="text-center">{{ $konversi->nilai_angka }}</td>
                                                    <td class="text-center">{{ $konversi->nilai_huruf }}</td>
                                                    <td class="text-center">{{ $konversi->kredit }}</td>
                                                    <td class="text-center">{{ $konversi->mutu }}</td>
                                                    <td class="text-center">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Mohon Tambahkan Nilai Konversi
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header card-border" role="button" data-toggle="collapse" data-target="#panel-2">
                            <h4>Daftar Nilai Kriteria</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-2" data-parent="#accordion-nilai-kriteria">
                            {{-- Hasil Nilai Input Kriteria --}}
                            <div class="card card-border card-rounded-sm card-hover my-auto">
                                <div class="card-body">
                                    <h5 class="header-title text-theme mb-3">Nilai Kriteria Mahasiswa</h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-2">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-white text-center">No</th>
                                                    <th class="text-white text-center">Nama Tempat Magang</th>
                                                    <th class="text-white text-center">Kriteria Penilaian</th>
                                                    <th class="text-white text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pelamarMagangs as $index => $pelamarMagang)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $pelamarMagang->lowongan->nama }}</td>

                                                    <td class="text-center">

                                                    </td>
                                                    <td class="text-center">

                                                    </td>
                                                </tr>
                                                @empty
                                                {{-- Display a message when there is no data --}}
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada data nilai kriteria
                                                        untuk ditampilkan.</td>
                                                </tr>
                                                @endforelse

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
{{-- Datata
ble JS --}}
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>













<script>



























</script>









@endsection