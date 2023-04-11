<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{AccountController, BannersController, 
    CartController, CategoriesController, CollectionLayout, 
    HomeLayout, OrdersController, PaymentsController, ProfileController, ProductsController, 
    QuestionsController, ReviewsController,
    UsersController, UserAddressesController, WishlistController};
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

Route::get('/', HomeLayout::class);

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'account'], function () {
        Route::get('/dashboard', [AccountController::class, 'showLastOne'])->name('account.dashboard');
        Route::get('/orders', [AccountController::class, 'showHistory'])->name('account.orders');

        Route::get('/cart', [CartController::class, 'accountShow'])->name('account.cart');
        Route::post('/cart/delete', [CartController::class, 'delete'])->name('account.cart.delete');
        
        Route::get('/wishlist', [WishlistController::class, 'show'])->name('account.wishlist');
        Route::post('/wishlist/add', [WishlistController::class, 'check']);
        Route::put('/wishlist/delete/{id}', [WishlistController::class, 'delete']);
        Route::post('/wishlist/edit', [WishlistController::class, 'edit'])->name('cart.edit');


        Route::get('/reviews', [ReviewsController::class, 'show'])->name('account.reviews');
        Route::post('/reviews/create', [ReviewsController::class, 'create'])->name('reviews.create');

        Route::post('/qna/create', [QuestionsController::class, 'create'])->name('questions.create');


        Route::get('/myinfo', [AccountController::class, 'showMyInfo'])->name('account.details');
        Route::post('/update', [AccountController::class, 'edit'])->name('account.update');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/customer-info', function () {
            return view('customer-info');
        })->name('order.customer-info');
        
        Route::get('/shipping-method', function () {
            return view('shipping-method');
        });
    });

    // 위시리스트
    Route::get('/wishlist', [WishlistController::class, 'show']);
    Route::post('/wishlist/add', [WishlistController::class, 'check']);
    Route::put('/wishlist/delete/{id}', [WishlistController::class, 'delete']);


    Route::group(['prefix' => 'order'], function () {
        Route::get('/shipping/{id}', [OrdersController::class, 'create'])->name('order.create');
        Route::post('/precreate', [OrdersController::class, 'preCreate'])->name('order.next');
        Route::post('/store', [OrdersController::class, 'store'])->name('order.store');

    });
    
    Route::group(['prefix' => 'pay'], function () {
        Route::get('/complete/{id}', [PaymentsController::class, 'create']);
        Route::post('/store', [PaymentsController::class, 'store'])->name('pay.store');
    });

    Route::get('/address', [UserAddressesController::class, 'show'])->name('user.address.show');
});

// 상품 상세 페이지
Route::get('/product/{id}', [ProductsController::class, 'show']);
// 카테고리별 페이지
Route::get('/category/{id}/{display}', [ProductsController::class, 'showLists'])->name('category.show');

Route::get('/collection/{type}/{display}', CollectionLayout::class);

// 장바구니
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'show']);
    Route::post('/add', [CartController::class, 'check']);
    Route::put('/delete/{id}', [CartController::class, 'delete']);
    Route::post('/edit', [CartController::class, 'edit'])->name('cart.edit');
    Route::get('/check', [CartController::class, 'checkDeliveryFee'])->name('cart.delivery-fee');
});
// 위시리스트 체크
Route::post('/wishlist/check', [WishlistController::class, 'simpleCheck'])->name('check.wishlist');

Route::post('/search', [ProductsController::class, 'search'])->name('search');

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/single', function () {
    return view('single');
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
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'getLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'setLogin'])->name('admin.login.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/product/{id}', [ProductsController::class, 'edit'])->name('product.edit');
    Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
    Route::post('/product/update', [ProductsController::class, 'update'])->name('product.update');

    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders');
    Route::get('/order/{id}', [OrdersController::class, 'edit'])->name('order.edit');
    Route::post('/order/update', [OrdersController::class, 'update'])->name('order.update');
    Route::post('/order/updateStatus', [OrdersController::class, 'updateStatus'])->name('order.update.status');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/category/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
    Route::post('/category/update', [CategoriesController::class, 'update'])->name('category.update');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
    Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
    Route::post('/user/update', [UsersController::class, 'update'])->name('user.update');

    Route::get('/banners', [BannersController::class, 'index'])->name('admin.banners');
    Route::get('/banner/{id}', [BannersController::class, 'show'])->name('banner.show');
    Route::post('/banner/store', [BannersController::class, 'store'])->name('banner.store');
    Route::post('/banner/update', [BannersController::class, 'update'])->name('banner.update');

});


