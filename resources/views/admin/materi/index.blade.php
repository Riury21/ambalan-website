@extends('layouts.admin')

@section('title', 'Daftar Materi - Admin')

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
    .sticky-filter {
        position: sticky;
        top: 56px;
        z-index: 998;
        background-color: white;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 767.98px) {
        .sticky-header,
        .sticky-filter {
            position: static;
        }
    }
</style>

<div class="container py-4">
    <!-- Header Judul -->
    <div class="sticky-header">
        <h2 class="mb-0">Daftar Materi PDF</h2>
    </div>

    <!-- Form Upload PDF dibuat seperti filter -->
    <div class="sticky-filter mt-2">
        <form action="{{ route('materi.upload') }}" method="POST" enctype="multipart/form-data" class="row g-2">
            @csrf
            <div class="col-md-5">
                <input type="text" name="judul" placeholder="Judul Materi" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="file" name="file" accept="application/pdf" class="form-control" required>
            </div>
            <div class="col-md-3 d-flex">
                <button type="submit" class="btn btn-success me-2">
                    <i class="bi bi-upload me-1"></i> Upload
                </button>
            </div>
        </form>
        <p class="mt-3 mb-0"><strong>NOTE :</strong> Khusus file program kerja, nama file harus "Prokja.pdf"</p>
    </div>

    <!-- Tabel Materi -->
    <table class="table table-bordered table-striped align-middle mt-4">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nama File</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($files as $index => $file)
                @php
                    $filename = basename($file);
                    $judul = pathinfo($filename, PATHINFO_FILENAME);
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $judul }}</td>
                    <td>{{ $filename }}</td>
                    <td><a href="{{ asset('dokumen/' . $filename) }}" target="_blank">🔗 Lihat</a></td>
                    <td>
                        <form action="{{ route('materi.destroy', $filename) }}" method="POST" onsubmit="return confirm('Yakin hapus file ini?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada file materi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
