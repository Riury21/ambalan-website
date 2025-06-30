@extends('layouts.admin')

@section('title', 'Daftar Dewan Ambalan - Admin')

@section('content')
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

    #main-content {
        padding-top: 0 !important;
    }
</style>

<div class="container py-4">
    <div class="sticky-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Dewan Ambalan</h2>
            <a href="{{ url('/admin/dewan/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>
    </div>

    <div class="sticky-filter mt-2">
        <form method="GET" action="{{ url('/admin/dewan') }}" class="row g-2">
            <div class="col-md-3">
                <select name="jabatan" class="form-select">
                    <option value="">Semua Jabatan</option>
                    @php
                        $jabatanList = [
                            'Pradana', 'Wakil Pradana', 'Pemangku Adat',
                            'Pendamping Kanan', 'Pendamping Kiri', 'Sekretaris/Kerani',
                            'Bendahara/Juru Uang', 'Seksi Giat', 'Seksi Abdimas',
                            'Seksi Evabang', 'Seksi Kajian Pramuka'
                        ];
                    @endphp
                    @foreach($jabatanList as $jabatan)
                        <option value="{{ $jabatan }}" {{ request('jabatan') == $jabatan ? 'selected' : '' }}>{{ $jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="angkatan" class="form-select">
                    <option value="">Semua Angkatan</option>
                    @foreach($angkatanList as $angkatan)
                        <option value="{{ $angkatan }}" {{ request('angkatan') == $angkatan ? 'selected' : '' }}>{{ $angkatan }}</option>
                    @endforeach
                </select>
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

    <div class="mt-4">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th class="d-none d-md-table-cell">Satuan</th>
                    <th>Angkatan</th>
                    <th class="d-none d-md-table-cell">Keaktifan</th>
                    <th class="d-none d-md-table-cell">Tanggal Lahir</th>
                    <th class="d-none d-md-table-cell">Alamat</th>
                    <th class="d-none d-md-table-cell">HP</th>
                    <th class="d-none d-md-table-cell">Sosial Media</th>
                    <th>Foto</th>
                    <th class="d-none d-md-table-cell">Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dewan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->satuan ?? '-' }}</td>
                        <td>{{ $item->angkatan ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->keaktifan ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') : '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->alamat ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->nomer_hp ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->sosial_media ?? '-' }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto" height="60" width="60">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="d-none d-md-table-cell">{{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}</td>
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
