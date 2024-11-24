<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

// Halaman Login dan Register
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes untuk Kategori
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index'); // Menampilkan kategori
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Form untuk menambah kategori
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store'); // Menyimpan kategori
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); // Form untuk mengedit kategori
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Mengupdate kategori
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy'); // Menghapus kategori

// Routes untuk Menu
Route::get('menus', [MenuController::class, 'index'])->name('menus.index'); // Menampilkan menu
Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create'); // Form untuk menambah menu
Route::post('menus', [MenuController::class, 'store'])->name('menus.store'); // Menyimpan menu
Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit'); // Form untuk mengedit menu
Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update'); // Mengupdate menu
Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy'); // Menghapus menu

// Routes untuk Pesanan
Route::get('orders', [OrderController::class, 'index'])->name('orders.index'); // Menampilkan pesanan
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create'); // Form untuk membuat pesanan
Route::post('orders', [OrderController::class, 'store'])->name('orders.store'); // Menyimpan pesanan
Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show'); // Menampilkan detail pesanan
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
