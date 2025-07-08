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
        height: calc(var(--vh, 1vh) * 100); /* Tinggi penuh layar */
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
        bottom: 30px; /* naikkan teks (default 0 → ubah ke 30px) */
        left: 10px;   /* geser teks ke kanan sedikit */
        padding: 15px 20px;
        margin: 0;
        width: auto;
        max-width: 100%;
        color: #fff;
        text-align: left;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
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

</style>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="/logo/dewanambalan.jpg" alt="Kegiatan 1">
            <div class="carousel-caption">
                <h1>Gerakan Pramuka</h1>
                <h2>Ambalan Kamajaya Kamaratih</h2>
                <h2>Pangkalan SMA Negeri 1 Sumpiuh Gugus Depan 19.2823-19.2824</h2>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="/logo/kjkr2016.jpg" alt="Kegiatan 2">
            <div class="carousel-caption">
                <h4>Kami belajar bahwa cinta bukan hanya urusan hati,</h4>
                <h4>tapi juga aksi nyata: menolong tanpa mengharap balasan,</h4>
                <h4>memberi tanpa meminta kembali.</h4>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="/logo/kjkr2017.jpg" alt="Kegiatan 3">
            <div class="carousel-caption">
                <h2>Diamku bukan tanpa arti,</h2>
                <h2>aku hanya memilih berbicara lewat tindakan.</h2>
                <p>Giat 15/16 Priyanggono</p>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carouselElement = document.getElementById('carouselExample');

        let startX = 0;
        let endX = 0;

        // Event untuk memulai swipe
        carouselElement.addEventListener('touchstart', (e) => {
            startX = e.changedTouches[0].screenX;
        });

        // Event untuk mengakhiri swipe
        carouselElement.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        // Fungsi untuk menangani swipe
        function handleSwipe() {
            const swipeDistance = endX - startX;

            if (swipeDistance > 50) {
                // Geser ke kiri (prev slide)
                const prevButton = carouselElement.querySelector('.carousel-control-prev');
                prevButton.click();
            } else if (swipeDistance < -50) {
                // Geser ke kanan (next slide)
                const nextButton = carouselElement.querySelector('.carousel-control-next');
                nextButton.click();
            }
        }
        function setFullHeight() {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }

        // Jalankan saat halaman dimuat & saat di-resize
        window.addEventListener('load', setFullHeight);
        window.addEventListener('resize', setFullHeight);
        });
</script>
@endsection
