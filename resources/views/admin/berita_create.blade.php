<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
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
                    <h4 class="mb-0">Tambah Berita</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/berita') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi/Deskripsi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="6" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis">
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Simpan</button>
                            <a href="{{ url('/admin/berita') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];
            const maxSizeMB = 2;

            if (!validTypes.includes(file.type)) {
                alert('File harus berupa gambar JPG, PNG, GIF, atau WebP.');
                this.value = '';
                return;
            }

            if (file.size > maxSizeMB * 1024 * 1024) {
                alert('Ukuran gambar maksimal 2MB.');
                this.value = '';
                return;
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
