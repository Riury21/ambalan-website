@extends('layouts.admin')

@section('title', 'Daftar Galeri - Admin')

@section('content')

<!-- Sticky Header CSS -->
<style>
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 999;
        background-color: white;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 767.98px) {
        .sticky-header {
            position: static !important;
        }
    }
</style>

<div class="container py-4">
    <!-- Judul Sticky -->
    <div class="sticky-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Galeri</h2>
        <a href="{{ url('/admin/galeri/create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Galeri
        </a>
    </div>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th class="d-none d-md-table-cell">Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galeri as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100, '...') }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Gambar Galeri" height="60" width="60">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="d-none d-md-table-cell">{{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') : '-' }}</td>
                    <td>
                        <a href="{{ url('/admin/galeri/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ url('/admin/galeri/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus galeri ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada galeri.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
