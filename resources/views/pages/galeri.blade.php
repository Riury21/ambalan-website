@extends('layouts.main')

@section('title', 'Galeri - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0.5rem;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
    }

    /* === GALLERY CARD STYLE === */
    .gallery-card {
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        background: #fff;
    }

    .gallery-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
    }

    .gallery-thumb img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .gallery-body {
        padding: 1rem;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #222;
        line-height: 1.4;
        transition: color 0.2s;
    }

    .gallery-card:hover .gallery-title {
        color: #0d6efd;
    }

    .gallery-meta {
        color: #777;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .gallery-excerpt {
        font-size: 0.95rem;
        color: #444;
        line-height: 1.5;
    }

    /* === Dark Mode === */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #333;
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

        /* === Dark Mode for Gallery Card === */
        .gallery-card {
            background-color: #1e1e1e;
            border-color: #333;
        }

        .gallery-title {
            color: #e0e0e0;
        }

        .gallery-card:hover .gallery-title {
            color: #64b5f6;
        }

        .gallery-meta {
            color: #aaa;
        }

        .gallery-excerpt {
            color: #ccc;
        }
    }
</style>

<div class="container py-4">

    <!-- Sticky Title -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            Galeri & Dokumentasi
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>
        <form method="GET" action="{{ route('galeri.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari Judul Galeri"
                    value="{{ request('search') }}">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid Galeri -->
    <div class="row justify-content-center mt-4">
        @forelse($galeri as $item)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="gallery-card h-100">
                    <a href="{{ route('galeri.detail', $item->slug) }}" class="text-decoration-none">
                        @if($item->gambar)
                            <div class="gallery-thumb">
                                <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Gambar Galeri" class="img-fluid">
                            </div>
                        @else
                            <div class="gallery-thumb">
                                <img src="https://via.placeholder.com/600x300?text=No+Image" alt="No Image" class="img-fluid">
                            </div>
                        @endif
                        <div class="gallery-body">
                            <h5 class="gallery-title mb-2">{{ $item->judul }}</h5>
                            <p class="gallery-meta">
                                📅 {{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') : '-' }}
                            </p>
                            @php
                                $text = strip_tags($item->deskripsi);
                                $excerpt = Str::limit($text, 120, '...');
                            @endphp
                            <p class="gallery-excerpt">{{ $excerpt }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-4">
                <div class="text-muted p-4 rounded bg-light">
                    Data yang anda cari tidak tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector('input[name="search"]');
        let timer;

        input.addEventListener("input", function () {
            clearTimeout(timer);
            timer = setTimeout(() => {
                this.form.submit();
            }, 500); // jeda 500ms setelah terakhir mengetik
        });
    });
</script>
@endsection
