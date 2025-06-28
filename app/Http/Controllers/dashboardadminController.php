<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembina;
use App\Models\Dewan;
use App\Models\Pesan;
use App\Models\Galeri;
use App\Models\Berita;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $jumlahPembina = Pembina::count();
        $jumlahPembinaAktif = Pembina::where('tahun_menjabat', 'Ya')->count();
        $jumlahDewanAmbalan = Dewan::where('keaktifan', 'menjabat')->count();
        $jumlahDewanPurna = Dewan::where('keaktifan', 'purna')->count();
        $jumlahPesan = Pesan::count();
        $jumlahGaleri = Galeri::count();
        $jumlahBerita = Berita::count();

        return view('admin.dashboard', compact(
            'jumlahPembina',
            'jumlahPembinaAktif',
            'jumlahDewanAmbalan',
            'jumlahDewanPurna',
            'jumlahPesan',
            'jumlahGaleri',
            'jumlahBerita'
        ));
    }

}
