@extends('layouts.admin')

@section('title', 'Daftar Program Kerja - Admin')

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
    @media (max-width: 767.98px) {
        .sticky-header {
            position: static;
        }
    }
    #main-content {
        padding-top: 0 !important;
    }
</style>

<div class="container py-4">
    {{-- Header --}}
    <div class="sticky-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Daftar Program Kerja</h2>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVisiMisi">
                    <i class="bi bi-plus-circle"></i> Tambah Visi/Misi
                </button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProgramUmum">
                    <i class="bi bi-plus-circle"></i> Tambah Program Umum
                </button>
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalTimeline">
                    <i class="bi bi-plus-circle"></i> Tambah Timeline
                </button>
            </div>
        </div>
    </div>

    {{-- Tabel Visi Misi --}}
    <div class="mt-4">
        <h4>Visi & Misi</h4>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($visiMisi as $vm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($vm->jenis) }}</td>
                        <td>{{ $vm->isi }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVisiMisi{{ $vm->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('proker.visimisi.destroy', $vm->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit Visi/Misi --}}
                    <div class="modal fade" id="editVisiMisi{{ $vm->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('proker.visimisi.update', $vm->id) }}" method="POST" class="modal-content">
                                    @csrf @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Visi/Misi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                    <select name="jenis" class="form-select mb-2" required>
                                        <option value="visi" {{ $vm->jenis == 'visi' ? 'selected' : '' }}>Visi</option>
                                        <option value="misi" {{ $vm->jenis == 'misi' ? 'selected' : '' }}>Misi</option>
                                    </select>
                                    <textarea name="isi" class="form-control" required>{{ $vm->isi }}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada visi/misi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tabel Program Umum --}}
    <div class="mt-4">
        <h4>Program Umum</h4>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Program</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programUmum as $pu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pu->nama_program }}</td>
                        <td>{{ ucfirst($pu->status) }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProgram{{ $pu->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('proker.program.destroy', $pu->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit Program Umum --}}
                    <div class="modal fade" id="editProgram{{ $pu->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('proker.program.update', $pu->id) }}" method="POST" class="modal-content">
                                    @csrf @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Program Umum</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="nama_program" class="form-control mb-2" value="{{ $pu->nama_program }}" required>
                                    <select name="status" class="form-select" required>
                                        <option value="terlaksana" {{ $pu->status == 'terlaksana' ? 'selected' : '' }}>Terlaksana</option>
                                        <option value="berlangsung" {{ $pu->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                        <option value="gagal" {{ $pu->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                                        <option value="belum" {{ $pu->status == 'belum' ? 'selected' : '' }}>Belum</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada program umum.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tabel Timeline --}}
    <div class="mt-4">
        <h4>Timeline</h4>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($timeline as $tl)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tl->bulan }}</td>
                        <td>{{ $tl->tahun }}</td>
                        <td>{{ $tl->kegiatan }}</td>
                        <td>{{ ucfirst($tl->status) }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTimeline{{ $tl->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('proker.timeline.destroy', $tl->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit Timeline --}}
                    <div class="modal fade" id="editTimeline{{ $tl->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('proker.timeline.update', $tl->id) }}" method="POST" class="modal-content">
                                    @csrf @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Timeline</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <select name="bulan" class="form-select mb-2" required>
                                        @php $bulanList = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; @endphp
                                        @foreach($bulanList as $bulan)
                                            <option value="{{ $bulan }}" {{ $tl->bulan == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="tahun" id="" class="form-control mb-2" required>{{ $tl->tahun }}</textarea>
                                    <textarea name="kegiatan" class="form-control mb-2" required>{{ $tl->kegiatan }}</textarea>
                                    <select name="status" class="form-select" required>
                                        <option value="terlaksana" {{ $tl->status == 'terlaksana' ? 'selected' : '' }}>Terlaksana</option>
                                        <option value="berlangsung" {{ $tl->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                        <option value="gagal" {{ $tl->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                                        <option value="belum" {{ $tl->status == 'belum' ? 'selected' : '' }}>Belum</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada timeline.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah Visi Misi --}}
<div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('proker.visimisi.store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header"><h5 class="modal-title">Tambah Visi/Misi</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <select name="jenis" class="form-select mb-2" required>
                <option value="visi">Visi</option>
                <option value="misi">Misi</option>
            </select>
            <textarea name="isi" class="form-control" placeholder="Isi visi/misi" required></textarea>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-primary">Simpan</button></div>
    </form>
  </div>
</div>

{{-- Modal Tambah Program Umum --}}
<div class="modal fade" id="modalProgramUmum" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('proker.program.store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header"><h5 class="modal-title">Tambah Program Umum</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <input type="text" name="nama_program" class="form-control mb-2" placeholder="Nama program" required>
            <select name="status" class="form-select" required>
                <option value="terlaksana">Terlaksana</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="gagal">Gagal</option>
                <option value="belum">Belum</option>
            </select>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-success">Simpan</button></div>
    </form>
  </div>
</div>

{{-- Modal Tambah Timeline --}}
<div class="modal fade" id="modalTimeline" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('proker.timeline.store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header"><h5 class="modal-title">Tambah Timeline</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <select name="bulan" class="form-select mb-2" required>
                <option value="">-- Pilih Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
            <textarea name="tahun" class="form-control mb-2" placeholder="Tahun" required></textarea>
            <textarea name="kegiatan" class="form-control mb-2" placeholder="Kegiatan" required></textarea>
            <select name="status" class="form-select" required>
                <option value="terlaksana">Terlaksana</option>
                <option value="berlangsung">Berlangsung</option>
                <option value="gagal">Gagal</option>
                <option value="belum">Belum</option>
            </select>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-info">Simpan</button></div>
    </form>
  </div>
</div>
@endsection
