<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MateriController extends Controller
{
    public function index()
    {
        $path = public_path('dokumen');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $files = File::files($path);

        return view('admin.materi.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', // 10MB
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName(); // gunakan nama asli file
        $file->move(public_path('dokumen'), $filename);

        return back()->with('success', 'Materi berhasil diunggah.');
    }

    public function destroy($filename)
    {
        $path = public_path('dokumen/' . $filename);

        if (File::exists($path)) {
            File::delete($path);
            return back()->with('success', 'Materi berhasil dihapus.');
        }

        return back()->with('error', 'File tidak ditemukan.');
    }
}
