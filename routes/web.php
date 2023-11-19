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
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');// name: admin.news.update
    Route::get('news/delete', 'delete')->name('news.delete');
});
// //                                                       ^^^^^ アクションを指定する
// //                                ^^^^^^^^^^^^^^^^^^^^^ クラスを指定する
// //         ^^^^^^^^^^^^^^^^^^^^ URL を指定する
//Route::get('/admin/news/edit', [NewsController::class, 'edit']);

use App\Http\Controllers\Admin\ProfileController;
Route::get('admin/profile/create', [ProfileController::class, 'add'])->middleware('auth')->name('admin.profile.add');;
Route::get('admin/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('admin.profile.edit');
Route::post('admin/profile/edit', [ProfileController::class, 'update'])->middleware('auth')->name('admin.profile.update');



Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::post('profile/create', 'create')->name('profile.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;// use 宣言
//                                      ^^^^^^^^^^^^^^^^^^^^^^^ 別名 PublicNewsController をつけて使えるようにする
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ NewsController コントローラを使う
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');
//              ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ PublicNewsController コントローラの index アクションを使う
//         ^^^ 指定された URL『/』にアクセスされたときに

// routes/web.phpを編集して
// /profile にアクセスが来たら ProfileController/index Action に渡す
// ように設定してください
use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');
