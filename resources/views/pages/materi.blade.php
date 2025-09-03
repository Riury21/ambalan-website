@extends('layouts.main')

@section('title', 'Materi - Kamajaya Kamaratih')

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
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .materi-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 1rem;
        background-color: #fff;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
    }

    .materi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .materi-icon {
        font-size: 3rem;
        color: #0d6efd;
    }

    .materi-meta {
        font-size: 0.9rem;
        color: #777;
    }

    @media (prefers-color-scheme: dark) {
        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #444;
            color: #ffffff;
        }

        .materi-card {
            background-color: #1e1e1e;
            border-color: #444;
            color: #e0e0e0;
        }

        .materi-meta {
            color: #bbb;
        }

        .materi-icon {
            color: #90caf9;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
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
    }
</style>

<div class="container py-4">
    <!-- Sticky Header -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="KJ" style="height: 60px;">
            Materi Pramuka
            <img src="{{ asset('logo/kr.png') }}" alt="KR" style="height: 60px;">
        </h1>
        <form method="GET" action="{{ route('materi.user.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari Judul Materi" value="{{ request('search') }}">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <a href="{{ route('materi.user.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Materi Grid -->
    <div class="row mt-4">
        @forelse($files as $file)
            @php
                $filename = basename($file);
                $judul = pathinfo($filename, PATHINFO_FILENAME);
                $filePath = public_path("dokumen/$filename");
                $ukuranKB = file_exists($filePath) ? number_format(filesize($filePath) / 1024, 2) : '0.00';
            @endphp
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="materi-card h-100">
                    <div class="d-flex align-items-center mb-2">
                        <div class="materi-icon me-3">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $judul }}</h5>
                            <div class="materi-meta">Ukuran: {{ $ukuranKB }} KB</div>
                        </div>
                    </div>
                    <a href="{{ asset('dokumen/' . $filename) }}" target="_blank" class="btn btn-primary w-100 mt-2">
                        <i class="bi bi-download me-1"></i> Unduh
                    </a>
                </div>
            </div>
        @empty
            <div class="row justify-content-center mt-4">
                <div class="col-6 col-md-4">
                    <div class="text-center text-muted bg-white p-3 rounded shadow-sm">
                        Materi yang anda cari tidak tersedia.
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
            }, 500);
        });
    });
</script>
@endsection
