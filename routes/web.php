<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{BannersController, CategoriesController, CollectionLayout, HomeLayout, OrdersController, PaymentsController, ProfileController, ProductsController, UsersController};
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
        Route::get('/dashboard', function () {
            return view('account.dashboard');
        })->name('account.dashboard');
        Route::get('/orders', function () {
            return view('account.orders');
        })->name('account.orders');
        Route::get('/cart', function () {
            return view('account.cart');
        })->name('account.cart');
        Route::get('/wishlist', function () {
            return view('account.wishlist');
        })->name('account.wishlist');
        Route::get('/reviews', function () {
            return view('account.reviews');
        })->name('account.reviews');
        Route::get('/details', function () {
            return view('account.details');
        })->name('account.details');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', function () {
            return view('cart');
        });
        Route::get('/customer-info', function () {
            return view('customer-info');
        });
        Route::get('/shipping-method', function () {
            return view('shipping-method');
        });
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/shipping/{id}', [OrdersController::class, 'create']);
        Route::get('/{id}/{quantity}', [OrdersController::class, 'preCreate']);

        Route::post('/store', [OrdersController::class, 'store'])->name('order.store');

    });
    
    Route::group(['prefix' => 'pay'], function () {
        Route::get('/complete/{id}', [PaymentsController::class, 'create']);
        Route::post('/store', [PaymentsController::class, 'store'])->name('pay.store');

    });
    
    
});

// 상품 상세 페이지
Route::get('/product/{id}', [ProductsController::class, 'show']);
// 카테고리별 페이지
Route::get('/category/{id}/{display}', [ProductsController::class, 'showLists'])->name('category.show');


Route::get('/collection/{type}/{display}', CollectionLayout::class);





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

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');

    Route::get('/orders', function () {
        return view('admin.products');
    })->name('admin.orders');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');

    Route::get('/banners', [BannersController::class, 'index'])->name('admin.banners');
    Route::get('/banner/{id}', [BannersController::class, 'show'])->name('banner.show');
    Route::post('/banner/store', [BannersController::class, 'store'])->name('banner.store');
    Route::post('/banner/update', [BannersController::class, 'update'])->name('banner.update');

});


