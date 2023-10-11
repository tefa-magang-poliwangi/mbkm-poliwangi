@extends('layouts.base-admin')

@section('title')
    <title>Input Nilai Magang External | MBKM Poliwangi</title>
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
        <div class="pb-4">
            <div class="row bg-white card-rounded-sm">
                <div class="col-12 col-sm-2 col-md-2 col-lg-1 text-start d-flex text-uppercase d-lg-flex pt-2 pb-2 mt-1">
                    <div class="px-3 mx-auto my-auto">
                        <i class="fa-solid fa-file-invoice fa-2x text-theme fs-50"></i>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-10 c    ol-lg-10 d-flex pt-2 pb-2 mt-1">
                    <div class="my-auto">
                        <h4 class="text-theme text-capitalize">INPUT NILAI KRITERIA</h4>
                        <h5 class="text-theme">{{ Auth()->user()->name }}</h5>
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
                                    <iframe src="{{ Storage::url($transkrip_mhs->file_transkrip) }}" width="100%"
                                        height="700px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card card-rounded-sm card-hover d-flex flex-column">
                    <div class="card-body">

                        <form action="{{ route('nilai_kriteria.magang_ext.store') }}" method="post">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-white bg-white">
                                    <thead class="bg-theme text-white">
                                        <tr class="text-white-header">
                                            <th class="text-white text-center">No</th>
                                            <th class="text-white text-center">Kriteria Penilaian</th>
                                            <th class="text-white text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($kriteria_magang_ext as $data)
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td class="text-center">{{ $data->penilaian }}</td>
                                                <td>
                                                    @php
                                                        $result = $data->isDetailPenilaianMagangExt($data->id, $mahasiswa->id);
                                                    @endphp
                                                    <input type="text" class="form-control"
                                                        name="nilai[{{ $data->id }}]"
                                                        placeholder="{{ $result ? $result->nilai : 'Nilai angka' }}"
                                                        pattern="[0-9]*" {{ $result ? 'disabled' : 'required' }}>
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
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                                <div class="col-6 text-left">
                                    <button type="reset" class="btn btn-danger btn-block">Batal</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Hasil Nilai Kriteria --}}
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card card-border card-rounded-sm card-hover">
                    <div class="card-body">
                        <h5 class="header-title text-theme mb-3">Hasil Nilai Kriteria</h5>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-white">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-white text-center">No</th>
                                        <th class="text-white text-center">Kriteria Penilaian</th>
                                        <th class="text-white text-center">Nilai</th>
                                        <th class="text-white text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @if ($nilai_kriteria_mhs->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">Mohon input nilai terlebih dahulu.</td>
                                        </tr>
                                    @else
                                        @foreach ($nilai_kriteria_mhs as $item)
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td class="text-center">{{ $item->penilaian }}</td>
                                                <td class="text-center">{{ $item->nilai }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('nilai_kriteria.magang_ext.destroy', $item->id) }}"
                                                        class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
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

    </section>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
