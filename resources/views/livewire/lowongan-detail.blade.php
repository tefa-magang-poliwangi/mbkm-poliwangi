<div>
    @php
        function dateConversion($date)
        {
            $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $slug = explode('-', $date);
            return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
        }
    @endphp

    <section>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-theme fw-bold">Daftar Lowongan Mitra</h4>
                </div>
            </div>

            <div class="row">
                {{-- Detail Mitra --}}
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 order-2 mb-4">
                    <div class="list-group" id="list-tab">
                        <div>
                            <div class="card ca rd-hover card-border p-3">
                                <div class="card-body text-center">
                                    <div class="mx-auto d-flex align-items-center">
                                        <img src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('assets/images/avatar/avatar-1.png') }}"
                                            class="image-fluid" width="100" alt="">
                                    </div>

                                    <div class="text-justify mt-3">
                                        <h6 class="fw-bold">{{ $mitra->nama }}</h6>
                                        <span>{{ $mitra->kota }}</span>
                                        @if ($mitra->deskripsi == null || $mitra->deskripsi == '')
                                            <p class="mt-2"><i>Deskripsi belum ditambahkan</i></p>
                                        @else
                                            <p class="mt-2">{{ $mitra->deskripsi }}</p>
                                        @endif

                                        <div class="row d-flex mt-4">
                                            <a class="btn btn-theme mx-auto"
                                                onclick="showContent('list-home')">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Daftar Katalog Lowongan Mitra --}}
                        <div class="ruler-program mt-4">
                            @if ($lowongan_mitra->count() > 0)
                                @foreach ($lowongan_mitra as $data)
                                    <div class="card card-border p-3 mb-4">
                                        <div class="card-body text-center">
                                            <div class="mx-auto d-flex align-items-center">
                                                <img src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('assets/images/avatar/avatar-1.png') }}"
                                                    class="img-fluid" width="100" alt="">
                                            </div>
                                            <div class="text-justify pt-4">
                                                <h6 class="fw-bold">{{ $data->mitra->nama }}</h6>
                                                <h6 class="fw-medium">{{ $data->nama }}</h6>
                                                <p class="fw-regular">{{ $data->mitra->kota }}</p>
                                            </div>

                                            <div class="text-justify">
                                                <ul>
                                                    <li>Kuota Lowongan : {{ $data->jumlah_lowongan }}</li>
                                                    <li>Durasi Pendaftaran :
                                                        <p>
                                                            {{ dateConversion($data->tanggal_dibuka) }} -
                                                            {{ dateConversion($data->tanggal_ditutup) }}
                                                        </p>
                                                    </li>
                                                    <li>Durasi magang :
                                                        <p>
                                                            {{ dateConversion($data->tanggal_magang_dimulai) }}
                                                            -
                                                            {{ dateConversion($data->tanggal_magang_berakhir) }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="px-1 mt-2">
                                                <form wire:submit.prevent="showLowonganDetail({{ $data->id }})">
                                                    <button type="submit" class="btn btn-theme menu-none-decoration">
                                                        Selengkapnya
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col d-flex">
                                        <div class="btn btn-theme mx-auto my-auto">Lowongan Belum Ditambahkan</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-8 order-1">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                            aria-labelledby="list-home-list">
                            <div class="card card-border p-4 mb-4">
                                <div class="card-body">
                                    <div class="mx-auto d-flex">
                                        <img src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('assets/images/avatar/avatar-1.png') }}"
                                            class="image-fluid" width="100" alt="">
                                    </div>
                                    <div class="text-justify py-3">
                                        <h6 class="fw-bold">{{ $mitra->nama }}</h6>
                                        <span>{{ $mitra->kota }}</span>
                                    </div>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Deskripsi Mitra</p>
                                        @if ($mitra->deskripsi == null || $mitra->deskripsi == '')
                                            <small class="mt-2"><i>Deskripsi belum ditambahkan</i></small>
                                        @else
                                            <small class="mt-2">{{ $mitra->deskripsi }}</small>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Bidang Mitra</p>
                                        <ul>
                                            <li>Kategori : {{ $mitra->kategori->nama }}</li>
                                            <li>Sektor Industri : {{ $mitra->sektor_industri->nama }}</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Kontak Mitra</p>
                                        <ul>
                                            <li>Email :
                                                <a class="menu-none-decoration" href="mailto:{{ $mitra->email }}"
                                                    target="_blank">{{ $mitra->email }}
                                                </a>
                                            </li>
                                            <li>Website : <a href="{{ $mitra->website }}" target="_blank"
                                                    class="menu-none-decoration">{{ $mitra->website }}</a></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="text-justify">
                                        <p class="mb-2 fw-bold">Tentang Perusahaan</p>
                                        <small>
                                            Alamat : {{ $mitra->alamat }}, {{ $mitra->kota }} -
                                            {{ $mitra->provinsi }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Detail Lowongan --}}
                        <div>
                            @if ($lowongan != null)
                                {{-- Tampilkan detail lowongan --}}
                                <div class="card card-border card-rounded-sm card-hover mb-3">
                                    <div class="card-body my-2 mx-5">
                                        <div class="mx-auto d-flex">
                                            <img src="{{ $mitra->foto ? Storage::url($mitra->foto) : asset('assets/images/avatar/avatar-1.png') }}"
                                                class="image-fluid" width="100" alt="">
                                        </div>

                                        <div class="text-justify mt-3">
                                            <h6 class="fw-bold">{{ $lowongan->nama }}</h6>
                                            <p>{{ $lowongan->mitra->kota }}</p>
                                        </div>

                                        <div class="text-justify">
                                            <p class="mb-2 fw-bold">Syarat Berkas Pendaftaran : </p>
                                            @if ($lowongan->berkas_lowongan->count() > 0)
                                                <ol>
                                                    @foreach ($lowongan->berkas_lowongan as $item)
                                                        <li>{{ $item->berkas->nama }}</li>
                                                    @endforeach
                                                </ol>
                                            @else
                                                <span><i>Berkas lowongan belum ditambahkan.</i></span>
                                            @endif
                                        </div>

                                        @auth
                                            @role('mahasiswa')
                                                @if (empty($permohonan) || $permohonan->status_diterima == 'Ditolak')
                                                    <div class="pt-2 pb-3">
                                                        <a href="{{ route('daftar.magang.internal.page', $lowongan->id) }}"
                                                            class="btn btn-theme">
                                                            Daftar Magang
                                                        </a>
                                                    </div>
                                                @endif
                                            @endrole
                                        @endauth

                                        @guest
                                            <div class="pt-2 pb-3">
                                                <a href="{{ route('login.page') }}" class="btn btn-theme">
                                                    Daftar Magang
                                                </a>
                                            </div>
                                        @endguest
                                        <hr>

                                        <div class="text-justify">
                                            <p class="mb-2 fw-bold">Tentang Perusahaan</p>
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-8 mb-2 d-flex">
                                                    <div>
                                                        <small>
                                                            <i class="fa-solid fa-location-dot text-theme"></i>
                                                            &ensp;
                                                            {{ $lowongan->mitra->alamat }},
                                                            {{ $lowongan->mitra->kota }} -
                                                            {{ $lowongan->mitra->provinsi }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-2 d-flex">
                                                    <div class="mx-auto">
                                                        <small>
                                                            <i class="fa-solid fa-earth-americas text-theme"></i>
                                                            &ensp;
                                                            {{ $lowongan->mitra->website }}
                                                        </small>
                                                        <br>
                                                        <small>
                                                            <i class="fa-solid fa-people-group text-theme"></i>
                                                            &ensp;
                                                            {{ $lowongan->jumlah_lowongan }} - Kuota Pelamar
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
