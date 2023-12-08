@extends('layouts.base-admin')

@section('title')
    <title>Nilai Transkrip Mahasiswa | MBKM Poliwangi</title>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card card-border card-rounded-sm card-hover my-auto">
                    <div class="card-body">
                        <h5 class="header-title text-theme mb-3">Nilai Transkrip - {{ $transkrip_mhs->mahasiswa->nama }}
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-white text-center">No</th>
                                        <th class="text-white text-center">Kode</th>
                                        <th class="text-white text-center">Mata Kuliah</th>
                                        <th class="text-white text-center">Nilai Angka</th>
                                        <th class="text-white text-center">Nilai Huruf</th>
                                        <th class="text-white text-center">Angka Mutu</th>
                                        <th class="text-white text-center">Kredit</th>
                                        <th class="text-white text-center">Mutu</th>
                                        <th class="text-white text-center">Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @if ($nilai_transkrip_mhs->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">Mohon Tunggu Dosen Wali untuk Melakukan
                                                Konversi</td>
                                        </tr>
                                    @else
                                        @foreach ($nilai_transkrip_mhs as $data)
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td class="text-center">
                                                    {{ $data->matkul->kode_matakuliah }}</td>
                                                <td class="text-center">{{ $data->matkul->nama }}</td>
                                                <td class="text-center">{{ $data->nilai_angka }}</td>
                                                <td class="text-center">{{ $data->nilai_huruf }}</td>
                                                <td class="text-center">{{ $data->angka_mutu }}</td>
                                                <td class="text-center">{{ $data->kredit }}</td>
                                                <td class="text-center">{{ $data->mutu }}</td>
                                                <td class="text-center">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#editNilai{{ $data->id }}"
                                                        class="btn btn-info ml-auto">
                                                        <i class="fa-solid fa-pen text-white"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- Modal Update Nilai --}}
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="editNilai{{ $data->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Nilai Angka</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('kaprodi.daftar.transkrip.ext.update', $data->id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="nilai_angka">Nilai</label>
                                                                            <input id="nilai_angka" type="number"
                                                                                class="form-control @error('nilai_angka') is-invalid @enderror"
                                                                                name="nilai_angka" placeholder="Nilai baru"
                                                                                pattern="[0-9]*" min="0"
                                                                                max="100"
                                                                                value="{{ $data->nilai_angka }}">
                                                                            @error('nilai_angka')
                                                                                <div id="nilai_angka" class="form-text">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col d-flex">
                                                                        <div class="ml-auto">
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                @if ($transkrip_mhs->validasi_kaprodi == 'Setuju')
                                    <button class="btn btn-success ml-auto">
                                        Disetujui <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                @else
                                    <form action="{{ route('kaprodi.daftar.transkrip.ext.validate', $transkrip_mhs->id) }}"
                                        method="POST">
                                        @method('put')
                                        @csrf

                                        <button type="submit" class="btn btn-success ml-auto">
                                            Setujui <i class="fa-solid fa-circle-check"></i>
                                        </button>
                                    </form>
                                @endif
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

    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

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
