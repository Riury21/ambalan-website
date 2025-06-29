@extends('layouts.admin')

@section('title', 'Daftar Berita - Admin')

@section('content')

<!-- CSS untuk Sticky Header -->
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
        <h2 class="mb-0">Daftar Berita</h2>
        <a href="{{ url('/admin/berita/create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Berita
        </a>
    </div>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Isi/Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100, '...') }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Gambar Berita" height="60" width="60">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/berita/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ url('/admin/berita/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
