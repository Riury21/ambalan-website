@extends('layouts.main')

@section('title', 'Kritik dan Saran - Kamajaya Kamaratih')

@section('content')

<!-- CSS untuk Form Kritik dan Saran -->
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
        background-color: rgba(255, 255, 255, 0.95); /* Latar belakang putih transparan */
        color: black;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
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

    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
        }
        .sticky-top-section h1 {
            font-size: 1.4rem;
        }
    }
    .custom-ok-btn {
        background-color: #0d6efd !important; /* Ganti dengan warna yang Anda inginkan */
        color: white !important; /* Warna teks pada tombol */
        border-radius: 5px; /* Atur bentuk tombol */
        font-weight: bold; /* Teks tebal */
        padding: 8px 20px; /* Jarak dalam tombol */
        border: none; /* Hapus border default */
        transition: background-color 0.3s ease; /* Efek hover */
    }

    .custom-ok-btn:hover {
        background-color: #0056b3 !important; /* Warna saat tombol di-hover */
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
            Swal.fire({
                title: 'Berhasil!',
                text: "Pesan kakak telah terkirim, silahkan cek email untuk balasan.",
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'custom-ok-btn'
                }
            });
        });
    </script>
@endif

@endsection
