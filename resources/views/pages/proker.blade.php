@extends('layouts.main')

@section('title', 'Program Kerja - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
    }
    .content-container {
        background-color: rgba(255,255,255,0.9);
        color: #000;
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .section-title {
        background-color: rgba(255,255,255,0.8);
        padding: 10px 20px;
        border-radius: 10px;
        color: #000;
    }
    .accordion-button:not(.collapsed) {
        background-color: #0d6efd;
        color: #fff;
    }
    @media (prefers-color-scheme: dark) {
        body { background-color: #121212; color: #e0e0e0; }
        .sticky-top-section { background-color: rgba(30,30,30,0.95); border-bottom: 1px solid #333; }
        .content-container { background-color: rgba(30,30,30,0.9); color: #e0e0e0; box-shadow: 0 4px 10px rgba(255,255,255,0.05); }
        .section-title { background-color: rgba(30,30,30,0.9); color: #e0e0e0; }
        .accordion-button { background-color: #1e1e1e; color: #e0e0e0; }
        .accordion-body { background-color: #2c2c2c; color: #e0e0e0; }
        .accordion-button:not(.collapsed) { background-color: #1e1e1e; color: #fff; }
    }
</style>

<div class="container py-4">

    <div class="sticky-top-section text-center">
        <h1 class="mb-3 d-flex justify-content-center align-items-center gap-2">
            <img src="{{ asset('logo/kjkj.png') }}" alt="Logo KJ" style="height:100px;">
            Program Kerja Ambalan Kamajaya Kamaratih
            <img src="{{ asset('logo/krkr.png') }}" alt="Logo KR" style="height:100px;">
        </h1>
    </div>

    <!-- Visi dan Misi -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">Visi dan Misi Dewan Ambalan 2024/2025</h2>
            <div class="content-container">
                <h3>Visi</h3>
                <p>{{ $visi->isi ?? 'Belum ada visi yang ditambahkan.' }}</p>

                <h3>Misi</h3>
                <ul>
                    @if($misi && $misi->count())
                        @foreach($misi as $item)
                            <li>{{ $item->isi }}</li>
                        @endforeach
                    @else
                        <li>Belum ada misi yang ditambahkan.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Program Umum -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">Daftar Program Umum</h2>
            <div class="content-container">
                <ul>
                    @if($programUmum && $programUmum->count())
                        @foreach($programUmum as $program)
                            <li>{{ $program->nama_program }}
                                @if($program->status === 'terlaksana') <span class="badge bg-success">✔ Terlaksana</span>
                                @elseif($program->status === 'berlangsung') <span class="badge bg-warning text-dark">⏳ Berlangsung</span>
                                @elseif($program->status === 'gagal') <span class="badge bg-danger">✘ Gagal</span>
                                @else <span class="badge bg-secondary">🕓 Belum Dilaksanakan</span>
                                @endif
                            </li>
                        @endforeach
                    @else
                        <li>Belum ada program umum yang ditambahkan.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Timeline -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">Timeline Kegiatan Dewan Ambalan 2024/2025</h2>
            <div class="accordion" id="accordionTimeline">
                @php
                    $bulanOrder = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                @endphp

                @foreach($bulanOrder as $bulan)
                    @php
                        $kegiatanBulan = $timeline->where('bulan', $bulan);
                        $collapseId = 'collapse'.str_replace(' ','',$bulan);
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $bulan }}">
                            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="@if($loop->first)true @else false @endif">
                                {{ $bulan }}
                            </button>
                        </h2>
                        <div id="{{ $collapseId }}" class="accordion-collapse collapse @if($loop->first) show @endif" data-bs-parent="#accordionTimeline">
                            <div class="accordion-body">
                                <ul>
                                    @if($kegiatanBulan && $kegiatanBulan->count())
                                        @foreach($kegiatanBulan as $item)
                                            <li>{{ $item->kegiatan }}
                                                @if($item->status === 'terlaksana') <span class="badge bg-success">✔ Terlaksana</span>
                                                @elseif($item->status === 'berlangsung') <span class="badge bg-warning text-dark">⏳ Berlangsung</span>
                                                @elseif($item->status === 'gagal') <span class="badge bg-danger">✘ Gagal</span>
                                                @else <span class="badge bg-secondary">🕓 Belum Dilaksanakan</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    @else
                                        <li>Belum ada kegiatan untuk bulan ini.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
