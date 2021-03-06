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

Route::get('/', 'App\Http\Controllers\PostController@index');
Route::get('page/{page_slug}', 'App\Http\Controllers\PageController@show');
Route::get('post', 'App\Http\Controllers\PostController@index');
Route::get('post/{post_slug}', 'App\Http\Controllers\PostController@show');
Route::get('category/{category_slug}/', 'App\Http\Controllers\PostController@category');
Route::get('tag/{tag_slug}/', 'App\Http\Controllers\PostController@tag');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
