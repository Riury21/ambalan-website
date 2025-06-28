@extends('layouts.admin')

@section('title', 'Daftar Dewan Ambalan - Admin')

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

    /* Sticky Filter */
    .sticky-filter {
        position: sticky;
        top: 56px; /* cukup kecil agar tidak terlalu jauh */
        z-index: 998;
        background-color: white;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #dee2e6;
    }

    /* Non-sticky di mobile */
    @media (max-width: 767.98px) {
        .sticky-header,
        .sticky-filter {
            position: static;
        }
    }

    /* Hapus padding atas konten utama jika ada */
    #main-content {
        padding-top: 0 !important;
    }
</style>

<div class="container py-4">
    <!-- Sticky Judul -->
    <div class="sticky-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Dewan Ambalan</h2>
            <a href="{{ url('/admin/dewan/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>
    </div>

    <!-- Sticky Filter -->
    <div class="sticky-filter mt-2">
        <form method="GET" action="{{ url('/admin/dewan') }}" class="row g-2">
            <div class="col-md-3">
                <select name="jabatan" class="form-select">
                    <option value="">Semua Jabatan</option>
                    <option value="Pradana" {{ request('jabatan') == 'Pradana' ? 'selected' : '' }}>Pradana</option>
                    <option value="Wakil Pradana" {{ request('jabatan') == 'Wakil Pradana' ? 'selected' : '' }}>Wakil Pradana</option>
                    <option value="Pemangku Adat" {{ request('jabatan') == 'Pemangku Adat' ? 'selected' : '' }}>Pemangku Adat</option>
                    <option value="Pendamping Kanan" {{ request('jabatan') == 'Pendamping Kanan' ? 'selected' : '' }}>Pendamping Kanan</option>
                    <option value="Pendamping Kiri" {{ request('jabatan') == 'Pendamping Kiri' ? 'selected' : '' }}>Pendamping Kiri</option>
                    <option value="Sekretaris/Kerani" {{ request('jabatan') == 'Sekretaris/Kerani' ? 'selected' : '' }}>Sekretaris/Kerani</option>
                    <option value="Bendahara/Juru Uang" {{ request('jabatan') == 'Bendahara/Juru Uang' ? 'selected' : '' }}>Bendahara/Juru Uang</option>
                    <option value="Seksi Giat" {{ request('jabatan') == 'Seksi Giat' ? 'selected' : '' }}>Seksi Giat</option>
                    <option value="Seksi Abdimas" {{ request('jabatan') == 'Seksi Abdimas' ? 'selected' : '' }}>Seksi Abdimas</option>
                    <option value="Seksi Evabang" {{ request('jabatan') == 'Seksi Evabang' ? 'selected' : '' }}>Seksi Evabang</option>
                    <option value="Seksi Kajian Pramuka" {{ request('jabatan') == 'Seksi Kajian Pramuka' ? 'selected' : '' }}>Seksi Kajian Pramuka</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="angkatan" class="form-control" placeholder="Filter Angkatan" value="{{ request('angkatan') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="alamat" class="form-control" placeholder="Filter Alamat" value="{{ request('alamat') }}">
            </div>
            <div class="col-md-2">
                <select name="satuan" class="form-select">
                    <option value="">Semua Satuan</option>
                    <option value="Kamajaya" {{ request('satuan') == 'Kamajaya' ? 'selected' : '' }}>Kamajaya</option>
                    <option value="Kamaratih" {{ request('satuan') == 'Kamaratih' ? 'selected' : '' }}>Kamaratih</option>
                </select>
            </div>
            <div class="col-md-3 d-flex">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ url('/admin/dewan') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="mt-4">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Satuan</th>
                    <th>Angkatan</th>
                    <th>Keaktifan</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>HP</th>
                    <th>Sosial Media</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dewan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->satuan ?? '-' }}</td>
                        <td>{{ $item->angkatan ?? '-' }}</td>
                        <td>{{ $item->keaktifan ?? '-' }}</td>
                        <td>{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') : '-' }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->nomer_hp ?? '-' }}</td>
                        <td>{{ $item->sosial_media ?? '-' }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto" height="60" width="60">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}</td>
                        <td>
                            <a href="{{ url('/admin/dewan/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ url('/admin/dewan/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center text-muted">Belum ada data Dewan Ambalan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
