<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminDasboardController;

Route::get('/toko', [HomeController::class, 'listToko'])->name('toko.list');

Route::get('/admin/dasboard', [AdminDasboardController::class, 'index']);
Route::get('/kategori{id}', [UserController::class, 'kategori'])->name('kategori.show');

Route::get('/', [HomeController::class, 'index']);
// Halaman Login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Form register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Dashboard Member
Route::get('/member/dashboard', function () {
    return view('member.dashboard');
});

// ADMIN - CRUD KATEGORI
Route::get('/admin/kategori', [CategoryController::class, 'index']);
Route::get('/admin/kategori/create', [CategoryController::class, 'create']);
Route::post('/admin/kategori/store', [CategoryController::class, 'store']);
Route::get('/admin/kategori/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/admin/kategori/update/{id}', [CategoryController::class, 'update']);
Route::get('/admin/kategori/delete/{id}', [CategoryController::class, 'destroy']);

// ADMIN - CRUD USER
Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/user/create', [UserController::class, 'create']);
Route::post('/admin/user/store', [UserController::class, 'store']);
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/admin/user/update/{id}', [UserController::class, 'update']);
Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy']);

// ADMIN - CRUD TOKO
Route::get('/admin/toko', [TokoController::class, 'index']);
Route::get('/admin/toko/create', [TokoController::class, 'create']);
Route::post('/admin/toko/store', [TokoController::class, 'store']);
Route::get('/admin/toko/edit/{id}', [TokoController::class, 'edit']);
Route::post('/admin/toko/update/{id}', [TokoController::class, 'update']);
Route::get('/admin/toko/delete/{id}', [TokoController::class, 'destroy']);

// ADMIN - CRUD PRODUCT
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/products/create', [AdminProductController::class, 'create']);
Route::post('/admin/products/store', [AdminProductController::class, 'store']);
Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit']);
Route::post('/admin/products/update/{id}', [AdminProductController::class, 'update']);
Route::get('/admin/products/delete/{id}', [AdminProductController::class, 'destroy']);

// Member Toko
Route::get('/member/toko', [App\Http\Controllers\Member\TokoController::class,'index']);
Route::get('/member/toko/create', [App\Http\Controllers\Member\TokoController::class,'create']);
Route::post('/member/toko/store', [App\Http\Controllers\Member\TokoController::class,'store']);
Route::get('/member/toko/edit/{id}', [App\Http\Controllers\Member\TokoController::class,'edit']);
Route::post('/member/toko/update/{id}', [App\Http\Controllers\Member\TokoController::class,'update']);
Route::get('/member/toko/delete/{id}', [App\Http\Controllers\Member\TokoController::class,'delete']);
// Member Produk 
Route::get('/member/produk', [App\Http\Controllers\Member\ProdukController::class, 'index']);
Route::get('/member/produk/create', [App\Http\Controllers\Member\ProdukController::class, 'create']);
Route::post('/member/produk/store', [App\Http\Controllers\Member\ProdukController::class, 'store']);
Route::get('/member/produk/edit/{id}', [App\Http\Controllers\Member\ProdukController::class, 'edit']);
Route::post('/member/produk/update/{id}', [App\Http\Controllers\Member\ProdukController::class, 'update']);
Route::get('/member/produk/delete/{id}', [App\Http\Controllers\Member\ProdukController::class, 'delete']);

Route::get('/produk/{id}', [HomeController::class, 'detailProduk']);
// Route::get('/produk/{id}', [UserController::class, 'Produk']);
Route::get('/kategori/{slug}', [HomeController::class, 'kategori']);
// Dashboard Member
Route::get('/member/dasboard', [App\Http\Controllers\Member\DasboardController::class, 'index'])
    ->name('member.dasboard');

Route::get('/produk', [UserController::class, 'produk'])->name('produk.list');
Route::get('/produk/{id}', [UserController::class, 'detail'])->name('produk.detail');
