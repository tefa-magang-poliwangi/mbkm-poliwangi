@extends('layouts.base-mahasiswa')
@section('title')
    <title>Update Lowongan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="pt-5">
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Lowongan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manajemen.lowongan.mitra.update', $lowongan->id) }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="nama" class="form-label">Nama</label>
                                <input id="nama" type="text"
                                    class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                    name="nama" value="{{ $lowongan->nama }}" placeholder="Nama lowongan baru">
                                @error('nama')
                                    <div id="nama" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_lowongan" class="form-label">Jumlah Lowongan</label>
                                <input id="jumlah_lowongan" type="text" pattern="[0-9]*"
                                    class="form-control @error('jumlah_lowongan')
                                is-invalid
                            @enderror"
                                    name="jumlah_lowongan" value="{{ $lowongan->jumlah_lowongan }}"
                                    placeholder="Jumlah Lowongan">
                                @error('jumlah_lowongan')
                                    <div id="jumlah_lowongan" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" type="text"
                                    class="form-control @error('deskripsi')
                                is-invalid
                            @enderror"
                                    name="deskripsi" value="{{ $lowongan->deskripsi }}" placeholder="Masukkan deskripsi">{{ $lowongan->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div id="deskripsi" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_dibuka" class="form-label">Tanggal Dibuka</label>
                                <input id="tanggal_dibuka" type="date"
                                    class="form-control @error('tanggal_dibuka')
                                is-invalid
                            @enderror"
                                    name="tanggal_dibuka" value="{{ $lowongan->tanggal_dibuka }}"
                                    placeholder="Masukkan Tanggal Dibuka">
                                @error('tanggal_dibuka')
                                    <div id="tanggal_dibuka" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_ditutup" class="form-label">Tanggal Ditutup</label>
                                <input id="tanggal_ditutup" type="date"
                                    class="form-control @error('tanggal_ditutup')
                                is-invalid
                            @enderror"
                                    name="tanggal_ditutup" value="{{ $lowongan->tanggal_ditutup }}"
                                    placeholder="Masukkan Tanggal Ditutup">
                                @error('tanggal_ditutup')
                                    <div id="tanggal_ditutup" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_magang_dimulai" class="form-label">Tanggal Magang Dimulai</label>
                                <input id="tanggal_magang_dimulai" type="date"
                                    class="form-control @error('tanggal_magang_dimulai')
                                is-invalid
                            @enderror"
                                    name="tanggal_magang_dimulai" value="{{ $lowongan->tanggal_magang_dimulai }}"
                                    placeholder="Masukkan Tanggal Magang Dimulai">
                                @error('tanggal_magang_dimulai')
                                    <div id="tanggal_magang_dimulai" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_magang_berakhir" class="form-label">Tanggal Magang Ditutup</label>
                                <input id="tanggal_magang_berakhir" type="date"
                                    class="form-control @error('tanggal_magang_berakhir')
                                is-invalid
                            @enderror"
                                    name="tanggal_magang_berakhir" value="{{ $lowongan->tanggal_magang_berakhir }}"
                                    placeholder="Masukkan Tanggal Magang Berakhir">
                                @error('tanggal_magang_berakhir')
                                    <div id="tanggal_magang_berakhir" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_prodi" class="form-label">Prodi</label>
                                <select
                                    class="form-control @error('id_prodi')
                                            is-invalid
                                        @enderror"
                                    id="id_prodi" name="id_prodi">
                                    <option value="">Prodi</option>
                                    @foreach ($prodi as $dataprodi)
                                        <option value="{{ $dataprodi->id }}"
                                            {{ $lowongan->id_prodi == $dataprodi->id ? 'selected' : '' }}>
                                            {{ $dataprodi->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div id="id_prodi" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif" {{ $lowongan->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Tidak Aktif"
                                        {{ $lowongan->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div id="status" class="form-text pb-1 text-danger">
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
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
