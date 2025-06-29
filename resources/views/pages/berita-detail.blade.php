@extends('layouts.main')

@section('title', $berita->judul . ' - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-title {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 1rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    @media (max-width: 768px) {
        .sticky-title {
            top: 0px;
        }
    }

    .float-img {
        float: left;
        width: 50%;
        max-width: 400px;
        margin-right: 20px;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .float-img {
            float: none;
            width: 100%;
            margin: 0 0 1rem 0;
        }
    }

    .content-bg {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, color 0.3s ease;
        color: #212529;
    }

    a {
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn-secondary {
        background-color: #0d6efd;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #0b5ed7;
        color: #fff;
    }

    /* === DARK MODE === */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-title {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #333;
            color: #e0e0e0;
        }

        .content-bg {
            background-color: rgba(30, 30, 30, 0.95);
            color: #e0e0e0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
        }

        a {
            color: #66b0ff;
        }

        .btn-secondary {
            background-color: #0d6efd;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #0b5ed7;
            color: #fff;
        }
    }
</style>

<div class="container py-4">

    <!-- Sticky Judul -->
    <div class="sticky-title text-center mb-4">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            {{ $berita->judul }}
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="content-bg">
                @if($berita->gambar)
                    <img src="{{ asset('uploads/' . $berita->gambar) }}" class="img-fluid float-img" alt="Gambar Berita">
                @endif

                @php
                    $text = nl2br(e($berita->isi));
                    $withLinks = preg_replace(
                        '/(https?:\/\/[^\s<]+)/',
                        '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
                        $text
                    );
                @endphp

                <div class="clearfix mb-4">{!! $withLinks !!}</div>

                <p><strong>Penulis:</strong> {{ $berita->penulis ?? '-' }}</p>
                <p><strong>Tanggal:</strong> {{ $berita->created_at->format('d M Y') }}</p>

                <a href="{{ url('/berita') }}" class="btn btn-secondary mt-3">← Kembali ke Berita</a>
            </div>
        </div>
    </div>
</div>
@endsection
