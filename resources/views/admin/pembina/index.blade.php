@extends('layouts.admin')

@section('title', 'Daftar Pembina - Admin')

@section('content')

<style>
    /* Sticky Header (judul) */
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 999;
        background-color: white;
        padding: 0.5rem 0.5rem;
        border-bottom: 1px solid #dee2e6;
        border-radius: 0.5rem;
    }

    /* Sticky Filter */
    .sticky-filter {
        position: sticky;
        top: 56px;
        z-index: 998;
        background-color: white;
        padding: 0.5rem 0.5rem;
        border-bottom: 1px solid #dee2e6;
        border-radius: 0.5rem;
    }

    @media (max-width: 767.98px) {
        .sticky-header,
        .sticky-filter {
            position: static;
        }
    }

    #main-content {
        padding-top: 0 !important;
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
                <select name="jabatan" class="form-select">
                    <option value="">Semua Jabatan</option>
                    <option value="Kamabigus" {{ request('jabatan') == 'Kamabigus' ? 'selected' : '' }}>Kamabigus</option>
                    <option value="Ketua Gudep Kamajaya" {{ request('jabatan') == 'Ketua Gudep Kamajaya' ? 'selected' : '' }}>Ketua Gudep Kamajaya</option>
                    <option value="Ketua Gudep Kamaratih" {{ request('jabatan') == 'Ketua Gudep Kamaratih' ? 'selected' : '' }}>Ketua Gudep Kamaratih</option>
                    <option value="Pembina Kamajaya" {{ request('jabatan') == 'Pembina Kamajaya' ? 'selected' : '' }}>Pembina Kamajaya</option>
                    <option value="Pembina Kamaratih" {{ request('jabatan') == 'Pembina Kamaratih' ? 'selected' : '' }}>Pembina Kamaratih</option>
                </select>
            </div> 

            <div class="col">
                <select name="tahun_menjabat" class="form-select">
                    <option value="">Filter Bertugas</option>
                    <option value="Ya" {{ request('tahun_menjabat') == 'Ya' ? 'selected' : '' }}>Ya</option>
                    <option value="Tidak" {{ request('tahun_menjabat') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <div class="col d-flex">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ url('/admin/pembina') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Tabel (Responsif) -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm align-middle mt-3">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Bertugas</th>
                    <th class="d-none d-md-table-cell">HP</th>
                    <th class="d-none d-md-table-cell">Email</th>
                    <th class="d-none d-md-table-cell">Alamat</th>
                    <th>Foto</th>
                    <th class="d-none d-md-table-cell">Keterangan</th>
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
                        <td class="d-none d-md-table-cell">{{ $item->nomer_hp ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->email ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->alamat ?? '-' }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto Pembina" height="60" width="60">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}
                        </td>
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
</div>

@endsection
