@extends('layouts.base-mahasiswa')
@section('title')
    <title>Update Program Magang MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Program Magang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('manajemen.program.magang.update', $programmagang->id) }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="kegiatan" class="form-label">Kegiatan Perusahaan</label>
                            <input id="kegiatan" type="text"
                                class="form-control @error('kegiatan')
                                is-invalid
                            @enderror"
                                name="kegiatan" value="{{ $programmagang->kegiatan }}" placeholder="kegiatan lowongan baru">
                            @error('kegiatan')
                                <div id="kegiatan" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                            <input id="waktu_mulai" type="date"
                                class="form-control @error('waktu_mulai')
                                is-invalid
                            @enderror"
                                name="waktu_mulai" value="{{ $programmagang->waktu_mulai }}" placeholder="Waktu Mulai">
                            @error('waktu_mulai')
                                <div id="waktu_mulai" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                            <input id="waktu_akhir" type="date"
                                class="form-control @error('waktu_akhir')
                                is-invalid
                            @enderror"
                                name="waktu_akhir" value="{{ $programmagang->waktu_akhir }}" placeholder="Waktu Akhir">
                            @error('waktu_akhir')
                                <div id="waktu_akhir" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="posisi_mahasiswa" class="form-label">Posisi Mahasiswa</label>
                            <input id="posisi_mahasiswa" type="text"
                                class="form-control @error('posisi_mahasiswa')
                                is-invalid
                            @enderror"
                                name="posisi_mahasiswa" value="{{ $programmagang->posisi_mahasiswa }}" placeholder="Posisi Mahasiswa">
                            @error('posisi_mahasiswa')
                                <div id="posisi_mahasiswa" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_lowongan" class="form-label">Lowongan</label>
                            <select class="form-control @error('id_lowongan') is-invalid @enderror"
                                id="id_lowongan" name="id_lowongan">
                                <option value="">Pilih Lowongan</option>
                                @foreach ($lowongan as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $programmagang->id_lowongan == $data->id ? 'selected' : '' }}>
                                        {{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_lowongan')
                                <div id="id_lowongan" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_pl_mitra" class="form-label">Pendamping Lapang</label>
                            <select class="form-control @error('id_pl_mitra') is-invalid @enderror"
                                id="id_pl_mitra" name="id_pl_mitra">
                                <option value="">Pilih Pendamping Lapang</option>
                                @foreach ($plmitra as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $programmagang->id_pl_mitra == $data->id ? 'selected' : '' }}>
                                        {{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pl_mitra')
                                <div id="id_pl_mitra" class="form-text text-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Tambah Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
