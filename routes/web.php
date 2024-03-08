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

Auth::routes();

// 商品情報一覧画面
Route::get('/home', [App\Http\Controllers\ProductController::class, 'showList'])->name('home')->middleware('auth');
Route::post('/delete/{id}',[App\Http\Controllers\ProductController::class, 'submitDeleteButton'])->name('delete');
Route::get('/search',[App\Http\Controllers\ProductController::class, 'getProductsBySearchConditions'])->name('search');

// 商品情報登録画面
Route::get('/regist', [App\Http\Controllers\ProductController::class, 'showRegistForm'])->name('regist')->middleware('auth');
Route::post('/regist',[App\Http\Controllers\ProductController::class, 'submitRegistForm'])->name('submit');

// 商品情報詳細画面
Route::get('/detail/{id}', [App\Http\Controllers\ProductController::class, 'showDetail'])->name('detail')->middleware('auth');

// 商品情報編集画面
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'showEditForm'])->name('edit')->middleware('auth');
Route::post('/edit/{id}',[App\Http\Controllers\ProductController::class, 'submitEditForm'])->name('update');
