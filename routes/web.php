<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::middleware('auth')->group(function () {
    // Buku
    Route::resource('buku', BukuController::class);

    // Anggota
    Route::resource('anggota', AnggotaController::class)->parameters([
        'anggota' => 'anggota'
    ]);
});

// Peminjaman
Route::get('/peminjaman', function () {
    return view('peminjaman.index');
})->name('peminjaman.index');

Route::get('/peminjaman/create', function () {
    return view('peminjaman.create');
})->name('peminjaman.create');

Route::get('/peminjaman/show', function () {
    return view('peminjaman.show');
});

Route::get('/peminjaman/edit', function () {
    return view('peminjaman.edit');
});

// Pengembalian
Route::get('/pengembalian', function () {
    return view('pengembalian.index');
})->name('pengembalian.index');

Route::get('/pengembalian/create', function () {
    return view('pengembalian.create');
})->name('pengembalian.create');

Route::get('/pengembalian/show', function () {
    return view('pengembalian.show');
});

Route::get('/pengembalian/edit', function () {
    return view('pengembalian.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
