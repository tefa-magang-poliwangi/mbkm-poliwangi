@extends('layouts.base-admin')
@section('title')
    <title>Management Permission | Admin </title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section container-fluid py-3>
        <div class="container-fluid" style="padding-top: 10%">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <h3>Management Permission</h3>
                        <div class="card-body bg-permission">
                        </div>
                        <div class="card-body bg-permission">
                            <div class="row ml-5">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                read-dashboard
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                                            <label class="form-check-label" for="defaultCheck3">
                                                read-wadir
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                read-transkip-mahasiswa
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                                            <label class="form-check-label" for="defaultCheck3">
                                                read-cetak-nilai
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                read-dashboard-mahasiswa
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                                            <label class="form-check-label" for="defaultCheck3">
                                                read-data-pendaftar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
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
