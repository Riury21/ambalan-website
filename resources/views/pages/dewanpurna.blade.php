@extends('layouts.main')

@section('title', 'Dewan Purna - Kamajaya Kamaratih')

@section('content')

<!-- CSS Dark Mode Support -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .sticky-hidden {
        transform: translateY(-100%);
        opacity: 0;
    }

    .sticky-visible {
        transform: translateY(0);
        opacity: 1;
    }

    .card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
        color: #000;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card.kamajaya::before,
    .card.kamaratih::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        z-index: -1;
        transition: all 0.4s ease-in-out;
    }

    .card.kamajaya:hover::before {
        background: radial-gradient(circle, rgb(0, 0, 254), rgba(123, 191, 255, 0));
        width: 300%;
        height: 300%;
        opacity: 1;
    }

    .card.kamaratih:hover::before {
        background: radial-gradient(circle, rgb(0, 255, 255), rgba(123, 191, 255, 0));
        width: 300%;
        height: 300%;
        opacity: 1;
    }

    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-top-section {
            background-color: rgba(40, 40, 40, 0.95);
            border-color: #444;
        }

        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .card-body strong {
            color: #ffffff;
        }

        .form-control {
            background-color: #2c2c2c;
            color: #e0e0e0;
            border-color: #555;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        option {
            background-color: #2c2c2c;
            color: #e0e0e0;
        }
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
        // '2017/2018' => 'Semboyan'
        '2018/2019' => 'Karan Ardhani Badrika Arsona',
        // '2019/2020' => 'Semboyan'
        // '2020/2021' => 'Semboyan'
        '2021/2022' => 'Birendra Mahatma Ardhani',
        '2022/2023' => 'Mahesa Gajahsora Wajrapani',
        '2023/2024' => 'Amartya Pandya Danantya',
        // Tambahkan angkatan lainnya di sini
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

        <form method="GET" action="{{ route('dewan-purna.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-2">
                <input type="text" name="nama" class="form-control" placeholder="Filter Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-6 col-md-2">
                <select name="jabatan" class="form-control" style="text-transform: capitalize;">
                    <option value="" disabled selected>Filter Jabatan</option>
                    @foreach(['pradana', 'wakil pradana', 'pemangku adat', 'pendamping kanan', 'pendamping kiri', 'sekretaris/kerani', 'bendahara/juru uang', 'seksi giat', 'seksi kapram', 'seksi evabang', 'seksi abdimas'] as $jabatan)
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
                <div class="card h-100 shadow-sm text-center pt-4 {{ strtolower($purna->satuan) }}">
                    <div class="mx-auto mb-2" style="width: 100px; height: 120px; clip-path: polygon(
                            10% 5%, 90% 5%, 
                            100% 20%, 85% 95%, 
                            50% 100%, 
                            15% 95%, 0% 20%
                        );overflow: hidden; background: #fff;">
                        @if($purna->foto)
                            <img src="{{ asset('uploads/' . $purna->foto) }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title mb-1" style="font-size: 14px;">Kak {{ $purna->nama }}</h6>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Jabatan:</strong> {{ $purna->jabatan }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Angkatan:</strong> {{ $purna->angkatan ?? '-' }}</p>
                        <p class="card-text" style="font-size: 13px;"><strong>Alamat:</strong> {{ $purna->alamat ?? '-' }}</p>
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
