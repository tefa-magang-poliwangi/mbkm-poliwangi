@extends('layouts.base-admin')

@section('title')
<title>Daftar Nilai Kriteria | MBKM Poliwangi</title>
@endsection

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section>
    <div class="row pt-5">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex mb-4">
                            <h5 class="justify-start text-theme">Daftar Nilai Kriteria - {{ $mahasiswa->nama }}</h5>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center text-white">No</th>
                                            <th class="text-center text-white">Nama Kriteria</th>
                                            <th class="text-center text-white">Nilai</th>
                                            <th class="text-center text-white">Edit Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($nilai_kriterias as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td class="text-center">{{ $data->penilaian }}</td>
                                            <td class="text-center">{{ $data->nilai }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateModal{{ $data->id }}">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- Modal Update Nilai Kriteria Mahasiswa --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Nilai Kriteria Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form
                                                        action="{{ route('daftar.nilai.kriteria.mahasiswa.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nilai">Edit Nilai
                                                                    Kriteria</label>
                                                                <input
                                                                    class="form-control @error('nilai') is-invalid @enderror"
                                                                    id="nilai" name="nilai" value="{{ $data->nilai }}">
                                                                @error('nilai')
                                                                <div id="nilai" class="form-text">
                                                                    {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-cancel"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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

{{-- Modal JS --}}
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection