<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dewan Ambalan</title>
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
                    <h4 class="mb-0">Edit Anggota Dewan Ambalan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/dewan/'.$dewan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dewan->nama) }}" required>
                        </div>

                        <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select mb-2" id="jabatan_select" onchange="syncJabatan()">
                            <option value="">-- Pilih Jabatan --</option>
                            @php
                                $daftarJabatan = [
                                    'Pradana', 'Wakil Pradana', 'Pemangku Adat',
                                    'Pendamping Kanan', 'Pendamping Kiri', 'Sekretaris/Kerani',
                                    'Bendahara/Juru Uang', 'Seksi Giat', 'Seksi Kapram',
                                    'Seksi Evabang','Seksi Abdimas',
                                    'Seksi Litev', 'Seksi Tekspram', 'Seksi Binbang', 'Seksi Sarpras'
                                ];
                            @endphp
                            @foreach($daftarJabatan as $j)
                                <option value="{{ $j }}" {{ old('jabatan', $dewan->jabatan) == $j ? 'selected' : '' }}>{{ $j }}</option>
                            @endforeach
                            <option value="lain">Lainnya...</option>
                        </select>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Isi jabatan manual jika perlu" value="{{ old('jabatan', $dewan->jabatan) }}" required>
                    </div>

                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select" id="satuan" name="satuan">
                                <option value="">-- Pilih Satuan --</option>
                                <option value="Kamajaya" {{ old('satuan', $dewan->satuan) == 'Kamajaya' ? 'selected' : '' }}>Kamajaya</option>
                                <option value="Kamaratih" {{ old('satuan', $dewan->satuan) == 'Kamaratih' ? 'selected' : '' }}>Kamaratih</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan', $dewan->angkatan) }}">
                        </div>

                        <div class="mb-3">
                            <label for="keaktifan" class="form-label">Status Keaktifan</label>
                            <select class="form-select" id="keaktifan" name="keaktifan">
                                <option value="">-- Pilih Status --</option>
                                <option value="Menjabat" {{ old('keaktifan', $dewan->keaktifan) == 'Menjabat' ? 'selected' : '' }}>Menjabat</option>
                                <option value="Purna" {{ old('keaktifan', $dewan->keaktifan) == 'Purna' ? 'selected' : '' }}>Purna</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dewan->tanggal_lahir) }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $dewan->alamat) }}">
                        </div>

                        <div class="mb-3">
                            <label for="nomer_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp" name="nomer_hp" value="{{ old('nomer_hp', $dewan->nomer_hp) }}">
                        </div>

                        <div class="mb-3">
                            <label for="sosial_media" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control" id="sosial_media" name="sosial_media" value="{{ old('sosial_media', $dewan->sosial_media) }}">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if($dewan->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . $dewan->foto) }}" alt="Foto Dewan" width="100">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $dewan->keterangan) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-kamaratih">Update</button>
                            <a href="{{ url('/admin/dewan') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
