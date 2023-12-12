@extends('layouts.base-admin')

@section('title')
    <title>Rincian Kegiatan | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container pt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card rounded mb-3">
                    <div class="banner bg-primary text-white text-center rounded-top">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        {{-- <img src="{{ asset('images/visa.png') }}" class="mt-4 card-img-top" alt="..."> --}}
                        <h6 class="card-title">Digital Transformation in The Government and Public Sector</h6>
                        <div class="card-text">
                            {{-- <small class="text-muted">18 Mar 2023 - 30 Jul 2023</small><br> --}}

                            {{-- kondisi ketika logbook sudah diterima --}}

                            {{-- <div class="mt-2">
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Semua laporan mingguan sudah diterima</span>
                                <br>
                                <i class="fa-solid fa-circle-check" style="color: green;"></i>
                                <span class="ml-2">Laporan akhir sudah diunggah</span>
                            </div> --}}

                            {{-- kondisi ketika logbook sudah diterima END --}}

                            {{-- <h6 class="mt-4">Periode Kegiatan</h6>
                            <p class="text-muted">Kamu akan mengikuti kegiatan mulai tanggal 18 Maret - 30 Juli 2023</p> --}}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="mt-2" style="color: orange;">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <a>Belum Dibuat</a>
                            </div>
                            <div>
                                <h6 class="mt-3">Logbook Harian</h6>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('mahasiswa.laporan.harian.create') }}">
                                    <button class="btn btn-primary mt-2 text">
                                        Buat Logbook Harian
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <h6>List Logbook "Mahasiswa"</h6>
                    <div class="row">
                        <div class="col-12">
                            @if ($logbooks->isEmpty())
                                <p class="text-center">Belum ada data logbook.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="text-center text-white" width="5%">No</th>
                                                <th class="text-center text-white">Tanggal</th>
                                                <th class="text-center text-white overflow-auto">Kegiatan</th>
                                                <th class="text-center text-white">Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logbooks as $logbook)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d-M-Y') }}
                                                    </td>
                                                    <td class="text-center overflow-auto">
                                                        {{ $logbook->kegiatan ? $logbook->kegiatan : '-' }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($logbook->bukti)
                                                            <a href="{{ route('mahasiswa.laporan.harian.show', $logbook->id) }}"
                                                                class="btn btn-primary fw-medium">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
            // Hapus DataTable yang sudah ada jika ada
            if ($.fn.DataTable.isDataTable('#table-1')) {
                $('#table-1').DataTable().destroy();
            }

            // Inisialisasi DataTables
            var table1 = $('#table-1').DataTable({
                "pageLength": 6, // Menampilkan 6 baris per halaman
                // ... opsi DataTables lainnya
            });

            // Mengatur pemindahan ke halaman berikutnya setiap 6 baris
            table1.on('draw', function() {
                var pageInfo = table.page.info();
                var currentPage = pageInfo.page + 1;
                var rowsPerPage = table.page.len();

                // Menghitung jumlah baris yang sudah ditampilkan
                var displayedRows = (currentPage - 1) * rowsPerPage + table.rows().count();

                // Mengecek apakah jumlah baris sudah mencapai 6
                if (displayedRows % 6 === 0) {
                    // Pindah ke halaman berikutnya
                    table.page('next').draw('page');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
