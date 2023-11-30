@extends('layouts.base-admin')

@section('title')
<title>Konversi Nilai | MBKM Poliwangi</title>
@endsection

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section>
    <div class="row pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                            <h5 class="justify-start my-auto text-theme">{{ $user->name }} - Konversi Nilai</h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="bg-primary">

                                <tr>
                                    <th scope="col" width="1%" class="text-white">No</th>
                                    <th scope="col" width="20%" class="text-white">Mata Kuliah</th>
                                    <th scope="col" width="20%" class="text-white">Nilai Angka</th>
                                    <th scope="col" width="10%" class="text-white">Nilai Huruf</th>
                                </tr>

                            </thead>
                            @php
                            $no = 1;
                            @endphp

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($nilaiKonversi as $nilai)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $nilai->matkul->nama }}</td>

                                    <td>{{ $nilai->nilai_angka }}</td>
                                    <td class="text-center">{{ $nilai->nilai_huruf }}</td>
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
</section>
@endsection

@section('script')
{{-- Datatable JS --}}
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}">
</script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}">
</script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection