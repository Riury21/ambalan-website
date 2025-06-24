@extends('layouts.main')

@section('title', 'Berita - Kamajaya Kamaratih')

@section('content')

<!-- CSS Sticky Header -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: #fff;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 50px;
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
</style>

<div class="container py-4">

    <!-- Sticky Title -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3">Berita Ambalan</h1>
    </div>

    <!-- Grid Berita -->
    <div class="row justify-content-center mt-4">
        @forelse($berita as $item)
            <div class="col-12 col-md-6 mb-4">
                <a href="{{ url('/berita/' . $item->id) }}" class="text-decoration-none text-dark">
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
                                <strong>Tanggal:</strong> {{ $item->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada berita yang ditampilkan.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
