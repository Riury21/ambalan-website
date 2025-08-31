<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }
    public function gambar($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        if (!$berita->gambar) {
            abort(404);
        }
        return response($berita->gambar)->header('Content-Type', 'image/jpeg');
    }
    public function create()
    {
        return view('admin.berita.berita_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'nullable',
            'tanggal_upload' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $berita = new \App\Models\Berita();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->penulis = $request->penulis;
        $berita->tanggal_upload = $request->tanggal_upload;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $berita->gambar = $namaFile;
        }

        $berita->save();

        return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        $berita->delete();
        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }
    public function edit($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        return view('admin.berita.berita_edit', compact('berita'));
    }

public function update(Request $request, $id)
{
    $berita = \App\Models\Berita::findOrFail($id);

    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'nullable',
        'tanggal_upload' => 'required|date',
        'gambar' => 'nullable|image|max:2048',
    ]);

    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;
    $berita->tanggal_upload = $request->tanggal_upload;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $namaFile);
        $berita->gambar = $namaFile;
    }

    $berita->save();

    return redirect('/admin/berita')->with('success', 'Berita berhasil diupdate!');
}

}