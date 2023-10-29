<?php

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

use App\Http\Controllers\Admin\NewsController;// 使うクラスの use 宣言も忘れずに
Route::get('/admin/news/create', [NewsController::class, 'add'])->middleware('auth');
// //                                                       ^^^^^ アクションを指定する
// //                                ^^^^^^^^^^^^^^^^^^^^^ クラスを指定する
// //         ^^^^^^^^^^^^^^^^^^^^ URL を指定する
Route::get('/admin/news/edit', [NewsController::class, 'edit']);

use App\Http\Controllers\Admin\ProfileController;
Route::get('admin/profile/create', [ProfileController::class, 'add']);
Route::get('admin/profile/edit', [ProfileController::class, 'edit']);


// laravel09
//use App\Http\Controllers\Admin\NewsController;
//Route::controller(NewsController::class)->prefix('admin')->group(function() {
//    Route::get('news/create', 'add');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

