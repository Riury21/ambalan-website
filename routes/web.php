<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminPembinaController;
use App\Http\Controllers\AdminDewanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/berita', function () {
    return view('pages.berita');
});
Route::get('/galeri', function () {
    return view('pages.galeri');
});
Route::get('/sejarah', function () {
    return view('pages.sejarah');
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
    return view('login');
});

Route::get('/admin', function () {
    // Cek session login
    if (!session('is_admin')) {
        return redirect('/login');
    }
    return view('admin');
});

Route::post('/login', function (Request $request) {
    // Username dan password sederhana (contoh)
    $username = $request->username;
    $password = $request->password;

    if ($username === 'admin' && $password === 'admin12345') {
        session(['is_admin' => true]);
        return redirect('/admin');
    }
    return back()->with('error', 'Username atau password salah!');
});

Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect('/login');
});

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
Route::get('/berita/{id}', [UserController::class, 'detailBerita']);
Route::get('/galeri/{id}', [UserController::class, 'detailGaleri']);
