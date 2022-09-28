<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\BannerController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test', function () {
//     return view('index');
// });

// can also write 
Route::get('/index', [NewsController::class, 'index']); 

Route::get('/test', [NewsController::class, 'getData']); 

Route::get('/comment', [NewsController::class, 'comment']); 
Route::post('/comment/save', [NewsController::class, 'save_comment']); 
Route::get('/comment/edit/{id}', [NewsController::class, 'edit_comment']); 
Route::get('/comment/update/{id}', [NewsController::class, 'update_comment']); 
Route::get('/comment/delete/{target}', [NewsController::class, 'delete_comment']); 

Route::prefix('/banner')->group(function () {  // 用群組管理相關頁面

	Route::get('/', [BannerController::class, 'index']);
	Route::get('/create', [BannerController::class, 'create']);
	Route::post('/store', [BannerController::class, 'store']);
	Route::get('/edit/{id}', [BannerController::class, 'edit']);
	Route::post('/update/{id}', [BannerController::class, 'update']);
	Route::post('/destroy/{id}', [BannerController::class, 'destroy']);
});

Route::get('/datatable', [BannerController::class, 'table']); 
