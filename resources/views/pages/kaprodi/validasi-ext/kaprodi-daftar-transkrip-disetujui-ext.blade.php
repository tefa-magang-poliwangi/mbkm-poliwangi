@extends('layouts.base-admin')

@section('title')
    <title>Daftar Transkrip Disetujui | MBKM Poliwangi</title>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Transkrip Nilai - Disetujui</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('kaprodi.daftar.transkrip.ext.index') }}"
                                    class="btn btn-primary btn-sm ml-auto px-2 py-1">
                                    Transkrip Belum Disetujui
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless rounded bg-white" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-white">Nama</th>
                                        <th class="text-center text-white">NIM</th>
                                        <th class="text-center text-white">Program Studi</th>
                                        <th class="text-center text-white">Kelas</th>
                                        <th class="text-center text-white">Semester</th>
                                        <th class="text-white text-center">Validasi</th>
                                        <th class="text-center text-white">Lihat Nilai</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($transkrip_nilai_mhs as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $data->mahasiswa->nama }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->nim }}</td>
                                            <td class="text-center">{{ $data->mahasiswa->prodi->nama }}</td>

                                            @foreach ($data->mahasiswa->peserta_kelas as $peserta_kelas)
                                                <td class="text-center">{{ $peserta_kelas->kelas->tingkat_kelas }}
                                                    {{ $peserta_kelas->kelas->abjad_kelas }}</td>
                                            @endforeach

                                            @foreach ($data->mahasiswa->peserta_kelas as $peserta_kelas)
                                                <td class="text-center">{{ $peserta_kelas->kelas->periode->semester }}</td>
                                            @endforeach

                                            <td class="text-center">
                                                <button class="btn btn-success text-white card-rounded-sm">
                                                    {{ $data->validasi_kaprodi }}
                                                </button>
                                            </td>

                                            <td class="text-center">
                                                @if ($data->mahasiswa->peserta_kelas && $data->mahasiswa->peserta_kelas->count() > 0)
                                                    <a href="{{ route('kaprodi.daftar.transkrip.ext.show', $data->id) }}"
                                                        class="btn btn-primary ml-auto">
                                                        <i class="fa-solid fa-eye" title="Siap Dikonversi"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="btn btn-danger ml-auto"
                                                        title="Tidak Ada Kelas">
                                                        <i class="fa-solid fa-eye-slash"></i>
                                                    </a>
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
