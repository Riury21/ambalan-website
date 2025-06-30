@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard Admin</h2>
    <p>Selamat datang, Anda berhasil login sebagai admin.</p>

    <!-- Statistik -->
    <div class="row mt-4 g-3">
                <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-danger">Jumlah Pesan</h5>
                    <p class="display-6 fw-bold text-danger">{{ $jumlahPesan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-dark">Jumlah Galeri</h5>
                    <p class="display-6 fw-bold text-dark">{{ $jumlahGaleri }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Jumlah Berita</h5>
                    <p class="display-6 fw-bold text-muted">{{ $jumlahBerita }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-primary">Jumlah Pembina</h5>
                    <p class="display-6 fw-bold text-primary">{{ $jumlahPembina }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-info">Pembina Aktif</h5>
                    <p class="display-6 fw-bold text-info">{{ $jumlahPembinaAktif }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-success">Dewan Ambalan</h5>
                    <p class="display-6 fw-bold text-success">{{ $jumlahDewanAmbalan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-warning">Dewan Purna</h5>
                    <p class="display-6 fw-bold text-warning">{{ $jumlahDewanPurna }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
