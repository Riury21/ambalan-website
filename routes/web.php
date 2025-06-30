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
    return view('auth.login'); // Menampilkan halaman login
})->name('login');

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

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout(); // Hapus autentikasi pengguna
    request()->session()->invalidate(); // Hapus semua data sesi
    request()->session()->regenerateToken(); // Regenerasi token sesi
    return redirect('/login'); // Arahkan ke halaman login
})->name('logout');

Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect('/login');
});

// Route untuk admin, dilindungi middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // Rute berita
    Route::prefix('admin/berita')->group(function () {
        Route::get('/', [AdminBeritaController::class, 'index']);
        Route::get('/gambar/{id}', [AdminBeritaController::class, 'gambar']);
        Route::get('/create', [AdminBeritaController::class, 'create']);
        Route::post('/', [AdminBeritaController::class, 'store']);
        Route::delete('/{id}', [AdminBeritaController::class, 'destroy']);
        Route::get('/{id}/edit', [AdminBeritaController::class, 'edit']);
        Route::put('/{id}', [AdminBeritaController::class, 'update']);
    });

    // Rute galeri
    Route::prefix('admin/galeri')->group(function () {
        Route::get('/', [AdminGaleriController::class, 'index']);
        Route::get('/gambar/{id}', [AdminGaleriController::class, 'gambar']);
        Route::get('/create', [AdminGaleriController::class, 'create']);
        Route::post('/', [AdminGaleriController::class, 'store']);
        Route::get('/{id}/edit', [AdminGaleriController::class, 'edit']);
        Route::put('/{id}', [AdminGaleriController::class, 'update']);
        Route::delete('/{id}', [AdminGaleriController::class, 'destroy']);
    });

    // Rute pembina
    Route::prefix('admin/pembina')->group(function () {
        Route::get('/', [AdminPembinaController::class, 'index']);
        Route::get('/create', [AdminPembinaController::class, 'create']);
        Route::post('/', [AdminPembinaController::class, 'store']);
        Route::get('/{id}/edit', [AdminPembinaController::class, 'edit']);
        Route::put('/{id}', [AdminPembinaController::class, 'update']);
        Route::delete('/{id}', [AdminPembinaController::class, 'destroy']);
    });

    // Rute dewan
    Route::prefix('admin/dewan')->group(function () {
        Route::get('/', [AdminDewanController::class, 'index']);
        Route::get('/create', [AdminDewanController::class, 'create']);
        Route::post('/', [AdminDewanController::class, 'store']);
        Route::get('/{id}/edit', [AdminDewanController::class, 'edit']);
        Route::put('/{id}', [AdminDewanController::class, 'update']);
        Route::delete('/{id}', [AdminDewanController::class, 'destroy']);
    });

    // Rute pesan
    Route::prefix('admin/pesan')->group(function () {
        Route::get('/', [PesanAdminController::class, 'index'])->name('pesan.index');
        Route::delete('/{id}', [PesanAdminController::class, 'destroy'])->name('pesan.destroy');
        Route::patch('/{id}', [PesanAdminController::class, 'update'])->name('pesan.update');
    });
});

// Route untuk pengguna, tanpa middleware
Route::get('/dewanpurna', [UserController::class, 'dewanPurna'])->name('dewan-purna.index');
Route::get('/dewanambalan', [UserController::class, 'dewanAmbalan'])->name('dewan-ambalan.index');
Route::get('/pembina', [UserController::class, 'pembina']);
Route::get('/galeri', [UserController::class, 'galeri']);
Route::get('/berita', [UserController::class, 'berita']);
Route::get('/berita/{slug}', [UserController::class, 'detailBerita'])->name('berita.detail');
Route::get('/galeri/{slug}', [UserController::class, 'detailGaleri'])->name('galeri.detail');

Route::get('/pesan', [PesanController::class, 'create'])->name('pesan.create');
Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');


