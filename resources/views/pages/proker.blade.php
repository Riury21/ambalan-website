@extends('layouts.main')

@section('title', 'Program Kerja - Kamajaya Kamaratih')

@section('content')

<!-- CSS Tambahan -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
    }

    .content-container {
        background-color: rgba(255, 255, 255, 0.9);
        color: rgb(0, 0, 0);
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-download {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease;
    }

    .btn-download:hover {
        background-color: #0056b3;
    }

    .accordion-button {
        font-weight: bold;
    }

    .accordion-button:not(.collapsed) {
    background-color: #0d6efd;
    color: #fff;
    }

    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        } 

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #333;
        }

        .content-container {
            background-color: rgba(30, 30, 30, 0.9);
            color: #e0e0e0;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .btn-download {
            background-color: #2196f3;
            color: white;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .btn-download:hover {
            background-color: #0b79d0;
        }

        .accordion-button {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }

        .accordion-body {
            background-color: #2c2c2c;
            color: #e0e0e0;
        }
        .accordion-button:not(.collapsed) {
        background-color: #1e1e1e;
        color: #fff;
        }  
    }
    .section-title {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px 20px;
        border-radius: 10px;
        color: #000;
    }

    @media (prefers-color-scheme: dark) {
        .section-title {
            background-color: rgba(30, 30, 30, 0.9);
            color: #e0e0e0;
        }
    }
</style>

<div class="container py-4">

    <!-- Sticky Header -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kjkj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 100px;">
            Program Kerja Ambalan Kamajaya Kamaratih
            <img src="{{ asset('logo/krkr.png') }}" alt="Logo KR" class="img-fluid" style="height: 100px;">
        </h1>
    </div>

    <!-- tambahkan perintah berikut dibelakang kegitan -->
    <!-- <span class="badge bg-success"> ✔ Terlaksana</span> -->
    <!-- <span class="badge bg-warning text-dark">⏳ Berlangsung</span> -->
    <!-- <span class="badge bg-danger"> ✘ Gagal</span> -->
     <!-- <span class="badge bg-secondary"> 🕓 Belum Dilaksanakan</span> -->

    <!-- CONTOH -->
    <!-- <li>Pembentukan Dewan Ambalan<span class="badge bg-success">✔ Terlaksana</span></li> -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">
                Visi dan Misi Dewan Ambalan 2024/2025
            </h2>
            <div class="content-container">
                <h3>Visi</h3>
                <ul>
                    <li>Latihan Rutin Mingguan</li>
                    <li>Penerimaan Tamu Ambalan (PTA)</li>
                    <li>Pelatihan Kepemimpinan</li>
                    <li>Perkemahan Sabtu Minggu (Persami)</li>
                    <li>Lomba Tingkat (LT I & II)</li>
                </ul>
                <h3>Misi</h3>
                <ul>
                    <li>Kegiatan Bakti Sosial</li>
                    <li>Pengembangan Kreativitas</li>
                    <li>Upacara Hari Besar Nasional</li>
                    <li>Rapat Evaluasi Dewan Ambalan</li>
                    <li>Pelatihan Skill Khusus (Tali-temali, P3K, Semaphore, dll)</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Daftar Program Umum -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">
                Daftar Program Umum
            </h2>
            <div class="content-container">
                <ul>
                    <li>Latihan Rutin Mingguan</li>
                    <li>Penerimaan Tamu Ambalan (PTA)</li>
                    <li>Pelatihan Kepemimpinan</li>
                    <li>Perkemahan Sabtu Minggu (Persami)</li>
                    <li>Lomba Tingkat (LT I & II)</li>
                    <li>Kegiatan Bakti Sosial</li>
                    <li>Pengembangan Kreativitas</li>
                    <li>Upacara Hari Besar Nasional</li>
                    <li>Rapat Evaluasi Dewan Ambalan</li>
                    <li>Pelatihan Skill Khusus (Tali-temali, P3K, Semaphore, dll)</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Accordion Timeline Tahun Ajaran -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center section-title">
                Timeline Kegiatan (Tahun Ajaran)
            </h2>
            <div class="accordion" id="accordionTahunAjaran">

                <!-- Juli -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingJuli">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuli" aria-expanded="true">
                            Juli
                        </button>
                    </h2>
                    <div id="collapseJuli" class="accordion-collapse collapse show" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Pembentukan Dewan Ambalan</li>
                                <li>Rapat kerja tahunan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Agustus -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAgustus">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAgustus" aria-expanded="false">
                            Agustus
                        </button>
                    </h2>
                    <div id="collapseAgustus" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Latihan perdana</li>
                                <li>Upacara Hari Pramuka (14 Agustus)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- September -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeptember">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeptember" aria-expanded="false">
                            September
                        </button>
                    </h2>
                    <div id="collapseSeptember" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Penerimaan Tamu Ambalan (PTA)</li>
                                <li>Perayaan Hari Jadi Ambalan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Oktober -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOktober">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOktober" aria-expanded="false">
                            Oktober
                        </button>
                    </h2>
                    <div id="collapseOktober" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Latihan rutin lanjutan</li>
                                <li>Pelatihan Kepemimpinan</li>
                                <li>Persiapan Lomba Tingkat</li>
                                <li>Evaluasi akhir semester</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- November -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNovember">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNovember" aria-expanded="false">
                            November
                        </button>
                    </h2>
                    <div id="collapseNovember" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Latihan rutin lanjutan</li>
                                <li>Pelatihan Kepemimpinan</li>
                                <li>Persiapan Lomba Tingkat</li>
                                <li>Evaluasi akhir semester</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Desember -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDesember">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesember" aria-expanded="false">
                            Desember
                        </button>
                    </h2>
                    <div id="collapseDesember" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Latihan rutin lanjutan</li>
                                <li>Pelatihan Kepemimpinan</li>
                                <li>Persiapan Lomba Tingkat</li>
                                <li>Evaluasi akhir semester</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Januari -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingJanuari">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJanuari" aria-expanded="false">
                            Januari
                        </button>
                    </h2>
                    <div id="collapseJanuari" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Latihan awal semester</li>
                                <li>Evaluasi semester ganjil</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Februari -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFebruari">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFebruari" aria-expanded="false">
                            Februari
                        </button>
                    </h2>
                    <div id="collapseFebruari" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Pelatihan keterampilan (Tali-temali, P3K, Semaphore)</li>
                                <li>Simulasi perkemahan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Maret -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMaret">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMaret" aria-expanded="false">
                            Maret
                        </button>
                    </h2>
                    <div id="collapseMaret" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Persami Ambalan</li>
                                <li>Lomba Tingkat II</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- April -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingApril">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApril" aria-expanded="false">
                            April
                        </button>
                    </h2>
                    <div id="collapseApril" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Kegiatan Bakti Sosial</li>
                                <li>Pengembangan Kreativitas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Mei -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMei">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMei" aria-expanded="false">
                            Mei
                        </button>
                    </h2>
                    <div id="collapseMei" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Penutupan semester</li>
                                <li>Rapat Akhir Tahun</li>
                                <li>Penyusunan Laporan Kegiatan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Juni -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingJuni">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuni" aria-expanded="false">
                            Juni
                        </button>
                    </h2>
                    <div id="collapseJuni" class="accordion-collapse collapse" data-bs-parent="#accordionTahunAjaran">
                        <div class="accordion-body">
                            <ul>
                                <li>Penutupan semester</li>
                                <li>Rapat Akhir Tahun</li>
                                <li>Penyusunan Laporan Kegiatan</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Download PDF -->
    <div class="row justify-content-center mt-4">
        <div class="col-12 text-center">
            <a href="{{ asset('dokumen/KJKR.pdf') }}" class="btn-download" target="_blank">
                📥 Unduh Program Kerja (PDF)
            </a>
        </div>
    </div>
</div>

<!-- Pastikan Bootstrap JS aktif -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
