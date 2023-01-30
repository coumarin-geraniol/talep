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

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/posts', 'Post\IndexController')->name('post.index'); //select
    Route::delete('/posts/{post}', 'Post\DestroyController')->name('post.delete');

    Route::get('/servers', 'Server\IndexController')->name('server.index'); //select
    Route::delete('/servers/{server}', 'Server\DestroyController')->name('server.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\User','prefix' => 'user','middleware' => 'user'], function () {
    Route::get('/posts/create', 'Post\CreateController')->name('post.create');
    Route::post('/posts', 'Post\StoreController')->name('post.store');
    Route::get('/posts/{post}', 'Post\ShowController')->name('post.show');

    Route::get('/servers/create', 'Server\CreateController')->name('server.create');
    Route::post('/servers', 'Server\StoreController')->name('server.store');
    Route::get('/servers/{post}', 'Server\ShowController')->name('server.show');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
