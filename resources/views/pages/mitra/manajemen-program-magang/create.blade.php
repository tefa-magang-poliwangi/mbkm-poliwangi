@extends('layouts.base-admin')

@section('title')
    <title>Form Tambah Program Magang MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <section>
        <div class="row d-flex justify-content-center pt-5">
            <div class="col-12">
                <div class="card card-rounded-sm">
                    <div class="card-header">
                        <h4>Tambah Program Magang - MBKM Poliwangi</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('manajemen.program.magang.store', $id_lowongan) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="kegiatan" class="kegiatan">Kegiatan Perusahaan</label>
                                <input id="kegiatan" type="text" name="kegiatan"
                                    class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan"
                                    placeholder="Kegiatan Perusahaan">
                                @error('kegiatan')
                                    <div id="kegiatan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="waktu_mulai" class="waktu_mulai">Waktu Mulai</label>
                                <input id="waktu_mulai" type="date" name="waktu_mulai"
                                    class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai"
                                    placeholder="Waktu Mulai">
                                @error('waktu_mulai')
                                    <div id="waktu_mulai" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="waktu_akhir" class="waktu_akhir">Waktu Akhir</label>
                                <input id="waktu_akhir" type="date" name="waktu_akhir"
                                    class="form-control @error('waktu_akhir') is-invalid @enderror" name="waktu_akhir"
                                    placeholder="Waktu Akhir">
                                @error('waktu_akhir')
                                    <div id="waktu_akhir" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="posisi_mahasiswa">Posisi Mahasiswa</label>
                                <input id="posisi_mahasiswa" type="text" name="posisi_mahasiswa"
                                    class="form-control @error('posisi_mahasiswa') is-invalid @enderror"
                                    name="posisi_mahasiswa" placeholder="Posisi Mahasiswa">
                                @error('posisi_mahasiswa')
                                    <div id="posisi_mahasiswa" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="id_lowongan">Lowongan</label>
                                <select class="form-control @error('id_lowongan') is-invalid @enderror" id="id_lowongan"
                                    name="id_lowongan">
                                    <option value="">Pilih Lowongan</option>
                                    @foreach ($lowongan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_lowongan')
                                    <div id="id_lowongan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="id_pl_mitra">Pendamping Lapang</label>
                                <select class="form-control @error('id_pl_mitra') is-invalid @enderror" id="id_pl_mitra"
                                    name="id_pl_mitra">
                                    <option value="">Pilih Pendamping Lapang</option>
                                    @foreach ($plmitra as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_pl_mitra')
                                    <div id="id_pl_mitra" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>


                            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
