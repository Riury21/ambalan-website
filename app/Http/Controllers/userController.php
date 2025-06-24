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
        $query = Dewan::where('keaktifan', 'Purna');

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', 'like', '%' . $request->angkatan . '%');
        }

        $dewanPurna = $query->orderBy('angkatan', 'desc')->get();

        return view('pages.dewanpurna', compact('dewanPurna'));
    }

    public function dewanAmbalan(Request $request)
    {
        $query = Dewan::where('keaktifan', 'Menjabat');

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', 'like', '%' . $request->angkatan . '%');
        }

        $dewanMenjabat = $query->orderBy('angkatan', 'desc')->get();

        return view('pages.dewanambalan', compact('dewanMenjabat'));
    }
    public function pembina(Request $request)
    {
        $query = \App\Models\Pembina::query();

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        $pembina = $query->orderBy('nama')->get();

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
    public function detailBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita-detail', compact('berita'));
    }
    public function detailGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('pages.galeri-detail', compact('galeri'));
    }
    

}
