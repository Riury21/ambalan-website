@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-0">Dashboard Admin Ambalan Kamajaya Kamaratih 19.2823-19.2824</h2>
    <p class="mb-0">Pesan u/ Admin :
        <li>Jangan buat Berita/ Artikel/ Galeri HOAX</li>
        <li>Lengkapi data Dewan & Pembina</li>
        <li>Lakukan Penambahan & Update data</li>
    </p>

    <!-- Statistik -->
    <div class="row mt-4 g-3">
        <div class="col-md-6">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-warning">Jumlah Dokumen</h5>
                    <p class="display-6 fw-bold text-warning">{{ $jumlahDokumen }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-danger">Jumlah Pesan</h5>
                    <p class="display-6 fw-bold text-danger">{{ $jumlahPesan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-dark">Jumlah Galeri</h5>
                    <p class="display-6 fw-bold text-dark">{{ $jumlahGaleri }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
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
        <div class="col-md-6">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title text-success">Dewan Ambalan</h5>
                    <p class="display-6 fw-bold text-success">{{ $jumlahDewanAmbalan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
