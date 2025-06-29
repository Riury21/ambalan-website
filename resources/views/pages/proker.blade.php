@extends('layouts.main')

@section('title', 'Badge - Kamajaya Kamaratih')

@section('content')

<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 1);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
    }

    .content-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .content-column {
        flex: 1;
        max-width: 45%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .content-column img {
        max-width: 33%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .text-content {
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        color: #000;
    }

    @media (max-width: 768px) {
        .content-column {
            max-width: 100%;
        }
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 1);
            border-bottom: 1px solid #333;
        }

        .content-column {
            background-color: rgba(30, 30, 30, 0.9);
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .text-content {
            color: #e0e0e0;
        }
    }
</style>

<div class="container py-4">
    <!-- Sticky Title -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            Program Kerja
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>
    </div>

    <!-- Konten Badge -->
    <div class="content-container">
        <div class="content-column mt-4">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo Kamajaya">
            <div class="text-content">
                <p>
                    Kamajaya adalah dewa yang sangat tampan dan rupawan. Dalam cerita pewayangan, Kamajaya menjadi simbol kesempurnaan yang mencapai 99%, 
                    dengan 1% sisanya diberikan kepada umat manusia di bumi. Harapan dari simbol ini adalah agar anggota pramuka Kamajaya dapat menjadi sempurna 
                    dalam mengamalkan Tri Satya dan Dasa Dharma, serta menjadi pandu ibu pertiwi.
                </p>
            </div>
        </div>
        <div class="content-column mt-4">
            <img src="{{ asset('logo/kr.png') }}" alt="Logo Kamaratih">
            <div class="text-content">
                <p>
                    Kamaratih adalah dewi yang sangat cantik dan anggun. Dalam cerita pewayangan, Kamaratih juga menjadi simbol kesempurnaan yang mencapai 99%. 
                    Dengan harapan yang sama seperti Kamajaya, Kamaratih melambangkan kecantikan dan kesempurnaan yang dapat diterapkan dalam kehidupan anggota 
                    pramuka, untuk selalu menjaga keharmonisan dan menjadi pribadi yang membangun.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
