<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dewan;
use App\Models\Berita;
use App\Models\Galeri;

class UserController extends Controller
{
    public function dewanPurna(Request $request)
    {
        $jabatanOrder = [
            'pradana',
            'wakil pradana',
            'pemangku adat',
            'pendamping kanan',
            'pendamping kiri',
            'sekretaris/kerani',
            'bendahara/juru uang',
            'seksi giat',
            'seksi kapram',
            'seksi evabang',
            'seksi abdimas',
        ];

        $query = Dewan::where('keaktifan', 'Purna');

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', 'like', '%' . $request->angkatan . '%');
        }

        if ($request->filled('satuan')) {
            $query->where('satuan', $request->satuan);
        }

        $dewanPurna = $query
            ->orderBy('angkatan', 'desc')
            ->orderByRaw("FIELD(satuan, 'Kamajaya', 'Kamaratih')")
            ->orderByRaw('FIELD(jabatan, "' . implode('", "', $jabatanOrder) . '")')
            ->get();

        // Ambil daftar angkatan unik
        $angkatanList = Dewan::where('keaktifan', 'Purna')
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');

        return view('pages.dewanpurna', compact('dewanPurna', 'angkatanList'));
    }

    public function dewanAmbalan(Request $request)
    {
        $jabatanOrder = [
            'pradana',
            'wakil pradana',
            'pemangku adat',
            'pendamping kanan',
            'pendamping kiri',
            'sekretaris/kerani',
            'bendahara/juru uang',
            'seksi giat',
            'seksi kapram',
            'seksi evabang',
            'seksi abdimas',
        ];

        $query = Dewan::where('keaktifan', 'Menjabat');

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('satuan')) {
            $query->where('satuan', $request->satuan);
        }

        $dewanMenjabat = $query
            ->orderByRaw("FIELD(satuan, 'Kamajaya', 'Kamaratih')")
            ->orderByRaw('FIELD(jabatan, "' . implode('", "', $jabatanOrder) . '")')
            ->orderBy('angkatan', 'desc')
            ->get();

        return view('pages.dewanambalan', compact('dewanMenjabat'));
    }

    public function pembina(Request $request)
    {
        $query = \App\Models\Pembina::query();

        // Filter berdasarkan nama
        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        // Filter berdasarkan jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        // Filter berdasarkan bertugas
        if ($request->filled('bertugas')) {
            $query->where('tahun_menjabat', $request->bertugas);
        }

        // Pengurutan data berdasarkan jabatan
        $pembina = $query
            ->orderByRaw("FIELD(tahun_menjabat, 'Ya', 'Tidak')")
            ->orderByRaw("
                FIELD(jabatan, 
                'Kamabigus', 
                'Ketua Gudep Kamajaya', 
                'Pembina Kamajaya', 
                'Ketua Gudep Kamaratih', 
                'Pembina Kamaratih')
            ")
            ->orderBy('nama') // Pengurutan nama setelah jabatan
            ->get();

        return view('pages.pembina', compact('pembina'));
    }

    public function galeri()
    {
        $galeri = \App\Models\Galeri::orderBy('tanggal_upload', 'desc')->get();
        return view('pages.galeri', compact('galeri'));
    }

    public function berita()
    {
        $berita = \App\Models\Berita::orderBy('created_at', 'desc')->get();
        return view('pages.berita', compact('berita'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('pages.berita-detail', compact('berita'));
    }
    
    public function detailGaleri($slug)
    {
        $galeri = Galeri::where('slug', $slug)->firstOrFail();
        return view('pages.galeri-detail', compact('galeri'));
    }

}
