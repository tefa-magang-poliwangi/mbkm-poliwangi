@extends('layouts.base-admin')

@section('title')
    <title>Tambah Kompetensi Program | MBKM Poliwangi</title>
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
                        <h4>Tambah Kompetensi Program - MBKM Poliwangi</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{route('manajemen.kompetensi.program.store', $id_program_magang)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>kompetensi lowongan

                                                @error('kompetensi_lowongan')
                                                    <div id="" class="text-danger py-1">
                                                        *pilih minimal satu kompetensi lowongan
                                                    </div>
                                                @else
                                                    <small>(Mohon Pilih Minimal Satu kompetensi lowongan)</small>
                                                @enderror
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kompetensi_lowongan as $data)
                                            <tr>
                                                <td class="d-flex">
                                                    <div class="form-check my-auto">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $data->id }}" name="kompetensi[]"
                                                            id="{{ $data->id }}">

                                                        <label class="form-check-label" for="{{ $data->id }}">
                                                            {{ $data->kompetensi }}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                    </tbody>
                                    @endforeach
                                </table>
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
