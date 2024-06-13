<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\PetugasKeamananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KetuaRwController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route untuk halaman utama
Route::get('/', function () {
    if (Auth::check()) {
        $userRole = Auth::user()->role;
        switch ($userRole) {
            case 1:
                return redirect()->route('admin.index'); // Mengarahkan langsung ke admin.index setelah login
            case 2:
                return redirect()->route('ketuarw.index');
            case 3:
                return redirect()->route('petugas.index');
            case 4:
                return redirect()->route('dashboard');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    } else {
        return view('index'); // Jika pengguna belum login, tampilkan halaman utama
    }
})->name('home');

// Route untuk admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('admin', function () {
        return redirect()->route('admin.index'); // Mengarahkan ke admin.index jika diakses langsung /admin
    })->name('admin');

    Route::get('admin/index', function () {
        return view('admin.index');
    })->name('admin.index');

    // Route untuk Kelola Perumahan
    Route::prefix('perumahan')->group(function () {
        Route::get('/', [PerumahanController::class, 'index'])->name('perumahan.index');
        Route::get('create', [PerumahanController::class, 'create'])->name('perumahan.create');
        Route::post('/', [PerumahanController::class, 'store'])->name('perumahan.store');
        Route::get('{id_perumahan}/edit', [PerumahanController::class, 'edit'])->name('perumahan.edit');
        Route::put('{id_perumahan}', [PerumahanController::class, 'update'])->name('perumahan.update');
        Route::delete('{id_perumahan}', [PerumahanController::class, 'destroy'])->name('perumahan.destroy');
    });

    // Route untuk Kelola Ketua RW
    Route::prefix('ketuarw')->group(function () {
        Route::get('', [KetuaRwController::class, 'index'])->name('ketuarw.index');
        Route::get('create', [KetuaRwController::class, 'create'])->name('ketuarw.create');
        Route::post('', [KetuaRwController::class, 'store'])->name('ketuarw.store');
        Route::get('{id}/edit', [KetuaRwController::class, 'edit'])->name('ketuarw.edit');
        Route::put('{id}', [KetuaRwController::class, 'update'])->name('ketuarw.update');
        Route::delete('{id}', [KetuaRwController::class, 'destroy'])->name('ketuarw.destroy');
    });
});

// Route untuk Petugas Keamanan (hanya diakses oleh Ketua RW)
Route::middleware(['auth', 'verified', 'ketuarw'])->group(function () {
    Route::prefix('petugas')->group(function () {
        Route::get('', [PetugasKeamananController::class, 'index'])->name('petugas.index');
        Route::get('create', [PetugasKeamananController::class, 'create'])->name('petugas.create');
        Route::post('', [PetugasKeamananController::class, 'store'])->name('petugas.store');
        Route::get('{id_petugas_keamanan}', [PetugasKeamananController::class, 'show'])->name('petugas.show');
        Route::get('{id_petugas_keamanan}/edit', [PetugasKeamananController::class, 'edit'])->name('petugas.edit');
        Route::put('{id_petugas_keamanan}', [PetugasKeamananController::class, 'update'])->name('petugas.update');
        Route::delete('{id_petugas_keamanan}', [PetugasKeamananController::class, 'destroy'])->name('petugas.destroy');
    });
});

// Route untuk Warga
Route::middleware(['auth', 'verified', 'warga'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route terkait profil pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk cek
    Route::get('/cek1', function () {
        return '<h1>Mengecek</h1>';
    })->middleware('verified');

    Route::get('/cek2', [CekController::class, 'index'])->middleware('verified');
});

// Include routes dari file auth.php untuk autentikasi
require __DIR__.'/auth.php';
