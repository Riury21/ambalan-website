@extends('layouts.main')

@section('title', 'Pembina - Kamajaya Kamaratih')

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

    /* Premium Card */
    .premium-card {
        background: linear-gradient(
            180deg,
            #ffffff 0%,
            #ffffff 50%,
            #ffffff 50%,
            #ff0000 100%
        );
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

    /* Foto */
    .photo-wrapper {
        position: relative;
        width: 120px;
        height: 140px;
        margin: 15px auto 10px auto;
        border-radius: 12px;
        background: linear-gradient(135deg, #ff0000, #ff4d4d);
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

    /* Nama dengan gradasi merah menyala */
    .nama-premium {
        font-size: 16px;
        font-weight: 700;
        background: linear-gradient(90deg, #ff0000, #ff4d4d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 6px;
    }

    /* Garis pemisah di bawah nama (selalu 80% card) */
    .garis-premium {
        width: 80%;
        height: 3px;
        background: linear-gradient(90deg, #ff0000, #ff4d4d);
        margin: 6px auto 10px auto;
        border-radius: 2px;
    }

    .card-text {
        font-size: 14px;
        color: #000000ff;
        margin-bottom: 4px;
    }

    /* DARK MODE */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .sticky-top-section {
            background-color: rgba(30,30,30,0.95);
            border-bottom: 1px solid #444;
            color: #fff;
        }
        .premium-card {
            background: linear-gradient(180deg, #1e1e1e, #2c2c2c);
            color: #e0e0e0;
        }
        .card-text {
            color: #ffffffff;
        }
        .nama-premium {
            background: linear-gradient(90deg, #ff4d4d, #ff9999);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .garis-premium {
            background: linear-gradient(90deg, #ff4d4d, #ff9999);
        }
        .photo-wrapper {
            background: linear-gradient(135deg, #ff0000, #ff4d4d);
        }
    }
</style>

<div class="container py-4">
    <!-- Sticky Header -->
    <div class="sticky-top-section sticky-visible" id="stickyHeader">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            Pembina Ambalan
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>

        <!-- Filter Form -->
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

    <!-- Grid Pembina -->
    <div class="row justify-content-center mt-4">
        @forelse($pembina as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="premium-card h-100 text-center pt-3 pb-2">
                    <div class="photo-wrapper">
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}" class="profile-photo">
                        @else
                            <img src="https://via.placeholder.com/150x150?text=No+Image" class="profile-photo">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title nama-premium">Kak {{ $item->nama }}</h6>
                        <div class="garis-premium"></div>
                        <p class="card-text mb-1"><strong>Jabatan:</strong> {{ $item->jabatan }}</p>
                        <p class="card-text mb-1"><strong>Kontak:</strong> {{ $item->kontak ?? '-' }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $item->alamat ?? '-' }}</p>
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
