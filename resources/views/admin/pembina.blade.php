@extends('layouts.admin')

@section('title', 'Daftar Pembina - Admin')

@section('content')

<style>
    .sticky-header {
        position: sticky;
        top: 0;
        background-color: #fff;
        z-index: 1020;
        padding-top: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }

    .sticky-filter {
        position: sticky;
        top: 72px; /* Sesuaikan dengan tinggi judul */
        background-color: #fff;
        z-index: 1015;
        padding-top: 0.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 767.98px) {
        .sticky-header,
        .sticky-filter {
            position: static !important;
        }
    }
</style>

<div class="container py-4">
    <!-- Judul (Sticky) -->
    <div class="sticky-header d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Pembina</h2>
        <a href="{{ url('/admin/pembina/create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pembina
        </a>
    </div>

    <!-- Form Filter (Sticky) -->
    <div class="sticky-filter">
        <form method="GET" action="{{ url('/admin/pembina') }}" class="row row-cols-1 row-cols-md-4 g-2">
            <div class="col">
                <input type="text" name="jabatan" class="form-control" placeholder="Filter Jabatan" value="{{ request('jabatan') }}">
            </div>
            <div class="col">
                <input type="text" name="tahun_menjabat" class="form-control" placeholder="Filter Tahun Menjabat" value="{{ request('tahun_menjabat') }}">
            </div>
            <div class="col d-flex">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ url('/admin/pembina') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Tabel -->
    <table class="table table-bordered table-striped align-middle mt-3">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tahun Menjabat</th>
                <th>HP</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembina as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->tahun_menjabat ?? '-' }}</td>
                    <td>{{ $item->nomer_hp ?? '-' }}</td>
                    <td>{{ $item->email ?? '-' }}</td>
                    <td>{{ $item->alamat ?? '-' }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto Pembina" height="60" width="60">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}</td>
                    <td>
                        <a href="{{ url('/admin/pembina/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ url('/admin/pembina/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center text-muted">Belum ada data pembina.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
