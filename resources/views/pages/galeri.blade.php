@extends('layouts.main')

@section('title', 'Galeri - Kamajaya Kamaratih')

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
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
    }

    .truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }

    .card {
        transition: background-color 0.3s ease, color 0.3s ease;
        background-color: #ffffff;
        color: #000000;
    }

    .card-text a {
        color: #0d6efd;
        text-decoration: underline;
    }

    .card-text a:hover {
        color: #084298;
    }

    .text-muted {
        color: #6c757d !important;
    }

    /* === DARK MODE === */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #444;
            color: #ffffff;
        }

        .card {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #444;
        }

        .card-title,
        .card-body,
        .card-text,
        .card p {
            color: #ffffff;
        }

        .card-text a {
            color: #66b0ff;
        }

        .card-text a:hover {
            color: #89c9ff;
        }

        .text-muted {
            color: #aaa !important;
        }

        a.text-dark {
            color: #ffffff !important;
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
                    value="{{ request('search') }}"
                    oninput="this.form.submit();">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid Galeri -->
    <div class="row justify-content-center mt-4">
        @forelse($galeri as $item)
            <div class="col-12 col-md-6 mb-4">
                <a href="{{ route('galeri.detail', $item->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}"
                                 class="card-img-top img-fluid"
                                 style="height: 300px; object-fit: cover;"
                                 alt="Gambar Galeri">
                        @else
                            <img src="https://via.placeholder.com/600x300?text=No+Image"
                                 class="card-img-top img-fluid"
                                 style="height: 300px; object-fit: cover;"
                                 alt="No Image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $item->judul }}</h5>

                            @php
                                $text = nl2br(e($item->deskripsi));
                                $withLinks = preg_replace(
                                    '/(https?:\/\/[^\s<]+)/',
                                    '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
                                    $text
                                );
                            @endphp

                            <p class="card-text truncate">{!! $withLinks !!}</p>

                            <p class="card-text mt-2">
                                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') ?? '-' }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada galeri yang ditampilkan.</p>
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
