@extends('layouts.base-admin')

@section('title')
    <title>Nilai Transkrip Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section>
        <div class="row pt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card card-border card-rounded-sm card-hover my-auto">
                    <div class="card-body">
                        <h5 class="header-title text-theme mb-3">Nilai Transkrip - {{ $mahasiswa->nama }}
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-white text-center">No</th>
                                        <th class="text-white text-center">Kode</th>
                                        <th class="text-white text-center">Mata Kuliah</th>
                                        <th class="text-white text-center">Nilai Angka</th>
                                        <th class="text-white text-center">Nilai Huruf</th>
                                        <th class="text-white text-center">Angka Mutu</th>
                                        <th class="text-white text-center">Kredit</th>
                                        <th class="text-white text-center">Mutu</th>
                                        <th class="text-white text-center">Edit</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    {{-- <tr>
                                        <td colspan="8" class="text-center">Mohon Tunggu Dosen Wali untuk Melakukan
                                            Konversi</td>
                                    </tr> --}}
                                    @forelse ($nilaiKonversi as $index => $konversi)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $konversi->matkul->kode_matakuliah }}</td>
                                            <td class="text-center">{{ $konversi->matkul->nama }}</td>
                                            <td class="text-center">{{ $konversi->nilai_angka }}</td>
                                            <td class="text-center">{{ $konversi->nilai_huruf }}</td>
                                            <td class="text-center">{{ $konversi->angka_mutu }}</td>
                                            <td class="text-center">{{ $konversi->kredit }}</td>
                                            <td class="text-center">{{ $konversi->mutu }}</td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal"
                                                    data-target="#editNilai{{ $konversi->id }}"
                                                    class="btn btn-info ml-auto">
                                                    <i class="fa-solid fa-pen text-white"></i>
                                                </button>
                                            </td>
                                        </tr>


                                    @empty
                                        {{-- Konten jika tidak ada data --}}
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal Update Nilai -->
                        @foreach ($nilaiKonversi as $konversi)
                            <div class="modal fade" tabindex="-1" role="dialog" id="editNilai{{ $konversi->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Nilai Angka</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('kaprodi.daftar.transkrip.update') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nilai_angka">Nilai</label>
                                                            <input id="nilai_angka_{{ $konversi->id }}" type="number"
                                                                class="form-control" name="nilai_angka"
                                                                placeholder="Nilai baru" pattern="[0-9]*" min="0"
                                                                max="100">
                                                            <div id="nilai_angka" class="form-text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nilai_huruf">Nilai Huruf</label>
                                                            <input id="nilai_huruf_{{ $konversi->id }}" type="text"
                                                                class="form-control" name="nilai_huruf" readonly>
                                                            <input type="hidden" name="id"
                                                                value="{{ $konversi->id }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <div class="ml-auto">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="row mt-2">
                            <div class="col">

                                @if ($validasi)
                                    <button class="btn btn-success ml-auto">
                                        Disetujui <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                @else
                                    <button type="submit" id="btnConfirm" class="btn btn-danger ml-auto">
                                        Setujui <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        let btnSetuju = document.getElementById('btnConfirm');

        if (btnSetuju) {
            btnSetuju.addEventListener('click', () => {
                window.location.replace(
                    "{{ route('kaprodi.daftar.transkrip.setujui', ['id_mahasiswa' => $id_mahasiswa]) }}");
            });
        }

        // console.log(btnSetuju);
        // Ambil semua elemen dengan ID yang dimulai dengan "nilai_angka_"
        let nilaiAngkaElements = document.querySelectorAll('[id^="nilai_angka_"]');

        // Loop melalui setiap elemen dan tambahkan event listener
        nilaiAngkaElements.forEach(function(elemenNilaiAngka) {
            elemenNilaiAngka.addEventListener('change', function() {
                // Ambil nilai angka dari elemen saat ini
                let nilaiAngka = parseInt(elemenNilaiAngka.value);

                // Ambil nomor dari ID untuk membangun ID elemen huruf
                let idNumber = elemenNilaiAngka.id.split('_')[2];
                let elemenNilaiHuruf = document.getElementById('nilai_huruf_' + idNumber);

                // Panggil fungsi konversiNilai dan tetapkan hasilnya ke elemen nilai_huruf
                elemenNilaiHuruf.value = konversiNilai(nilaiAngka);
            });
        });

        function konversiNilai(nilai) {
            let nilai_huruf;

            if (nilai >= 81 && nilai <= 100) {
                nilai_huruf = "A";
            } else if (nilai >= 71 && nilai < 81) {
                nilai_huruf = "AB";
            } else if (nilai >= 66 && nilai < 71) {
                nilai_huruf = "B";
            } else if (nilai >= 61 && nilai < 66) {
                nilai_huruf = "BC";
            } else if (nilai >= 56 && nilai < 61) {
                nilai_huruf = "C";
            } else if (nilai >= 41 && nilai < 56) {
                nilai_huruf = "D";
            } else if (nilai >= 0 && nilai < 41) {
                nilai_huruf = "E";
            } else {
                nilai_huruf = '';
            }

            return nilai_huruf;
        }
    </script>
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables pada tabel pertama jika memiliki data
            if ($('#table-1 tbody tr').length > 0) {
                $('#table-1').DataTable();
            }

            // Inisialisasi DataTables pada tabel kedua jika memiliki data
            if ($('#table-2 tbody tr').length > 0) {
                $('#table-2').DataTable();
            }
        });
    </script>
@endsection
