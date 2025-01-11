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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
//Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
//routes for post
Route::get('/post', 'App\Http\Controllers\PostController@index')->name('post');
Route::get('/post/trash', 'App\Http\Controllers\PostController@trashed')->name('post.trash');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/post/store', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/post/show{slug}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::post('/post/update/{id}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::get('/post/destroy/{id}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}', 'App\Http\Controllers\PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'App\Http\Controllers\PostController@restore')->name('post.restore');


//rout tag

Route::get('/tags', 'App\Http\Controllers\TaqController@index' )->name('tags');
Route::get('/tag/create', 'App\Http\Controllers\TaqController@create' )->name('tag.create');
Route::post('/tag/store', 'App\Http\Controllers\TaqController@store' )->name('tag.store');
Route::get('/tag/edit/{id}', 'App\Http\Controllers\TaqController@edit' )->name('tag.edit');
Route::post('/tag/update/{id}', 'App\Http\Controllers\TaqController@update' )->name('tag.update');
Route::get('/tag/destroy/{id}', 'App\Http\Controllers\TaqController@destroy' )->name('tag.destroy');






