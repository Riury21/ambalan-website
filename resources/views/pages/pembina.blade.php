@extends('layouts.main')

@section('title', 'Pembina - Kamajaya Kamaratih')

@section('content')

<!-- CSS Sticky Header dan Filter -->
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
</style>

<div class="container py-4">

    <!-- Sticky Title & Filter -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3">Pembina Ambalan</h1>
        <form method="GET" action="{{ url('/pembina') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Filter Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-6 col-md-3">
                <select name="jabatan" class="form-select">
                    <option value="">Semua Jabatan</option>
                    <option value="Kamabigus" {{ request('jabatan') == 'Kamabigus' ? 'selected' : '' }}>Kamabigus</option>
                    <option value="Ketua Gudep Kamajaya" {{ request('jabatan') == 'Ketua Gudep Kamajaya' ? 'selected' : '' }}>Ketua Gudep Kamajaya</option>
                    <option value="Ketua Gudep Kamaratih" {{ request('jabatan') == 'Ketua Gudep Kamaratih' ? 'selected' : '' }}>Ketua Gudep Kamaratih</option>
                    <option value="Pembina Kamajaya" {{ request('jabatan') == 'Pembina Kamajaya' ? 'selected' : '' }}>Pembina Kamajaya</option>
                    <option value="Pembina Kamaratih" {{ request('jabatan') == 'Pembina Kamaratih' ? 'selected' : '' }}>Pembina Kamaratih</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <select name="bertugas" class="form-select">
                    <option value="">Bertugas</option>
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

    <!-- Grid Data -->
    <div class="row justify-content-center mt-4">
        @forelse($pembina as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card h-100 shadow-sm text-center pt-4">
                    <div class="mx-auto mb-2" style="width: 100px; height: 100px;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}"
                                class="rounded-circle img-fluid"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image"
                                class="rounded-circle img-fluid"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title mb-1" style="font-size: 14px;">{{ $item->nama }}</h6>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Jabatan:</strong> {{ $item->jabatan }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Bertugas:</strong> {{ $item->tahun_menjabat }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Email:</strong> {{ $item->email ?? '-' }}</p>
                        <p class="card-text mb-1" style="font-size: 13px;"><strong>Kontak:</strong> {{ $item->kontak ?? '-' }}</p>
                        <p class="card-text" style="font-size: 13px;"><strong>Alamat:</strong> {{ $item->alamat ?? '-' }}</p>
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
@endsection
