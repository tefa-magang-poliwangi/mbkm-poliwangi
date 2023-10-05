@extends('layouts.base-admin')

@section('title')
    <title>Update Dosen | MBKM Poliwangi</title>
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Dosen</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data.dosen.update', $dosen->id) }}">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Nama lengkap" value="{{ $dosen->nama }}">
                                @error('nama')
                                    <div id="nama" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Alamat email" value="{{ $dosen->email }}">
                                @error('email')
                                    <div id="email" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="id_prodi">Prodi</label>
                                <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi"
                                    name="id_prodi">
                                    <option value="">Pilih Prodi</option>
                                    @foreach ($prodis as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $dosen->id_prodi ? 'selected' : '' }}>{{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div id="id_prodi" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No. HP</label>
                                <input id="no_telp" type="text"
                                    class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                    pattern="[0-9]*" placeholder="Nomor telepon / nomor whatsapp"
                                    value="{{ $dosen->no_telp }}">
                                @error('no_telp')
                                    <div id="no_telp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="control-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                    <div id="password" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="control-label">Password
                                    Confirmation</label>
                                <div class="input-group">
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Konfirmasi password">
                                </div>
                                @error('password_confirmation')
                                    <div id="password_confirmation" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Simpan Data Dosen
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
