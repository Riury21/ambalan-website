<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }

    public function gambar($id)
    {
        $galeri = Galeri::findOrFail($id);
        if (!$galeri->gambar) {
            abort(404);
        }
        return response($galeri->gambar)->header('Content-Type', 'image/jpeg');
    }

    public function create()
    {
        return view('admin.galeri_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal_upload' => 'nullable|date',
        ]);

        $galeri = new Galeri();
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->tanggal_upload = $request->tanggal_upload ?? now();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $galeri->gambar = $namaFile;
        }

        $galeri->save();

        return redirect('/admin/galeri')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri_edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal_upload' => 'nullable|date',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->tanggal_upload = $request->tanggal_upload ?? $galeri->tanggal_upload;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $galeri->gambar = $namaFile;
        }

        $galeri->save();

        return redirect('/admin/galeri')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect('/admin/galeri')->with('success', 'Galeri berhasil dihapus!');
    }
}
