<?php

use App\Http\Controllers\{BannersController, CategoriesController, Layouts, ProfileController, ProductsController, UsersController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return view('home');
// });

Route::get('/', Layouts::class);


Route::get('/account/dashboard', function () {
    return view('account.dashboard');
})->name('account.dashboard');
Route::get('/account/orders', function () {
    return view('account.orders');
})->name('account.orders');
Route::get('/account/cart', function () {
    return view('account.cart');
})->name('account.cart');
Route::get('/account/wishlist', function () {
    return view('account.wishlist');
})->name('account.wishlist');
Route::get('/account/reviews', function () {
    return view('account.reviews');
})->name('account.reviews');
Route::get('/account/details', function () {
    return view('account.details');
})->name('account.details');



Route::get('/cart', function () {
    return view('cart');
});
Route::get('/cart/customer-info', function () {
    return view('customer-info');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/collection-grid', function () {
    return view('collection-grid');
});
Route::get('/collection-list', function () {
    return view('collection-list');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/**
 * Admin
 * 
 */
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products', [ProductsController::class, 'index'])->name('admin.products');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');

Route::get('/admin/orders', function () {
    return view('admin.products');
})->name('admin.orders');

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');

Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');

Route::get('/admin/banners', [BannersController::class, 'index'])->name('admin.banners');
Route::post('/banner/store', [BannersController::class, 'store'])->name('banner.store');
