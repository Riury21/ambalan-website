<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminPembinaController;
use App\Http\Controllers\AdminDewanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PesanAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/berita', function () {
    return view('pages.berita');
});
Route::get('/galeri', function () {
    return view('pages.galeri');
});
Route::get('/proker', function () {
    return view('pages.proker');
});
Route::get('/profil', function () {
    return view('pages.profil');
});
Route::get('/pembina', function () {
    return view('pages.pembina');
});
Route::get('/dewanambalan', function () {
    return view('pages.dewanambalan');
});

Route::get('/dewanpurna', function () {
    return view('pages.dewanpurna');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/admin', function () {
    // Cek session login
    if (!session('is_admin')) {
        return redirect('/login');
    }
    return view('admin');
});

Route::get('/login', function () {
    return view('auth.login'); // Pastikan file view ada di resources/views/auth/login.blade.php
})->name('auth.login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    // Periksa apakah email ada di database
    if (!\App\Models\User::where('email', $credentials['email'])->exists()) {
        return back()->with('error', 'Email tidak ditemukan.');
    }

    // Proses login
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    return back()->with('error', 'Email atau password salah.');
})->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect('/login');
});

Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/berita', [AdminBeritaController::class, 'index']);
Route::get('/admin/berita/gambar/{id}', [AdminBeritaController::class, 'gambar']);
Route::get('/admin/berita/create', [AdminBeritaController::class, 'create']);
Route::post('/admin/berita', [AdminBeritaController::class, 'store']);
Route::delete('/admin/berita/{id}', [AdminBeritaController::class, 'destroy']);
Route::get('/admin/berita/{id}/edit', [AdminBeritaController::class, 'edit']);
Route::put('/admin/berita/{id}', [AdminBeritaController::class, 'update']);

Route::get('/admin/galeri', [AdminGaleriController::class, 'index']);
Route::get('/admin/galeri/gambar/{id}', [AdminGaleriController::class, 'gambar']);
Route::get('/admin/galeri/create', [AdminGaleriController::class, 'create']);
Route::post('/admin/galeri', [AdminGaleriController::class, 'store']);
Route::get('/admin/galeri/{id}/edit', [AdminGaleriController::class, 'edit']);
Route::put('/admin/galeri/{id}', [AdminGaleriController::class, 'update']);
Route::delete('/admin/galeri/{id}', [AdminGaleriController::class, 'destroy']);

Route::get('/admin/pembina', [AdminPembinaController::class, 'index']);
Route::get('/admin/pembina/create', [AdminPembinaController::class, 'create']);
Route::post('/admin/pembina', [AdminPembinaController::class, 'store']);
Route::get('/admin/pembina/{id}/edit', [AdminPembinaController::class, 'edit']);
Route::put('/admin/pembina/{id}', [AdminPembinaController::class, 'update']);
Route::delete('/admin/pembina/{id}', [AdminPembinaController::class, 'destroy']);

Route::get('/admin/dewan', [AdminDewanController::class, 'index']);
Route::get('/admin/dewan/create', [AdminDewanController::class, 'create']);
Route::post('/admin/dewan', [AdminDewanController::class, 'store']);
Route::get('/admin/dewan/{id}/edit', [AdminDewanController::class, 'edit']);
Route::put('/admin/dewan/{id}', [AdminDewanController::class, 'update']);
Route::delete('/admin/dewan/{id}', [AdminDewanController::class, 'destroy']);

Route::get('/dewanpurna', [UserController::class, 'dewanPurna'])->name('dewan-purna.index');
Route::get('/dewanambalan', [UserController::class, 'dewanAmbalan'])->name('dewan-ambalan.index');
Route::get('/pembina', [UserController::class, 'pembina']);
Route::get('/galeri', [UserController::class, 'galeri']);
Route::get('/berita', [UserController::class, 'berita']);
Route::get('/berita/{judul}', [UserController::class, 'detailBerita']);
Route::get('/galeri/{judul}', [UserController::class, 'detailGaleri']);

Route::get('/pesan', [PesanController::class, 'create'])->name('pesan.create');
Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');

Route::get('/admin/pesan', [PesanAdminController::class, 'index'])->name('pesan.index');
Route::delete('/admin/pesan/{id}', [PesanAdminController::class, 'destroy'])->name('pesan.destroy');
Route::patch('/admin/pesan/{id}', [PesanAdminController::class, 'update'])->name('pesan.update');
