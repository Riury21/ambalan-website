@extends('layouts.main')

@section('title', 'Dewan Ambalan - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px; /* Sudut membulat */
        transition: transform 0.3s ease, opacity 0.3s ease;
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
            top: 50px;
            padding-top: 0.5rem;
        }
    }

    .card {
        position: relative;
        overflow: hidden; /* Supaya efek cahaya tidak keluar dari card */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Efek cahaya untuk Kamajaya */
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

    /* Efek cahaya untuk Kamaratih */
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
            Dewan Ambalan
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 40px;">
        </h1>
        <form method="GET" action="{{ route('dewan-ambalan.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <select name="jabatan" class="form-control">
                    <option value="" disabled selected>Filter Jabatan</option>
                    <option value="pradana" {{ request('jabatan') === 'pradana' ? 'selected' : '' }}>Pradana</option>
                    <option value="pemangku adat" {{ request('jabatan') === 'pemangku adat' ? 'selected' : '' }}>Pemangku Adat</option>
                    <option value="pendamping kanan" {{ request('jabatan') === 'pendamping kanan' ? 'selected' : '' }}>Pendamping Kanan</option>
                    <option value="pendamping kiri" {{ request('jabatan') === 'pendamping kiri' ? 'selected' : '' }}>Pendamping Kiri</option>
                    <option value="sekretaris/kerani" {{ request('jabatan') === 'sekretaris/kerani' ? 'selected' : '' }}>Sekretaris/Kerani</option>
                    <option value="bendahara/juru uang" {{ request('jabatan') === 'bendahara/juru uang' ? 'selected' : '' }}>Bendahara/Juru Uang</option>
                    <option value="seksi giat" {{ request('jabatan') === 'seksi giat' ? 'selected' : '' }}>Seksi Giat</option>
                    <option value="seksi kajian pramuka" {{ request('jabatan') === 'seksi kajian pramuka' ? 'selected' : '' }}>Seksi Kajian Pramuka</option>
                    <option value="seksi evabang" {{ request('jabatan') === 'seksi evabang' ? 'selected' : '' }}>Seksi Evabang</option>
                    <option value="seksi abdimas" {{ request('jabatan') === 'seksi abdimas' ? 'selected' : '' }}>Seksi Abdimas</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <input type="text" name="angkatan" class="form-control" placeholder="Filter Angkatan" value="{{ request('angkatan') }}">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2 justify-content-center">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('dewan-ambalan.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid Data -->
    <div class="row justify-content-center mt-4">
        @forelse($dewanMenjabat as $dewan)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card h-100 shadow-sm text-center pt-4 {{ strtolower($dewan->satuan) }}">
                    <div class="mx-auto mb-2" style="width: 100px; height: 120px; clip-path: polygon(
                            10% 5%, 90% 5%, /* Lengkung atas */
                            100% 20%, 85% 95%, /* Sisi kanan */
                            50% 100%, /* Titik bawah */
                            15% 95%, 0% 20% /* Sisi kiri */
                        );overflow: hidden; background: #fff;">
                        @if($dewan->foto)
                            <img src="{{ asset('uploads/' . $dewan->foto) }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title mb-1" style="font-size: 14px;">Kak {{ $dewan->nama }}</h6>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Jabatan:</strong> {{ $dewan->jabatan }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Angkatan:</strong> {{ $dewan->angkatan ?? '-' }}</p>
                        <p class="card-text" style="font-size: 13px;"><strong>Alamat:</strong> {{ $dewan->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada Data Dewan Ambalan yang ditampilkan.</p>
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
