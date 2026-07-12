<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PartnershipController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/kemitraan-sekolah', [PartnershipController::class, 'index'])->name('partnership.index');
Route::post('/kemitraan-sekolah', [PartnershipController::class, 'store'])->name('partnership.store');
Route::get('/panduan-ar', function () {
    return view('ar-guide');
})->name('ar.guide');

Route::get('/edukasi/ensiklopedia', [PageController::class, 'encyclopedia'])->name('edukasi.encyclopedia');
Route::post('/edukasi/ensiklopedia/chat', [PageController::class, 'storeChat'])->middleware('auth')->name('edukasi.chat.store');

Route::get('/fix-tomat', function () {
    \App\Models\Product::where('name', 'like', '%Tomat%')->update([
        'image' => 'tomat.jpeg',
        'seed_type' => 'Tomat'
    ]);
    return redirect()->route('products.index')->with('success', 'Gambar Tomat Berhasil Diperbarui!');
});

// ==========================================
// RUTE AUTENTIKASI (LOGIN & REGISTER)
// ==========================================
use App\Http\Controllers\AuthController;

// Jika user sudah login, dia tidak boleh bisa akses halaman login & register lagi (middleware guest)
Route::middleware('guest')->group(function () {
    // Pelanggan
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    // Admin
    Route::get('/loginadmin', [AuthController::class, 'showAdminLoginForm'])->name('login.admin');
    Route::post('/loginadmin', [AuthController::class, 'login'])->name('login.admin.post'); // menggunakan logika yang sama
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE PELANGGAN (KERANJANG & CHECKOUT)
// ==========================================
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // Checkout
    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');
});

// ==========================================
// RUTE WEBHOOK MIDTRANS (DILUAR AUTH)
// ==========================================
use App\Http\Controllers\PaymentCallbackController;
Route::post('/midtrans/callback', [PaymentCallbackController::class, 'receive']);

// ==========================================
// RUTE DASHBOARD ADMIN (DILINDUNGI AUTH & IS_ADMIN)
// ==========================================
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPartnershipController;
use App\Http\Controllers\AdminOrderController;

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Beranda Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // CRUD Produk
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Kemitraan (B2B)
    Route::get('/partnerships', [AdminPartnershipController::class, 'index'])->name('partnerships.index');

    // Pesanan (Orders)
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});