@extends('layouts.main')

@section('title', 'Home - Kamajaya Kamaratih')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #000;
    }

    .gate-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .gate {
        position: absolute;
        top: 0;
        width: 100vw;
        height: 100vh;
        background: url('/logo/dewanambalan.jpg') center center no-repeat;
        background-size: cover;
        z-index: 5;
    }

    .gate.left {
        left: -100vw;
        clip-path: inset(0 50% 0 0);
        animation: closeLeft 2.5s forwards;
        box-shadow: inset -1px 0 0 #000;
    }

    .gate.right {
        right: -100vw;
        clip-path: inset(0 0 0 50%);
        animation: closeRight 2.5s forwards;
        box-shadow: inset 1px 0 0 #000;
    }

    @keyframes closeLeft {
        from { left: -100vw; }
        to   { left: 0; }
    }

    @keyframes closeRight {
        from { right: -100vw; }
        to   { right: 0; }
    }

    .logo-overlay {
        width: 160px;   /* Ukuran sama untuk semua logo */
        height: 160px;
        object-fit: contain;
        z-index: 10;
        opacity: 0;
        animation: fadeIn 2s ease forwards;
        margin-bottom: 20px;
        animation-delay: 2.6s;
        transition: opacity 0.8s ease; /* efek halus saat pergantian */
    }

    .main-text {
        text-align: center;
        opacity: 0;
        color: #fff;
        font-family: 'Cinzel Decorative', cursive;
        animation: fadeIn 1s ease forwards;
        animation-delay: 3.8s;
        z-index: 20;
    }

    .main-text h1 {
        font-size: 3.5rem;
        margin: 0;
    }

    .main-text h2 {
        font-size: 2.5rem;
        margin: 0.5rem 0;
        font-weight: 400;
    }

    .main-text h3 {
        font-size: 1.5rem;
        margin: 0.5rem 0;
        font-weight: 400;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="gate-container">
    <div class="gate left"></div>
    <div class="gate right"></div>

    <!-- Logo overlay -->
    <img src="/logo/homewosm.png" alt="Logo Pramuka" class="logo-overlay" id="logoOverlay">

    <!-- Tulisan muncul setelah gerbang menutup -->
    <div class="main-text">
        <h1>Gerakan Pramuka</h1>
        <h2>Ambalan Kamajaya Kamaratih</h2>
        <h3>Pangkalan SMA Negeri 1 Sumpiuh Gugus Depan 19.2823-19.2824</h3>
    </div>
</div>

<script>
    const logos = [
        '/logo/homewosm.png',
        '/logo/homegp.png',
        '/logo/lencana.png',
        '/logo/homekj.png',
        '/logo/homekr.png'
    ];

    const logoElement = document.getElementById('logoOverlay');
    let currentIndex = 0;

    // Delay awal agar menunggu animasi gerbang + fadeIn logo selesai
    setTimeout(() => {
        setInterval(() => {
            // Efek fade out
            logoElement.style.opacity = 0;

            // Setelah 400ms, ganti logo dan fade in
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % logos.length;
                logoElement.src = logos[currentIndex];
                logoElement.style.opacity = 1;
            }, 400); // delay fade out
        }, 1000); // ganti setiap 1 detik
    }, 4000); // total delay animasi sebelumnya
</script>
@endsection
