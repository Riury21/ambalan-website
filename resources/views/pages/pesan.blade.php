@extends('layouts.main')

@section('title', 'Kritik dan Saran - Kamajaya Kamaratih')

@section('content')

<style>
    .form-container {
        background-color: rgba(255, 255, 255, 0.95);
        color: rgb(0, 0, 0);
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .form-title {
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .submit-btn {
        background-color: #0d6efd;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }

    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        color: black;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sticky-top-section h1 {
        font-size: 1.8rem;
        font-weight: bold;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .custom-ok-btn {
        background-color: #0d6efd !important;
        color: white !important;
        border-radius: 5px;
        font-weight: bold;
        padding: 8px 20px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .custom-ok-btn:hover {
        background-color: #0056b3 !important;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
        }
        .sticky-top-section h1 {
            font-size: 1.4rem;
        }
    }

    /* DARK MODE SUPPORT */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .form-container {
            background-color: rgba(30, 30, 30, 0.95);
            color: #e0e0e0;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .form-control {
            background-color: #2c2c2c;
            color: #fff;
            border: 1px solid #444;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .submit-btn {
            background-color: #0d6efd;
            color: white;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            color: #fff;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .form-label {
            color: #fff;
        }

        .text-danger {
            color: #ff6b6b !important;
        }
    }

    /* SWEETALERT DARK MODE */
    .swal-dark {
        background-color: #1e1e1e !important;
        color: #e0e0e0 !important;
        border: 1px solid #333;
    }

    .swal-dark .swal2-title {
        color: #ffffff !important;
    }

    .swal-dark .swal2-html-container {
        color: #dddddd !important;
    }
</style>

<div class="container py-4">

    <!-- Sticky Title -->
    <div class="sticky-top-section container">
        <h1 class="text-center">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 70px;">
            Kritik dan Saran
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR" class="img-fluid" style="height: 70px;">
        </h1>
    </div>

    <!-- Form Kritik dan Saran -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="form-container">
                <div class="form-title">Kirim Kritik dan Saran Kakak</div>
                <form action="{{ route('pesan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea name="pesan" id="pesan" rows="5" class="form-control" placeholder="Tulis kritik atau saran Anda di sini..." required></textarea>
                        @error('pesan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn submit-btn">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Notification -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            Swal.fire({
                title: 'Berhasil!',
                text: "Pesan kakak telah terkirim, silahkan cek email untuk balasan.",
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'custom-ok-btn',
                    popup: isDark ? 'swal-dark' : ''
                }
            });
        });
    </script>
@endif

@endsection
