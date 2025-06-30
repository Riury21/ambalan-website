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
        'gambar' => 'nullable|image|max:2048',
    ]);

    $berita = new \App\Models\Berita();
    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $namaFile);
        $berita->gambar = $namaFile;
    }

    // Generate slug unik
    $slug = Str::slug($request->judul);
    $originalSlug = $slug;
    $counter = 1;

    while (\App\Models\Berita::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $berita->slug = $slug;
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
        'gambar' => 'nullable|image|max:2048',
    ]);

    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $namaFile);
        $berita->gambar = $namaFile;
    }

    // Generate slug unik
    $slug = Str::slug($request->judul);
    $originalSlug = $slug;
    $counter = 1;

    while (\App\Models\Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    $berita->slug = $slug;
    $berita->save();

    return redirect('/admin/berita')->with('success', 'Berita berhasil diupdate!');
}

}