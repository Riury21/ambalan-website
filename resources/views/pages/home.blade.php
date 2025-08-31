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
        justify-content: center; /* teks dan logo di tengah */
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

    /* Logo di atas teks, muncul setelah gerbang menutup */
    .logo-overlay {
        width: 160px;
        height: auto;
        z-index: 10;
        animation: fadeIn 2s ease forwards;
        margin-bottom: 20px; /* beri jarak ke teks */
        opacity: 0; /* pastikan fadeIn bekerja */
        animation-delay: 2.6s; /* muncul setelah gerbang menutup */
    }

    /* Teks utama di tengah */
    .main-text {
        text-align: center;
        opacity: 0;
        color: #fff;
        font-family: 'Cinzel Decorative', cursive;
        animation: fadeIn 1s ease forwards;
        animation-delay: 3.8s; /* tetap muncul setelah logo */
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

    <!-- Logo overlay di atas teks -->
    <img src="/logo/lencana.png" alt="Logo Pramuka" class="logo-overlay">

    <!-- Tulisan muncul setelah gerbang menutup -->
    <div class="main-text">
        <h1>Gerakan Pramuka</h1>
        <h2>Ambalan Kamajaya Kamaratih</h2>
        <h3>Pangkalan SMA Negeri 1 Sumpiuh Gugus Depan 19.2823-19.2824</h3>
    </div>
</div>
@endsection
