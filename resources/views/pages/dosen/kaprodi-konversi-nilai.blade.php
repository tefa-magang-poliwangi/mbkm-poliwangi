@extends('layouts.base-admin')

@section('title')
    <title>Konversi Nilai Mahasiswa | MBKM Poliwangi</title>
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
                        <h5 class="text-theme">{{ $nilai_magang_ext->mahasiswa->nama }}</h5>
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
                                <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                    data-target="#panel-body-1" aria-expanded="true">
                                    <h4>File Transkrip</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <iframe src="{{ Storage::url($nilai_magang_ext->file_transkrip) }}" width="100%"
                                        height="700px"></iframe>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                    data-target="#panel-body-2">
                                    <h4>File Sertifikat</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                    <iframe src="{{ Storage::url($nilai_magang_ext->file_sertifikat) }}" width="100%"
                                        height="700px"></iframe>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                    data-target="#panel-body-3">
                                    <h4>File Laporan Akhir</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                    <iframe src="{{ Storage::url($nilai_magang_ext->file_laporan_akhir) }}" width="100%"
                                        height="700px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                <div class="card card-rounded-sm card-hover d-flex flex-column">
                    <div class="card-body">
                        <form
                            action="{{ route('konversi.nilai.mahasiswa.ext.create', [$nilai_magang_ext->id_mahasiswa, $nilai_magang_ext->id]) }}"
                            method="post">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-white bg-white">
                                    <thead class="bg-theme text-white">
                                        <tr class="text-white-header">
                                            <th class="text-white text-center">No</th>
                                            <th class="text-white text-center">Kode</th>
                                            <th class="text-white text-center">Matakuliah</th>
                                            <th width="30%" class="text-white text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($matakuliah as $data)
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td class="text-center">{{ $data->matkul->kode_matakuliah }}</td>
                                                <td>{{ $data->matkul->nama }}</td>
                                                @php
                                                    // Cari NilaiKonversi yang sesuai berdasarkan id_matkul
                                                    $konversi = $nilai_konversi->where('id_matkul', $data->matkul->id)->first();
                                                @endphp
                                                <td>
                                                    <input type="number" class="form-control"
                                                        name="{{ $data->matkul->id }}"
                                                        placeholder="{{ $konversi ? $konversi->nilai_angka : 'Nilai angka' }}"
                                                        {{ $konversi ? 'disabled' : 'required' }} min="0"
                                                        max="100" step="1">
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
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
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($nilai_huruf as $item_nilai)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $item_nilai->batas_bawah }} -
                                                {{ $item_nilai->batas_atas }}</td>
                                            <td class="text-center">{{ $item_nilai->nilai_huruf }}</td>
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

        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="accordion-nilai-kriteria">
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                data-target="#panel-1" aria-expanded="true">
                                <h4>Daftar Nilai Hasil Transkrip</h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-1"
                                data-parent="#accordion-nilai-kriteria">
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
                                                    @php
                                                        $no = 1;
                                                    @endphp

                                                    @if ($nilai_konversi->isEmpty())
                                                        <tr>
                                                            <td colspan="8" class="text-center">Mohon Tambahkan Nilai
                                                                Konversi</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($nilai_konversi as $data)
                                                            <tr>
                                                                <td class="text-center">{{ $no }}</td>
                                                                <td class="text-center">
                                                                    {{ $data->matkul->kode_matakuliah }}</td>
                                                                <td>{{ $data->matkul->nama }}</td>
                                                                <td class="text-center">{{ $data->nilai_angka }}</td>
                                                                <td class="text-center">{{ $data->nilai_huruf }}</td>
                                                                <td class="text-center">{{ $data->kredit }}</td>
                                                                <td class="text-center">{{ $data->mutu }}</td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('konversi.nilai.mahasiswa.ext.destroy', $data->id) }}"
                                                                        class="btn btn-danger ml-auto"><i
                                                                            class="fa-solid fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $no++;
                                                            @endphp
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header card-border" role="button" data-toggle="collapse"
                                data-target="#panel-2">
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
                                                    @php
                                                        $no = 1;
                                                    @endphp

                                                    @if ($nilai_kriteria_mhs->isEmpty())
                                                        <tr>
                                                            <td colspan="8" class="text-center">Mohon tunggu atau
                                                                konfirmasi kepada Mahasiswa</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($nilai_kriteria_mhs as $item)
                                                            <tr>
                                                                <td class="text-center">{{ $no }}</td>
                                                                <td class="text-center">{{ $item->name }}
                                                                </td>
                                                                <td class="text-center">{{ $item->penilaian }}</td>
                                                                <td class="text-center">{{ $item->nilai }}</td>
                                                            </tr>
                                                            @php
                                                                $no++;
                                                            @endphp
                                                        @endforeach
                                                    @endif
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
