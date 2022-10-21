<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
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
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [Controller::class, 'index'])->name('index');
// Route::get('/index', [Controller::class, 'index'])->name('index');

Route::prefix('/comment')->middleware('auth')->group(function() {
	Route::get('/', [NewsController::class, 'index'])->name('comments');
	Route::get('/board', [NewsController::class, 'comment'])->name('comment_board');
	Route::get('/edit/{id}', [NewsController::class, 'edit_comment']);
	Route::get('/delete/{id}', [NewsController::class, 'delete_comment']);
});

Route::prefix('/banner')->group(function () {
	Route::get('/', [BannerController::class, 'index'])->name('banner');
	Route::get('/create', [BannerController::class, 'create']);
	Route::post('/store', [BannerController::class, 'store']);
	Route::get('/edit/{id}', [BannerController::class, 'edit']);
	Route::post('/update/{id}', [BannerController::class, 'update']);
	Route::delete('/destroy/{id}', [BannerController::class, 'destroy']);
});

Route::prefix('/product')->middleware('auth')->group(function () {
	Route::get('/', [ProductController::class, 'index'])->name('product');
	Route::get('/create', [ProductController::class, 'create']);
	Route::post('/store', [ProductController::class, 'store']);
	Route::get('/edit/{id}', [ProductController::class, 'edit']);
	Route::post('/update/{id}', [ProductController::class, 'update']);
	Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
	Route::delete('/delete_img/{img_id}', [ProductController::class, 'delete_img']);
	Route::get('/info/{id}', [ProductController::class, 'product_info']);
});

Route::middleware('auth')->post('/add_to_cart', [Controller::class, 'add_cart']); 


// Shopping cart routes 
Route::prefix('shopping')->middleware('auth')->group(function() {
	Route::get('/shopping1', [ShoppingCartController::class, 'step01'])->name('cart');
	// use post so it cannot be entered by just typing uri 
	Route::post('/shopping2', [ShoppingCartController::class, 'step02']);
	Route::post('/shopping3', [ShoppingCartController::class, 'step03']);
	Route::post('/shopping4', [ShoppingCartController::class, 'step04']);
});