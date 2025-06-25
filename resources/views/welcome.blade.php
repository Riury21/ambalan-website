@extends('layouts.main')

@section('title', 'Home - Kamajaya Kamaratih')

@section('content')
<style>
    /* Reset margin dan padding */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden; /* Hilangkan scroll horizontal */
    }

    /* Carousel */
    .carousel {
        margin: 0;
        padding: 0;
        width: 100vw; /* Carousel memenuhi layar penuh */
        position: relative;
        overflow: hidden; /* Hilangkan elemen yang keluar dari layar */
        position: relative; /* Pastikan tidak fixed */
        width: 100vw;       /* Lebar penuh layar */
        height: 100vh;      /* Tinggi penuh layar */
        margin-left: 0;     /* Reset margin */
    }
    

    #main-content {
        margin-left: 0; /* Reset margin utama */
        padding: 0;     /* Hindari padding tambahan */
    }


    .carousel .carousel-inner,
    .carousel .carousel-item {
        width: 100vw; /* Lebar penuh layar */
        height: 100vh; /* Tinggi penuh layar */
    }

    /* Gambar di carousel */
    .carousel-item img {
        width: 100%; 
        height: 100%;
        object-fit: cover; /* Gambar mengisi area tanpa distorsi */
        object-position: center; /* Fokus pada tengah gambar */
        display: block; /* Hilangkan bug inline elemen */
    }

    /* Posisi teks */
    .carousel-caption {
        position: absolute;
        bottom: 20px; /* Jarak dari bawah */
        left: 20px; /* Jarak dari kiri */
        right: 20px; /* Tambahkan ruang untuk teks panjang */
        color: #fff;
        text-align: left;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    .carousel-caption h1 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .carousel-caption p {
        font-size: 1.25rem;
    }

    /* Responsif untuk perangkat kecil */
    @media (max-width: 768px) {
        .carousel-caption h1 {
            font-size: 1.5rem; /* Ukuran judul lebih kecil */
        }

        .carousel-caption p {
            font-size: 1rem; /* Ukuran deskripsi lebih kecil */
        }
    }
    @media (min-width: 992px) { /* Hanya untuk tampilan desktop */
        .carousel-caption {
            margin-left: 240px; /* Sesuaikan dengan lebar sidebar */
            text-align: left;
        }
    }

</style>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="/logo/kjkr2015.jpg" alt="Kegiatan 1">
            <div class="carousel-caption">
                <h1>Keringat dan lelah ini adalah bukti perjuangan,
                    tapi kebersamaan adalah kemenangan sesungguhnya</h1>
                <p>~kjkr 2012</p>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="/logo/kjkr2016.jpg" alt="Kegiatan 2">
            <div class="carousel-caption">
                <h1>Gerakan Pramuka</h1>
                <h1>Ambalan Kamajaya Kamaratih</h1>
                <h1>Pangkalan SMA Negeri 1 Sumpiuh</h1>
                <h1>Gugus Depan 19.2823-19.2824</h1>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="/logo/kjkr2017.jpg" alt="Kegiatan 3">
            <div class="carousel-caption">
                <h1>Diamku bukan tanpa arti, aku hanya memilih berbicara lewat tindakan.</h1>
                <p>~Mas Pri</p>
            </div>
        </div>
    </div>
    <!-- Tombol navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
