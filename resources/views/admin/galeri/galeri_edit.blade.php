<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Galeri</title>
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
            color: #ffffff;
        }

        .btn-kamaratih {
            background-color: #66ccff;
            color: #003366;
        }

        .btn-kamaratih:hover {
            background-color: #55b5e6;
            color: #002244;
        }

        .card-custom {
            border-top: 4px solid #003366;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm card-custom">
                <div class="card-header bg-kamajaya text-center">
                    <h4 class="mb-0">Edit Galeri</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/galeri/'.$galeri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ old('tanggal_upload', optional($galeri->tanggal_upload)->format('Y-m-d')) }}">
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            @if($galeri->gambar)
                                <div class="mt-3">
                                    <img src="{{ asset('uploads/' . $galeri->gambar) }}" alt="Gambar Galeri" width="100" class="border rounded shadow-sm">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Update</button>
                            <a href="{{ url('/admin/galeri') }}" class="btn btn-outline-secondary">Batal</a>
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
