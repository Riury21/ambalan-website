@extends('layouts.main')

@section('title', 'Dewan Purna - Kamajaya Kamaratih')

@section('content')

<!-- CSS Sticky Header dan Efek -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95); /* Warna putih transparan */
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px; /* Sudut membulat */
        transition: transform 0.3s ease, opacity 0.3s ease; /* Transisi untuk animasi */
    }

    .sticky-hidden {
        transform: translateY(-100%); /* Geser header ke luar layar */
        opacity: 0; /* Header tidak terlihat */
    }

    .sticky-visible {
        transform: translateY(0); /* Kembalikan header ke posisi awal */
        opacity: 1; /* Header terlihat */
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 50px; /* Sesuaikan dengan tinggi navbar */
            padding-top: 0.5rem;
        }
    }

    .card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card.kamajaya::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgb(0, 0, 254), rgba(123, 191, 255, 0));
        border-radius: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        z-index: -1;
        transition: all 0.4s ease-in-out;
    }

    .card.kamajaya:hover::before {
        width: 300%;
        height: 300%;
        opacity: 1;
    }

    .card.kamaratih::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgb(0, 255, 255), rgba(123, 191, 255, 0));
        border-radius: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        z-index: -1;
        transition: all 0.4s ease-in-out;
    }

    .card.kamaratih:hover::before {
        width: 300%;
        height: 300%;
        opacity: 1;
    }
</style>

<div class="container py-4">
    <!-- Sticky Title & Filter -->
    <div class="sticky-top-section sticky-visible" id="stickyHeader">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 40px;">
            Dewan Purna
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 40px;">
        </h1>
        <form method="GET" action="{{ route('dewan-purna.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-2">
                <input type="text" name="nama" class="form-control" placeholder="Filter Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-6 col-md-2">
                <select name="jabatan" class="form-control">
                    <option value="" disabled selected>Filter Jabatan</option>
                    @foreach(['pradana', 'wakil pradana', 'pemangku adat', 'pendamping kanan', 'pendamping kiri', 'sekretaris/kerani', 'bendahara/juru uang', 'seksi giat', 'seksi kajian pramuka', 'seksi evabang', 'seksi abdimas'] as $jabatan)
                        <option value="{{ $jabatan }}" {{ request('jabatan') === $jabatan ? 'selected' : '' }}>{{ ucfirst($jabatan) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-2">
                <input type="text" name="angkatan" class="form-control" placeholder="Filter Angkatan" value="{{ request('angkatan') }}">
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
                    <div class="mx-auto mb-2" style="width: 100px; height: 100px;">
                        @if($purna->foto)
                            <img src="{{ asset('uploads/' . $purna->foto) }}"
                                 class="rounded-circle img-fluid"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image"
                                 class="rounded-circle img-fluid"
                                 style="width: 100px; height: 100px; object-fit: cover;">
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
    // Scroll detection untuk sticky header
    document.addEventListener("DOMContentLoaded", function () {
        const stickyHeader = document.getElementById("stickyHeader");
        let lastScrollPosition = 0;

        window.addEventListener("scroll", function () {
            const currentScrollPosition = window.pageYOffset;

            if (currentScrollPosition > lastScrollPosition) {
                // Scroll ke bawah, sembunyikan header
                stickyHeader.classList.add("sticky-hidden");
                stickyHeader.classList.remove("sticky-visible");
            } else {
                // Scroll ke atas atau berhenti, tampilkan header
                stickyHeader.classList.add("sticky-visible");
                stickyHeader.classList.remove("sticky-hidden");
            }

            lastScrollPosition = currentScrollPosition;
        });
    });
</script>
@endsection
