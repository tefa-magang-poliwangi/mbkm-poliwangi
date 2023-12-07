@extends('layouts.base-admin')

@section('title')
    <title>Daftar Transkrip Mahasiswa | MBKM Poliwangi</title>
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
                                <h5 class="justify-start my-auto text-theme">Daftar Transkrip Nilai - Belum Disetujui</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="" class="btn btn-primary btn-sm ml-auto px-2 py-1">
                                    Transkrip Disetujui
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
                                    @foreach ($pelamarMagangs as $pelamar)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $pelamar->mahasiswa->nama }}</td>
                                            <td class="text-center">{{ $pelamar->mahasiswa->nim }}</td>
                                            <td class="text-center">{{ $pelamar->mahasiswa->prodi->nama }}</td>
                                            @php
                                                $kelas = [];
                                                $semester = [];
                                            @endphp

                                            @forelse ($pelamar->mahasiswa->peserta_kelas as $peserta_kelas)
                                                @php
                                                    $kelas[] = $peserta_kelas->kelas->tingkat_kelas . ' ' . $peserta_kelas->kelas->abjad_kelas;
                                                    $semester[] = $peserta_kelas->kelas->periode->semester;
                                                @endphp
                                            @empty
                                                @php
                                                    $kelas[] = 'N/A';
                                                    $semester[] = 'N/A';
                                                @endphp
                                            @endforelse

                                            <td class="text-center">{{ implode(', ', $kelas) }}</td>
                                            <td class="text-center">{{ implode(', ', $semester) }}</td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-warning text-white card-rounded-sm">Validation</button>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('kaprodi.daftar.transkrip.show', $pelamar->mahasiswa->id) }}"
                                                    class="btn btn-info text-white card-rounded-sm">
                                                    Lihat Nilai
                                                </a>
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
