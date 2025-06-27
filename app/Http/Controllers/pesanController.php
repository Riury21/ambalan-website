<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    /**
     * Menampilkan form pengiriman pesan.
     */
    public function create()
    {
        return view('pages.pesan');
    }

    /**
     * Menyimpan pesan ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email', // Validasi email
            'pesan' => 'required|min:10', // Validasi pesan minimal 10 karakter
        ]);

        // Simpan data ke database
        Pesan::create([
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}
