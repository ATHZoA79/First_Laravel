<?php

use App\Http\Controllers\NewsController;
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
Route::get('/comment/save', [NewsController::class, 'save_comment']); 
Route::get('/comment/edit', [NewsController::class, 'edit_comment']); 
Route::get('/comment/delete', [NewsController::class, 'delete_comment']); 