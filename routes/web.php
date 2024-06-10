<?php

use App\Http\Controllers\cekController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\PetugasKeamananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;


Route::get('/', function () {
    return view('index');
});

Route::get('admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified','admin'])->name('admin');
Route::get('rtrw', function () {
    return view('rtrw.index');
})->middleware(['auth', 'verified','rtrw'])->name('rtrw');

Route::get('petugas', function () {
    return view('petugas.index');
})->middleware(['auth', 'verified','petugas'])->name('petugas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','warga'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/cek1', function() {
    return ('<h1>Mengecek</h1>');
})->middleware(['auth', 'verified']);

Route::get('/cek2', [cekController::class,'index'])->middleware(['auth',
'verified']);
require __DIR__.'/auth.php';


Route::prefix('perumahan')->group(function () {
    Route::get('/', [PerumahanController::class, 'index'])->name('perumahan.index');
    Route::get('create', [PerumahanController::class, 'create'])->name('perumahan.create');
    Route::post('/', [PerumahanController::class, 'store'])->name('perumahan.store');
    Route::get('{id_perumahan}/edit', [PerumahanController::class, 'edit'])->name('perumahan.edit');
    Route::put('{id_perumahan}', [PerumahanController::class, 'update'])->name('perumahan.update');
    Route::delete('{id_perumahan}', [PerumahanController::class, 'destroy'])->name('perumahan.destroy');
});

Route::prefix('petugas')->group(function () {
    Route::get('', [PetugasKeamananController::class, 'index'])->name('petugas.index');
    Route::get('create', [PetugasKeamananController::class, 'create'])->name('petugas.create');
    Route::post('', [PetugasKeamananController::class, 'store'])->name('petugas.store');
    Route::get('{id}', [PetugasKeamananController::class, 'show'])->name('petugas.show'); // Define show route
    Route::get('{id}/edit', [PetugasKeamananController::class, 'edit'])->name('petugas.edit');
    Route::put('{id}', [PetugasKeamananController::class, 'update'])->name('petugas.update');
    Route::delete('{id}', [PetugasKeamananController::class, 'destroy'])->name('petugas.destroy');
});



