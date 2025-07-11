@extends('layouts.main')

@section('title', 'Pembina - Kamajaya Kamaratih')

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
        transition: background-color 0.3s ease;
    }

    .sticky-hidden {
        transform: translateY(-100%);
        opacity: 0;
    }

    .sticky-visible {
        transform: translateY(0);
        opacity: 1;
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
    }

    .card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
        color: #000;
        border: 1px solid #ddd;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(255, 0, 0, 1), rgba(255, 0, 0, 0));
        border-radius: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        z-index: -1;
        transition: all 0.4s ease-in-out;
    }

    .card:hover::before {
        width: 300%;
        height: 300%;
        opacity: 1;
    }

    .form-control,
    .btn {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* DARK MODE */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #444;
            color: #fff;
        }

        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
            border-color: #444;
        }

        .form-control {
            background-color: #2c2c2c;
            color: #e0e0e0;
            border-color: #444;
            appearance: none;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        select.form-control {
            background-image: none; /* hilangkan panah default */
        }

        option {
            background-color: #2c2c2c;
            color: #fff;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        .btn-secondary {
            background-color: #3a3a3a;
            border-color: #555;
            color: #fff;
        }

        .text-muted {
            color: #bbb !important;
        }
    }
</style>

<div class="container py-4">
    <div class="sticky-top-section sticky-visible" id="stickyHeader">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            Pembina Ambalan
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>

        <form method="GET" action="{{ url('/pembina') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Filter Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-6 col-md-3">
                <select name="jabatan" class="form-control">
                    <option value="" disabled selected>Semua Jabatan</option>
                    <option value="Kamabigus" {{ request('jabatan') == 'Kamabigus' ? 'selected' : '' }}>Kamabigus</option>
                    <option value="Ketua Gudep Kamajaya" {{ request('jabatan') == 'Ketua Gudep Kamajaya' ? 'selected' : '' }}>Ketua Gudep Kamajaya</option>
                    <option value="Ketua Gudep Kamaratih" {{ request('jabatan') == 'Ketua Gudep Kamaratih' ? 'selected' : '' }}>Ketua Gudep Kamaratih</option>
                    <option value="Pembina Kamajaya" {{ request('jabatan') == 'Pembina Kamajaya' ? 'selected' : '' }}>Pembina Kamajaya</option>
                    <option value="Pembina Kamaratih" {{ request('jabatan') == 'Pembina Kamaratih' ? 'selected' : '' }}>Pembina Kamaratih</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <select name="bertugas" class="form-control">
                    <option value="" disabled selected>Bertugas</option>
                    <option value="Ya" {{ request('bertugas') == 'Ya' ? 'selected' : '' }}>Ya</option>
                    <option value="Tidak" {{ request('bertugas') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ url('/pembina') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid -->
    <div class="row justify-content-center mt-4">
        @forelse($pembina as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card h-100 shadow-sm text-center pt-4">
                    <div class="mx-auto mb-2" style="width: 100px; height: 120px; clip-path: polygon(
                        10% 5%, 90% 5%, 100% 20%, 85% 95%, 50% 100%, 15% 95%, 0% 20%
                    ); overflow: hidden; background: #fff;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title mb-1" style="font-size: 14px;">Kak {{ $item->nama }}</h6>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Jabatan:</strong> {{ $item->jabatan }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Bertugas:</strong> {{ $item->tahun_menjabat }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Email:</strong> {{ $item->email ?? '-' }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Kontak:</strong> {{ $item->kontak ?? '-' }}</p>
                        <p class="card-text" style="font-size: 13px;"><strong>Alamat:</strong> {{ $item->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada pembina yang ditampilkan.</p>
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
