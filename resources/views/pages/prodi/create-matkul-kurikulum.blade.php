@extends('layouts.base-admin')

@section('title')
    <title>Tambah Matkul Kurikulum | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section>
        <div class="row d-flex justify-content-center pt-5">
            <div class="col-12">
                <div class="card card-rounded-sm">
                    <div class="card-header d-flex">
                        <h4 class="mb-3">Tambah Mata Kuliah ke Dalam Kurikulum</h4>
                        <button class="btn btn-danger ml-auto mb-3" onclick="goBack()">Kembali</button>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('manajemen.matkul.kurikulum.store', [$id_kurikulum, $id_prodi]) }}"
                            method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="form-control @error('semester') is-invalid @enderror" id="semester"
                                    name="semester">
                                    <option value="">Pilih Semester</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                @error('semester')
                                    <div id="semester" class="form-text text-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>Matakuliah

                                                @error('matkul')
                                                    <div id="" class="text-danger py-1">
                                                        *pilih matakuliah
                                                    </div>
                                                @else
                                                    <small>(Mohon Pilih Minimal Satu Matakuliah)</small>
                                                @enderror
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matkul as $dataMatkul)
                                            <tr>
                                                <td class="d-flex">
                                                    <div class="form-check my-auto">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $dataMatkul->id }}" name="matkul[]"
                                                            id="{{ $dataMatkul->id }}">
                                                        <label class="form-check-label" for="{{ $dataMatkul->id }}">
                                                            {{ $dataMatkul->nama }}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                            <button class="btn btn-primary mr-auto" type="submit">Tambah Mata Kuliah</button>
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

    {{-- JS Back --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
