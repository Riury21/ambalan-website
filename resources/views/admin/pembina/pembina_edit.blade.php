<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembina</title>
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
            color: #fff;
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
                    <h4 class="mb-0">Edit Pembina</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/pembina/' . $pembina->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pembina->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                <option value="">-- Pilih Jabatan --</option>
                                <option value="Kamabigus" {{ old('jabatan', $pembina->jabatan) == 'Kamabigus' ? 'selected' : '' }}>Kamabigus</option>
                                <option value="Ketua Gudep Kamajaya" {{ old('jabatan', $pembina->jabatan) == 'Ketua Gudep Kamajaya' ? 'selected' : '' }}>Ketua Gudep Kamajaya</option>
                                <option value="Ketua Gudep Kamaratih" {{ old('jabatan', $pembina->jabatan) == 'Ketua Gudep Kamaratih' ? 'selected' : '' }}>Ketua Gudep Kamaratih</option>
                                <option value="Pembina Kamajaya" {{ old('jabatan', $pembina->jabatan) == 'Pembina Kamajaya' ? 'selected' : '' }}>Pembina Kamajaya</option>
                                <option value="Pembina Kamaratih" {{ old('jabatan', $pembina->jabatan) == 'Pembina Kamaratih' ? 'selected' : '' }}>Pembina Kamaratih</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_menjabat" class="form-label">Bertugas</label>
                            <select class="form-select" id="tahun_menjabat" name="tahun_menjabat">
                                <option value="">-- Pilih --</option>
                                <option value="Ya" {{ old('tahun_menjabat', $pembina->tahun_menjabat) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                <option value="Tidak" {{ old('tahun_menjabat', $pembina->tahun_menjabat) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nomer_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp" name="nomer_hp" value="{{ old('nomer_hp', $pembina->nomer_hp) }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pembina->email) }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $pembina->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $pembina->keterangan) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (biarkan kosong jika tidak diubah)</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if($pembina->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . $pembina->foto) }}" alt="Foto Pembina" width="100">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Update</button>
                            <a href="{{ url('/admin/pembina') }}" class="btn btn-outline-secondary">Batal</a>
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
