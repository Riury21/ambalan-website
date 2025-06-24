@extends('layouts.main')

@section('title', 'Dewan Ambalan - Kamajaya Kamaratih')

@section('content')

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
    <div class="sticky-top-section">
        <h1 class="text-center mb-3">Dewan Ambalan</h1>
        <form method="GET" action="{{ route('dewan-ambalan.index') }}" class="row g-2 justify-content-center">
            <div class="col-6 col-md-3">
                <input type="text" name="jabatan" class="form-control" placeholder="Filter Jabatan" value="{{ request('jabatan') }}">
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

    <div class="row justify-content-center mt-4">
        @forelse($dewanMenjabat as $dewan)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                <div class="card h-100 shadow-sm text-center pt-4">
                    <div class="mx-auto mb-2" style="width: 100px; height: 100px;">
                        @if($dewan->foto)
                            <img src="{{ asset('uploads/' . $dewan->foto) }}" class="rounded-circle img-fluid"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/100x100?text=No+Image" class="rounded-circle img-fluid"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body px-2 py-2">
                        <h6 class="card-title mb-1" style="font-size: 14px;">{{ $dewan->nama }}</h6>
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
@endsection
