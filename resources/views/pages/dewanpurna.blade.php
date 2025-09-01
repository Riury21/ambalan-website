@extends('layouts.main')

@section('title', 'Dewan Purna - Kamajaya Kamaratih')

@section('content')

<style>
    /* Sticky Header */
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0.5rem;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .sticky-hidden { transform: translateY(-100%); opacity: 0; }
    .sticky-visible { transform: translateY(0); opacity: 1; }

    @media (max-width: 768px) {
        .sticky-top-section { top: 0px; padding-top: 0.5rem; }
    }

    /* === Premium Card === */
    .premium-card {
        border-radius: 12px;
        overflow: hidden;
        border: none;
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        transition: all 0.3s ease;
    }
    .premium-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 24px rgba(0,0,0,0.2);
    }

    /* === Kamajaya theme (biru tua) === */
    .kamajaya {
        background: linear-gradient(
            180deg,
            #ffffff 0%,
            #ffffff 50%,
            #ffffff 50%,
            #0055aa 100%
        );
    }
    .kamajaya .photo-wrapper {
        background: linear-gradient(135deg, #003366, #0055aa);
    }
    .kamajaya .nama-premium {
        background: linear-gradient(90deg, #003366, #0055aa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .kamajaya .garis-premium {
        background: linear-gradient(90deg, #003366, #0055aa);
    }

    /* === Kamaratih theme (biru langit) === */
    .kamaratih {
        background: linear-gradient(
            180deg,
            #ffffff 0%,
            #ffffff 50%,
            #ffffff 50%,
            #0099ff 100%
        );
    }
    .kamaratih .photo-wrapper {
        background: linear-gradient(135deg, #0099ff, #66ccff);
    }
    .kamaratih .nama-premium {
        background: linear-gradient(90deg, #0099ff, #66ccff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .kamaratih .garis-premium {
        background: linear-gradient(90deg, #0099ff, #66ccff);
    }

    /* Foto */
    .photo-wrapper {
        position: relative;
        width: 120px;
        height: 140px;
        margin: 15px auto 10px auto;
        border-radius: 12px;
        padding: 4px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    .photo-wrapper:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(0,0,0,0.3);
    }
    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid #fff;
    }

    /* Nama */
    .nama-premium {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 4px;
        display: inline-block;
    }

    /* Garis fix 80% */
    .garis-premium {
        width: 80%;
        height: 3px;
        margin: 6px auto 10px auto;
        border-radius: 2px;
    }

    .card-text {
        font-size: 14px;
        color: #000000ff;
        margin-bottom: 4px;
    }

    /* === Dark Mode === */
    @media (prefers-color-scheme: dark) {
        body { background-color: #121212; color: #e0e0e0; }
        .sticky-top-section { background-color: rgba(30,30,30,0.95); border-bottom: 1px solid #444; color: #fff; }
        .premium-card { background: #1e1e1e; color: #e0e0e0; }
        .card-text { color: #fff; }
        .photo-wrapper { box-shadow: 0 4px 12px rgba(255,255,255,0.1); }
    }
</style>

@php
    // Mapping judul berdasarkan angkatan
    $titleMapping = [
        '2012/2013' => 'Suradira Jaya Ningrat Lebur Dening Pangastuti',
        '2013/2014' => 'Je Zult Nooit Allen Lopen',
        '2014/2015' => 'Ritter Des Glaubens',
        '2015/2016' => 'Veni Vidi Vici',
        '2016/2017' => 'Donahue Wirasana',
        '2017/2018' => 'Aji Adanu Sangshetta',
        '2018/2019' => 'Karan Ardhani Badrika Arsona',
        '2021/2022' => 'Birendra Mahatma Ardhani',
        '2022/2023' => 'Mahesa Gajahsora Wajrapani',
        '2023/2024' => 'Amartya Pandya Danantya',
        '2024/2025' => 'Adhyaksa Diraya Satyagraha',
    ];
    $currentTitle = $titleMapping[request('angkatan')] ?? 'Dewan Purna';
@endphp

<div class="container py-4">
    <!-- Sticky Title & Filter -->
    <div class="sticky-top-section sticky-visible" id="stickyHeader">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            {{ $currentTitle }}
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>

        <!-- Filter -->
        <form method="GET" action="{{ route('dewan-purna.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-2">
                <input type="text" name="nama" class="form-control" placeholder="Filter Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-6 col-md-2">
                <select name="jabatan" class="form-control" style="text-transform: capitalize;">
                    <option value="" disabled selected>Filter Jabatan</option>
                    @foreach(['pradana', 'wakil pradana', 'pemangku adat', 'pendamping kanan', 'pendamping kiri',
                     'sekretaris/kerani', 'bendahara/juru uang', 'seksi giat', 'seksi kapram', 'seksi evabang', 'seksi abdimas',
                     'seksi litev', 'seksi tekspram', 'seksi binbang', 'seksi sarpras'] as $jabatan)
                        <option value="{{ $jabatan }}" {{ request('jabatan') === $jabatan ? 'selected' : '' }}>{{ ucfirst($jabatan) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-2">
                <select name="angkatan" class="form-control">
                    <option value="" disabled selected>Filter Angkatan</option>
                    @foreach($angkatanList as $angkatan)
                        <option value="{{ $angkatan }}" {{ request('angkatan') === $angkatan ? 'selected' : '' }}>{{ $angkatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-2">
                <select name="satuan" class="form-control">
                    <option value="" disabled selected>Filter Satuan</option>
                    <option value="Kamajaya" {{ request('satuan') === 'Kamajaya' ? 'selected' : '' }}>Kamajaya</option>
                    <option value="Kamaratih" {{ request('satuan') === 'Kamaratih' ? 'selected' : '' }}>Kamaratih</option>
                </select>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('dewan-purna.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid Data -->
    <div class="row justify-content-center mt-4">
        @forelse($dewanPurna as $purna)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="premium-card h-100 text-center pt-3 pb-2 {{ strtolower($purna->satuan) }}">
                    <div class="photo-wrapper">
                        @if($purna->foto)
                            <img src="{{ asset('uploads/' . $purna->foto) }}" class="profile-photo">
                        @else
                            <img src="https://via.placeholder.com/150x150?text=No+Image" class="profile-photo">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title nama-premium">Kak {{ $purna->nama }}</h6>
                        <div class="garis-premium"></div>
                        <p class="card-text mb-1"><strong>Jabatan:</strong> {{ $purna->jabatan }}</p>
                        <p class="card-text mb-1"><strong>Angkatan:</strong> {{ $purna->angkatan ?? '-' }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $purna->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada Data Dewan Purna yang ditampilkan.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stickyHeader = document.getElementById("stickyHeader");
        let lastScrollPosition = 0;
        window.addEventListener("scroll", function () {
            const currentScrollPosition = window.pageYOffset;
            if (currentScrollPosition > lastScrollPosition) {
                stickyHeader.classList.add("sticky-hidden");
                stickyHeader.classList.remove("sticky-visible");
            } else {
                stickyHeader.classList.add("sticky-visible");
                stickyHeader.classList.remove("sticky-hidden");
            }
            lastScrollPosition = currentScrollPosition;
        });
    });
</script>

@endsection
