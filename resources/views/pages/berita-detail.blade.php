@extends('layouts.main')

@section('title', $berita->judul . ' - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-title {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: #ffffff;
        padding: 1rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 768px) {
        .sticky-title {
            top: 50px;
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
</style>

<div class="container py-4">

    <!-- Sticky Judul -->
    <div class="sticky-title text-center mb-4">
        <h1 class="mb-0">{{ $berita->judul }}</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">

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
@endsection
