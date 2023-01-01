<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {

    Route::fallback(function () {
        return redirect(route('login'));
    });

    Route::controller(UserController::class)->group(function () {

        Route::get('/', 'index')->name('welcome');

        Route::prefix('register')->group(function () {
            Route::get('/', 'create')->name('register');
            Route::post('/', 'store')->name('store.user');
        });

        Route::prefix('login')->group(function () {
            Route::get('/', 'login')->name('login');
            Route::post('/', 'authenticate')->name('authenticate.user');
        });
    });
});

Route::middleware('auth')->group(function () {

    Route::fallback(function() {
        return redirect(route('home'));
    });

    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', 'show')->name('profile');
            Route::get('/edit/{type}', 'edit')->name('edit.user');
            Route::post('/update/{type}', 'update')->name('update.user');
            Route::post('/logout', 'logout')->name('logout.user');
        });
    });

    Route::controller(ProductController::class)->group(function () {

        Route::get('/home', 'index')->name('home');

        Route::get('/product/{product_id}/detail', 'detail')->name('show.product.detail');

        Route::prefix('search')->group(function () {
            Route::get('/', 'search')->name('search');
            Route::post('/', 'show')->name('search.product');
        });
    });
});

Route::middleware('admin')->group(function () {

    Route::controller(ProductController::class)->group(function () {

        Route::prefix('product')->group(function () {

            Route::get('/delete/{product}', 'destroy')->name('delete.product');

            Route::prefix('new')->group(function () {
                Route::get('/', 'create')->name('add.item');
                Route::post('/', 'store')->name('new.product');
            });
        });
    });
});

Route::middleware('member')->group(function () {

    Route::get('/history', [TransactionController::class, 'index'])->name('history');

    Route::controller(CartController::class)->group(function () {

        Route::prefix('cart')->group(function () {
            Route::get('/', 'index')->name('cart');
            Route::get('/edit/{cart}', 'edit')->name('edit.cart');
            Route::get('/remove/{cart}', 'destroy')->name('remove.cart.item');
            Route::get('/checkout', 'checkout')->name('checkout.cart');
            Route::post('/add/{product_id}', 'store')->name('add.cart.item');
            Route::post('/update/{cart}', 'update')->name('update.cart');
        });
    });
});
