@extends('layouts.base-admin')

@section('title')
    <title>Konversi Nilai | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid py-3">
        <section class="py-4">
            <div class="col text-start d-flex text-uppercase pt-1">
                <div class="px-2">
                    <i class="fa-solid fa-file-invoice fa-2x"></i>
                </div>
                <div>
                    <h4 class="text-theme text-capitalize">Konversi Nilai Magang : {{ $nilai_magang_ext->mahasiswa->nama }}
                    </h4>
                </div>
            </div>
        </section>
        <div class="row mb-5">

            <div class="col-sm-12 col-md-6">
                <iframe src="{{ asset('doc/contoh.pdf') }}" width="100%" height="700px"></iframe>
            </div>

            <div class="col">
                <div class="table-responsive d-flex flex-column">
                    <form
                        action="{{ route('konversi_nilai.mahasiswa.external', [$nilai_magang_ext->id_mahasiswa, $nilai_magang_ext->id]) }}"
                        method="post">
                        @csrf

                        <div>
                            <table class="table table-hover table-borderless text-white" style="background-color: #EEEEEE;">
                                @php
                                    $no = 1;
                                @endphp
                                <thead style="background-color: #063762; color: white;">
                                    <tr class="text-white-header">
                                        <th class="text-white">
                                            No
                                        </th>
                                        <th class="text-white">Kode Matakuliah</th>
                                        <th class="text-white">Matakuliah</th>
                                        <th class="text-white">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matakuliah as $data)
                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>
                                            <td>{{ $data->matkul->kode_matakuliah }}</td>
                                            <td>
                                                {{ $data->matkul->nama }}
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="{{ $data->matkul->id }}">
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="contaner-fluid">
                            <div class="row">
                                <div class="col-6 text-right ">
                                    <button type="submit" class="btn btn-theme btn-block">Save</button>
                                </div>
                                <div class="col-6 text-left">
                                    <button type="submit" class="btn btn-theme btn-block">Cancel</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col mt-5">
            {{-- Hasil Transkip Nilai --}}
            <div class="card card-border card-rounded-sm card-hover">
                <div class="card-body">
                    <h5 class="header-title mt-0 mb-3 text-theme">Transkrip Nilai Hasil Konversi
                    </h5>
                    <div class="table-responsive">
                        @php
                            $no = 1;
                        @endphp
                        <table class="table table-hover table-borderless rounded" id="table-3"
                            style="background-color: #EEEEEE;">
                            <thead>
                                <tr>
                                    <th class="text-theme">
                                        No
                                    </th>
                                    <th class="text-theme">Kode</th>
                                    <th class="text-theme">Mata Kuliah</th>
                                    <th class="text-theme">Nilai Angka</th>
                                    <th class="text-theme">Nilai Huruf</th>
                                </tr>
                            <tbody>
                                @foreach ($nilai_konversi as $data)
                                    <tr>
                                        <td>
                                            {{ $no }}
                                        </td>
                                        <td>{{ $data->matkul->kode_matakuliah }}</td>
                                        <td>
                                            {{ $data->matkul->nama }}
                                        </td>
                                        <td>
                                            {{ $data->nilai_angka }}
                                        </td>
                                        <td>
                                            {{ $data->nilai_huruf }}
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach

                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
