<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AnggotaController;



Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::resource('buku', BukuController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('anggota', AnggotaController::class);
Route::put('/buku/{id}/pinjam', [BukuController::class, 'borrow'])->name('bukus.borrow');

