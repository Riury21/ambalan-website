@extends('layouts.main')

@section('title', 'Berita - Kamajaya Kamaratih')

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

    .truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
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

        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
            border-color: #444;
        }

        .card a,
        .card-text a {
            color: #90caf9;
        }

        .card a:hover,
        .card-text a:hover {
            color: #64b5f6;
        }

        .text-dark {
            color: #e0e0e0 !important;
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
            Prestasi, Berita & Informasi
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>
        <form method="GET" action="{{ route('berita.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari Judul Berita"
                    value="{{ request('search') }}"
                    oninput="this.form.submit();">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
    <!-- Grid Berita -->
    <div class="row justify-content-center mt-4">
        @forelse($berita as $item)
            <div class="col-12 col-md-4 col-lg-4">
                <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}"
                                 class="card-img-top img-fluid"
                                 style="height: 300px; object-fit: cover;"
                                 alt="Gambar Berita">
                        @else
                            <img src="https://via.placeholder.com/600x300?text=No+Image"
                                 class="card-img-top img-fluid"
                                 style="height: 300px; object-fit: cover;"
                                 alt="No Image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $item->judul }}</h5>

                            @php
                                $text = nl2br(e($item->isi));
                                $withLinks = preg_replace(
                                    '/(https?:\/\/[^\s<]+)/',
                                    '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
                                    $text
                                );
                            @endphp
                            <p class="card-text truncate">{!! $withLinks !!}</p>

                            <p class="card-text mt-2">
                                <strong>Penulis:</strong> {{ $item->penulis ?? '-' }} <br>
                                <strong>Tanggal:</strong> {{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') : '-' }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="row justify-content-center mt-4">
                <div class="col-6 col-md-4">
                    <div class="text-center text-muted bg-white p-3 rounded shadow-sm">
                        Berita yang anda cari tidak tersedia.
                    </div>
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
