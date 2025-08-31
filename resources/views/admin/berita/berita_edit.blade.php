<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Untuk Android  -->
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="/icons/icon-192x192.png" sizes="192x192">
    <meta name="theme-color" content="#000000">

    <!-- Untuk iOS -->
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Kamajaya">
    
    <style>
        body {
            margin: 0;
            background-image: url('{{ asset('logo/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }
        .bg-kamajaya {
            background-color: #003366;
            color: white;
        }
        .btn-kamaratih {
            background-color: #66ccff;
            color: #003366;
            border: none;
        }
        .btn-kamaratih:hover {
            background-color: #55b5e6;
        }
        .card-custom {
            border-top: 4px solid #003366;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm card-custom">
                <div class="card-header bg-kamajaya text-center">
                    <h4 class="mb-0">Edit Berita</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/berita/'.$berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi/Deskripsi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ old('tanggal_upload', $berita->tanggal_upload) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            @if($berita->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . $berita->gambar) }}" alt="Gambar Berita" width="100">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Update</button>
                            <a href="{{ url('/admin/berita') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
