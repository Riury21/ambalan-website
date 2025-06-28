@extends('layouts.admin')

@section('title', 'Daftar Pesan - Admin')

@section('content')

<style>
    /* Sticky Header (judul) */
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 999;
        background-color: white;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    /* Tabel */
    .table-container {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* Tombol Aksi */
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 5px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #218838;
    }
</style>

<div class="container py-4">
    <!-- Judul (Sticky) -->
    <div class="sticky-header d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Pesan, Kritik & Saran</h2>
    </div>

    <!-- Tabel -->
    <div class="">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->pesan), 100, '...') }}</td>
                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            @if($item->status === 'dibalas')
                                <span class="badge bg-success">Sudah Dibalas</span>
                            @else
                                <span class="badge bg-secondary">Belum Dibalas</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('pesan.update', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success" {{ $item->status === 'dibalas' ? 'disabled' : '' }}>
                                    <i class="bi bi-check"></i> Ceklis
                                </button>
                            </form>
                            <form action="{{ route('pesan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
