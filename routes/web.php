<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'menu' => [
            [
                'title' => 'Kategori',
                'description' => 'Manajemen Kategori merupakan halaman untuk mengelola kategori'
            ],
            [
                'title' => 'Suppliers',
                'description' => 'Manajemen Supplier merupakan halaman untuk mengelola supplier'
            ],
            [
                'title' => 'Barang',
                'description' => 'Manajemen Barang merupakan halaman untuk mengelola barang'
            ],
            [
                'title' => 'Penerimaan',
                'description' => 'Manajemen Penerimaan merupakan halaman untuk mengelola penerimaan'
            ]
        ]
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('dashboard')->group(function () {
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/suppliers', SupplierController::class);
        Route::resource('/barang', BarangController::class);
        Route::resource('/penerimaan', PenerimaanController::class);
    });
});

require __DIR__ . '/auth.php';
