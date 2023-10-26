@extends('layouts.base-admin')

@section('title')
    <title>Manajemen Magang External | MBKM Poliwangi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <h5 class="justify-start my-auto">Manajemen Magang External</h5>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-4">
                                <div class="ml-auto">
                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#importDataUserDosen" title="Impot Data Magang External">
                                        <i class="fa-solid fa-upload"></i>
                                    </button>

                                    <button class="btn btn-primary ml-auto" data-toggle="modal"
                                        data-target="#tambahdataMagangext">
                                        <i class="fa-solid fa-plus"></i> &ensp; Tambah
                                        Magang Ext
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Import Magang Ext -->
                    <div class="modal fade" id="importDataUserDosen" tabindex="-1" role="dialog"
                        aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-theme" id="uploadModalLabel">Import Data Magang External
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk Unggah File Excel -->
                                    <form action="{{ route('import.data.magang.ext') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="file">Pilih File Excel</label>
                                            <input type="file" class="form-control-file" id="file" name="file">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Unggah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body  py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-white">No</th>
                                        <th class="text-center text-white">Nama</th>
                                        <th class="text-center text-white" width="15%">Periode</th>
                                        <th class="text-center text-white">Jenis</th>
                                        <th class="text-center text-white">Kriteria Penilaian</th>
                                        <th class="text-center text-white">Lihat Peserta</th>
                                        <th class="text-center text-white" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($magang_ext as $data)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td class="text-center">Semester {{ $data->periode->semester }}
                                                ({{ $data->periode->tahun }})
                                            </td>
                                            <td class="text-center">{{ $data->jenis_magang }}</td>

                                            <td class="text-center">
                                                <a href="{{ route('manajemen.kriteria.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></button>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('manajemen.peserta.magang.ext.index', $data->id) }}"
                                                    class="btn btn-primary ml-auto"><i class="fa-solid fa-eye"></i></a>
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-info ml-auto" data-toggle="modal"
                                                    data-target="#updateMagangext{{ $data->id }}"><i
                                                        class="fa-solid fa-pen text-white"></i></button>
                                                <a href="{{ route('manajemen.magang.ext.destroy', $data->id) }}"
                                                    class="btn btn-danger ml-auto"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        {{-- modall update --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="updateMagangext{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-theme">Tambah Data Magang External</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('manajemen.magang.ext.update', $data->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="update_name">Nama</label>
                                                                <input type="text"
                                                                    class="form-control @error('update_name') is-invalid @enderror"
                                                                    id="update_name" name="update_name"
                                                                    value="{{ $data->name }}"
                                                                    placeholder="Masukkan Nama Tempat Magang External">
                                                                @error('update_name')
                                                                    <div id="update_name" class="form-text text-danger pb-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label" for="update_jenis_magang">Jenis
                                                                    Magang</label>
                                                                <select
                                                                    class="form-control @error('update_jenis_magang') is-invalid @enderror"
                                                                    id="update_jenis_magang" name="update_jenis_magang">
                                                                    <option value="">Pilih Jenis</option>
                                                                    <option value="Magang Bersertifikat"
                                                                        {{ $data->jenis_magang == 'Magang Bersertifikat' ? 'selected' : '' }}>
                                                                        Magang Bersertifikat
                                                                    </option>
                                                                    <option value="Studi Independen"
                                                                        {{ $data->jenis_magang == 'Studi Independen' ? 'selected' : '' }}>
                                                                        Studi Independen
                                                                    </option>
                                                                    <option value="Bangkit"
                                                                        {{ $data->jenis_magang == 'Bangkit' ? 'selected' : '' }}>
                                                                        Bangkit
                                                                    </option>
                                                                    <option value="Kampus Mengajar"
                                                                        {{ $data->jenis_magang == 'Kampus Mengajar' ? 'selected' : '' }}>
                                                                        Kampus Mengajar
                                                                    </option>
                                                                    <option
                                                                        value="Indonesian International Student Mobility Awards (IISMA)"
                                                                        {{ $data->jenis_magang == 'Indonesian International Student Mobility Awards (IISMA)' ? 'selected' : '' }}>
                                                                        Indonesian
                                                                        International Student Mobility Awards (IISMA)
                                                                    </option>
                                                                    <option value="Pertukaran Mahasiswa Merdeka"
                                                                        {{ $data->jenis_magang == 'Pertukaran Mahasiswa Merdeka' ? 'selected' : '' }}>
                                                                        Pertukaran
                                                                        Mahasiswa Merdeka
                                                                    </option>
                                                                    <option value="Membangun Desa (KKN Tematik)"
                                                                        {{ $data->jenis_magang == 'Membangun Desa (KKN Tematik)' ? 'selected' : '' }}>
                                                                        Membangun
                                                                        Desa (KKN Tematik)
                                                                    </option>
                                                                    <option value="Proyek Kemanusiaan"
                                                                        {{ $data->jenis_magang == 'Proyek Kemanusiaan' ? 'selected' : '' }}>
                                                                        Proyek Kemanusiaan
                                                                    </option>
                                                                    <option value="Riset atau Penelitian"
                                                                        {{ $data->jenis_magang == 'Riset atau Penelitian' ? 'selected' : '' }}>
                                                                        Riset atau
                                                                        Penelitian
                                                                    </option>
                                                                    <option value="Wirausaha"
                                                                        {{ $data->jenis_magang == 'Wirausaha' ? 'selected' : '' }}>
                                                                        Wirausaha
                                                                    </option>
                                                                    <option value="Gerilya"
                                                                        {{ $data->jenis_magang == 'Gerilya' ? 'selected' : '' }}>
                                                                        Gerilya
                                                                    </option>
                                                                    <option value="Praktisi Mengajar"
                                                                        {{ $data->jenis_magang == 'Praktisi Mengajar' ? 'selected' : '' }}>
                                                                        Praktisi Mengajar
                                                                    </option>
                                                                </select>
                                                                @error('update_jenis_magang')
                                                                    <div id="update_jenis_magang"
                                                                        class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="update_id_prodi">Prodi</label>
                                                                <select
                                                                    class="form-control @error('update_id_prodi') is-invalid @enderror"
                                                                    id="update_id_prodi" name="update_id_prodi">
                                                                    <option value="">Pilih Prodi</option>
                                                                    @foreach ($prodi as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == $data->id_prodi ? 'selected' : '' }}>
                                                                            {{ $item->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('update_id_prodi')
                                                                    <div id="update_id_prodi" class="form-text text-danger">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="update_id_periode">Periode</label>
                                                                <select
                                                                    class="form-control @error('update_id_periode') is-invalid @enderror"
                                                                    id="update_id_periode" name="update_id_periode">
                                                                    <option value="">Pilih Periode</option>
                                                                    @foreach ($periodes as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == $data->id_periode ? 'selected' : '' }}>
                                                                            {{ $item->semester % 2
                                                                                ? 'Semester Genap'
                                                                                : 'Semester
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Ganjil' }}
                                                                            ({{ $item->tahun }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('update_id_periode')
                                                                    <div id="update_id_periode" class="form-text text-danger">
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

        {{-- modal create --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="tambahdataMagangext">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Magang External</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('manajemen.magang.ext.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create_name">Nama</label>
                                <input type="text" class="form-control @error('create_name') is-invalid @enderror"
                                    id="create_name" name="create_name"
                                    placeholder="Masukkan Data Tempat Magang External">
                                @error('create_name')
                                    <div id="create_name" class="form-text text-danger pb-1">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="create_jenis_magang">Jenis Magang</label>
                                <select class="form-control @error('create_jenis_magang') is-invalid @enderror"
                                    id="create_jenis_magang" name="create_jenis_magang">
                                    <option value="">Pilih Jenis</option>
                                    <option value="Magang Bersertifikat">Magang Bersertifikat</option>
                                    <option value="Studi Independen">Studi Independen</option>
                                    <option value="Bangkit">Bangkit</option>
                                    <option value="Kampus Mengajar">Kampus Mengajar</option>
                                    <option value="Indonesian International Student Mobility Awards (IISMA)">Indonesian
                                        International Student Mobility Awards (IISMA)</option>
                                    <option value="Pertukaran Mahasiswa Merdeka">Pertukaran Mahasiswa Merdeka</option>
                                    <option value="Membangun Desa (KKN Tematik)">Membangun Desa (KKN Tematik)</option>
                                    <option value="Proyek Kemanusiaan">Proyek Kemanusiaan</option>
                                    <option value="Riset atau Penelitian">Riset atau Penelitian</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Gerilya">Gerilya</option>
                                    <option value="Praktisi Mengajar">Praktisi Mengajar</option>
                                </select>
                                @error('create_jenis_magang')
                                    <div id="create_jenis_magang" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="create_id_prodi">Prodi</label>
                                <select class="form-control @error('create_id_prodi') is-invalid @enderror"
                                    id="create_id_prodi" name="create_id_prodi">
                                    <option value="">Pilih Prodi</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('create_id_prodi')
                                    <div id="create_id_prodi" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="create_id_periode">Periode</label>
                                <select class="form-control @error('create_id_periode') is-invalid @enderror"
                                    id="create_id_periode" name="create_id_periode">
                                    <option value="">Pilih Periode</option>
                                    @foreach ($periodes as $item)
                                        <option value="{{ $item->id }}">
                                            Semester {{ $item->semester }} -
                                            ({{ $item->tahun }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('create_id_periode')
                                    <div id="create_id_periode" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-submit">Simpan</button>
                        </div>
                    </form>
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
