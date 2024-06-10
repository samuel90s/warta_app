<?php

use App\Http\Controllers\cekController;
use App\Http\Controllers\PerumahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\Perumahaan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified','admin'])->name('admin');
Route::get('dashboardv2', function () {
    return view('perumahaan.apalah');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

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


Route::controller(PerumahaanController::class)->prefix('perumahaan')->group(function(){
    Route::get('','index')->name('perumhaan');
});

// Route::controller(AdminController::class)->prefix('Admin')->group(function() {
//     Route::get('','index')->name('admin');
// });

Route::get('apalah', function(){
    return view('perumahaan.apalah');
});
