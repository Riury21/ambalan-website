<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dewan Ambalan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
        }

        .bg-kamajaya {
            background-color: #003366;
            color: #fff;
        }

        .btn-kamaratih {
            background-color: #66ccff;
            color: #003366;
            border: none;
        }

        .btn-kamaratih:hover {
            background-color: #55b5e6;
            color: #002244;
        }

        .card-custom {
            border-top: 5px solid #003366;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm card-custom">
                <div class="card-header bg-kamajaya text-center">
                    <h4 class="mb-0">Tambah Anggota Dewan Ambalan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/dewan') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select mb-2" id="jabatan_select" onchange="syncJabatan()">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Pradana">Pradana</option>
                            <option value="Wakil Pradana">Wakil Pradana</option>
                            <option value="Pemangku Adat">Pemangku Adat</option>
                            <option value="Pendamping Kanan">Pendamping Kanan</option>
                            <option value="Pendamping Kiri">Pendamping Kiri</option>
                            <option value="Sekretaris/Kerani">Sekretaris/Kerani</option>
                            <option value="Bendahara/Juru Uang">Bendahara/Juru Uang</option>
                            <option value="Seksi Giat">Seksi Giat</option>
                            <option value="Seksi Evabang">Seksi Evabang</option>
                            <option value="Seksi Kajian Pramuka">Seksi Kajian Pramuka</option>
                            <option value="Seksi Abdimas">Seksi Abdimas</option>
                            <option value="lain">Lainnya...</option>
                        </select>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Tulis jabatan lain (jika tidak ada di atas)">
                        </div>  

                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select" id="satuan" name="satuan">
                                <option value="">-- Pilih Satuan --</option>
                                <option value="Kamajaya">Kamajaya</option>
                                <option value="Kamaratih">Kamaratih</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" id="angkatan" name="angkatan">
                        </div>

                        <div class="mb-3">
                            <label for="keaktifan" class="form-label">Status Keaktifan</label>
                            <select class="form-select" id="keaktifan" name="keaktifan">
                                <option value="">-- Pilih Status --</option>
                                <option value="Menjabat">Menjabat</option>
                                <option value="Purna">Purna</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>

                        <div class="mb-3">
                            <label for="nomer_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp" name="nomer_hp">
                        </div>

                        <div class="mb-3">
                            <label for="sosial_media" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control" id="sosial_media" name="sosial_media">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Simpan</button>
                            <a href="{{ url('/admin/dewan') }}" class="btn btn-outline-secondary">Batal</a>
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
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];
        const maxSizeMB = 2;

        if (file) {
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
<script>
function syncJabatan() {
    const select = document.getElementById('jabatan_select');
    const input = document.getElementById('jabatan');

    if (select.value === 'lain') {
        input.value = '';
        input.focus();
    } else {
        input.value = select.value;
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
