@extends('layouts.base-admin')
@section('title')
    <title>Kegiatan MBKM | Politeknik Negeri Banyuwangi</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <div class="d-flex justify-content-between">
            <strong class="h5 text-theme">Data Kurikulum Mata Kuliah</strong>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 mb-0">
                    <div class="card-header bg-white border-0 px-2">
                        <div class="col-4">
                            <h4 class="fw-bold">Program Studi</h4>
                            <div class="form-group">
                                <select class="form-control select2">
                                    <option value="">Semua Prodi</option>
                                    <option>Teknologi Rekayasa Perangkat Lunak</option>
                                    <option>Teknologi Rekayasa Komputer</option>
                                    <option>Bisnis Digital</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-8 d-flex">
                            <div class="ml-auto">
                                <a href="{{route('daftar.kurikulum.create')}}" class="btn btn-theme fa-plus">Tambah</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0 mb-0">
                        <div class="table-responsive">
                            @php
                                $no = 1;
                            @endphp
                            <table class="table table-hover table-borderless rounded" id="table-1"
                                style="background-color: #EEEEEE;">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Kurikulum</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kurikulums as $item)
                                    <tr>
                                        <td>
                                            {{$no}}
                                        </td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                           {{$item->prodi->nama}}
                                        </td>
                                        <td> <span class="badge bg-primary text-white">
                                            {{$item->status}} </span>
                                        </td>
                                        <td>
                                            <a href="/dashboard-dosen/daftar-cpl-kurikulum" class="btn btn-primary">
                                                <i class="fa-solid fa-search"></i> CPL
                                            </a>
                                            <a href="#"> <i class="fa-solid fas fa-edit text-dark"></i></a>
                                            <a href="{{route('daftar.kurikulum.delete', $item->id)}}"> <i class="fa-solid fas fa-trash text-dark"></i></a>
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
    </div>
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }} "></script>
    {{-- <script src="{{ asset ('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}} "></script> --}}
    {{-- <script src="{{ asset ('assets/modules/jquery-ui/jquery-ui.min.js')}} "></script> --}}

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
