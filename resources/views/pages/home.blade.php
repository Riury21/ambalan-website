@extends('layouts.main')

@section('title', 'Home - Kamajaya Kamaratih')

@section('content')
<meta name="viewport" content="width=1024, initial-scale=0.5">

<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Montserrat:wght@600;700&family=Poppins:wght@400;500&display=swap');

    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .carousel {
        margin: 0;
        padding: 0;
        width: 100vw;
        position: relative;
        overflow: hidden;
        height: 100vh;
    }

    #main-content {
        margin-left: 0;
        padding: 0;
    }

    .carousel .carousel-inner,
    .carousel .carousel-item {
        width: 100vw;
        height: calc(var(--vh, 1vh) * 100);
    }

    .carousel-item img {
        width: 100%; 
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    /* Area teks */
    .carousel-caption {
        position: absolute;
        bottom: 8%;
        left: 5%;
        padding: 10px 15px;
        color: #fff;
        text-align: left;
    }

    /* Shadow hanya di teks */
    .carousel-caption h1,
    .carousel-caption h2,
    .carousel-caption h4,
    .carousel-caption p {
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
        margin: 0.4rem 0;
    }

    /* Judul utama */
    .carousel-caption h1 {
        font-family: 'Cinzel Decorative', serif;
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 2px;
    }

    /* Subjudul */
    .carousel-caption h2 {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.8rem;
        font-weight: 600;
    }

    /* Kalimat puitis */
    .carousel-caption h4 {
        font-family: 'Cinzel Decorative', serif;
        font-size: 1.4rem;
        font-weight: 400;
        line-height: 1.6;
    }

    .carousel-caption p {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-weight: 400;
    }
</style>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1: Panji Bendera Ambalan -->
        <div class="carousel-item active">
            <img src="/logo/dewanambalan.jpg" alt="Kegiatan 1">
            <div class="carousel-caption">
                <h1>Gerakan Pramuka</h1>
                <h2>Ambalan Kamajaya Kamaratih</h2>
                <h2>Pangkalan SMA Negeri 1 Sumpiuh<br>Gugus Depan 19.2823-19.2824</h2>
            </div>
        </div>

        <!-- Slide 2: Dewi Kamaratih & Kamajaya -->
        <div class="carousel-item">
            <img src="/logo/kjkr2016.jpg" alt="Kegiatan 2">
            <div class="carousel-caption">
                <h4>
                    Kamaratih menebar bunga kasih,<br>
                    Kamajaya menyambut dengan jiwa yang suci.<br>
                    Cinta bukan sekadar rasa,<br>
                    melainkan pengorbanan tanpa pamrih.
                </h4>
            </div>
        </div>

        <!-- Slide 3: Ksatria Kamajaya merenung -->
        <div class="carousel-item">
            <img src="/logo/kjkr2017.jpg" alt="Kegiatan 3">
            <div class="carousel-caption">
                <h2>
                    Dalam diam tersimpan kekuatan,<br>
                    merenung bukan kelemahan,<br>
                    tapi awal dari sebuah perencanaan.
                </h2>
                <p>Giat 15/16 Priyanggono</p>
            </div>
        </div>
    </div>

    <!-- Navigasi -->
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
        let startX = 0, endX = 0;

        carouselElement.addEventListener('touchstart', (e) => {
            startX = e.changedTouches[0].screenX;
        });

        carouselElement.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeDistance = endX - startX;
            if (swipeDistance > 50) {
                carouselElement.querySelector('.carousel-control-prev').click();
            } else if (swipeDistance < -50) {
                carouselElement.querySelector('.carousel-control-next').click();
            }
        }

        function setFullHeight() {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }

        window.addEventListener('load', setFullHeight);
        window.addEventListener('resize', setFullHeight);
    });
</script>
@endsection
