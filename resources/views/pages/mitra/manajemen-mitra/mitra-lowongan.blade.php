@extends('layouts.base-admin')

@section('title')
    <title>Tambah Lowongan | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row d-flex justify-content-center pt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 text-theme">Tambah Lowongan Magang</h4>

                        <form action="" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Lowongan</label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama lowongan">
                                @error('nama')
                                    <div id="nama" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_lowongan">Jumlah Lowongan</label>
                                <input type="number" id="jumlah_lowongan" name="jumlah_lowongan"
                                    class="form-control @error('jumlah_lowongan') is-invalid @enderror"
                                    placeholder="Jumlah maksimal kouta lowongan">
                                @error('jumlah_lowongan')
                                    <div id="jumlah_lowongan" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_dibuka">Tanggal Buka</label>
                                <input type="date" id="tgl_dibuka" name="tgl_dibuka"
                                    class="form-control @error('tgl_dibuka') is-invalid @enderror"
                                    placeholder="Tanggal lowongan dibuka">
                                @error('tgl_dibuka')
                                    <div id="tgl_dibuka" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_ditutup">Tanggal Tutup</label>
                                <input type="date" id="tgl_ditutup" name="tgl_ditutup"
                                    class="form-control @error('tgl_ditutup') is-invalid @enderror"
                                    placeholder="Tanggal lowongan ditutup">
                                @error('tgl_ditutup')
                                    <div id="tgl_ditutup" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_magang_dimulai">Tanggal Berakhir</label>
                                <input type="date" id="tgl_magang_dimulai" name="tgl_magang_dimulai"
                                    class="form-control @error('tgl_magang_dimulai') is-invalid @enderror"
                                    placeholder="Tanggal lowongan magang dimulai">
                                @error('tgl_magang_dimulai')
                                    <div id="tgl_magang_dimulai" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="status">Status Magang</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">Pilih Prodi</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div id="status" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                    placeholder="Jelaskan secara rinci terkait lowongan magang perusahaan Anda"></textarea>
                                @error('deskripsi')
                                    <div id="deskripsi" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- List Persyaratan --}}
                            <label for="persyaratan">Persyaratan</label>
                            <div class="form-container-pr">
                                <div class="form-group-pr">
                                    <input type="text" id="persyaratan" name="persyaratan" class="form-control"
                                        placeholder="Masukkan persyaratan">
                                    <button class="btn btn-primary" type="submit">Tambahkan Persyaratan</button>
                                </div>
                            </div>

                            <div class="card-footer my-2">
                                <div class="float-right">
                                    <button class="btn btn-primary mr-1" type="submit">Tambah</button>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <div id="dynamic-form-container-pr"></div>

    <script>
        // Fungsi untuk menambahkan form baru
        function addNewForm() {
            const formGroup = document.querySelector('.form-group-pr').cloneNode(true);
            formGroup.querySelector('input').value = ''; // Kosongkan input
            document.querySelector('#dynamic-form-container').appendChild(formGroup);
        }

        // Tambahkan event listener ke tombol "Tambahkan Persyaratan"
        const addButton = document.querySelector('.add-button');
        addButton.addEventListener('click', addNewForm);
    </script>
@endsection
