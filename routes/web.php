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

// laravel09
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function() {
    Route::get('news/create', 'add');
});

// 課題？
// use App\Http\Controllers\Admin\NewsController;
// Route::controller(NewsController::class)->prefix('admin')->group(function() {
//     Route::get('admin/profile/create','Admin\ProfileController@add');
//     Route::get('admin/profile/edit','Admin\ProfileController@edit');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

