<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .bg-kamajaya {
            background-color: #003366; /* biru tua */
            color: #fff;
        }

        .btn-kamaratih {
            background-color: #66ccff; /* biru muda */
            color: #003366;
        }

        .btn-kamaratih:hover {
            background-color: #55b5e6;
            color: #002244;
        }

        .card-custom {
            border-top: 4px solid #003366;
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm card-custom">
                <div class="card-header bg-kamajaya text-center">
                    <h4 class="mb-0">Tambah Pembina</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/pembina') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_menjabat" class="form-label">Tahun Menjabat</label>
                            <input type="text" class="form-control" id="tahun_menjabat" name="tahun_menjabat">
                        </div>
                        <div class="mb-3">
                            <label for="nomer_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp" name="nomer_hp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Simpan</button>
                            <a href="{{ url('/admin/pembina') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function () {
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
