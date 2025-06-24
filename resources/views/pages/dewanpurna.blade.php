@extends('layouts.main')

@section('title', 'Dewan Purna - Kamajaya Kamaratih')

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
        <h1 class="text-center mb-3">Dewan Purna</h1>
        <form method="GET" action="{{ route('dewan-purna.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <select name="jabatan" class="form-control">
                    <option value="" disabled selected>Filter Jabatan</option>
                    <option value="pradana" {{ request('jabatan') === 'pradana' ? 'selected' : '' }}>Pradana</option>
                    <option value="wakil pradana" {{ request('jabatan') === 'wakil pradana' ? 'selected' : '' }}>Wakil Pradana</option>
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
                <a href="{{ route('dewan-purna.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Grid Data -->
    <div class="row justify-content-center mt-4">
        @forelse($dewanPurna as $purna)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card h-100 shadow-sm text-center pt-4">
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
                        <h6 class="card-title mb-1" style="font-size: 14px;">{{ $purna->nama }}</h6>
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
@endsection
