<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanAdminController extends Controller
{
    /**
     * Menampilkan daftar pesan.
     */
    public function index()
    {
        $pesan = Pesan::latest()->paginate(10); // Ambil pesan terbaru dengan pagination
        return view('admin.pesan', compact('pesan'));
    }

    /**
     * Menghapus pesan.
     */
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id); // Cari pesan berdasarkan ID
        $pesan->delete(); // Hapus pesan

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
    
        public function update($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->update(['status' => 'dibalas']);

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil ditandai sebagai sudah dibalas.');
    }
}
