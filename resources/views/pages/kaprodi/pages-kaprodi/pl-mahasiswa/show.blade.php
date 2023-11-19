@extends('layouts.base-admin')

@section('title')
    <title>Daftar Dosen Pembimbing Lapang | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection


@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <h5 class="justify-start my-auto text-theme">Daftar Mahasiswa Dosen Pembimbing Lapang
                                    ({{ $dosen_pl->dosen->nama }})
                                </h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                <a href="{{ route('manajemen.pelamar.magang.create', $id_dosen_pl) }}"
                                    class="btn btn-primary ml-auto">
                                    <i class="fa-solid fa-plus"></i> &ensp;
                                    Tambah Mahasiswa
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">NIM</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white">Pendamping Lapang</th>
                                        <th class="text-center text-white">Perusahaan Magang</th>
                                        <th class="text-center text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendamping_lapang as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->pelamar_magang->mahasiswa->nim }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->pelamar_magang->mahasiswa->nama }}
                                            </td>
                                            {{-- <td class="text-center">
                                        {{ $item->pl_mitra->nama }}
                                    </td> --}}
                                            <td class="text-center">
                                                @if (!empty($item->id_pl_mitra))
                                                    {{ $item->pl_mitra->nama }} {{-- Ganti 'nama' sesuai dengan kolom yang sesuai --}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ $item->pelamar_magang->lowongan->nama }} -
                                                {{ $item->pelamar_magang->lowongan->mitra->nama }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('manajemen.pelamar.magang.destroy', [$id_dosen_pl, $item->id]) }}"
                                                    class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
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
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#formId').submit(function(event) {
                event.preventDefault();

                var formData = new FormData($(this)[0]);

                $('[name^="validasi_kaprodi["]').each(function() {
                    var name = $(this).attr('name'); // Dapatkan nama atribut
                    var id = $(this).data('id'); // Dapatkan ID dari data-id
                    var status = $(this).data('status'); // Dapatkan Status dari data-status

                    // Jika radio button ini checked, tambahkan ID dan Status ke formData
                    if ($(this).is(':checked')) {
                        formData.append(name, id + ',' + status);
                    }
                });

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle the response as needed
                    }
                });
            });
        });
    </script>
@endsection
